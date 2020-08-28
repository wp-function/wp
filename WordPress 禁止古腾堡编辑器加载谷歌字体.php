<?php
//WordPress 禁止古腾堡编辑器加载谷歌字体

// 禁用WP编辑器加载Google字体css
function xintheme_remove_gutenberg_styles($translation, $text, $context, $domain)
{
    if($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
        return $translation;
    }
    return 'off';
}
add_filter( 'gettext_with_context', 'xintheme_remove_gutenberg_styles',10, 4);
