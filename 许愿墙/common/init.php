<?php
// 在项目中设置时区，以适应各种服务器环境
date_default_timezone_set('Asia/Shanghai');
mb_internal_encoding('UTF-8');
// 连接数据库
$link = @mysqli_connect('127.0.0.1', 'root', 'root', 'php_wish');
if (!$link) {
    exit('数据库连接失败：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');