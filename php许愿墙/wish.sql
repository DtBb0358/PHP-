SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `wish` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '名字',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '许愿内容',
  `time` int(11) NOT NULL COMMENT '许愿时间',
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '贴纸颜色',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '保护密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `wish` (`id`, `name`, `content`, `time`, `color`, `password`) VALUES
(33, '低调抖腿', '恭喜你搭建成功！', 1639226031, 'green', '6666');
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=34;
COMMIT;