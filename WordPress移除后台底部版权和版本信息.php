<?php

/**
 * 移除WordPress后台底部左文字
 * https://themebetter.com/wordpress-delete-copyright.html
 */
add_filter('admin_footer_text', '_admin_footer_left_text');
function _admin_footer_left_text($text) {
	$text = '';
	return $text;
}

/**
 * 移除WordPress后台底部右文字
 * https://themebetter.com/wordpress-delete-copyright.html
 */
add_filter('update_footer', '_admin_footer_right_text', 11);
function _admin_footer_right_text($text) {
	$text = '';
	return $text;
}