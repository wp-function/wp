<?php

//日志总数
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;

//评论总数
$wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");

//分类总数
$count_categories = wp_count_terms('category');

//标签总数
$count_tags = wp_count_terms('post_tag');

//友情链接
$link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'");

//网站运行
floor((time()-strtotime("2011-7-27"))/86400);

//最后更新
$last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");
$last = date('Y年n月j日', strtotime($last[0]->MAX_m));
