<?php
require './common/init.php';
require './common/function.php';
$page = max(input('get', 'page', 'd'), 1);
$size = 4;
$sql = 'SELECT count(*) FROM `wish`';
if (!$res = mysqli_query($link, $sql)) {
    exit("SQL[$sql]执行失败：" . mysqli_error($link));
}
$total = (int) mysqli_fetch_row($res)[0];
$sql = 'SELECT `id`,`name`,`content`,`time`,`color` FROM `wish` ORDER BY `id` DESC LIMIT ' . page_sql($page, $size);
if (!$res = mysqli_query($link, $sql)) {
    exit("SQL[$sql]执行失败：" . mysqli_error($link));
}
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);
if (empty($data) && $page > 1) {
    header('Location: ./index.php?page=1');
    exit;
}
$id = max(input('get', 'id', 'd'), 0);
$action = input('get', 'action', 's');
if ($id) {
    $password = input('post', 'password', 's');
    $sql = 'SELECT `name`,`content`,`color`,`password` FROM `wish` WHERE `id`=' . $id;
    if (!$res = mysqli_query($link, $sql)) {
        exit("SQL[$sql]执行失败：" . mysqli_error($link) . $sql);
    }
    if (!$edit = mysqli_fetch_assoc($res)) {
        exit('该愿望不存在！');
    }
    mysqli_free_result($res);
    $checked = isset($_POST['password']) || empty($edit['password']);
    if ($checked && $password !== $edit['password']) {
        $tips = '密码不正确！';
        $checked = false;
    }
    if ($checked && $action == 'delete') {
        $sql = 'DELETE FROM `wish` WHERE `id`=' . $id;
        if (!mysqli_query($link, $sql)) {
            exit('SQL执行失败：' . mysqli_error($link));
        }
        header('Location: ./index.php');
        exit;
    }
}
// 源码地址https://gitee.com/imaboy/wishing-wall

mysqli_close($link);
require './view/index.html';
