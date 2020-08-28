<?php

/**
* WordPress 自动为文章添加已使用过的标签
* https://www.wpdaxue.com/auto-add-tags.html
*/

add_action('save_post', 'auto_add_tags');
function auto_add_tags(){
    $tags = get_tags(array('hide_empty' => false));
    $post_id = get_the_ID();
    $post_content = get_post($post_id)->post_content;
    if ($tags) {
        foreach ($tags as $tag) {
            // 如果文章内容出现了已使用过的标签，自动添加这些标签
            if (strpos($post_content, $tag->name) !== false) {
                wp_set_post_tags($post_id, $tag->name, true);
            }
        }
    }
}

// 优化版
add_action('save_post', 'auto_add_tags');
function auto_add_tags()
{
    $tags = get_tags(array('hide_empty' => false));
    $post_id = get_the_ID();
    $post_content = get_post($post_id)->post_content;
    if ($tags) {
        $i = 0;
        foreach ($tags as $tag) {
            // 如果文章内容出现了已使用过的标签，自动添加这些标签
            if (strpos($post_content, $tag->name) !== false) {
                if ($i == 5) {
                    // 控制输出数量
                    break;
                }
                wp_set_post_tags($post_id, $tag->name, true);
                $i++;
            }
        }
    }
}

// 常用版
function array2object($array){
    // 数组转对象
    if (is_array($array)) {
        $obj = new StdClass();
        foreach ($array as $key => $val) {
            $obj->{$key} = $val;
        }
    } else {
        $obj = $array;
    }
    return $obj;
}

function object2array($object){
    // 对象转数组
    if (is_object($object)) {
        foreach ($object as $key => $value) {
            $array[$key] = $value;
        }
    } else {
        $array = $object;
    }
    return $array;
}

add_action('save_post', 'auto_add_tags');
function auto_add_tags(){
    $tags = get_tags(array('hide_empty' => false));
    $post_id = get_the_ID();
    $post_content = get_post($post_id)->post_content;
    if ($tags) {
        $i = 0;
        $arrs = object2array($tags);
        shuffle($arrs);
        $tags = array2object($arrs);
        // 打乱顺序
        foreach ($tags as $tag) {
            // 如果文章内容出现了已使用过的标签，自动添加这些标签
            if (strpos($post_content, $tag->name) !== false) {
                if ($i == 5) {
                    // 控制输出数量
                    break;
                }
                wp_set_post_tags($post_id, $tag->name, true);
                $i++;
            }
        }
    }
}