<?php
date_default_timezone_set('Asia/Shanghai');
mb_internal_encoding('UTF-8');
$link = @mysqli_connect('127.0.0.1', '用户名', '密码', '数据库名');
if (!$link) {
    exit('数据库连接失败：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');