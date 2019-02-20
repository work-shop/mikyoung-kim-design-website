<?php
/**
 * Class to display debug information for admins.
 *
 * Notice: This file is only loaded if you activate debugging with the filter related_posts_by_taxonomy_debug.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Related_Posts_By_Taxonomy_Debug' ) ) {
	class Related_Posts_By_Taxonomy_Debug {

		public $debug             = array();
		public $results           = array();
		public $post_types        = array();
		public $taxonomies        = array();
		public $plugin            = 0;
		public $widget_counter    = 0;
		public $shortcode_counter = 0;

		function __construct() {
			$this->debug_setup();
		}

		/**
		 * Calls plugin filters for debugging.
		 *
		 * @since 2.0.0
		 * @return void
		 */
		function debug_setup() {
			/*
			 * Check if the current user can view debug results.
			 * True if the current user is an admin or super admin.
			 * OR the current user has the 'view_rpbt_debug_results' capability.
			 */

			if ( ! ( is_super_admin() || current_user_can( 'view_rpbt_debug_results' ) ) ) {
				return;
			}

			$this->debug['cache'] = 'none';

			// Get all post types when widget or shortcode is called.
			$post_types = array_keys( get_post_types() );
			$this->post_types = array_merge( $this->post_types, $post_types );
			$this->post_types = array_unique( $this->post_types );

			// Get all taxonomies when widget or shortcode is called.
			$taxonomies = array_keys( get_taxonomies() );
			$this->taxonomies = array_merge( $this->taxonomies, $taxonomies );
			$this->taxonomies = array_unique( $this->taxonomies );

			$this->plugin  = km_rpbt_plugin();
			$this->cache   = $this->plugin->cache instanceof Related_Posts_By_Taxonomy_Cache;

			// Adds debug link before the widget title.
			add_filter( 'dynamic_sidebar_params', array( $this, 'widget_params' ), 99 );

			// Get widget and shortcode args.
			// Adds a filter to wp_get_object_terms.
			add_filter( 'related_posts_by_taxonomy_widget_args',    array( $this, 'debug_start' ), 99, 2 );
			add_filter( 'related_posts_by_taxonomy_shortcode_atts', array( $this, 'debug_start' ), 99, 2 );

			// Get posts_clauses.
			add_filter( 'related_posts_by_taxonomy_posts_clauses', array( $this, 'posts_clauses' ), 99, 4 );

			// Show widget and shortcode even if no posts were found.
			// Removes the filter added to the wp_get_object_terms hook.
			add_filter( 'related_posts_by_taxonomy_widget_hide_empty',    array( $this, 'hide_empty' ), 99 );
			add_filter( 'related_posts_by_taxonomy_shortcode_hide_empty', array( $this, 'hide_empty' ), 99 );

			// Get the requested template.
			add_filter( 'related_posts_by_taxonomy_template', array( $this, 'get_template' ), 99, 2 );

			// Store the results.
			add_action( 'related_posts_by_taxonomy_after_display', array( $this, 'after_display' ) );

			// Display debug results in footer.
			add_action( 'wp_footer', array( $this, 'wp_footer' ), 99 );
		}

		/**
		 * Starts debugging at the arguments hook for widged and shortcode.
		 * Adds filter to wp_get_object_terms.
		 *
		 * @since 2.0.0
		 *
		 * @param array $args   Widget or shortcode arguments.
		 * @param array $widget Widget args.
		 * @return array Array with widget or shortcode arguments.
		 */
		function debug_start( $args, $widget = '' ) {

			/* First filter called for debugging. */

			// Force a title if empty.
			$args['title'] = empty( $args['title'] ) ? 'Related Posts Debug Title' : $args['title'];

			if ( 'related_posts_by_taxonomy_widget_args' === current_filter() ) {
				$this->debug['type']        = 'widget';
				$this->debug['widget args'] = $args;
				$this->debug['widget']      = $widget;

			} else {
				$this->debug['type']           = 'shortcode';
				$this->debug['shortcode args'] = $args;
				$args['before_shortcode']      = '<div class="rpbt_shortcode">' . $this->debug_link( 'shortcode' ) . '<br/>';
				$args['after_shortcode']       = '</div>';
			}

			if ( $this->cache ) {
				$this->check_cache( $args );
			}

			// Gets current post terms, taxonomies and post ID.
			add_filter( 'wp_get_object_terms', array( $this, 'object_terms' ), 99, 4 );

			return $args;
		}

		/**
		 * Check if related posts are cached.
		 *
		 * @since 2.1
		 * @param array $args Array with widget or shortcode arguments.
		 * @return void
		 */
		function check_cache( $args ) {

			// Get cached post ids (if they exist).
			$cache = $this->plugin->cache->get_post_meta( $args );

			if ( isset( $cache['ids'] ) ) {

				// Related posts were cached for this post.
				$cache_args                       = $cache['args'];
				$post_ids                         = array_keys( (array) $cache['ids'] );
				$this->debug['cache']             = 'current post cached';
				$this->debug['cached post ids']   = ! empty( $post_ids ) ? implode( ', ', $post_ids ) : '';
				$defaults                         = km_rpbt_get_default_args();
				$this->debug['function args']     = array_intersect_key( $args , $defaults );
				$taxonomies                       = km_rpbt_get_taxonomies( $cache_args['taxonomies'] );
				$this->debug['cached taxonomies'] = implode( ', ', $taxonomies );
				$this->debug['current post id']   = isset( $args['post_id'] ) ? $args['post_id'] : '';
				if ( isset( $cache_args['related_terms'] ) ) {
					$this->debug['cached terms'] = $this->get_terms_names( $cache_args['related_terms'] );
				} else {
					// not in cache for post that doesn't have related posts???
					$this->debug['cached terms'] = 'Could not find cached terms';
				}
			} else {

				// Related posts not yet in cache.
				$this->debug['cache'] = 'current post is not yet cached';
			}
		}

		/**
		 * Adds debug link before widget title.
		 *
		 * @since 2.0.0
		 * @param array $params Array with widget parameters.
		 * @return array Array with widget parameters.
		 */
		function widget_params( $params ) {

			if ( ! isset( $params[0]['widget_id'] ) ) {
				return $params;
			}

			if ( 0 !== strpos( $params[0]['widget_id'], 'related-posts-by-taxonomy' ) ) {
				return $params;
			}

			$params[0]['before_widget'] = $params[0]['before_widget'] . $this->debug_link() . '<br/>';

			return $params;
		}

		/**
		 * Creates a debug link.
		 *
		 * @since 2.0.0
		 * @param string $type Type shortcode or widget.
		 * @return string Link to debug information,
		 */
		function debug_link( $type = 'widget' ) {

			$counter = ( 'widget' === $type ) ? ++$this->widget_counter : ++$this->shortcode_counter;

			$this->debug['debug_id'] = 'rpbt-' . $type . '-debug-' . $counter;
			$this->debug['debug_link'] = '(<a href="#' . $this->debug['debug_id'] . '">Debug ' . ucfirst( $type ) . '</a>)';

			return $this->debug['debug_link'];
		}

		/**
		 * Gets debug information
		 * Callback function for filter wp_get_object_terms.
		 *
		 * @since 2.0.0
		 * @return array Array term objects.
		 */
		function object_terms( $terms, $object_ids, $taxonomies, $args ) {
			$this->debug['current post id']                   = $object_ids;
			$this->debug['taxonomies used for related query'] = $taxonomies;
			$this->debug['terms found for current post']      = $this->get_terms_names( $terms );

			return $terms;
		}

		/**
		 * Shows widget or shortcode even if no related posts were found.
		 * Removes filter wp_get_object_terms.
		 *
		 * @since 2.0.0
		 * @return false.
		 */
		function hide_empty() {
			// Remove filter after related posts are retrieved from the database.
			remove_filter( 'wp_get_object_terms', array( $this, 'object_terms' ), 99, 4 );

			// Always show the widget or shortcode.
			return false;
		}

		/**
		 * Gets query and function args from km_rpbt_related_posts_by_taxonomy().
		 * adds filter to related_posts_by_taxonomy.
		 *
		 * @since 2.0.0
		 * @return array Array with sql clauses.
		 */
		function posts_clauses( $pieces, $post_id, $taxonomies, $args ) {
			global  $wpdb;

			extract( $pieces );

			if ( ! empty( $group_by_sql ) ) {
				$group_by_sql = 'GROUP BY ' . $group_by_sql;
			}

			if ( ! empty( $order_by_sql ) ) {
				$order_by_sql = 'ORDER BY ' . $order_by_sql;
			}

			$query = "SELECT {$select_sql} FROM $wpdb->posts {$join_sql} {$where_sql} {$group_by_sql} {$order_by_sql} {$limit_sql}";

			$query = str_replace( $wpdb->prefix , '' , $query );

			$term_names = $this->get_terms_names( $args['related_terms'] );

			$this->debug['terms used for related query'] = $term_names;

			unset( $args['related_terms'] );

			$defaults = km_rpbt_get_default_args();
			$this->debug['function args'] = array_intersect_key( $args , $defaults );
			$this->debug['related posts query'] = $query;

			add_filter( 'related_posts_by_taxonomy', array( $this, 'posts_found' ) );

			return $pieces;
		}

		/**
		 * Gets the post ids if related posts where found.
		 *
		 * @since 2.0.0
		 * @param array $results Array with post objects.
		 * @return array Array with with post objects.
		 */
		function posts_found( $results ) {

			if ( ! empty( $results ) ) {
				if ( isset( $results[0]->ID ) ) {
					$this->debug['related post ids found'] = wp_list_pluck( $results, 'ID' );
				} else {
					$this->debug['related post ids found']['error'] = 'results found but could not get post IDs';
					$this->debug['related post ids found']['results'] = $results;
				}
			} else {
				$this->debug['related post ids found'] = $results;
			}

			return $results;
		}

		/**
		 * Gets the requested template.
		 *
		 * @since 2.0.0
		 * @param string $template Template.
		 * @return string Template.
		 */
		function get_template( $template, $type ) {
			$this->debug['requested template'] = $template;
			return $template;
		}

		/**
		 * Stores the result after display
		 *
		 * @since 2.1.1
		 */
		function after_display() {
			$this->results[] = $this->debug;

			// Reset debug array.
			// This is the last debug action.
			$this->debug = array();
		}

		/**
		 * Get the term names from ids.
		 *
		 * @since 2.4.0
		 *
		 * @param array $term_ids Array with term ids.
		 * @return string Term_names.
		 */
		function get_terms_names( $term_ids ) {
			if ( ! $term_ids ) {
				return array();
			}

			$args = array(
				'include' => $term_ids,
				'fields'  => 'names',
			);

			$term_names = get_terms( $args );

			if ( is_wp_error( $term_names ) || empty( $term_names ) ) {
				return 'No terms found';
			}

			return implode( ', ', $term_names );
		}

		/**
		 * Returns a fancy header for the debug information.
		 *
		 * @since  2.3.1
		 *
		 * @param string $type Type of debug.
		 * @return string Fancy header.
		 */
		function get_header( $type = '' ) {
			static $shortcode = 0;
			static $widget = 0;

			$type_count =  '';
			$debug_type =  '';
			if ( 'shortcode' === $type ) {
				$type_count = ' ' . ++$shortcode;
				$debug_type = 'Debug: ';
			} elseif ( 'widget' === $type ) {
				$type_count = ' ' . ++$widget;
				$debug_type = 'Debug: ';
			}

			//$type  = ( 'Supports' !== $type ) ? 'Debug: ' . $type : $type;
			$title = 'Related Posts by Taxonomy ' . $debug_type . $type . $type_count;
			$title = '**    ' . $title . '    **';
			$length = strlen( $title );
			$rows = str_repeat( "*", $length ) . "\n";
			$rows .= '**' . str_repeat( " ", $length - 4 ) . "**\n";
			$rows .= $title . "\n";
			$rows .= '**' . str_repeat( " ", $length - 4 ) . "**\n";
			$rows .= str_repeat( "*", $length ) . "\n";
			return $rows;
		}

		/**
		 * Returns supported plugin features
		 *
		 * @since 2.3.1
		 *
		 * @return array Array with supported plugin features.
		 */
		function get_supports() {
			remove_filter( 'related_posts_by_taxonomy_widget_hide_empty',    array( $this, 'hide_empty' ), 99 );
			remove_filter( 'related_posts_by_taxonomy_shortcode_hide_empty', array( $this, 'hide_empty' ), 99 );

			$supports = $this->plugin->get_plugin_supports();
			foreach ( $supports as $key => $support ) {
				$supports[ $key ] = $this->plugin->plugin_supports( $key );
			}

			return $supports;
		}

		/**
		 * Displays the results in the footer
		 */
		function wp_footer() {

			$seperator = str_repeat( "-", 43 ) . "\n";

			$order = array(
				'type', 'cache', 'current post id', 'terms found for current post',
				'taxonomies used for related query', 'cached taxonomies',
				'terms used for related query', 'cached terms',
				'related post ids found', 'cached post ids',
				'widget args', 'shortcode args', 'function args',
				'related posts query',
				'requested template', 'widget'
			);
			$order = array_fill_keys( $order , '' );
			$style = 'border:0 none;outline:0 none;padding:20px;margin:0;';
			$style .= 'color: #333;background: #f5f5f5;font-family: monospace;font-size: 16px;font-style: normal;font-weight: normal;line-height: 1.5;white-space: pre;overflow:auto;';
			$style .= 'width:100%;display:block;float:none;clear:both;text-align:left;z-index: 999;position:relative;';

			echo "<pre style='{$style}'>" . $this->get_header( 'General Debug Information' ) . "\n\n";
			echo "Plugin Supports \n\n";
			echo htmlspecialchars( print_r(  $this->get_supports(), true ) );
			echo $seperator;
			echo "All post types found (public and private)\n\n";
			$post_types = implode( ', ', $this->post_types );
			echo $post_types  . "\n";
			echo $seperator;
			echo "All taxonomies found (public and private)\n\n";
			$taxonomies = implode( ', ', $this->taxonomies );
			echo $taxonomies;
			echo "</pre>";

			if ( ! empty( $this->results ) ) {
				echo '<p>';
				foreach ( (array) $this->results as $debug_arr ) {

					$id = '';
					if ( isset( $debug_arr['debug_id'] ) ) {
						$id = ' id="' . $debug_arr['debug_id'] . '"';
					}

					echo "<pre{$id} style='{$style}'>" .  $this->get_header( $debug_arr['type'] ) . "\n\n";

					unset( $debug_arr['debug_id'], $debug_arr['debug_link'] );

					$_order = $order;

					if ( 'widget' === $debug_arr['type'] ) {
						unset( $_order['shortcode args'] );
					}

					if ( 'shortcode' === $debug_arr['type'] ) {
						unset( $_order['widget args'], $_order['widget'] );
					}

					// reorder debug array.
					$debug_arr = array_merge( $_order, $debug_arr );

					unset( $debug_arr['type'] );

					if ( $this->cache ) {
						unset( $debug_arr['related post ids found'] );
						unset( $debug_arr['terms used for related query'] );
						unset( $debug_arr['terms found for current post'] );
						unset( $debug_arr['taxonomies used for related query'] );
						unset( $debug_arr['related posts query'] );
					} else {
						unset( $debug_arr['cache'] );
						unset( $debug_arr['cached post ids'] );
						unset( $debug_arr['cached terms'] );
						unset( $debug_arr['cached taxonomies'] );
						unset( $debug_arr['related posts cache query'] );
					}

					foreach ( $debug_arr as $key => $value ) {
						$title = $key;
						if ( 'function args' === $title ) {
							$title = 'Arguments used to get related posts';
						}

						echo $title . ":\n\n";
						if ( is_array( $value ) ) {
							echo '<pre>';
							echo htmlspecialchars( print_r( $value, true ) );
							echo '</pre>';
						} else {
							echo $value . "\n";
						}

						echo "\n";
						echo $seperator;
					}
					echo '</pre>';
				}
				echo '<p>';
			} else {
				echo '<p><pre>' . $this->get_header() . "\n\nNo widget or shortcode found to debug on this page</pre></p>";
			}
		}

	} // class
} // class exists
