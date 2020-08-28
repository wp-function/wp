<?php
//给文章外链添加nofollow
add_filter('the_content','web589_the_content_nofollow',999);
function web589_the_content_nofollow($content){
	preg_match_all('/href="(.*?)" rel="external nofollow" /',$content,$matches);
	if($matches){
		foreach($matches[1] as $val){
			if( strpos($val,home_url())===false ) $content=str_replace("href=\"$val\"", "href=\"$val\" rel=\"nofollow\" ",$content);
		}
	}
	return $content;
}