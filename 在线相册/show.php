<?php
require './common/init.php';
// 接收参数
$id = input('get', 'id', 'd');
$name = input('post', 'rename', 's');
$newpid = input('POST','newpid','d');
// 查询图片信息
$data = album_picture_data($id);
if (!$data) {
	echo $id;
	echo $name;
    exit ('该图片不存在！');
}
// 相册导航
$pid = (int)$data['pid'];
$nav = album_nav($pid);
// 上一张、下一张
$prev = db_fetch_row("SELECT `id` FROM `picture` WHERE `pid`=$pid AND `id`<$id ORDER BY `id` DESC LIMIT 1")['id'];
$next = db_fetch_row("SELECT `id` FROM `picture` WHERE `pid`=$pid AND `id`>$id ORDER BY `id` ASC LIMIT 1")['id'];
if ($name !== "") {
    album_picture_rename($id,$name);
    $data = album_picture_data($id);	
}
// 载入模板
require './view/show.html';