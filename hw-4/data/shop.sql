-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 23 2019 г., 12:30
-- Версия сервера: 8.0.16
-- Версия PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`, `quantity`) VALUES
(28, 1, '7dvavgh9vma283cqfsjt6m8mvv', 1),
(31, 2, '21p9g973molncjk3dq2vrf3rl8', 1),
(32, 1, '21p9g973molncjk3dq2vrf3rl8', 1),
(37, 1, '7rdsfoa3fdhsb73vdgi3ld6sb5', 1),
(38, 2, '7rdsfoa3fdhsb73vdgi3ld6sb5', 1),
(39, 1, 'glhcqpcstsium2q6viquou26j0', 1),
(40, 3, 'glhcqpcstsium2q6viquou26j0', 1),
(41, 1, 'qt5107bj400qitnrga5ggaldn4', 1),
(42, 1, '59no39ggroqd9eh4geauo7lb0p', 1),
(43, 1, 'll61knc371n0udjarfjoq8elr9', 1),
(44, 1, 'tnk8rs9118a9c91jre2j590kiv', 1),
(45, 3, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(46, 2, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(47, 1, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(48, 2, 'm5h8apud73if2e9grcp0e6jdfa', 1),
(49, 1, 'u4gbloqcbj9qnepo4nhecg1aia', 1),
(50, 1, 'lafanr1tuqiqb01e0l8o7d08t8', 1),
(51, 1, 'tkr7a0v1k6rso7kggcem46mqkd', 1),
(53, 1, 'bl9nqs5gheu7ccjmrc1g0f7vs1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(1, 'Садовый инвентарь', 'Описание группы Садовый инвентарь', 'active'),
(2, 'Бытовые принадлежности', 'Описание группы Бытовые принадлежности', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `adres` text NOT NULL,
  `session_id` text NOT NULL,
  `status` text,
  `dt_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `adres`, `session_id`, `status`) VALUES
(6, 'Линар', '1234456', 'Москва', 'glhcqpcstsium2q6viquou26j0', 'complete'),
(12, 'Линар', '1234456', 'Москва', 'u4gbloqcbj9qnepo4nhecg1aia', 'active'),
(13, 'Линар2', '1234456', 'Москва', 'lafanr1tuqiqb01e0l8o7d08t8', 'canceled'),
(14, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'complete'),
(15, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'complete'),
(16, 'Линар2', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(17, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(18, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(19, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Метла', 'Отличная метла для любого хозяйственного дворника!', 22),
(2, 'Спички', 'Спички особые, изготовленные из редких пород дерева.', 1),
(3, 'Ведро', 'Пластиковое ведро с крепчайшей ручкой для самых сильных хозяев.', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `admin`, `user_id`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '21255787435d641ba0296111.41509116', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
