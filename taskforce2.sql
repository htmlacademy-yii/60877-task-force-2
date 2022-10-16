-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2022 г., 18:26
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskforce2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Переводы', 'translation'),
(2, 'Уборка', 'clean'),
(3, 'Переезды', 'cargo'),
(4, 'Компьютерная помощь', 'neo'),
(5, 'Ремонт квартирный', 'flat'),
(6, 'Ремонт техники', 'repair'),
(7, 'Красота', 'beauty'),
(8, 'Фото', 'photo');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `latitude` decimal(65,8) NOT NULL,
  `longitude` decimal(65,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `latitude`, `longitude`) VALUES
(1, 'Абаза', '53.00000000', '90.00000000'),
(2, 'Абакан', '54.00000000', '91.00000000'),
(3, 'Абдулино', '54.00000000', '54.00000000'),
(4, 'Абинск', '45.00000000', '38.00000000'),
(5, 'Агидель', '56.00000000', '54.00000000'),
(6, 'Агрыз', '57.00000000', '53.00000000'),
(7, 'Адыгейск', '45.00000000', '39.00000000'),
(8, 'Азнакаево', '55.00000000', '53.00000000'),
(9, 'Азов', '47.00000000', '39.00000000'),
(10, 'Ак-Довурак', '51.00000000', '91.00000000'),
(11, 'Аксай', '47.00000000', '40.00000000'),
(12, 'Алагир', '43.00000000', '44.00000000'),
(13, 'Алапаевск', '58.00000000', '62.00000000'),
(14, 'Алатырь', '55.00000000', '47.00000000'),
(15, 'Алдан', '59.00000000', '125.00000000'),
(16, 'Алейск', '52.00000000', '83.00000000'),
(17, 'Александров', '56.00000000', '39.00000000'),
(18, 'Александровск', '59.00000000', '58.00000000'),
(19, 'Александровск-Сахалинский', '51.00000000', '142.00000000'),
(20, 'Алексеевка', '51.00000000', '39.00000000'),
(21, 'Алексин', '55.00000000', '37.00000000'),
(22, 'Алзамай', '56.00000000', '99.00000000'),
(23, 'Алушта', '45.00000000', '34.00000000'),
(24, 'Альметьевск', '55.00000000', '52.00000000'),
(25, 'Амурск', '50.00000000', '137.00000000'),
(26, 'Анадырь', '65.00000000', '178.00000000'),
(27, 'Анапа', '45.00000000', '37.00000000'),
(28, 'Ангарск', '53.00000000', '104.00000000'),
(29, 'Андреаполь', '57.00000000', '32.00000000'),
(30, 'Анжеро-Судженск', '56.00000000', '86.00000000'),
(31, 'Анива', '47.00000000', '143.00000000'),
(32, 'Апатиты', '68.00000000', '33.00000000'),
(33, 'Апрелевка', '56.00000000', '37.00000000'),
(34, 'Апшеронск', '44.00000000', '40.00000000'),
(35, 'Арамиль', '57.00000000', '61.00000000');

-- --------------------------------------------------------

--
-- Структура таблицы `opinion`
--

CREATE TABLE `opinion` (
  `id` int NOT NULL,
  `dt_add` timestamp NOT NULL,
  `rate` int NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `opinion`
--

INSERT INTO `opinion` (`id`, `dt_add`, `rate`, `description`) VALUES
(1, '2019-08-18 21:00:00', 3, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\n\nPhasellus in f'),
(2, '2019-02-21 21:00:00', 2, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam '),
(3, '2019-07-10 21:00:00', 2, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(4, '2018-10-06 21:00:00', 2, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ph'),
(5, '2018-11-30 21:00:00', 1, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(6, '2018-11-08 21:00:00', 3, 'In congue. Etiam justo. Etiam pretium iaculis justo.'),
(7, '2018-12-09 21:00:00', 5, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsa'),
(8, '2018-10-19 21:00:00', 2, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.'),
(9, '2018-10-26 21:00:00', 2, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(10, '2019-06-13 21:00:00', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `bd` timestamp NOT NULL,
  `about` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `city_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `address`, `bd`, `about`, `phone`, `skype`, `city_id`) VALUES
(1, '38737 Moose Avenue', '1989-11-10 21:00:00', 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '64574473047', 'high-level', 10),
(2, '738 Hagan Lane', '1989-03-04 21:00:00', 'Pellentesque ultrices mattis odio.', '75531015353', 'mobile', 14),
(3, '758 Old Shore Parkway', '1989-12-29 21:00:00', 'Morbi a ipsum. Integer a nibh. In quis sjusto.', '16371407508', 'Re-engineered', 16),
(4, '11 Dovetail Junction', '1989-12-29 21:00:00', 'Suspendisse potenti.', '21468788926', 'Grass-roots', 21),
(5, '050 Bowman Alley', '1989-04-07 21:00:00', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '62931646367', 'fault-tolerant', 22),
(6, '5 Iowa Avenue', '1989-04-17 21:00:00', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '63271348718', 'Team-oriented', 37),
(7, '87119 Northland Hill', '1989-03-19 21:00:00', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '41056175169', 'portal', 54),
(8, '6823 Lillian Point', '1989-12-12 21:00:00', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', '72882384431', 'intermediate', 120),
(9, '43 Marquette Plaza', '1989-01-13 21:00:00', 'Morbi ut odio.', '69043821394', 'local area network', 137),
(10, '5303 Village Green Hill', '1989-02-02 21:00:00', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '28396220507', 'upward-trending', 5),
(11, '67399 Reindahl Place', '1989-05-22 21:00:00', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '83344513307', 'grid-enabled', 11),
(12, '45 Twin Pines Hill', '1989-07-05 21:00:00', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', '64890419671', 'background', 33),
(13, '46 Sheridan Place', '1989-07-05 21:00:00', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '23005580487', 'challenge', 47),
(14, '73 Kedzie Terrace', '1989-11-06 21:00:00', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '27052074771', 'coherent', 555),
(15, '85509 Ludington Drive', '1989-02-12 21:00:00', 'Cras pellentesque volutpat dui.', '14800371520', 'neutral', 777),
(16, '67 Northwestern Center', '1989-07-06 21:00:00', 'Aliquam erat volutpat. In congue.', '75569924500', 'Programmable', 365),
(17, '725 Eagle Crest Hill', '1989-09-28 21:00:00', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', '37349256497', 'encompassing', 450),
(18, '507 Graceland Junction', '1989-03-18 21:00:00', 'Suspendisse potenti.', '12403580562', 'knowledge base', 1000),
(19, '92 Gina Park', '1989-09-28 21:00:00', 'Phasellus sit amet erat.', '40139478003', 'dynamic', 999),
(20, '8 Ridgeview Trail', '1989-12-20 21:00:00', 'Cras pellentesque volutpat dui.', '76657531985', 'solution', 155);

-- --------------------------------------------------------

--
-- Структура таблицы `replies_link`
--

CREATE TABLE `replies_link` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `replies_id` int NOT NULL,
  `task_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `replies_link`
--

INSERT INTO `replies_link` (`id`, `user_id`, `replies_id`, `task_id`) VALUES
(1, 1, 3, 1),
(2, 2, 2, 2),
(3, 1, 1, 1),
(4, 2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tags_attribute`
--

CREATE TABLE `tags_attribute` (
  `id` int NOT NULL,
  `attributes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tags_attribute`
--

INSERT INTO `tags_attribute` (`id`, `attributes`) VALUES
(1, 'Ремонт'),
(2, 'Оператор ПК'),
(3, 'Программист'),
(5, 'Алкоголик'),
(6, 'Дизайн домов');

-- --------------------------------------------------------

--
-- Структура таблицы `tags_attribution`
--

CREATE TABLE `tags_attribution` (
  `user_id` int DEFAULT NULL,
  `attributes_id` int DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tags_attribution`
--

INSERT INTO `tags_attribution` (`user_id`, `attributes_id`, `id`) VALUES
(1, 2, 2),
(1, 3, 3),
(2, 4, 4),
(3, 5, 5),
(3, 6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int UNSIGNED NOT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `expire` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `budget` int NOT NULL,
  `latitude` decimal(65,12) NOT NULL,
  `longitude` decimal(65,12) NOT NULL,
  `status` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `create_at`, `category_id`, `description`, `expire`, `name`, `address`, `budget`, `latitude`, `longitude`, `status`, `user_id`) VALUES
(1, '2022-10-12 21:00:00', 2, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2019-11-15 00:00:00', 'Ukraine', '1 Eagan Crossing', 6587, '6.964166700000', '158.208333300000', 1, 2),
(2, '2018-10-01 21:00:00', 3, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\n\nCurabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit', '2022-12-07 00:00:00', 'exploit revolutionary portals', '24043 Paget Alley', 2904, '5.623505000000', '10.254404400000', 1, 2),
(3, '2018-10-01 21:00:00', 2, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros,', '2019-11-23 00:00:00', 'matrix next-generation e-commerce', '2867 Dryden Pass', 1170, '63.593219000000', '53.906853200000', 1, 3),
(4, '2018-10-01 21:00:00', 1, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla n', '2019-11-10 00:00:00', 'benchmark plug-and-play infomediaries', '80 Cambridge Street', 838, '20.580035800000', '-75.243530700000', 1, 5),
(5, '2018-10-01 21:00:00', 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-12-15 00:00:00', 'integrate cross-platform e-business', '1 Stone Corner Junction', 7484, '14.932657400000', '-91.694184500000', 1, 4),
(6, '2018-10-01 21:00:00', 7, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2019-11-24 00:00:00', 'enable dot-com niches', '12 Stephen Terrace', 5725, '40.163127000000', '116.638868000000', 1, 5),
(7, '2018-10-01 21:00:00', 5, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2019-11-19 00:00:00', 'transform web-enabled relationships', '6213 Lake View Drive', 4414, '44.379487100000', '20.263894100000', 1, 6),
(8, '2018-10-01 21:00:00', 8, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse', '2019-11-14 00:00:00', 'strategize frictionless solutions', '994 Corry Park', 3454, '-7.325148500000', '108.360746400000', 1, 7),
(9, '2018-10-01 21:00:00', 4, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2019-12-12 00:00:00', 'innovate seamless metrics', '2 Bluestem Park', 3101, '43.000000000000', '-87.970000000000', 0, 8),
(10, '2018-10-01 21:00:00', 4, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', '2019-12-19 00:00:00', 'integrate wireless infomediaries', '1 Dexter Hill', 6562, '41.341016800000', '-8.316930300000', 1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_reply`
--

CREATE TABLE `tasks_reply` (
  `id` int UNSIGNED NOT NULL,
  `dt_add` timestamp NOT NULL,
  `rate` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `task_id` int NOT NULL,
  `price` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tasks_reply`
--

INSERT INTO `tasks_reply` (`id`, `dt_add`, `rate`, `description`, `photo`, `task_id`, `price`, `user_id`) VALUES
(1, '2022-10-04 09:38:50', 1, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'man-hat.png', 1, 10000, 1),
(2, '2022-10-04 09:38:50', 4, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli', 'man-hat.png', 2, 45000, 2),
(3, '2022-10-04 09:38:50', 5, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli', 'man-hat.png', 2, 89523, 3),
(4, '2022-10-04 09:38:50', 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla n', 'man-hat.png', 2, 4896, 2),
(5, '2022-10-04 09:38:50', 3, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'man-hat.png', 3, 456, 2),
(6, '2022-10-04 09:38:50', 4, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pe', 'man-hat.png', 3, 4899, 2),
(7, '2022-10-04 09:38:50', 5, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'man-hat.png', 3, 789, 3),
(8, '2022-10-04 09:38:50', 4, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mau', 'man-hat.png', 3, 4589, 4),
(9, '2022-10-04 09:38:50', 3, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Do', 'man-hat.png', 5, 4500, 5),
(10, '2022-10-04 09:38:50', 5, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'man-hat.png', 3, 789, 4),
(11, '2022-10-04 09:38:50', 4, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'man-hat.png', 8, 0, 4),
(12, '2022-10-04 09:38:50', 5, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ph', 'man-hat.png', 9, 1258, 4),
(13, '2022-10-04 09:38:50', 1, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. ', 'man-hat.png', 11, 4589, 5),
(14, '2022-10-04 09:38:50', 3, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 'man-hat.png', 34, 45000, 5),
(15, '2022-10-04 09:38:50', 3, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrice', 'man-hat.png', 12, 4589, 4),
(16, '2022-10-04 09:38:50', 3, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 'man-hat.png', 12, 0, 4),
(17, '2022-10-04 09:38:50', 4, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 'man-hat.png', 12, 4589, 4),
(18, '2022-10-04 09:38:50', 2, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'man-hat.png', 12, 4589, 2),
(19, '2022-10-04 09:38:50', 3, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'man-hat.png', 21, 458, 2),
(20, '2022-10-04 09:38:50', 4, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 'man-hat.png', 12, 458, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `dt_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `quote` varchar(1000) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city_id` int NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_status` varchar(255) DEFAULT NULL,
  `answer_orders` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `dt_add`, `email`, `name`, `password_hash`, `user_img`, `quote`, `country`, `city_id`, `age`, `phone`, `telegram`, `status`, `user_status`, `answer_orders`) VALUES
(1, '2022-10-01 12:26:31', 'kbuttress0@1und1.de', 'Karrie Buttress', '$2y$13$fwbTk66e8eNNnrCfSsMft.0f4SwmvWvTnWPtLmIvNwS344B5o0m.u\r\n\r\n\r\n\r\n\r\n\r\n', 'man-blond.jpg', 'это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 'Украина', 1, '40', '+7 (906) 256-06-08', 'sexmachine', 1, 'executor', 1),
(2, '2022-10-01 12:26:31', 'baymer1@hp.com', 'Bob Aymer', '$2y$10$EzpN28ZFy6M/rgkrRhAJ..oXyG94gJCiFMkB3VrisXfHcT7Std8Be', 'man-blond.jpg', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 'Украина', 1, '45', '+7 (906) 256-06-08', 'sexmachine', 1, 'customer', 0),
(3, '2022-10-01 12:26:31', 'zboulding2@macromedia.com', 'Zilvia Boulding', '$2y$10$kpNm.VdMl4abTntgcPiQ9OVtGhO42jMvGvdF/MrqwMNJNeLZbo3z2', 'man-sweater.png', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32', 'Украина', 1, '69', '+7 (906) 256-06-08', '', 1, 'executor', 1),
(4, '2022-10-01 12:26:31', 'emollon3@bloglovin.com', 'Emalee Mollon', '$2y$10$65EuyBIpaH3ESFchlzRhdu8XunIJ3tF1fHNaYC6sQnICKWI.LFtzq', 'man-blond.jpg', 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или \"невозможных\" слов.', 'Украина', 2, '89', '380990841805', 'sexmachine', 1, 'executor', 1),
(5, '2022-10-01 12:26:31', 'mmulberry4@cmu.edu', 'Maria Mulberry', 'oWspnl', 'man-blond.jpg', 'Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 \"de Finibus Bonorum et Malorum\" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.', 'Украина', 3, '12', '380990841805', '', 0, 'executor', 1),
(6, '2022-10-01 12:26:31', 'lby5@mozilla.com', 'Levey By', 'GdtcUU', 'man-blond.jpg', 'Пожертвования: Если вы регулярно пользуетесь этим сайтом и хотите быть уверенным в его дальнейшем постоянном функционировании, подумайте о небольшом пожертвовании, которое помогло бы оплатить его хостинг и трафик. Нет никаких минимальных сумм - любое пожертвование принимается с благодарностью. Вы можете щёлкнуть здесь чтобы перевести деньги через PayPal. Спасибо за вашу поддержку.', 'Украина', 5, '58', '380990841805', '', 0, 'executor', 1),
(7, '2022-10-01 12:26:31', 'beates6@last.fm', 'Baron Eates', 'UQw6VeA', 'man-blond.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'Украина', 5, '0', '380990841805', 'sexmachine', 0, 'customer', 0),
(8, '2022-10-01 12:26:31', 'tvink7@fotki.com', 'Trip Vink', '49znXd7haFGz', 'man-blond.jpg', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '', 1, '0', '380990841805', '', 0, 'customer', 0),
(9, '2022-10-01 12:26:31', 'bterbeck8@about.me', 'Boonie Terbeck', 'unCjJTF7sjs', 'man-blond.jpg', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', '', 1, '0', '380990841805', '', 0, 'customer', 0),
(10, '2022-10-01 12:26:31', 'atraviss9@auda.org.au', 'Alonzo Traviss', 'dLuVMAg', 'man-blond.jpg', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', '', 1, '0', '0', '', 0, 'customer', 0),
(11, '2022-10-01 12:26:31', 'nwitteringa@google.com.br', 'Natassia Wittering', 'tQlUG4n', 'man-blond.jpg', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '', 1, '0', '0', '', 1, 'customer', 0),
(12, '2022-10-01 12:26:31', 'fbrookeb@nba.com', 'Felice Brooke', 's9y9Mcfgy1g', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(13, '2022-10-01 12:26:31', 'cviccaryc@amazon.co.uk', 'Carlen Viccary', '9qd747vh', 'man-blond.jpg', '', '', 1, '0', '0', 'sexmachine', 0, 'customer', 0),
(14, '2022-10-01 12:26:31', 'hgethingsd@sogou.com', 'Hendrik Gethings', 'zzN5c4', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(15, '2022-10-01 12:26:31', 'dgirodiase@stanford.edu', 'Dunc Girodias', 'j9QW6GQI', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(16, '2022-10-01 12:26:31', 'btanmanf@smh.com.au', 'Bibbie Tanman', '1aukKNEIneq', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(17, '2022-10-01 12:26:31', 'bbartolettig@simplemachines.org', 'Barnabas Bartoletti', '3chTNtqhoo', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(18, '2022-10-01 12:26:31', 'nculliph@fc2.com', 'Nixie Cullip', '2UdKIR2f', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(19, '2022-10-01 12:26:31', 'mpimblotti@xing.com', 'Matilde Pimblott', 'nGZ8disdg', 'man-blond.jpg', '', '', 1, '0', '0', '', 0, 'customer', 0),
(20, '2022-10-01 12:26:31', 'askurrayj@un.org', 'Al Skurray', 'bL9tAf', 'man-blond.jpg', '', '', 2, '0', '0', '', 0, 'customer', 0),
(21, '2022-10-01 12:26:31', 'name@ukr.net', 'name', '159357', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2022-10-01 12:26:31', 'names@ukr.net', 'name', '159357', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2022-10-01 12:26:31', 'namess@ukr.net', 'name', '159357', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2022-10-01 12:26:31', 'kontekstexeo@gmail.com', 'name', '3434', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2022-10-01 12:26:31', 'admin@ukr.net', 'admin', '$2y$13$zMXFrsHMwwr5rKmaECt30.uK1EPPlHiVKQsKVv8tQRQRpLE1/eoz2', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2022-10-01 12:26:31', 'max@ukr.net', 'Максим', '$2y$13$jC40rsl7hR6zm7jqQsR0E.Oh0Q05dT9OO69UAYb89iew7gmPpJQ7q', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2022-10-01 12:26:31', 'hal@ukr.net', 'Максим', '$2y$13$5gntWb6LLbmUJxUNV7yK8OG2ubb4HMkKbK.yFwfJgMdrWxlE9A7h.', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2022-10-01 12:26:31', 'hal2@ukr.net', 'Максим', '$2y$13$twyC5Ncrq/lVDuJEJ33uIuJ0gD6SUgwLVgDu8wRKIcjtWCXTgICoa', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2022-10-01 12:26:31', 'konte3kstexeo@gmail.com', 'admin', '$2y$13$wJ9eMxpE.nWMB9RX1/6GQOtZrL1Md9r/rAJaV1xnOH0gZrAWHy3uy', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2022-10-01 12:26:31', 'admin3@ukr.net', 'admin', '$2y$13$DLMVPpwnXFKkb78ZFAPlV.oeCc625As.BlNEsrs0c76GJZJ9VtKL2', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2022-10-01 12:26:31', 'admin123@ukr.net', 'admin123', '$2y$13$xaZo5eLS6fTwSGNnT4Xouu2yxgTrDDw0Tu9sLu8AXGHEDIMKpqq/a', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2022-10-01 12:26:31', 'admin1223@ukr.net', 'admin123', '$2y$13$t0olhGKt.DAM.TMhqNr.7OzK5IT2FYlHUZyVVj4Wm9IQK18pNOGhy', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2022-10-01 12:26:31', 'admin122223@ukr.net', 'admin123', '$2y$13$RFrX2Rb1QdokxKeHAkG7nu0RYtzUIdw49KXdYmoAhn/U8mQWE.gFi', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2022-10-01 12:26:31', 'adm44in1223@ukr.net', 'admin123', '$2y$13$OM88nzGTEbj7OnHbr7mnfOFmho4zTubqv8XD/kOEuUdfIVA9v7Z0y', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2022-10-01 12:26:31', 'ad3m44in1223@ukr.net', 'admin123', '$2y$13$HDHq1sxtVBKVvFFHlVLozOJfRDm5pLXP4bjOB8QhwY08M85vbvJgS', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2022-10-01 12:26:31', 'na678me@ukr.net', 'name', '$2y$13$ep035D28J4HLWeoB.DTCc.zaJ3Ckwhox3eeSpr8CBnUghKuTimvWq', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2022-10-01 12:26:31', 'max@gmail.com', 'MyNameIsMax', '$2y$13$Vm.Hj0XmDLceZ1EVg4kD/OYqoJPgeDdzbzmc6vQgYF4Ik8Nu6mLsS', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2022-10-01 12:26:31', 'mom@ukr.net', 'NinaMom', '$2y$13$Wxaj0fHgijWMi4wnd8uhs.l/RBALZ2QKePfiU6ZLdCEOmwYDuIUkm', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2022-10-01 12:26:31', 'itexpeditionameric222a@gmail.com', 'admin33', '$2y$13$Lfu5GmhwpqcXgGs6m/A7WO7GXH6nq4Ztsg7cGxv3DQHnZ7pFLOi9G', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2022-10-01 12:26:31', 'itexpeditio44nameric222a@gmail.com', 'admin33', '$2y$13$wtJnB0ZkuamdB./zFyKS2eEUJeFD5g6JH1GN.tZ.6HqCAXS2pFxNe', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL),
(41, '2022-10-01 12:26:31', 'kontekstex8963eo@gmail.com', 'admin', '$2y$13$BQW1O3BCXDNBq1svsCtmiuj7E8Tnc/rqHIKJWmkfPd8C7SmSUQ3V6', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1),
(42, '2022-10-01 12:26:31', 'ma44x@ukr.net', 'max@ukr.net', '$2y$13$dfhf33.p3e10gLBwlfXAruM0b1RLJztrWjNuHPAOb20SqiGqw85.W', NULL, NULL, NULL, 32, NULL, NULL, NULL, NULL, NULL, 1),
(43, '2022-10-14 09:33:36', 'ko333ntekstexeo@gmail.com', 'admin', '$2y$13$AfQXfkPzQBT3coEG9YLawuIIFiJW2fXfh9SXw6nbfXt2uKN9BrOSS', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1),
(44, '2022-10-14 13:40:20', 'name3334Y@ukr.net', 'name', '$2y$13$qs7OdcvTCl9R/urSKfFhre0fsQZImkPuxqpEQk0tBXS.ck.4NUKjy', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_rating`
--

CREATE TABLE `user_rating` (
  `id` int NOT NULL,
  `rating` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_rating`
--

INSERT INTO `user_rating` (`id`, `rating`, `user_id`) VALUES
(1, 4, 3),
(2, 2, 3),
(3, 4, 3),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_reply`
--

CREATE TABLE `user_reply` (
  `id` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `rate` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `executor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_reply`
--

INSERT INTO `user_reply` (`id`, `create_at`, `rate`, `description`, `task_id`, `user_id`, `executor_id`) VALUES
(1, '2022-10-11 09:40:10', 5, 'Sippunen LOso', 1, 3, 4),
(2, '2022-10-11 09:40:10', 3, 'И поют сиренады', 2, 2, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `replies_link`
--
ALTER TABLE `replies_link`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags_attribution`
--
ALTER TABLE `tags_attribution`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks_reply`
--
ALTER TABLE `tasks_reply`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_reply`
--
ALTER TABLE `user_reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `replies_link`
--
ALTER TABLE `replies_link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags_attribution`
--
ALTER TABLE `tags_attribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tasks_reply`
--
ALTER TABLE `tasks_reply`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_reply`
--
ALTER TABLE `user_reply`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
