-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2018 г., 21:39
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Маринина Александра'),
(2, 'Браун Дэн'),
(3, 'Полякова Татьяна');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(32) NOT NULL,
  `book_content` text NOT NULL,
  `book_price` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_content`, `book_price`) VALUES
(1, 'Тайна, покрытая мраком', 'Старушенция, у которой я работала компаньонкой, врала на каждом шагу. Что из ее рассказов ложь, а что правда, можно было только гадать. Но, потратив кучу времени, я все-таки выяснила — последним местом ее службы был драматический театр, и вздохнула с облегчением: не окажись бабка актрисой, человечество много бы потеряло, так как актриса она от бога, запросто изобразит что угодно. Например, умирающую. Вот и сейчас, собираясь в очередной...', 100),
(2, 'Последний рассвет', 'Все-таки правильно, что празднование юбилея проводится в будний день в городе, а не за городом, как стало модно в последние годы. Ноябрь перевалил на вторую половину, погода не ахти, насладиться природой и свежим воздухом все равно не получится, так какой смысл затевать шикарный праздник в таком месте, куда не каждому из приглашенных удобно добираться? Молодец юбиляр, все устроил в Москве, и гости, судя по их немалому количеству, явились все.', 200),
(3, 'ИНФЕРНО', 'Дэн Браун порадовал своих читателей новым захватывающим романом под названием «Инферно», в котором описываются приключения Роберта Лэнгдона – опытного специалиста, изучающего коды, символы и историю искусства. Профессор, приехавший в полный загадок итальянский город – Флоренцию, неожиданным для себя образом оказывается в водовороте опасных событий, способных погубить человеческую расу. А изменить ход событий дано лишь тому человеку, который сможет разгадать тайну, некогда зашифрованную Данте в строках его бессмертного творения…', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors`
--

CREATE TABLE IF NOT EXISTS `books_authors` (
  `id` int(11) NOT NULL,
  `book_id` int(12) NOT NULL,
  `author_id` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_authors`
--

INSERT INTO `books_authors` (`id`, `book_id`, `author_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(10, 3, 1),
(11, 3, 2),
(12, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `books_genres`
--

CREATE TABLE IF NOT EXISTS `books_genres` (
  `id` int(11) NOT NULL,
  `book_id` int(12) NOT NULL,
  `genre_id` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_genres`
--

INSERT INTO `books_genres` (`id`, `book_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(10, 3, 1),
(11, 3, 2),
(12, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Детектив'),
(2, 'Худож. литература'),
(3, 'Биографии');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Индексы таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `books_genres`
--
ALTER TABLE `books_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `books_authors`
--
ALTER TABLE `books_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `books_genres`
--
ALTER TABLE `books_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

--
-- Ограничения внешнего ключа таблицы `books_genres`
--
ALTER TABLE `books_genres`
  ADD CONSTRAINT `books_genres_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `books_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
