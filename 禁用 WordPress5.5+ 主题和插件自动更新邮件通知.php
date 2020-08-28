<?php

// 禁用插件自动更新邮件通知
add_filter( 'auto_plugin_update_send_email', '__return_false' );
 
// 禁用主题自动更新邮件通知
add_filter( 'auto_theme_update_send_email', '__return_false' );