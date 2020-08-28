<?php

//字数统计
function count_words($text){
	global $post;
	if ( '' == $text ){
		$text = $post->post_content;
		if (mb_strlen($output, 'UTF-8') < mb_strlen($text, 'UTF-8'))
			$output .= '本文共计有' . mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8') . '个字';
		return $output;
	}
}