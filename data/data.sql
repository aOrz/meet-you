-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 06 月 19 日 11:09
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `address_book`
--

-- --------------------------------------------------------

--
-- 表的结构 `circle`
--

CREATE TABLE IF NOT EXISTS `circle` (
  `circle_id` int(20) NOT NULL AUTO_INCREMENT,
  `admin_id` int(20) NOT NULL,
  `circle_name` varchar(500) NOT NULL,
  `circle_number` int(20) NOT NULL,
  `circle_notic` varchar(50) NOT NULL,
  PRIMARY KEY (`circle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `circle_user`
--

CREATE TABLE IF NOT EXISTS `circle_user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `circle_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `state` int(2) NOT NULL,
  ` permission` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `send_id` int(50) NOT NULL,
  `data` date NOT NULL,
  `messages` text NOT NULL,
  `title` varchar(500) NOT NULL,
  `breviary` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user_id`, `send_id`, `data`, `messages`, `title`, `breviary`) VALUES
(23, 49, 48, '2015-06-19', '<p style="text-align:center;line-height:150%"><strong><span style="font-size:21px;line-height:150%;font-family: 宋体">“金佳园杯</span></strong><strong><span style="font-size:21px;line-height:150%">WEB</span></strong><strong><span style="font-size:21px;line-height:150%;font-family: 宋体">程序设计大赛”通知</span></strong></p><p style="line-height:150%"><span style="font-size: 19px;line-height:150%;font-family:楷体_GB2312">&nbsp;&nbsp;&nbsp; </span><span style="font-size:16px;line-height:150%;font-family: 宋体">为丰富在校大学生的校园文化生活，激励在校大学生开拓进取、勇于创新，在校内外积极培养创新精神与实践动手能力，特举办本次程序设计大赛，给在校生创造一个技术交流与展示的平台，增进学生的软件技术，让同学们学有所长、学以致用。另本次竞赛结果将作为参评年度“金佳园科技奖学金”重要参考依据。</span></p><p style="margin-left:0;text-indent:0;line-height:150%"><strong><span style="font-size:16px;line-height:150%;font-family:宋体">一、</span></strong><strong><span style="font-size:16px;line-height:150%;font-family:宋体">活动主题</span></strong></p><p style="text-indent:32px;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">“金佳园杯WEB程序设计大赛”</span></p><p style="margin-left:0;text-indent:0;line-height:150%"><strong><span style="font-size:16px;line-height:150%;font-family:宋体">二、</span></strong><strong><span style="font-size:16px;line-height:150%;font-family:宋体">主办单位</span></strong></p><p style="text-indent:32px;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">山东金佳园科技有限公司</span></p><p style="text-indent:32px;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">共青团烟台大学委员会</span></p><p style="margin-left:0;text-indent:0;line-height:150%"><strong><span style="font-size:16px;line-height:150%;font-family:宋体">三、</span></strong><strong><span style="font-size:16px;line-height:150%;font-family:宋体">承办单位</span></strong></p><p style="margin-left:24px;text-indent:0;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">&nbsp; </span><span style="font-size:16px;line-height:150%;font-family:宋体">烟台大学计算机与控制工程学院团委</span></p><p style="margin-left:24px;text-indent:0;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">&nbsp; </span><span style="font-size:16px;line-height:150%;font-family:宋体">烟台大学数学与信息科学学院团委</span></p><p style="margin-left:24px;text-indent:0;line-height:150%"><span style="font-size:16px;line-height:150%;font-family:宋体">&nbsp; </span><span style="font-size:16px;line-height:150%;font-family:宋体">烟台大学光电信息科学技术学院团委</span></p><p><br/></p>', '密友啊同学录', '“金佳园杯WEB程序设计大赛”通知    为丰富在校大学生的校园文化生活，激励在校大学生开拓进取、勇'),
(24, 49, 48, '2015-06-19', '<p><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;">&gt;</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">前台：</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> &gt;&nbsp;&nbsp;</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">用户登录</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;">/</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">注销，添加自己的联系信息，写留言，搜索留言，搜索同学</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> &gt;&nbsp;&nbsp;</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">后台：</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> &gt;&nbsp;&nbsp;</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">管理员登录注销，修改信息，删除留言，用户数据统计</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <br/> </span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">功能：</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <span style="color:gray">&nbsp;&nbsp;&nbsp;1.&nbsp;</span></span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">圈子功能，圈内共享信息，可以留言等，最好加入聊天功能。还要有圈公告邀请加入圈子等</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <br/> </span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">前台：</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <span style="color:gray">&nbsp;&nbsp;&nbsp;1.&nbsp;</span></span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">用户数据：登录使用邮箱（邮箱</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;">ID</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">全球唯一，不存在轮回使用问题），每个人有自己自增的</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;">ID</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">，手机号，</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;">QQ</span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">号，人人，微博，微信，个人简介（可以填写其他的信息），个人主页，学校信息昵称等。</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <span style="color:gray">&nbsp;&nbsp;&nbsp;2.&nbsp;</span></span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">用户需要可以上传头像，照片等。</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <span style="color:gray">&nbsp;&nbsp;&nbsp;3.&nbsp;</span></span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">用户可以自己设置自己的时光轴</span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/> <span style="color:gray">&nbsp;&nbsp;&nbsp;4.&nbsp;</span></span><span style="font-size:15px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;">创建圈子</span><span style="font-size: 15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/></span><span style="font-size:15px;font-family:&#39;Tahoma&#39;,&#39;sans-serif&#39;"><br/></span><br/></p>', '密友啊同学录', '>前台： >  用户登录/注销，添加自己的联系信息，写留言，搜索留言，搜索同学 >  后台： >  '),
(25, 48, 49, '2015-06-19', '<p><br/></p><p>时光总是太短暂，留下了我的眷恋，刻下了你的自信和恬然；&nbsp;</p><p>岁月总是太漫漫，印记划过我的脸，彩虹架过你的天；&nbsp;</p><p>生活总要讲情缘，友谊闪过我的视线，又闪过你的顾盼。&nbsp;</p><p>春寒料峭，一池水，一轮月，一句祝愿，一份期盼。&nbsp;</p><p><br/></p><p>生活就是这样。盼望它飞跃时，它总是慢悠悠；等体会到个中滋味，想多留它须时，它却如落花流水匆匆逝去。时慢时快时疾时缓，时悲时喜时乐时苦。愁与苦为伴，欢与乐同行。聚散皆是缘，离合总关情。情谊悠悠，岁月如流，蓦然回首，却已人去楼空，不知江月照何人，但见长江送流水。&nbsp;</p><p><br/></p><p>谈分别，道离散。三年中说过多次，可终不曾分开。而今再话分离，却真个要“岁月流逝人分手，独挽相思留。”……不伤心，强颜欢笑都是骗人的。事到如今，还有什么可保留的？该哭就大哭，该谈就畅谈，该聚就多聚。焉知明日会如何？&nbsp;</p><p><br/></p><p>浊酒一杯入愁肠，却化作千丝万缕相思泪。此去经年，虽明月常向别时圆，却已相逢无期。安知再聚之时不满头华发，又或作古，此岂非“此时一别成永诀”？&nbsp;</p><p><br/></p><p>愁也罢，悲也罢，生活却不罢。千言万语化作一声祝福：济沧海、挂云帆！&nbsp;</p><p><br/></p><p>曾经有人说过：你如果想记住什么，就一定要忘记什么．“物是人非”很残酷不是吗？&nbsp;</p><p>我没有什么可说的，无非就是那一套好好学习之类的。太过庸俗了吧？你要记住，好朋友会给你真心的祝愿。你的微笑会给他或她们带来最美的回忆。六年了，没有什么会比六年的友谊更珍贵吧。她是最单纯，最唯美，最圣洁的。小时的我们很可爱：有了事情，两个人闹脾气生气的说：“不和你玩了！”但第二天又会拉起手地称兄道弟。&nbsp;</p><p>也许吧，也许当你站在风口暮然回首你的童年，你便会发现许多东西，许多回忆深刻的东西变的模糊，但模糊的深刻。&nbsp;</p><p>我不奢望你会永远记得我，但你要记得你的童年很美很美......&nbsp;</p><p><br/></p>', '金佳园同学录', '时光总是太短暂，留下了我的眷恋，刻下了你的自信和恬然； 岁月总是太漫漫，印记划过我的脸，彩虹架过你的'),
(26, 48, 49, '2015-06-19', '<p>1、 山海可以阻隔彼此，却阻隔不了我的思念，距离可以拉开你我，却拉不开真挚的情谊，时间可以淡忘过去，却忘不了永远的朋友。&nbsp;</p><p>2、所谓好朋友就像我们一样，可以畅谈心中的感觉，彼此关心，彼此照顾，时而哈哈大笑，时而争得面红赤，却不会放在心上。&nbsp;</p><p>3、在我们相聚的日子里，有着最珍惜的情谊，在我们年轻的岁月中，有着最真挚的相知，这份缘值得我们珍惜。&nbsp;</p><p>4、朋友，让我轻轻的说声你好，虽然人生难免有聚有散，但你却是我心中，最珍惜最难忘的朋友。&nbsp;</p><p>5、在成长的岁月中，曾经陪你笑陪你愁的朋友，是一辈子都不会忘记的，愿彼此都能珍惜这份友谊，做个永远的朋友。&nbsp;</p><p>7、人世间最珍贵的，莫过于真诚的友情，深切的怀念，像幽香的小花，开在深谷。&nbsp;</p><p>8、在忙碌的生活中别忘了抽个时间，让自己轻松一睛，永远保持一颗年轻快乐的心。&nbsp;</p><p>9、吵架也好，斗嘴也好，开心也好，出气也好，你永远是我心中最好的死党。&nbsp;</p><p>10、陈酒最好喝，老友最知心，朋友认识越久越值得珍惜，只因共同拥有太多太多的回忆。&nbsp;</p><p>11、风是透明的，雨是滴答的，云是流动的，歌是自由的，爱是用心的，恋是疯狂的，天是永恒的，你是难忘的。&nbsp;</p><p><br/></p>', '金佳园同学录', '1、 山海可以阻隔彼此，却阻隔不了我的思念，距离可以拉开你我，却拉不开真挚的情谊，时间可以淡忘过去，');

-- --------------------------------------------------------

--
-- 表的结构 `mood`
--

CREATE TABLE IF NOT EXISTS `mood` (
  `mood_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `moods` text NOT NULL,
  `indate` date NOT NULL,
  PRIMARY KEY (`mood_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- 转存表中的数据 `mood`
--

INSERT INTO `mood` (`mood_id`, `user_id`, `moods`, `indate`) VALUES
(113, 48, '心情小记@祝烟台大学金佳园杯WEB程序设计大赛圆满成功', '2015-06-19'),
(114, 48, '心情小记@我是金佳园，我为自己代言！', '2015-06-19');

-- --------------------------------------------------------

--
-- 表的结构 `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `user_a` int(20) NOT NULL,
  `user_b` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `relation`
--

INSERT INTO `relation` (`user_a`, `user_b`) VALUES
(2, 1),
(3, 2),
(2, 1),
(49, 48),
(57, 48);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pwd` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `qq` int(20) NOT NULL,
  `weixin` varchar(50) NOT NULL,
  `homepage` varchar(50) NOT NULL,
  `introduction` text NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `imgurl` varchar(500) NOT NULL,
  `weibo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `pwd`, `sex`, `mail`, `tel`, `qq`, `weixin`, `homepage`, `introduction`, `nickname`, `imgurl`, `weibo`) VALUES
(48, '123456', '男', 'jinjiayuan@gmail.com', '18865513398', 503241187, 'jinjiayuan', '清华大学', '我是金佳园，啦啦啦', '金佳园', '', '金佳园'),
(49, '123456', '女', 'meetyou@gmail.com', '18865513398', 503241187, 'sss', '烟台大学', '青春一场梦', '密友啊', '', '菜鸟'),
(57, '123456', '', 'meet@gmail.com', '18865513398', 0, '', '', '', '王振', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
