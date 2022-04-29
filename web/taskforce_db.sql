SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*
Таблица категорий. Хранит в себе категории заданий для исполнителя
 */

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `categories` (`id`, `name`, `icon`, `user_id`) VALUES
(1, 'Переводы', 'translation', 0),
(2, 'Уборка', 'clean', 0),
(3, 'Переезды', 'cargo', 0),
(4, 'Компьютерная помощь', 'neo', 0),
(5, 'Ремонт квартирный', 'flat', 0),
(6, 'Ремонт техники', 'repair', 0),
(7, 'Красота', 'beauty', 0),
(8, 'Фото', 'photo', 0);

/*
Таблица городов. Хранит города где будут выполняться задания
 */

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
Таблица любимое. Хранит избранные задания
 */

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*
Таблица сообщения. Хранит сообщения между исполнителем и заказчиком
 */

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*
Таблица уведомлений. Уведомления для заказчика
 */

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `creation_time` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `task_id` int(11) NOT NULL,
  `is_view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*
Таблица отзывов. Отзывы о исполнителе
 */

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `dt_add` date NOT NULL,
  `rate` int(11) NOT NULL,
  `deskription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `opinions` (`id`, `dt_add`, `rate`, `deskription`) VALUES
(1, '2019-08-19', 3, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r\n\r\nPhasellus '),
(2, '2019-02-22', 2, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r\n\r\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nulla'),
(3, '2019-07-11', 2, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r\n\r\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(4, '2018-10-07', 2, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec '),
(5, '2018-12-01', 1, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(6, '2018-11-09', 3, 'In congue. Etiam justo. Etiam pretium iaculis justo.'),
(7, '2018-12-10', 5, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\r\n\r\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accum'),
(8, '2018-10-20', 2, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placera'),
(9, '2018-10-27', 2, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(10, '2019-06-14', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.');


/*
Таблица портфолио. Хранятся ссылки на работы исполнителя
 */

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `portfolio` (`id`, `user_id`, `photo`) VALUES
(1, 1, './img/man-glasses.jpg'),
(2, 2, './img/man-glasses.jpg'),
(3, 1, './img/man-glasses.jpg'),
(4, 2, './img/man-glasses.jpg');


/*
Таблица профили. Хранятся профили пользователей
 */

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bd` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `skype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `profiles` (`id`, `address`, `bd`, `about`, `phone`, `skype`) VALUES
(1, '38737 Moose Avenue', '1989-11-11', 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', 2147483647, 'high-level'),
(2, '738 Hagan Lane', '1989-03-05', 'Pellentesque ultrices mattis odio.', 2147483647, 'mobile'),
(3, '758 Old Shore Parkway', '1989-12-30', 'Morbi a ipsum. Integer a nibh. In quis justo.', 2147483647, 'Re-engineered'),
(4, '11 Dovetail Junction', '0629-03-03', 'Suspendisse potenti.', 2147483647, 'Grass-roots'),
(5, '050 Bowman Alley', '1989-04-08', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', 2147483647, 'fault-tolerant'),
(6, '5 Iowa Avenue', '1989-04-18', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', 2147483647, 'Team-oriented'),
(7, '87119 Northland Hill', '1989-03-20', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2147483647, 'portal'),
(8, '6823 Lillian Point', '1989-12-13', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 2147483647, 'intermediate'),
(9, '43 Marquette Plaza', '1989-01-14', 'Morbi ut odio.', 2147483647, 'local area network'),
(10, '5303 Village Green Hill', '1989-02-03', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', 2147483647, 'upward-trending'),
(11, '67399 Reindahl Place', '1989-05-23', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 2147483647, 'grid-enabled'),
(12, '45 Twin Pines Hill', '1989-07-06', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', 2147483647, 'background'),
(13, '46 Sheridan Place', '1903-04-16', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 2147483647, 'challenge'),
(14, '73 Kedzie Terrace', '1989-11-07', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 2147483647, 'coherent'),
(15, '85509 Ludington Drive', '1989-02-13', 'Cras pellentesque volutpat dui.', 2147483647, 'neutral'),
(16, '67 Northwestern Center', '1989-07-07', 'Aliquam erat volutpat. In congue.', 2147483647, 'Programmable'),
(17, '725 Eagle Crest Hill', '1989-09-29', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', 2147483647, 'encompassing'),
(18, '507 Graceland Junction', '1989-03-19', 'Suspendisse potenti.', 2147483647, 'knowledge base'),
(19, '92 Gina Park', '1989-09-29', 'Phasellus sit amet erat.', 2147483647, 'dynamic'),
(20, '8 Ridgeview Trail', '1989-12-21', 'Cras pellentesque volutpat dui.', 2147483647, 'solution');


/*
Таблица коментарии. Хранятся коментарии на выполненные задания
 */

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `dt_add` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `deskription` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `replies` (`id`, `dt_add`, `rate`, `deskription`, `user_id`) VALUES
(1, 20190509, 1, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placera', '2'),
(2, 20181027, 4, 'Fusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\r\n\r\nIn hac habitasse platea dictumst. Morbi vestibulum, ', '1'),
(3, 20181102, 5, 'Fusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\r\n\r\nIn hac habitasse platea dictumst. Morbi vestibulum, ', '3'),
(4, 20190604, 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nul', '4'),
(5, 20181009, 3, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '4'),
(6, 20190716, 4, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r\n\r\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r\n\r\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo', NULL),
(7, 20190122, 5, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', NULL),
(8, 20190611, 4, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\nProin interdum', NULL),
(49, 20190216, 3, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. ', NULL),
(50, 20190716, 5, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', NULL),
(51, 20181111, 4, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', NULL),
(52, 20181101, 5, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ', NULL),
(53, 20181005, 1, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue', NULL),
(54, 20190228, 3, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', NULL),
(55, 20190704, 3, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r\n\r\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultri', NULL),
(56, 20190730, 3, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r\n\r\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(57, 20190710, 4, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\r\n\r\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', NULL),
(58, 20190915, 2, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', NULL),
(59, 20181016, 3, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', NULL),
(60, 20190213, 4, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', NULL);



/*
Таблица атрибутов. На чем специализируется исполнитель
 */

CREATE TABLE `tags_attributes` (
  `id` int(100) NOT NULL,
  `attributes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `tags_attributes` (`id`, `attributes`) VALUES
(1, 'Ремонт'),
(2, 'Оператор ПК'),
(3, 'Программист'),
(5, 'Алкоголик'),
(6, 'Дизайн домов');


/*
Таблица связывающая таблицу с атрибутами пользователей с таблицей пользователей
 */

CREATE TABLE `tags_attribution` (
  `user_id` int(255) DEFAULT NULL,
  `attributes_id` int(255) DEFAULT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `tags_attribution` (`user_id`, `attributes_id`, `id`) VALUES
(1, 2, 2),
(1, 3, 3),
(2, 4, 4),
(3, 5, 5),
(3, 6, 6);


/*
Таблица задания. Тут хранятся с данными о заданиях
 */

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `create_at` bigint(20) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `final_date` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `user_stars` varchar(255) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `tasks` (`id`, `create_at`, `category_id`, `description`, `final_date`, `name`, `address`, `budget`, `lat`, `long`, `user_stars`, `user_id`, `status`) VALUES
(1, 1512166045, 12, 'Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции требуют определения и уточнения позиций…\r\n\r\nSex, Sex, Sex', 1632136882, 'Перевести войну и мир на клингонский', 'Санкт-Петербург, Центральный район', 3400, 1.5, 1.6, '1', 1, '1'),
(2, 1512166045, 123, 'Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции требуют определения и уточнения позиций…\r\n\r\n', 1632136882, 'Убраться в квартире после вписки', 'Санкт-Петербург, Центральный район', 1500, 1.6, 1, '12', 2, '1'),
(3, 1538431645, 10, 'Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции требуют определения и уточнения позиций…\r\n\r\n', 1632136882, 'Перевезти груз на новое место', 'Москва, Центральный район', 3000, 1.9, 10.45, '2\r\n', 3, '1'),
(4, 1538431621, 9, 'Люблю Киев', 1632136882, 'Перевезти груз на новое место', 'Москва, Центральный район', 3000, 1.9, 10.45, '1\r\n', 3, '1'),
(5, 1268647621, 7, 'Люблю Чернигов\r\n', 1632136882, 'Перевезти груз на новое место', 'Киев, Борщаговка', 3000, 1.9, 10.45, '5\r\n', 3, '1'),
(6, 1426414021, 8, 'Люблю Чернигов\r\n', 1632136882, 'Перевезти груз на новое место', 'Сумы, Борщаговка', 3000, 1.9, 10.45, '4\r\n', 3, '1');


/*
Таблица пользователи. Тут хранится информация о пользователях которые зарегистрировались
 */

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt_add` bigint(20) NOT NULL,
  `user_rating` int(100) DEFAULT NULL,
  `user_search_content` varchar(255) DEFAULT NULL,
  `last_active` bigint(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `email`, `name`, `password`, `dt_add`, `user_rating`, `user_search_content`, `last_active`, `user_img`) VALUES
(1, 'kbuttress0@1und1.de', 'Астахов Павел', 'F6A2EECF450B9179BA0F9F8266049CAF', 1570640553000, 1, 'Сложно сказать, почему элементы политического процесса лишь добавляют фракционных разногласий и рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок.\r\n\r\n', 1512166045, './img/man-glasses.jpg'),
(2, 'baymer1@hp.com', 'Крючков Василий', '40F642EBD812E43E3496347AD06AAD9E', 1570640553000, 2, 'Как принято считать, акционеры крупнейших компаний формируют глобальную экономическую сеть и при этом - рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок\r\n\r\n', 1512166045, './img/user-man2.jpg'),
(3, 'zboulding2@macromedi', 'Миронов Алексей', '06A5043C9591D2E4A4C10B5514137651', 157064055, 3, 'Как принято считать, акционеры крупнейших компаний формируют глобальную экономическую сеть и при этом - рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок. Я люблю Иру\r\n\r\n', 1512166045, './img/user-man.jpg'),
(4, 'emollon3@bloglovin.c', 'Emalee Mollon', '0E545538F39A434B19BFE888FF767457', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(5, 'mmulberry4@cmu.edu', 'Maria Mulberry', '4E2FE9C669AFCE66D027546127135894', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(6, 'lby5@mozilla.com', 'Levey By', 'D781290A7D93F7E6D974AD17DC0F6610', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(7, 'beates6@last.fm', 'Baron Eates', '883B32DB19FC0401600C1C7257C1782F', 1570521553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(8, 'tvink7@fotki.com', 'Trip Vink', 'FD5D4714C54059F1EA31CD953427E531', 1570640553156, NULL, NULL, NULL, './img/man-glasses.jpg'),
(9, 'bterbeck8@about.me', 'Миронов Алексей', '437CD2770DB6E5798ED42B3B7914111A', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(10, 'atraviss9@auda.org.a', 'Alonzo Traviss', 'DBEFDEC7396EABD2E0375788DF415F4D', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(11, 'nwitteringa@google.c', 'Natassia Wittering', '75D526D3311EC77C9EF2EC4FD9A54566', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(12, 'fbrookeb@nba.com', 'Астахов Павел', '75D526D3311EC77C9EF2EC4FD9A54566', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(13, 'cviccaryc@amazon.co.', 'Carlen Viccary', '813310E0C8C4AB5B5DFF32BF1DC206CC', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(14, 'hgethingsd@sogou.com', 'Hendrik Gethings', '813310E0C8C4AB5B5DFF32BF1DC206CC', 1570640553963, NULL, NULL, NULL, './img/man-glasses.jpg'),
(15, 'dgirodiase@stanford.', 'Dunc Girodias', '885C6F8F16057037BAC81827BCAA3C1C', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(16, 'btanmanf@smh.com.au', 'Bibbie Tanman', 'F95F5E2DD3F06ABDD7FF3749D843B1F5', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(17, 'bbartolettig@simplem', 'Barnabas Bartoletti', '7F45EB167EBE4E2944C7874A1FF81780', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(18, 'nculliph@fc2.com', 'Nixie Cullip', '793B220105E522AEDFF80A7E145B03F2', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(19, 'mpimblotti@xing.com', 'Matilde Pimblott', '3EB6D0E980AB8B92291E38E2389648D6', 1570640553000, NULL, NULL, NULL, './img/man-glasses.jpg'),
(20, 'askurrayj@un.org', 'Al Skurray', '1B7416AD6E8ECBC1D79A535DE2FC11E8', 1570640311000, NULL, NULL, NULL, './img/man-glasses.jpg');


ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);


ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tags_attribution`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;


ALTER TABLE `tags_attribution`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
