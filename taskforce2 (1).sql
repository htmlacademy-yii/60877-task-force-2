-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2022 г., 22:43
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`) VALUES
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
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city`, `latitude`, `longitude`) VALUES
(1, 'Абаза', '52.6517296', '90.0885929'),
(2, 'Абакан', '53.7223661', '91.4437792'),
(3, 'Абдулино', '53.6778096', '53.6473115'),
(4, 'Абинск', '44.8679931', '38.1618437'),
(5, 'Агидель', '55.89976', '53.9221149'),
(6, 'Агрыз', '56.5232645', '52.994257'),
(7, 'Адыгейск', '44.8783715', '39.190172'),
(8, 'Азнакаево', '54.8599054', '53.0745505'),
(9, 'Азов', '47.1120631', '39.4232597'),
(10, 'Ак-Довурак', '51.1785658', '90.5984511'),
(11, 'Аксай', '47.2676075', '39.8755485'),
(12, 'Алагир', '43.0416151', '44.2198622'),
(13, 'Алапаевск', '57.8475542', '61.6693934'),
(14, 'Алатырь', '54.8398179', '46.5721423'),
(15, 'Алдан', '58.6094885', '125.3816689'),
(16, 'Алейск', '52.4920914', '82.7794145'),
(17, 'Александров', '56.3919652', '38.711035'),
(18, 'Александровск', '59.1613773', '57.5764851'),
(19, 'Александровск-Сахалинский', '50.8973664', '142.1579322'),
(20, 'Алексеевка', '50.6299932', '38.6881776'),
(21, 'Алексин', '54.5083788', '37.047891'),
(22, 'Алзамай', '55.5550493', '98.6644106'),
(23, 'Алушта', '44.6764419', '34.4100387'),
(24, 'Альметьевск', '54.9013662', '52.2970654'),
(25, 'Амурск', '50.2345017', '136.8791135'),
(26, 'Анадырь', '64.7314347', '177.5015752'),
(27, 'Анапа', '44.8950777', '37.3163142'),
(28, 'Ангарск', '52.5448102', '103.8885385'),
(29, 'Андреаполь', '56.6507072', '32.2621196'),
(30, 'Анжеро-Судженск', '56.0787179', '86.0202207'),
(31, 'Анива', '46.7132526', '142.5265052'),
(32, 'Апатиты', '67.5678295', '33.4067218'),
(33, 'Апрелевка', '55.5276336', '37.0651105'),
(34, 'Апшеронск', '44.4585239', '39.7300092'),
(35, 'Арамиль', '56.6945341', '60.8343825');

-- --------------------------------------------------------

--
-- Структура таблицы `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `dt_add` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opinions`
--

INSERT INTO `opinions` (`id`, `dt_add`, `rate`, `description`) VALUES
(1, '2019-08-19', '3', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\n\nPhasellus in f'),
(2, '2019-02-22', '2', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam '),
(3, '2019-07-11', '2', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(4, '2018-10-07', '2', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ph'),
(5, '2018-12-01', '1', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(6, '2018-11-09', '3', 'In congue. Etiam justo. Etiam pretium iaculis justo.'),
(7, '2018-12-10', '5', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsa'),
(8, '2018-10-20', '2', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.'),
(9, '2018-10-27', '2', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(10, '2019-06-14', '4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bd` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `address`, `bd`, `about`, `phone`, `skype`, `city_id`) VALUES
(1, '38737 Moose Avenue', '1989-11-11', 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', ' 64574473047', 'high-level', ' 10'),
(2, '738 Hagan Lane', '1989-03-05', 'Pellentesque ultrices mattis odio.', '75531015353', 'mobile', ' 14'),
(3, '758 Old Shore Parkway', '1989-12-30', 'Morbi a ipsum. Integer a nibh. In quis sjusto.', '16371407508', 'Re-engineered', ' 16'),
(4, '11 Dovetail Junction', '0629-03-03', 'Suspendisse potenti.', '21468788926', 'Grass-roots', ' 21'),
(5, '050 Bowman Alley', '1989-04-08', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '62931646367', 'fault-tolerant', ' 22'),
(6, '5 Iowa Avenue', '1989-04-18', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '63271348718', 'Team-oriented', ' 37'),
(7, '87119 Northland Hill', '1989-03-20', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '41056175169', 'portal', ' 54'),
(8, '6823 Lillian Point', '1989-12-13', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', '72882384431', 'intermediate', ' 120'),
(9, '43 Marquette Plaza', '1989-01-14', 'Morbi ut odio.', '69043821394', 'local area network', ' 137'),
(10, '5303 Village Green Hill', '1989-02-03', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '28396220507', 'upward-trending', ' 5'),
(11, '67399 Reindahl Place', '1989-05-23', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '83344513307', 'grid-enabled', ' 11'),
(12, '45 Twin Pines Hill', '1989-07-06', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', '64890419671', 'background', ' 33'),
(13, '46 Sheridan Place', '1903-04-16', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '23005580487', 'challenge', ' 47'),
(14, '73 Kedzie Terrace', '1989-11-07', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '27052074771', 'coherent', ' 555'),
(15, '85509 Ludington Drive', '1989-02-13', 'Cras pellentesque volutpat dui.', '14800371520', 'neutral', ' 777'),
(16, '67 Northwestern Center', '1989-07-07', 'Aliquam erat volutpat. In congue.', '75569924500', 'Programmable', ' 365'),
(17, '725 Eagle Crest Hill', '1989-09-29', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', '37349256497', 'encompassing', ' 450'),
(18, '507 Graceland Junction', '1989-03-19', 'Suspendisse potenti.', '12403580562', 'knowledge base', ' 1000'),
(19, '92 Gina Park', '1989-09-29', 'Phasellus sit amet erat.', '40139478003', 'dynamic', ' 999'),
(20, '8 Ridgeview Trail', '1989-12-21', 'Cras pellentesque volutpat dui.', '76657531985', 'solution', ' 155');

-- --------------------------------------------------------

--
-- Структура таблицы `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `dt_add` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `replies`
--

INSERT INTO `replies` (`id`, `dt_add`, `rate`, `description`) VALUES
(1, '2019-05-09', '1', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.'),
(2, '2018-10-27', '4', 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli'),
(3, '2018-11-02', '5', 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli'),
(4, '2019-06-04', '3', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla n'),
(5, '2018-10-09', '3', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(6, '2019-07-16', '4', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pe'),
(7, '2019-01-22', '5', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(8, '2019-06-11', '4', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mau'),
(9, '2019-02-16', '3', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Do'),
(10, '2019-07-16', '5', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(11, '2018-11-11', '4', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.'),
(12, '2018-11-01', '5', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ph'),
(13, '2018-10-05', '1', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. '),
(14, '2019-02-28', '3', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(15, '2019-07-04', '3', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrice'),
(16, '2019-07-30', '3', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(17, '2019-07-10', '4', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.'),
(18, '2019-09-15', '2', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(19, '2018-10-16', '3', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.'),
(20, '2019-02-13', '4', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `dt_add` bigint(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `dt_add`, `category_id`, `description`, `expire`, `name`, `address`, `budget`, `latitude`, `longitude`, `status`) VALUES
(1, 1552082400, '2', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2019-11-15', 'Ukraine', '1 Eagan Crossing', '6587', '6.9641667', '158.2083333', 0),
(2, 1652215204, '3', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\n\nCurabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit', '2019-12-07', 'exploit revolutionary portals', '24043 Paget Alley', '2904', '5.623505', '10.2544044', 1),
(3, 1502082400, '2', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros,', '2019-11-23', 'matrix next-generation e-commerce', '2867 Dryden Pass', '1170', '63.593219', '53.9068532', 1),
(4, 1502072400, '1', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla n', '2019-11-10', 'benchmark plug-and-play infomediaries', '80 Cambridge Street', '838', '20.5800358', '-75.2435307', 0),
(5, 1502092990, '3', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-12-15', 'integrate cross-platform e-business', '1 Stone Corner Junction', '7484', '14.9326574', '-91.6941845', 0),
(6, 1502092600, '7', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2019-11-24', 'enable dot-com niches', '12 Stephen Terrace', '5725', '40.163127', '116.638868', 0),
(7, 1502192600, '5', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2019-11-19', 'transform web-enabled relationships', '6213 Lake View Drive', '4414', '44.3794871', '20.2638941', 0),
(8, 1592199600, '8', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse', '2019-11-14', 'strategize frictionless solutions', '994 Corry Park', '3454', '-7.3251485', '108.3607464', 0),
(9, 1592100909, '4', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2019-12-12', 'innovate seamless metrics', '2 Bluestem Park', '3101', '43', '-87.97', 0),
(10, 1792100909, '4', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', '2019-12-19', 'integrate wireless infomediaries', '1 Dexter Hill', '6562', '41.3410168', '-8.3169303', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `dt_add`) VALUES
(1, 'kbuttress0@1und1.de', 'Karrie Buttress', 'JcfoKBYAB4k', '2019-08-10'),
(2, 'baymer1@hp.com', 'Bob Aymer', 'ZEE54kg', '2018-12-21'),
(3, 'zboulding2@macromedia.com', 'Zilvia Boulding', 'VJyMV1Zat', '2019-07-25'),
(4, 'emollon3@bloglovin.com', 'Emalee Mollon', 'XUIeJ693h', '2018-11-13'),
(5, 'mmulberry4@cmu.edu', 'Maria Mulberry', 'oWspnl', '2019-07-20'),
(6, 'lby5@mozilla.com', 'Levey By', 'GdtcUU', '2019-02-12'),
(7, 'beates6@last.fm', 'Baron Eates', 'UQw6VeA', '2019-05-03'),
(8, 'tvink7@fotki.com', 'Trip Vink', '49znXd7haFGz', '2019-01-13'),
(9, 'bterbeck8@about.me', 'Boonie Terbeck', 'unCjJTF7sjs', '2019-09-15'),
(10, 'atraviss9@auda.org.au', 'Alonzo Traviss', 'dLuVMAg', '2018-12-19'),
(11, 'nwitteringa@google.com.br', 'Natassia Wittering', 'tQlUG4n', '2019-03-24'),
(12, 'fbrookeb@nba.com', 'Felice Brooke', 's9y9Mcfgy1g', '2019-09-27'),
(13, 'cviccaryc@amazon.co.uk', 'Carlen Viccary', '9qd747vh', '2018-12-06'),
(14, 'hgethingsd@sogou.com', 'Hendrik Gethings', 'zzN5c4', '2018-11-18'),
(15, 'dgirodiase@stanford.edu', 'Dunc Girodias', 'j9QW6GQI', '2018-10-14'),
(16, 'btanmanf@smh.com.au', 'Bibbie Tanman', '1aukKNEIneq', '2019-05-03'),
(17, 'bbartolettig@simplemachines.org', 'Barnabas Bartoletti', '3chTNtqhoo', '2018-12-25'),
(18, 'nculliph@fc2.com', 'Nixie Cullip', '2UdKIR2f', '2019-04-07'),
(19, 'mpimblotti@xing.com', 'Matilde Pimblott', 'nGZ8disdg', '2019-07-18'),
(20, 'askurrayj@un.org', 'Al Skurray', 'bL9tAf', '2018-11-25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
