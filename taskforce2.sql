-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2023 г., 12:05
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
(1, 'ex', 'officia'),
(2, 'necessitatibus', 'consequuntur'),
(3, 'quam', 'aliquam'),
(4, 'sint', 'perspiciatis'),
(5, 'blanditiis', 'debitis'),
(6, 'pariatur', 'maxime'),
(7, 'quia', 'modi'),
(8, 'itaque', 'illum'),
(9, 'ut', 'quas'),
(10, 'sequi', 'velit');

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
(1, 'optio', '3.28767209', '1165.71887468'),
(2, 'tempore', '908735763.23576000', '221381249.51997000'),
(3, 'qui', '35390259.33362200', '2.36468823'),
(4, 'quia', '540416058.96570000', '6.23656315'),
(5, 'alias', '74645.16266043', '611.61727880'),
(6, 'praesentium', '1.88527722', '20.28613725'),
(7, 'atque', '437.75704022', '1.84760375'),
(8, 'accusantium', '1916920.27996540', '341997926.39186000'),
(9, 'quas', '32.16777309', '136.47433467'),
(10, 'quae', '137380.52579331', '0.00000000');

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `tasks_id` int NOT NULL,
  `files_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `tasks_id`, `files_name`) VALUES
(1, 2, 'culpa'),
(2, 4, 'ad'),
(3, 3, 'commodi'),
(4, 9, 'est'),
(5, 6, 'tempore'),
(6, 2, 'ut'),
(7, 9, 'ipsa'),
(8, 3, 'quibusdam'),
(9, 0, 'quaerat'),
(10, 7, 'esse');

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
(1, '2003-03-26 03:34:08', 4, 'Est voluptatem ullam repellat.'),
(2, '2003-10-23 18:14:40', 0, 'Repellendus est blanditiis sunt rerum.'),
(3, '1976-09-08 08:54:49', 8, 'Sequi ullam repellat odio hic.'),
(4, '1999-10-10 04:00:42', 7, 'Temporibus modi cumque perspiciatis.'),
(5, '1991-09-26 22:25:02', 7, 'Odit molestiae iusto ipsam sint maiores dolor velit aut.'),
(6, '1996-04-16 09:23:41', 1, 'Nesciunt quis dolorem quo labore dolores.'),
(7, '1991-06-09 07:41:38', 0, 'Odit cum quae unde similique alias et officia in.'),
(8, '2015-06-06 08:36:25', 4, 'Dolorum repellat et quas in rerum magnam.'),
(9, '1991-07-17 06:08:57', 1, 'Nulla voluptatem qui laborum reiciendis sunt odio.'),
(10, '1996-05-20 12:50:26', 7, 'Qui qui ut odit et sequi ea.');

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
(1, 'Tempore consequuntur quisquam qui dolorum non.', '2014-08-25 00:30:08', 'Non voluptas iste ducimus sunt iure qui velit totam.', '33765275', 'voluptatem', 1),
(2, 'Adipisci in dolorum occaecati non perspiciatis.', '2001-07-29 09:33:06', 'Dolore sit recusandae deserunt ratione.', '80868506', 'voluptatem', 2),
(3, 'Consequuntur a fugit voluptates vel dignissimos ut.', '1997-06-16 02:11:16', 'Quidem officia nulla quis qui.', '41112132', 'et', 3),
(4, 'Sequi qui aperiam autem laudantium.', '2002-07-07 09:52:02', 'Ea voluptates voluptatem voluptatem odio et alias et.', '64332243', 'ex', 8),
(5, 'Esse in est quidem quo ut velit.', '2003-04-10 03:48:43', 'Sit est blanditiis debitis animi doloremque.', '91148926', 'odit', 4),
(6, 'Quo facilis autem qui magnam.', '2003-04-08 23:44:10', 'Odit doloribus similique rerum necessitatibus nisi dolores.', '35845203', 'commodi', 8),
(7, 'Vitae et quia dolorem occaecati dicta.', '1998-09-28 07:17:13', 'Rerum optio ipsam quisquam.', '36819582', 'repudiandae', 1),
(8, 'Ut non unde dolorum.', '1971-12-19 19:12:05', 'Vitae itaque sequi sunt nulla et cupiditate vero.', '36810563', 'et', 9),
(9, 'Unde veniam cum adipisci numquam in nemo quidem.', '1990-03-02 01:15:40', 'Et quisquam animi eos.', '68275913', 'hic', 3),
(10, 'Qui qui debitis voluptate eum repellat.', '2016-12-05 01:41:31', 'Placeat iste porro enim vel reiciendis.', '44962274', 'vero', 3);

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
(1, 5, 2, 1),
(2, 9, 5, 5),
(3, 2, 4, 3),
(4, 9, 6, 0),
(5, 7, 1, 6),
(6, 5, 9, 1),
(7, 6, 4, 5),
(8, 8, 7, 2),
(9, 4, 9, 3),
(10, 4, 7, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `tags_attribute`
--

CREATE TABLE `tags_attribute` (
  `id` int UNSIGNED NOT NULL,
  `attributes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tags_attribute`
--

INSERT INTO `tags_attribute` (`id`, `attributes`) VALUES
(1, 'est'),
(2, 'nisi'),
(3, 'omnis'),
(4, 'non'),
(5, 'dolore'),
(6, 'qui'),
(7, 'laboriosam'),
(8, 'omnis'),
(9, 'tempora'),
(10, 'eos');

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
(5, 9, 1),
(7, 3, 2),
(7, 8, 3),
(9, 2, 4),
(3, 9, 5),
(2, 3, 6),
(9, 9, 7),
(7, 7, 8),
(7, 2, 9),
(1, 7, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int UNSIGNED NOT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `expire` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `budget` int DEFAULT NULL,
  `latitude` decimal(65,12) DEFAULT NULL,
  `longitude` decimal(65,12) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `executor_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `create_at`, `category_id`, `description`, `expire`, `name`, `address`, `budget`, `latitude`, `longitude`, `status`, `user_id`, `executor_id`) VALUES
(1, '1982-12-15 08:33:22', 3, 'Nobis doloribus numquam tempore rerum impedit aut.', '1988-03-28', 'omnis', 'Et nemo mollitia est unde.', 44997, '583.222903820000', '1936.796443260000', 'repudiandae', 2, 0),
(2, '2014-09-08 02:11:51', 9, 'Alias tempora nobis et nam cumque occaecati provident aperiam.', '2008-08-11', 'amet', 'Minus illum sint sed fuga quaerat magnam perferendis.', 18896, '30.869115730000', '137048016.960550000000', 'aut', 6, 9),
(3, '1988-05-12 04:18:39', 0, 'Debitis ipsum est adipisci laboriosam.', '2007-07-07', 'voluptatum', 'Quo alias temporibus atque illo.', 55306, '0.237428910000', '24575.365921260000', 'quo', 5, 8),
(4, '1990-09-25 17:39:03', 2, 'Nam sint unde aut ullam et mollitia dolorem vitae.', '2004-04-11', 'aut', 'Non quisquam laborum corporis ut ut sapiente voluptatem eum.', 70159, '58902.877412210000', '17.083807660000', 'maxime', 4, 3),
(5, '1986-07-12 07:29:21', 6, 'Repellat asperiores qui facere consequatur illo saepe.', '1997-04-12', 'aut', 'Officiis vitae non rerum rerum et eum vel.', 50663, '4303801.041109300000', '17308175.226466000000', 'quas', 9, 1),
(6, '2011-11-05 19:39:24', 4, 'Mollitia reprehenderit aperiam odio et blanditiis in accusamus.', '2015-11-25', 'sed', 'Quod sint aut minus voluptatem exercitationem.', 66550, '46184241.870132000000', '106.340598520000', 'quo', 9, 7),
(7, '2016-08-20 02:11:17', 8, 'Ipsum consequuntur necessitatibus delectus et eum.', '1988-05-12', 'omnis', 'Ut qui totam rerum impedit.', 21456, '53374.928861100000', '5.134234330000', 'aut', 6, 2),
(8, '1979-07-31 13:51:24', 6, 'Consectetur et autem officiis vitae ut.', '2006-01-10', 'quaerat', 'Id sunt cum minima veniam harum voluptatem rerum.', 94626, '1.783484240000', '2.909982890000', 'sit', 2, 0),
(9, '1977-03-27 04:47:38', 2, 'Ea consectetur et enim quia.', '2022-09-27', 'repudiandae', 'Voluptate dolores et ipsum non.', 79259, '5566743.491280400000', '11.453754060000', 'omnis', 5, 8),
(10, '1974-10-10 04:02:28', 6, 'Non aperiam et est pariatur corporis voluptates consequatur.', '2015-03-19', 'fuga', 'Maxime hic et qui vitae omnis.', 78789, '136.648322850000', '55010406.822735000000', 'consequatur', 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_reply`
--

CREATE TABLE `tasks_reply` (
  `id` int UNSIGNED NOT NULL,
  `dt_add` timestamp NOT NULL,
  `rate` int DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `task_id` int NOT NULL,
  `price` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tasks_reply`
--

INSERT INTO `tasks_reply` (`id`, `dt_add`, `rate`, `description`, `photo`, `task_id`, `price`, `user_id`, `status`) VALUES
(1, '2022-10-04 09:38:50', 1, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'man-hat.png', 1, 10000, 1, ''),
(2, '2022-10-04 09:38:50', 4, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli', 'man-hat.png', 2, 45000, 2, ''),
(3, '2022-10-04 09:38:50', 5, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, veli', 'man-hat.png', 2, 89523, 3, ''),
(4, '2022-10-04 09:38:50', 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla n', 'man-hat.png', 2, 4896, 2, ''),
(5, '2022-10-04 09:38:50', 3, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'man-hat.png', 3, 456, 2, ''),
(6, '2022-10-04 09:38:50', 4, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pe', 'man-hat.png', 3, 4899, 2, ''),
(7, '2022-10-04 09:38:50', 5, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'man-hat.png', 3, 789, 3, ''),
(8, '2022-10-04 09:38:50', 4, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mau', 'man-hat.png', 3, 4589, 4, ''),
(9, '2022-10-04 09:38:50', 3, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Do', 'man-hat.png', 5, 4500, 5, ''),
(10, '2022-10-04 09:38:50', 5, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'man-hat.png', 3, 789, 4, ''),
(11, '2022-10-04 09:38:50', 4, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'man-hat.png', 8, 0, 4, ''),
(12, '2022-10-04 09:38:50', 5, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ph', 'man-hat.png', 9, 1258, 4, ''),
(13, '2022-10-04 09:38:50', 1, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. ', 'man-hat.png', 11, 4589, 5, ''),
(14, '2022-10-04 09:38:50', 3, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 'man-hat.png', 34, 45000, 5, ''),
(15, '2022-10-04 09:38:50', 3, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrice', 'man-hat.png', 12, 4589, 4, ''),
(16, '2022-10-04 09:38:50', 3, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 'man-hat.png', 12, 0, 4, ''),
(17, '2022-10-04 09:38:50', 4, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 'man-hat.png', 12, 4589, 4, ''),
(18, '2022-10-04 09:38:50', 2, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'man-hat.png', 12, 4589, 2, ''),
(19, '2022-10-04 09:38:50', 3, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'man-hat.png', 21, 458, 2, ''),
(20, '2022-10-04 09:38:50', 4, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 'man-hat.png', 12, 458, 2, '');

-- --------------------------------------------------------

--
-- Структура таблицы `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` int NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `task_id`, `user_id`, `status`) VALUES
(1, 8, 0, 'quis'),
(2, 3, 2, 'eos'),
(3, 8, 4, 'numquam'),
(4, 8, 8, 'eum'),
(5, 9, 0, 'veniam'),
(6, 4, 3, 'occaecati'),
(7, 2, 7, 'voluptas'),
(8, 6, 6, 'saepe'),
(9, 4, 4, 'soluta'),
(10, 2, 4, 'dignissimos');

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
  `answer_orders` tinyint(1) DEFAULT NULL,
  `category_id` int NOT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `dt_add`, `email`, `name`, `password_hash`, `user_img`, `quote`, `country`, `city_id`, `age`, `phone`, `telegram`, `status`, `user_status`, `answer_orders`, `category_id`, `date_of_birth`) VALUES
(1, '2019-07-23 05:56:59', 'roy.wunsch@gmail.com', 'Dana Anderson V', '{ML2#`Hm&v-W5$M:urlb', 'voluptatum', 'Est tenetur deserunt perspiciatis qui quia sed.', 'esse', 3, '23274', '24783', 'unde', 1, 'tempora', 1, 4, '2011-09-15'),
(2, '1979-05-08 06:12:40', 'ulices20@gmail.com', 'Johnnie Abshire', 'kpO/MEL=O', 'quis', 'Quam ipsam aut neque vel voluptatem.', 'amet', 2, '47432', '40630', 'voluptatibus', 0, 'autem', 1, 6, '1992-07-10'),
(3, '1976-12-08 21:18:20', 'mireille.borer@yahoo.com', 'Prof. Stacey Stokes', '=NOlJ/:T`QTB6', 'veritatis', 'Voluptas sunt ut excepturi esse est cumque.', 'debitis', 4, '32887', '38380', 'molestiae', 1, 'est', 0, 0, '1987-03-07'),
(4, '1972-06-01 12:18:51', 'kling.keenan@turner.com', 'Dallas Kuphal', '/8]g]_2X9', 'dolorem', 'Unde veritatis omnis libero.', 'ut', 9, '72084', '97994', 'aut', 1, 'maxime', 0, 6, '2007-07-09'),
(5, '1992-10-01 02:54:00', 'leonard80@kautzer.com', 'Jonatan Skiles', '`;$}Q$Z2a+3Wpy+uxe', 'et', 'Vel quis dolor repudiandae dolore eum modi architecto ducimus.', 'perferendis', 4, '57050', '13756', 'unde', 1, 'natus', 1, 2, '1997-10-27'),
(6, '2003-04-27 12:46:01', 'zakary48@gmail.com', 'Tevin Vandervort', '/?MhGaoSj', 'omnis', 'Ipsam consequatur totam saepe cum eos ex.', 'pariatur', 3, '68251', '24988', 'et', 0, 'rerum', 1, 2, '1983-04-25'),
(7, '2011-01-30 13:17:45', 'pconroy@veum.com', 'Diego Cormier', '*@H-o@TEX%aJmx2/\"', 'architecto', 'Nam eaque aut illo corporis est corporis.', 'non', 7, '13883', '93502', 'autem', 1, 'nam', 1, 3, '2013-09-11'),
(8, '2018-03-30 07:50:45', 'bkub@gmail.com', 'Mr. Dante Runolfsdottir', '_e}f@7Gc4U.Mo', 'aut', 'Est sapiente eos corporis fugiat distinctio nam quibusdam.', 'voluptas', 4, '28108', '80016', 'et', 1, 'in', 0, 4, '2020-01-09'),
(9, '1983-01-06 08:16:52', 'jnader@kulas.com', 'Bert Zemlak', '|O?a*nf.S\\R#{rR\"]`&', 'illum', 'Possimus consequatur porro molestias excepturi.', 'repellendus', 9, '45941', '36604', 'aut', 0, 'perferendis', 1, 5, '1976-11-09'),
(10, '1993-12-13 04:13:10', 'jarvis.fay@gmail.com', 'Tomasa Maggio', 'S7aOor', 'ut', 'Aut et reprehenderit amet quis consequatur.', 'voluptatem', 7, '77749', '42289', 'eveniet', 1, 'sint', 1, 1, '1974-02-02');

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
(1, 1, 2),
(2, 1, 4),
(3, 3, 6),
(4, 6, 1),
(5, 5, 6),
(6, 9, 3),
(7, 5, 6),
(8, 1, 5),
(9, 7, 8),
(10, 1, 8);

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
(1, '1976-02-08 01:59:29', 0, 'Non et doloremque dolore dolorem.', 9, 2, 5),
(2, '1976-01-18 07:07:50', 3, 'Quae facilis qui qui.', 7, 1, 9),
(3, '2010-07-01 15:29:15', 5, 'Aliquam quaerat exercitationem amet harum.', 3, 2, 0),
(4, '1986-02-05 07:53:49', 3, 'Et in quod est saepe autem.', 8, 4, 2),
(5, '1974-04-21 15:26:13', 2, 'Eveniet et minus nam non nihil.', 8, 0, 5),
(6, '1971-07-10 18:30:32', 3, 'Et possimus aut explicabo officiis.', 6, 8, 7),
(7, '1980-02-24 22:31:37', 9, 'Sunt eum totam et est tempore dolorum.', 6, 5, 7),
(8, '2013-02-18 09:18:39', 3, 'Incidunt eligendi debitis blanditiis molestiae nesciunt mollitia.', 0, 8, 7),
(9, '2014-11-16 02:56:22', 0, 'Ut nulla dolores temporibus quasi consequatur debitis reiciendis.', 9, 4, 9),
(10, '2015-10-02 17:51:52', 8, 'Sed quod aut harum illo.', 5, 1, 3);

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
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Индексы таблицы `tags_attribute`
--
ALTER TABLE `tags_attribute`
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
-- Индексы таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `replies_link`
--
ALTER TABLE `replies_link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tags_attribute`
--
ALTER TABLE `tags_attribute`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tags_attribution`
--
ALTER TABLE `tags_attribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT для таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_reply`
--
ALTER TABLE `user_reply`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
