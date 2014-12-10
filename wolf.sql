-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 10 2014 г., 02:35
-- Версия сервера: 5.5.40-0ubuntu1
-- Версия PHP: 5.6.3-1+deb.sury.org~utopic+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `wolf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acl_classes`
--

CREATE TABLE IF NOT EXISTS `acl_classes` (
`id` int(10) unsigned NOT NULL,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `acl_classes`
--

INSERT INTO `acl_classes` (`id`, `class_type`) VALUES
(2, 'BS\\FrontBundle\\Entity\\Blog'),
(1, 'BS\\FrontBundle\\Entity\\Event');

-- --------------------------------------------------------

--
-- Структура таблицы `acl_entries`
--

CREATE TABLE IF NOT EXISTS `acl_entries` (
`id` int(10) unsigned NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `acl_entries`
--

INSERT INTO `acl_entries` (`id`, `class_id`, `object_identity_id`, `security_identity_id`, `field_name`, `ace_order`, `mask`, `granting`, `granting_strategy`, `audit_success`, `audit_failure`) VALUES
(1, 1, NULL, 1, NULL, 0, 64, 1, 'all', 0, 0),
(2, 1, NULL, 2, NULL, 1, 32, 1, 'all', 0, 0),
(3, 1, NULL, 3, NULL, 2, 4, 1, 'all', 0, 0),
(4, 1, NULL, 4, NULL, 3, 1, 1, 'all', 0, 0),
(5, 1, 1, 5, NULL, 0, 128, 1, 'all', 0, 0),
(6, 2, NULL, 6, NULL, 0, 64, 1, 'all', 0, 0),
(7, 2, NULL, 7, NULL, 1, 32, 1, 'all', 0, 0),
(8, 2, NULL, 8, NULL, 2, 4, 1, 'all', 0, 0),
(9, 2, NULL, 9, NULL, 3, 1, 1, 'all', 0, 0),
(10, 2, 2, 5, NULL, 0, 128, 1, 'all', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_object_identities`
--

CREATE TABLE IF NOT EXISTS `acl_object_identities` (
`id` int(10) unsigned NOT NULL,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `acl_object_identities`
--

INSERT INTO `acl_object_identities` (`id`, `parent_object_identity_id`, `class_id`, `object_identifier`, `entries_inheriting`) VALUES
(1, NULL, 1, '1', 1),
(2, NULL, 2, '1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_object_identity_ancestors`
--

CREATE TABLE IF NOT EXISTS `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `acl_object_identity_ancestors`
--

INSERT INTO `acl_object_identity_ancestors` (`object_identity_id`, `ancestor_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_security_identities`
--

CREATE TABLE IF NOT EXISTS `acl_security_identities` (
`id` int(10) unsigned NOT NULL,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `acl_security_identities`
--

INSERT INTO `acl_security_identities` (`id`, `identifier`, `username`) VALUES
(5, 'Application\\Sonata\\UserBundle\\Entity\\User-dev', 1),
(6, 'ROLE_BS_FRONT_ADMIN_BLOG_ADMIN', 0),
(7, 'ROLE_BS_FRONT_ADMIN_BLOG_EDITOR', 0),
(9, 'ROLE_BS_FRONT_ADMIN_BLOG_GUEST', 0),
(8, 'ROLE_BS_FRONT_ADMIN_BLOG_STAFF', 0),
(1, 'ROLE_BS_FRONT_ADMIN_EVENT_ADMIN', 0),
(2, 'ROLE_BS_FRONT_ADMIN_EVENT_EDITOR', 0),
(4, 'ROLE_BS_FRONT_ADMIN_EVENT_GUEST', 0),
(3, 'ROLE_BS_FRONT_ADMIN_EVENT_STAFF', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `Blog`
--

CREATE TABLE IF NOT EXISTS `Blog` (
`id` int(11) NOT NULL,
  `video_gallery` int(11) DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallContent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `originalPhoto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photoGallery` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `Blog`
--

INSERT INTO `Blog` (`id`, `video_gallery`, `caption`, `smallContent`, `content`, `published`, `photo`, `originalPhoto`, `photoGallery`) VALUES
(1, NULL, 'Nullam tristique tortor id est tempor, at elementum ex scelerisque.', 'Nullam tristique tortor id est tempor, at elementum ex scelerisque. Nullam interdum accumsan odio. Cras eget ipsum eget nisi lobortis blandit. Aenean hendrerit rutrum eros vitae condimentum. Suspendisse neque risus, blandit tempus enim at, fermentum varius massa. Nunc ut neque enim. Praesent pharetra ligula at magna venenatis, vel euismod nulla imperdiet. Vivamus nulla diam, vestibulum ut velit blandit, pretium rutrum nibh. Integer non ipsum eleifend, iaculis dui vehicula, vestibulum nulla.', '<p style="text-align:justify">l viverra eget, facilisis et tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent efficitur finibus eros, nec sagittis mi porttitor a. Nam sollicitudin sapien dolor. Nullam et lacus ac risus fringilla tempus. Vestibulum condimentum vel turpis ac consectetur. Pellentesque mattis, diam et efficitur scelerisque, massa ante mattis diam, vel dapibus augue dolor faucibus lectus. Duis porttitor nulla nec lorem sagittis, a faucibus nibh laoreet. Fusce cursus est sapien, quis varius justo elementum nec. Sed et nibh sed turpis mattis imperdiet. Nulla elementum nisl est, non pharetra enim auctor tincidunt.</p>\r\n\r\n<p style="text-align:justify">Ut egestas consectetur arcu, tempor aliquet neque posuere id. Sed volutpat mattis quam, eget laoreet nulla tincidunt ut. In cursus tristique facilisis. In nulla risus, blandit et pulvinar eget, dignissim ut elit. Morbi volutpat vehicula efficitur. Nullam quis quam eget felis ullamcorper venenatis malesuada at sem. Sed consequat laoreet blandit. Morbi eleifend velit auctor, accumsan lectus nec, ultricies mi. Proin suscipit iaculis mauris, quis aliquet enim commodo eget. Quisque ornare, est sed auctor aliquam, metus mauris interdum ante, sit amet sagittis magna risus ut nulla. Pellentesque tempor magna massa, at sollicitudin felis sodales eu.</p>\r\n\r\n<p style="text-align:justify">Nullam tristique tortor id est tempor, at elementum ex scelerisque. Nullam interdum accumsan odio. Cras eget ipsum eget nisi lobortis blandit. Aenean hendrerit rutrum eros vitae condimentum. Suspendisse neque risus, blandit tempus enim at, fermentum varius massa. Nunc ut neque enim. Praesent pharetra ligula at magna venenatis, vel euismod nulla imperdiet. Vivamus nulla diam, vestibulum ut velit blandit, pretium rutrum nibh. Integer non ipsum eleifend, iaculis dui vehicula, vestibulum nulla.</p>\r\n\r\n<p style="text-align:justify">Duis tempor sed urna ac auctor.&nbsp;</p>', 1, NULL, NULL, 'a:9:{i:0;s:52:"cropped/42c3937900ceaecb2771d1fc67e88362e470ea1e.jpg";i:1;s:52:"cropped/005d06809c97ee17b3a83083d30d69ecea36172b.jpg";i:2;s:53:"cropped/eaba812bb597442e59c386ce6f3fe08e07d68f02.jpeg";i:3;s:52:"cropped/4ab8bd2fd148b165dc54ad34231918025be057d8.jpg";i:4;s:52:"cropped/5eea61d98131f207a801adc0dfe3170fae441fc4.jpg";i:5;s:52:"cropped/452fbe4bf78949df65deb203e61dfe30297e03f5.jpg";i:6;s:52:"cropped/3e1388f7e57a50b2919c0332fc0dbddc8cdd063f.jpg";i:7;s:52:"cropped/07c9ef169b1df9d89daeb7a9de53c9c78c985413.jpg";i:8;s:52:"cropped/a6c4d1b921a993bead47143ed5846446b9bbeb7b.png";}');

-- --------------------------------------------------------

--
-- Структура таблицы `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
`id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
`id` int(11) NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallContent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `originalPhoto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photoGallery` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `Event`
--

INSERT INTO `Event` (`id`, `caption`, `smallContent`, `content`, `published`, `photo`, `originalPhoto`, `photoGallery`, `startDate`, `endDate`) VALUES
(1, 'fsdgrt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium.</p>', 1, NULL, NULL, 'a:3:{i:0;s:52:"cropped/de2bca3d626115d3f9feea34ff96e4405fc05afa.jpg";i:1;s:52:"cropped/6bffbc51c478a491805590b59682f09be895fd82.jpg";i:2;s:52:"cropped/37873471bbd3679eab242a97e352aa3e9ae9280a.jpg";}', '2014-11-25', '2014-11-25');

-- --------------------------------------------------------

--
-- Структура таблицы `FeedBack`
--

CREATE TABLE IF NOT EXISTS `FeedBack` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `FeedBack`
--

INSERT INTO `FeedBack` (`id`, `name`, `email`, `phone`, `content`) VALUES
(1, 'werwerrwe', 'werewrwer@asdas.ru', 'asdasd', 'adasdasda'),
(2, '567567', '567@sddsf.ru', 'asdasd', '567567'),
(3, '56757', '56757@asdasd.ru', 'asdsasd', 'asdasdasd'),
(4, '56757', '56757@asdasd.ru', 'asdsasd', 'asdasdasd'),
(5, '657567', '56756@dsfds.ru', 'sadsadsad', 'asdadasd'),
(6, '567567', '56756@sdsdf.ru', 'asdsad', 'asdasdas'),
(7, '567567', '56756@sdsdf.ru', 'asdsad', 'asdasdas'),
(8, '567567', '56756@sdsdf.ru', 'asdsad', 'asdasdas'),
(9, '789789', 'sadsad@asdas.ru', 'asdasd', 'asdasads'),
(10, '567567', 'asdas@asads.ru', 'asdasdds', 'asdasdas'),
(11, '657567', '56757@asdasd.ru', '56757', 'sadasdasd'),
(12, '657567', '56757@asdasd.ru', '56757', 'sadasdasd'),
(13, '657567', '56757@asdasd.ru', '56757', 'sadasdasd'),
(14, '789789', '78987@asdsa.ru', 'asdsad', 'asdasd'),
(15, '789789', '78987@asdsa.ru', 'asdsad', 'asdasd'),
(16, '890980', '890890@adsa.ru', '890890', 'asdasd'),
(17, '567567', '567567@adasd.ru', 'asdasdas', 'asdasdasd'),
(18, '890890asdasd.ru', '890890asd@asd.ru', 'asdads', 'asdasd'),
(19, 'sdfsdfsd', 'asdasd@asdad.ru', 'asdad', 'asdasd');

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_group` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user_user`
--

CREATE TABLE IF NOT EXISTS `fos_user_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
(1, 'dev', 'dev', 'init.reg@gmail.com', 'init.reg@gmail.com', 1, '3b5gp0pnnb28osgokggw00g08owg4og', 'DbOwNaoJkvKfKdnTVbwupMDE9O8Rp+i5V7FOsDPe/3HWdxidN1FdASc0/DxuRLICP+UczeRYfK2vyqwYqVeWlA==', '2014-12-10 00:33:44', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, '2014-12-08 00:18:03', '2014-12-10 00:33:44', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `media__gallery`
--

CREATE TABLE IF NOT EXISTS `media__gallery` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `default_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `media__gallery_media`
--

CREATE TABLE IF NOT EXISTS `media__gallery_media` (
`id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `media__media`
--

CREATE TABLE IF NOT EXISTS `media__media` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notification__message`
--

CREATE TABLE IF NOT EXISTS `notification__message` (
`id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `state` int(11) NOT NULL,
  `restart_count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `VideoGallery`
--

CREATE TABLE IF NOT EXISTS `VideoGallery` (
`id` int(11) NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `href` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `smallHref` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `VideoGallery`
--

INSERT INTO `VideoGallery` (`id`, `caption`, `href`, `description`, `video_id`, `smallHref`) VALUES
(1, '5677', '567567', '5675675667', NULL, ''),
(2, '567567', '57567567567567', 'yuetme', NULL, ''),
(3, '567567', '567567', '567567', NULL, ''),
(4, 'erqwe', 'rqwerqwer', 'qwerqwerwer', NULL, ''),
(5, 'Cradle Of Filth - Nymphetamine Fix', '<iframe src="http://vk.com/video_ext.php?oid=149262957&id=167827710&hash=bbbda25215db1785&hd=1" width="607" height="360" frameborder="0"></iframe>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium.', 1, 'http://www.youtube.com/watch?v=z5x8DZHubSU'),
(7, 'This is Хорошо - Уступи дорогу!', '<iframe width="560" height="315" src="//www.youtube.com/embed/z5x8DZHubSU" frameborder="0" allowfullscreen></iframe>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet, lectus at aliquet ultrices, dolor nulla pulvinar lacus, sed tincidunt nunc ipsum ac augue. Etiam vestibulum, turpis non accumsan pretium, arcu velit sagittis dui, at iaculis elit nisi et sapien. Donec urna ligula, rhoncus aliquam ullamcorper dapibus, vehicula facilisis sem. Curabitur ultrices, est ac aliquet varius, tortor ligula accumsan elit, non vehicula magna tortor vitae purus. Nulla nec mauris mauris. Curabitur commodo ex elit, tempus tristique sem egestas non. Donec ac elementum ex. Donec feugiat a purus at pulvinar. Pellentesque aliquam tincidunt mi cursus pretium.', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_classes`
--
ALTER TABLE `acl_classes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`);

--
-- Indexes for table `acl_entries`
--
ALTER TABLE `acl_entries`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`), ADD KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`), ADD KEY `IDX_46C8B806EA000B10` (`class_id`), ADD KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`), ADD KEY `IDX_46C8B806DF9183C9` (`security_identity_id`);

--
-- Indexes for table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`), ADD KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`);

--
-- Indexes for table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
 ADD PRIMARY KEY (`object_identity_id`,`ancestor_id`), ADD KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`), ADD KEY `IDX_825DE299C671CEA1` (`ancestor_id`);

--
-- Indexes for table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`);

--
-- Indexes for table `Blog`
--
ALTER TABLE `Blog`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_6027FE7DA2C69197` (`video_gallery`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Event`
--
ALTER TABLE `Event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FeedBack`
--
ALTER TABLE `FeedBack`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_user_group`
--
ALTER TABLE `fos_user_group`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_583D1F3E5E237E06` (`name`);

--
-- Indexes for table `fos_user_user`
--
ALTER TABLE `fos_user_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`);

--
-- Indexes for table `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
 ADD PRIMARY KEY (`user_id`,`group_id`), ADD KEY `IDX_B3C77447A76ED395` (`user_id`), ADD KEY `IDX_B3C77447FE54D947` (`group_id`);

--
-- Indexes for table `media__gallery`
--
ALTER TABLE `media__gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_80D4C5414E7AF8F` (`gallery_id`), ADD KEY `IDX_80D4C541EA9FDD75` (`media_id`);

--
-- Indexes for table `media__media`
--
ALTER TABLE `media__media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification__message`
--
ALTER TABLE `notification__message`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_state` (`state`), ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `VideoGallery`
--
ALTER TABLE `VideoGallery`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_51C3DD1029C1004E` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_classes`
--
ALTER TABLE `acl_classes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acl_entries`
--
ALTER TABLE `acl_entries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Blog`
--
ALTER TABLE `Blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `FeedBack`
--
ALTER TABLE `FeedBack`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fos_user_group`
--
ALTER TABLE `fos_user_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fos_user_user`
--
ALTER TABLE `fos_user_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `media__gallery`
--
ALTER TABLE `media__gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media__media`
--
ALTER TABLE `media__media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification__message`
--
ALTER TABLE `notification__message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VideoGallery`
--
ALTER TABLE `VideoGallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `acl_entries`
--
ALTER TABLE `acl_entries`
ADD CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
ADD CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`);

--
-- Ограничения внешнего ключа таблицы `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
ADD CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Blog`
--
ALTER TABLE `Blog`
ADD CONSTRAINT `FK_6027FE7DA2C69197` FOREIGN KEY (`video_gallery`) REFERENCES `media__gallery` (`id`);

--
-- Ограничения внешнего ключа таблицы `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_user_group` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
ADD CONSTRAINT `FK_80D4C5414E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
ADD CONSTRAINT `FK_80D4C541EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`);

--
-- Ограничения внешнего ключа таблицы `VideoGallery`
--
ALTER TABLE `VideoGallery`
ADD CONSTRAINT `FK_51C3DD1029C1004E` FOREIGN KEY (`video_id`) REFERENCES `Event` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
