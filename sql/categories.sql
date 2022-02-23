CREATE
DATABASE taskforce2;
use taskforce2;
CREATE TABLE categories
(
    name varchar(255) NOT NULL,
    icon varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into categories (name, icon)
VALUES ('Переводы', 'translation');
insert into categories (name, icon)
VALUES ('Уборка', 'clean');
insert into categories (name, icon)
VALUES ('Переезды', 'cargo');
insert into categories (name, icon)
VALUES ('Компьютерная помощь', 'neo');
insert into categories (name, icon)
VALUES ('Ремонт квартирный', 'flat');
insert into categories (name, icon)
VALUES ('Ремонт техники', 'repair');
insert into categories (name, icon)
VALUES ('Красота', 'beauty');
insert into categories (name, icon)
VALUES ('Фото', 'photo');
