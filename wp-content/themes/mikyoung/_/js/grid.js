

$(window).on('load', function() {

	if( $('body').hasClass('page-id-3943') ){

			//setTimeout(function() {
				$('#process').masonry({
					itemSelector: '.grid-item',
					columnWidth: '.grid-sizer',
					gutter: '.gutter-sizer',
					percentPosition: true
				});
			//}, 2000);

		}

	});
