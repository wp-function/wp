<?php
///wordpress蜘蛛爬行记录生成
function get_naps_bot()
{
    $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (strpos($useragent, 'googlebot') !== false) {
        return 'Googlebot';
    }
    if (strpos($useragent, 'msnbot') !== false) {
        return 'MSNbot';
    }
    if (strpos($useragent, 'slurp') !== false) {
        return 'Yahoobot';
    }
    if (strpos($useragent, 'baiduspider') !== false) {
        return 'Baiduspider';
    }
    if (strpos($useragent, 'sohu-search') !== false) {
        return 'Sohubot';
    }
    if (strpos($useragent, 'lycos') !== false) {
        return 'Lycos';
    }
    if (strpos($useragent, 'robozilla') !== false) {
        return 'Robozilla';
    }
    return false;
}
function nowtime()
{
    date_default_timezone_set('Asia/Shanghai');
    $date = date("Y-m-d.G:i:s");
    return $date;
}
$searchbot = get_naps_bot();
if ($searchbot) {
    $tlc_thispage = addslashes($_SERVER['HTTP_USER_AGENT']);
    $url = $_SERVER['HTTP_REFERER'];
    $file = "robotslogs.txt";
    $time = nowtime();
    $data = fopen($file, "a");
    $PR = "{$_SERVER['REQUEST_URI']}";
    fwrite($data, "Time:{$time} robot:{$searchbot} URL:{$tlc_thispage}\n page:{$PR}\r\n");
    fclose($data);
}