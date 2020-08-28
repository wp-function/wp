<?php

//WordPress 添加多个自定义菜单
register_nav_menus(
	array(
	'head-nav' => __( '顶部菜单' ),
	'foot-nav' => __( '底部菜单' ),
	)
);