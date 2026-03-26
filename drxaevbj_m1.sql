-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 26 2026 г., 07:48
-- Версия сервера: 8.0.40-0ubuntu0.22.04.1
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `drxaevbj_m1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE `education` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `study_form` varchar(255) DEFAULT NULL,
  `achievments` text,
  `additional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `user_id`, `start_date`, `end_date`, `faculty`, `specialty`, `study_form`, `achievments`, `additional`) VALUES
(1, 1, '2004-10-20', '2004-10-20', '4\r\n', '23ИСИП', 'ochno', 'red diplom', 'kruto'),
(2, 2, '2004-10-20', '2004-10-20', '2', '23ИСИП', 'afdsf', 'asddsf', 'афвыаваав');

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `github` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `portfolio`
--

INSERT INTO `portfolio` (`id`, `user_id`, `full_name`, `profession`, `city`, `phone`, `telegram`, `github`, `about`) VALUES
(1, 1, 'Ochir', 'programmer', 'New-York', '8(924)387-85-11', '@ochir_zxc', 'potom_dobavlu', 'bandit'),
(2, 2, 'ОЧИР НОМЕР 2', 'военный', 'питер', '89243878511', '@ochir_i', 'фывафывафвыа', 'studenttt');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_link` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_name`, `project_link`, `description`) VALUES
(10, 1, 'что то', 'ссылка тут', 'крутой проекткрутой проект\r\nкрутой проект\r\nкрутой проект\r\nкрутой проект\r\nкрутой проект\r\nкрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проекткрутой проект'),
(12, 1, 'крутой проект 2 ', 'сссылка на ркутой проект два', 'крут окруто круто круто ');

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `level` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill_name`, `level`) VALUES
(21, 1, 'mysql', '22'),
(22, 1, 'python', '45'),
(23, 1, 'c++', '23'),
(24, 2, 'c++', '100');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `email`) VALUES
(1, 'Админ', 'admin', 'admin', 'admin@mail.ru'),
(2, 'Лера', 'student', 'student', 'student@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `education`
--
ALTER TABLE `education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
