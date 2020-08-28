<?php

//后台禁止加载谷歌字体
function wp_style_del_web( $src, $handle ) {
	if( strpos(strtolower($src),'fonts.googleapis.com') ){
		$src=''; 
	}	
	return $src;
}
add_filter( 'style_loader_src', 'wp_style_del_web', 2, 2 );
//js处理
function wp_script_del_web( $src, $handle ) {
	$src_low = strtolower($src);
	if( strpos($src_low,'maps.googleapis.com') ){
		return  str_replace('maps.googleapis.com','ditu.google.cn',$src_low);  //google地图
	}	
	if( strpos($src_low,'ajax.googleapis.com') ){
		return  str_replace('ajax.googleapis.com','ajax.useso.com',$src_low);  //google库用360替代
	}
	if( strpos($src_low,'twitter.com') || strpos($src_low,'facebook.com')  || strpos($src_low,'youtube.com') ){
		return '';        //无法访问直接去除
	}	
	return $src;
}
add_filter( 'script_loader_src', 'wp_script_del_web', 2, 2 );