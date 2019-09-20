#!/bin/bash

source ./.env


# Theme
scp -P $KINSTA_STAGING_PORT -r ./wp-content/themes/mikyoung $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/themes

# Plugins and must use plugins
# scp -P $KINSTA_STAGING_PORT -r ./wp-content/plugins $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/
#scp -P $KINSTA_STAGING_PORT -r ./wp-content/mu-plugins $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/

#specific plugins
#scp -P $KINSTA_STAGING_PORT -r ./wp-content/plugins/wc-product-customer-list-premium $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/plugins

#specific files
#scp -P $KINSTA_STAGING_PORT ./wp-content/themes/custom/functions/post-types/classes/class-nam-class.php $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/themes/custom/functions/post-types/classes/

#functions.php
#scp -P $KINSTA_STAGING_PORT ./wp-content/themes/custom/functions.php $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/themes/custom/

curl -L https://staging.newportartmuseum.org/kinsta-clear-cache-all/ 