<?php
//移除 WordPress 的 Admin Bar

add_filter( 'show_admin_bar', '__return_false' );
