<?php

//保护后台登录
/*
修改后您的默认后台登陆地址就变为：

您的域名/wp-login.php?word=admin

输入wp-admin就会被重定向到普通登陆地址。
*/

add_action('login_enqueue_scripts','login_protection');  

function login_protection(){  

   if($_GET['word'] != 'admin')header('Location: https://www.域名/');  

}