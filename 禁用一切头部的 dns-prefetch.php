<?php

//禁用一切头部的 dns-prefetch
remove_action('wp_head', 'wp_resource_hints', 2);