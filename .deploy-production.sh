#!/bin/bash

source ./.env

# Theme
scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/themes/mikyoung $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/themes

# Plugins and must use plugins
# scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/plugins $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/
#scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/mu-plugins $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/

#specific plugins
#scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/plugins/wc-product-customer-list-premium $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/plugins

#specific files
#scp -P $KINSTA_PRODUCTION_PORT ./wp-content/themes/custom/functions/post-types/classes/class-nam-class.php $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/themes/custom/functions/post-types/classes/

#functions.php
#scp -P $KINSTA_PRODUCTION_PORT ./wp-content/themes/custom/functions.php $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/themes/custom/

curl -L https://myk-d.com/kinsta-clear-cache-all/ 