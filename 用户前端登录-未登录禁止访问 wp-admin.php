<?php
/*----------------------------------------------------------------------
  * 
  * WordPress 优化 >>>>>  用户前端登录
  * 
  * @Description: 禁止访问 wp-admin & wp-login
  *
  * 此功能来自：
  * 
  * WordPress 自定义注册登录移除 wp-login.php
  * >>>> https://www.wpzhiku.com/wordpress-custom-reg-login-remove-wp-login-php/
  * WordPress 自定义注册登录以及登陆后跳转到前端自定义用户中心
  * >>>> https://www.wpzhiku.com/wordpress-custom-register-login-redirect-to-frontend-user-center/
  * >>>>
  *
------------------------------------------------------------------------*/

//只有管理员才能访问仪表盘，其他用户重定向到用户中心
add_action( 'admin_init', 'redirect_non_admin_users' );
function redirect_non_admin_users() {
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
		wp_redirect( site_url("/me/") ); #这里的“/me/”是前端用户中心的地址。
		exit;
	}
}

//修改登录页面为自定义登陆页面
function wizhi_login_page( $login_url, $redirect ) {
	// $redirect >>> 后台 wp-admin 加载链接
    //$new_login_url = home_url('ucenter') . '?redirect_to=' . $redirect;
    $new_login_url = home_url('/');
    return $new_login_url;
}
add_filter( 'login_url', 'wizhi_login_page', 10, 2 );

//重定向 wp-login.php 到自定义登陆页面
add_action('init', function(){
    $page_viewed = basename($_SERVER['REQUEST_URI']);
    if ($page_viewed === "wp-login.php" && $_SERVER['REQUEST_METHOD'] === 'GET'){
        wp_redirect(home_url());
        exit;
    }
});

//登陆失败后跳转到自定义登陆页面 - 登陆失败后，也要处理一下，跳转到一个自定义的登陆失败页面。
add_action('wp_login_failed', function(){
    wp_redirect(home_url('/'));
    exit;
});

//登出后跳转到自定义登陆页面 - 然后是处理登出后跳转的链接，我们可以让用户登出后跳转到首页，或者一个自定义的错误页面。
add_action('wp_logout', function(){
    wp_redirect(home_url('/'));
    exit;
});
