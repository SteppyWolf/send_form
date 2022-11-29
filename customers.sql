-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2022 г., 15:20
-- Версия сервера: 5.6.51
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Registration`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textarea` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloading_file` blob,
  `selected_list` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `gender`, `textarea`, `downloading_file`, `selected_list`, `customers_password`) VALUES
(1, 'Test', 'Test', 'info@test.uz', 'm', '12345isPass', 0xd0a4d0bbd0b0d0b5d18020d180d183d181d181d0bad0b8d0b92e706e67, '1', '$2y$10$IgiYyE7UHeMxSnnlUYF8QO.9l.78idPIIfoS6I1QmUcKHwVI0JZdW'),
(3, 'Test2', 'Test2', 'info@test2.uz', 'm', '123456ispass', 0xd0a4d0bbd0b0d0b5d18020d183d0b7d0b1d0b5d0bad181d0bad0b8d0b92e706e67, '2', '$2y$10$pJcLwxDu19HPBLh4sR8NgeczG6c6WBrMeRszOt0jqjDHP/cK22Id2'),
(4, 'Руслан', 'Татлаев', 'rus.tatlaev@mail.ru', 'm', 'Пароль123456789', 0x4672616d65203333372e706e67, '2', '$2y$10$/7ijvxYFLlZFD3IeiL28fu808Egap.tQ0lCVpsC/YeI9PRbJvsM/G');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
