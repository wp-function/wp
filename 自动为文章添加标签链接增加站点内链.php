<?php

//自动为文章添加标签链接增加站点内链
$match_num_from = 1;        //一篇文章中同一个标签少于几次不自动链接
$match_num_to = 1;      //一篇文章中同一个标签最多自动链接几次
function tag_sort($a, $b){
    if ( $a->name == $b->name ) return 0;
    return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
function tag_link($content){
    global $match_num_from,$match_num_to;
        $posttags = get_the_tags();
        if ($posttags) {
            usort($posttags, "tag_sort");
            foreach($posttags as $tag) {
                $link = get_tag_link($tag->term_id);
                $keyword = $tag->name;
                $cleankeyword = stripslashes($keyword);
                $url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('【查看含有[%s]标签的文章】'))."\"";
                $url .= ' target="_blank"';
                $url .= ">".addcslashes($cleankeyword, '$')."</a>";
                $limit = rand($match_num_from,$match_num_to);
                $content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
                $content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
                $cleankeyword = preg_quote($cleankeyword,'\'');
                $regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
                $content = preg_replace($regEx,$url,$content,$limit);
                $content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
            }
        }
    return $content;
}
add_filter('the_content','tag_link',1);