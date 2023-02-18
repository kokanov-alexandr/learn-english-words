-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.160.152:3306
-- Время создания: Фев 18 2023 г., 14:21
-- Версия сервера: 8.0.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `learn_english_words`
--

-- --------------------------------------------------------

--
-- Структура таблицы `learned_words`
--

CREATE TABLE `learned_words` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `word` text NOT NULL,
  `ltanslate` text NOT NULL,
  `date_learned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `unlearned_words`
--

CREATE TABLE `unlearned_words` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `word` text NOT NULL,
  `translate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `unlearned_words`
--

INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES
(4, 38, 'ss', 'sss'),
(5, 39, 'www', 'www'),
(6, 39, 'ww', 'wwt'),
(7, 40, 'ghj', 'jkljkl'),
(8, 40, 'klj', 'jlkjlk'),
(176, 41, 'fdsfds', 'fasdf'),
(177, 41, '111', '111'),
(178, 41, 'свысыв', 'сывсв'),
(179, 41, '', ''),
(180, 41, '', ''),
(181, 41, '', ''),
(182, 41, '', ''),
(183, 41, '', ''),
(184, 41, '', ''),
(185, 42, '1234', '4123'),
(234, 73, 'авмама', 'фычыф'),
(235, 79, 'hi', 'привет'),
(236, 79, 'buy', 'пока'),
(243, 84, 'cat', 'кот'),
(244, 84, 'dog', 'собака'),
(245, 84, 'orange', 'оранжевый'),
(246, 84, 'four', 'четыре'),
(247, 84, 'one', 'один'),
(248, 84, 'two', 'два'),
(249, 84, 'куц', 'йкйуц'),
(250, 84, 'куцrereqw', 'йкйуцrwrew'),
(251, 84, 'rwere', 'e'),
(252, 84, 'арпа', 'hnh'),
(253, 84, 'арпа4234', 'hnh42343'),
(254, 84, '232', 'hmjhmj'),
(262, 85, 'fine', 'хорошо'),
(263, 85, 'five', 'пять'),
(264, 85, 'four', '4'),
(265, 85, 'six', 'шесть'),
(268, 87, 'йуцкйуц', 'йцкцу'),
(269, 87, 'кйцуку', 'кйуцкуцк'),
(270, 87, '42214', '12412'),
(271, 87, '4123', '1234'),
(272, 87, '23', '232323'),
(273, 87, 'sdvsdds', 'vsdvdsvsd'),
(274, 90, 'rewqr', 'qrewq'),
(275, 90, 'ewee', 'eee'),
(276, 90, '11111111', '1111111'),
(277, 90, '11111111adsfads', '111111fdsfds1'),
(366, 95, 'cheers', 'ваше здоровье'),
(367, 95, 'comrades', 'товарищи'),
(368, 95, 'council', 'совет'),
(369, 95, 'cover', 'покрытие'),
(370, 95, 'crown', 'корона'),
(371, 95, 'does not care', 'всё равно'),
(372, 95, 'enough', 'достаточно'),
(373, 95, 'enterprise', 'предприятие'),
(374, 95, 'explanation', 'объяснение'),
(375, 95, 'factory', 'завод'),
(376, 95, 'fell', 'выпал'),
(377, 95, 'hell', 'ад, чёрт'),
(378, 95, 'hide', 'прятать, скрывать'),
(379, 95, 'keep', 'держать, сохранять'),
(380, 96, '2', '2'),
(381, 96, '3', '3'),
(382, 96, '4', '4'),
(383, 96, '5', '4'),
(384, 96, '6', '6'),
(386, 97, '11111111', '111111111'),
(443, 93, '1', '22'),
(444, 93, '2', '2'),
(446, 93, '134123', '124132');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `privilege` int DEFAULT NULL,
  `ban` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `privilege`, `ban`) VALUES
(78, '412334', '22e7e9d85b7fe6004f7b9f3aa592ea9ec9ce098682e8192fa83785f1784c768d1d1ac3b8afcae88666f66aec24739ac133e9d4adc7506f1a5f1f6078cb27c674', 1, 1),
(80, 'rucode4user382431232', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', 1, 1),
(81, '111111', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', 1, 1),
(82, '222222', '8d2e1d45e47aeaeaad4c908af5e66b1fbe877609fcd31e9f07bc3e210d817d5924dd23039f8c96bce732b34956e3e96a97f72b86850c8ce03c975444899b501c', 1, NULL),
(83, '3132123231', '25498ea40376aa5c8a279479fedf9dd9d8a45e0e014cd6527ec6ec5081cdf0a56f3f323470e475819e4cb6ab8d0c333f3a51eac1fca9ba1de75745c66ce29f53', NULL, NULL),
(84, 'Коканов Александр', 'fc06d8be6e7971aece2a7dc531ab823d0cc8886ce344ddaae122563f6eb875a20ece532dbf9fc8d354e22ea62ad15b4cf693b118f0dfa215b55f91eb1a5b518d', NULL, NULL),
(85, 'rucode4user382414234', '1878bdb49929bcf9136413af381b8fc01010a4ebce87b77fed9b736deeef1436fc1fcc0ace834132d5f799ff8d26e976dbdd07f9a9c989263c09f76a98a2a1f6', NULL, NULL),
(86, 'rucode4user3824роролр', 'e818abce0083d24e366b6a6eddde7b4f42395a47d5af01ea18ea2d6c190a754fe768b8bf0963dd1ca80627f4afe3a80b5fa5ab8cc8595c7e1f534d280f5c9598', NULL, NULL),
(88, 'rucode5-user-0840', '3b276823683869f7f22617b9460a7b30dfcb95f1ba804d15eac2c50a080745a54fac8de6a4a135d07c73d20be3236afecc44ea85cb560414ce852164df79a3c6', NULL, NULL),
(89, 'kokanov142343', '967b589bdb7d4029dbb74d625c4ee0f6e2efc97fcf1154a7cc0441b90741cd309921bb74174485451143c5fcb8ee13126a39917900ebb19136bfabe2e45fdcca', NULL, 1),
(92, '41234312', '0125c6c0b1be373c61b8a46c64696e3228b94b69071b1af0c8b08f3a69d53088e256e617ce2821390a2ca748ccf855d44d79fa09e05fcc59f9a7a1e9948e8d51', NULL, 1),
(93, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(94, 'class=\"btn btn-outline-dark mt-2, mb-2\"', 'a3cc9fba9795ac121b347ea06669ea1fdbcc88aeaf144b87379ae41c957f88df1b488c9f57c84565818541f0cc7b3c5a106290ddab75dc928b5dc2b547b68052', NULL, NULL),
(95, 'kokanov', '62ac9eaad033df9af742fedd4f6a634a861d69580026669184efe4024e69e0942a5b4e762280fa5663139db654d0cea60efc2e4aa3db47547f3d26a4cb360cd1', NULL, NULL),
(96, '111111111111111111111111111111', 'e51ff1957f5b97fdaa2c525fa61ac6414e6481ff6f4d61fd53766bafb043f2237879d96e2a730d33877e2eb5b63df8a2e5afec516f5ac38399aa969b61d7ff0a', NULL, NULL),
(97, 'rucode4user3824xasxas', 'f19e42e3fc5ea9fe39ee6d20cd3db1aa79dc5163f0d67dcee89b39322560dde81e820f0cabc28b8195534fc9f60fed86c3d9b4ceec50a52ecbc2436d0f96f3f5', NULL, NULL),
(98, 'My_Test_Login', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `learned_words`
--
ALTER TABLE `learned_words`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `unlearned_words`
--
ALTER TABLE `unlearned_words`
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
-- AUTO_INCREMENT для таблицы `learned_words`
--
ALTER TABLE `learned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `unlearned_words`
--
ALTER TABLE `unlearned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
