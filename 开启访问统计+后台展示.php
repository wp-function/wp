<?php
/*----------------------------------------------------------------------
  * 
  * WordPress 功能 >>>> 开启访问统计
  *
  * @Description: 前端开启访问、后台展示
  *
------------------------------------------------------------------------*/

add_action('wp_head', '_post_views_record');

//增加文章访问量
function _post_views_record(){
	if (is_singular()) {
		global $post;
		$post_ID = $post->ID;
		if ($post_ID) {
			$post_views = (int) get_post_meta($post_ID, 'views', true);
			if (!update_post_meta($post_ID, 'views', ($post_views + 1))) {
				add_post_meta($post_ID, 'views', 1, true);
			}
		}
	}
}

//前端调用
function _get_post_views(){
	global $post;
	$post_ID = $post->ID;
	$views = (int) get_post_meta($post_ID, 'views', true);
	return $views;
}

//后台展示访问数量
if(!function_exists('AddViewsColumn')){
	
    function AddViewsColumn($cols){
        $cols['views'] = __('阅读');
        return $cols;
    }
	
    function GetViewsValue($column_name, $post_id){
		$views = (int) get_post_meta($post_id, 'views', true);
		echo $views;
    }
	
    // for posts
    add_filter('manage_posts_columns', 'AddViewsColumn');
    add_action('manage_posts_custom_column', 'GetViewsValue', 10, 2);
	
    // for pages
    add_filter('manage_pages_columns', 'AddViewsColumn');
    add_action('manage_pages_custom_column', 'GetViewsValue', 10, 2);
	
}
