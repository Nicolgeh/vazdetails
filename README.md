# vazdetails
# https://docs.google.com/presentation/d/1JbDD4FRBzE_iP5ahzt7WRNU1Wv9BPTk0wZSXBcxRsB0/edit#slide=id.gcb9a0b074_1_0


# BD
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2023 г., 09:58
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `avtovaz`
--
CREATE DATABASE IF NOT EXISTS `avtovaz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `avtovaz`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`, `type`) VALUES
(1, 'Лада 2110', 'Машины десятого семейства', 0),
(2, 'Оптика', 'Оптика для машин', 1),
(4, 'Салон', 'Товары для салона', 1),
(5, 'Ваз 2107', 'Машина Ваз 2107', 0),
(6, 'Оригинал', 'Оригинальная запчасть', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `car` int NOT NULL,
  `type` int NOT NULL,
  `podtype` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_item`, `name`, `description`, `price`, `car`, `type`, `podtype`) VALUES
(1, 'Фара для 2107', 'Хорошая фара для машины ВАЗ 2107', 1000, 5, 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `position` int NOT NULL,
  `price` int NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `position`, `price`, `address`, `phone`, `email`, `status`) VALUES
(1, 10, 0, 1000, 'Улица пушкина', '+79999999999', 'tigga008GT@gmail.com', 1),
(2, 11, 1, 1000, 'Улица пушкина', '+79999999999', 'gfhgsdrth@hdfnh.fs', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(1, 'Оплачен'),
(2, 'Передан в доставку'),
(3, 'Доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `admin`, `phone`) VALUES
(10, 'tigga008GT@gmail.com', '$2y$10$6J2XwXCnGh4s.hG6V70QdOMtsJxiNi0E7xtlDGYoC2Jh6SeVuoe46', 'Николай', 'Какошин', 1, '+79999999999'),
(11, 'gfhgsdrth@hdfnh.fs', '$2y$10$mUdcpb46o6B1IWvm3HD4Nut9GwuazM5OUr4pLnY0TutgBSAWc3Mx6', 'Иван', 'Иванов', 0, '+79999999999'),
(12, 'tigga008GT@Gmail.coma', '$2y$10$gf57fLNf2HHla/mIeOB4bekpwp1VU9/pClO2rYUm7JMqtbz.OkkhW', 'fsgfsgh125125', 'fdshdf2141245', 0, '+79999999999'),
(13, 'tigga008GT@Gmail.coma135', '$2y$10$qih8bvtHEFObIpZrW9LmuumwsqUbI/vylVzZqsyaLCCrRPLKdFczW', 'fsgfsgh1251235', 'fdshdf124124', 1, '+7999999999912'),
(14, NULL, '$2y$10$CJI6KIu4QltG8wFanm/05uIwlgdp29p/wuiP0oM53AZAynrXHrq/K', 'dghdtghn', 'edrtjnertdn', 0, '+79999999999');

-- --------------------------------------------------------

--
-- Структура таблицы `usersAvatars`
--

CREATE TABLE `usersAvatars` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usersAvatars`
--

INSERT INTO `usersAvatars` (`id`, `id_user`, `name`, `path`) VALUES
(1, 10, 'maxresdefault(5).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/avatars/'),
(2, 12, '2560x1600_453290_[www.ArtFile.ru].jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/avatars/'),
(3, 13, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars'),
(4, 14, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars'),
(5, 15, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `usersAvatars`
--
ALTER TABLE `usersAvatars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `usersAvatars`
--
ALTER TABLE `usersAvatars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
