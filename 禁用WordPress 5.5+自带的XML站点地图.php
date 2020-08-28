<?php

//禁用 WordPress 5.5+ 自带的XML站点地图
add_filter( 'wp_sitemaps_enabled', '__return_false' );