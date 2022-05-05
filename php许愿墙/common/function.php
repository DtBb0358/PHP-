<?php
function input($method, $name, $type = 's', $default = '')
{
    switch ($method) {
        case 'get': $method = $_GET;
            break;
        case 'post': $method = $_POST;
            break;
    }
    $data = isset($method[$name]) ? $method[$name] : $default;
    switch ($type) {
        case 's': return is_string($data) ? $data : $default;
        case 'd': return (int) $data;
        default: trigger_error('不存在的过滤类型“' . $type . '”');
    }
}
function format_date($time)
{
    $diff = time() - $time;
    $format = [86400 => '天', 3600 => '小时', 60 => '分钟', 1 => '秒'];
    foreach ($format as $k => $v) {
        $result = floor($diff / $k);
        if ($result) {
            return $result . $v;
        }
    }
    return '0.5秒';
}
//源码地址https://gitee.com/imaboy/wishing-wall
function page_html($url, $total, $page, $size)
{
  
    $maxpage = max(ceil($total / $size), 1);
 
    if ($maxpage <= 1) {
        return '';
    }
    if ($page == 1) {
        $first = '<span>首页</span>';
        $prev = '<span>上一页</span>';
    } else {
        $first = "<a href=\"{$url}1\">首页</a>";
        $prev = '<a href="' . $url . ($page - 1) . '">上一页</a>';
    }
    if ($page == $maxpage) {
        $next = '<span>下一页</span>';
        $last = '<span>尾页</span>';
    } else {
        $next = '<a href="' . $url . ($page + 1) . '">下一页</a>';
        $last = "<a href=\"{$url}{$maxpage}\">尾页</a>";
    }
   
    return "<p>当前位于：$page/$maxpage</p>$first $prev $next $last";
}


function page_sql($page, $size)
{
    return ($page - 1) * $size . ',' . $size;
}
