-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.160.152:3306
-- Время создания: Фев 18 2023 г., 18:03
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
-- Структура таблицы `categories_words`
--

CREATE TABLE `categories_words` (
  `id` int NOT NULL,
  `category` varchar(40) NOT NULL,
  `word` text NOT NULL,
  `translate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories_words`
--

INSERT INTO `categories_words` (`id`, `category`, `word`, `translate`) VALUES
(15, 'цифры', 'one', 'один'),
(16, 'цифры', 'two', 'два'),
(17, 'цифры', 'three', 'три'),
(18, 'цифры', 'four', 'четыре');

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
(245, 84, 'orange', 'оранжевый'),
(246, 84, 'four', 'четыре'),
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
(453, 93, '2', '2'),
(454, 93, '3', '3'),
(455, 93, 'fsdfdsa', 'fasdfdsafd'),
(457, 93, '111', '11'),
(458, 93, '123123', '123243'),
(465, 93, '7987', '111111111'),
(466, 93, '77987897', '231321231321'),
(467, 93, '7897987', '75654654'),
(468, 93, '7987897', '200000'),
(469, 93, 'one', 'один'),
(470, 93, 'two', 'два'),
(471, 93, 'three', 'три'),
(472, 93, 'four', 'четыре'),
(473, 93, 'one', 'один'),
(474, 93, 'two', 'два'),
(475, 93, 'three', 'три'),
(476, 93, 'four', 'четыре');

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
-- Индексы таблицы `categories_words`
--
ALTER TABLE `categories_words`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `categories_words`
--
ALTER TABLE `categories_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `learned_words`
--
ALTER TABLE `learned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `unlearned_words`
--
ALTER TABLE `unlearned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
