-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.160.152:3306
-- Время создания: Фев 19 2023 г., 17:44
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
(278, 'Домашние животные', 'сat', 'кот'),
(279, 'Домашние животные', 'kitten', 'котенок'),
(280, 'Домашние животные', 'dog', 'собака'),
(281, 'Домашние животные', 'hamster', 'хомяк'),
(282, 'Домашние животные', 'parrot', 'попугай'),
(283, 'Домашние животные', 'guinea pig', 'морская свинка'),
(284, 'Фермерские животные', 'chicken', 'курица'),
(285, 'Фермерские животные', 'rooster', 'петух'),
(286, 'Фермерские животные', 'turkey', 'индейка'),
(287, 'Фермерские животные', 'gobbler', 'индюк'),
(288, 'Фермерские животные', 'goat', 'коза'),
(289, 'Фермерские животные', 'sheep', 'овца'),
(290, 'Фермерские животные', 'ram', 'баран'),
(291, 'Фермерские животные', 'lamb', 'ягненок'),
(292, 'Фермерские животные', 'bull', 'бык'),
(294, 'Фермерские животные', 'cow', 'корова'),
(295, 'Фермерские животные', 'horse', 'лошадь'),
(296, 'Фермерские животные', 'stallon', 'жеребек'),
(297, 'Фермерские животные', 'colt', 'жеребенок'),
(298, 'Фермерские животные', 'mare', 'кобыла'),
(299, 'Фермерские животные', 'pig', 'свинья'),
(300, 'Фермерские животные', 'sow', 'самка свиньи'),
(301, 'Фермерские животные', 'piglet', 'поросенок'),
(302, 'Фермерские животные', 'rabbit', 'кролик'),
(304, 'Части головы', 'head', 'голова'),
(305, 'Части головы', 'face', 'лицо'),
(306, 'Части головы', 'forehead', 'лоб'),
(307, 'Части головы', 'ear', 'ухо'),
(308, 'Части головы', 'eye', 'глаз'),
(309, 'Части головы', 'cheek', 'щека'),
(310, 'Части головы', 'nose', 'нос'),
(311, 'Части головы', 'mouth', 'рот'),
(312, 'Части головы', 'chin', 'подбородок'),
(313, 'Части головы', 'neck', 'шея'),
(314, 'Органы', 'brain', 'мозг'),
(315, 'Органы', 'trachea', 'трахея'),
(316, 'Органы', 'lungs', 'легкие'),
(317, 'Органы', 'heart', 'сердце'),
(318, 'Органы', 'liver', 'печень'),
(319, 'Органы', 'stomach', 'желудок'),
(320, 'Органы', 'kidneys', 'почки'),
(321, 'Органы', 'intestines', 'кишечник'),
(322, 'Органы', 'larynx', 'гортань'),
(323, 'Органы', 'arteries', 'артерии'),
(324, 'Органы', 'gallbladder', 'желчный пузырь'),
(325, 'Органы', 'spleen', 'селезенка'),
(326, 'Органы', 'urinary bladder', 'мочевой пузырь'),
(327, 'Органы', 'appendix', 'аппендикс'),
(328, 'Овощи', 'Potato', 'картофель'),
(329, 'Овощи', 'Tomato', 'помидор'),
(330, 'Овощи', 'Carrot', 'морковь'),
(331, 'Овощи', 'Cabbage', 'капуста'),
(332, 'Овощи', 'Pepper', 'перец'),
(333, 'Овощи', 'Eggplant', 'баклажан'),
(334, 'Овощи', 'Cauliflower', 'цветная капуста'),
(335, 'Овощи', 'Onion', 'лук'),
(336, 'Овощи', 'Garlic', 'чеснок'),
(337, 'Овощи', 'Parsley', 'петрушка'),
(338, 'Овощи', 'Celery', 'сельдерей'),
(339, 'Овощи', 'Radish', 'редиска'),
(340, 'Овощи', 'Cucumber', 'огурец'),
(341, 'Овощи', 'Beets', 'свекла'),
(342, 'Овощи', 'Ginger', 'имбирь');

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
(487, 95, 'one', 'один'),
(488, 95, 'two', 'два'),
(489, 95, 'three', 'три'),
(490, 95, 'four', 'четыре');

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
(81, '111111', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', 1, 1),
(82, '222222', '8d2e1d45e47aeaeaad4c908af5e66b1fbe877609fcd31e9f07bc3e210d817d5924dd23039f8c96bce732b34956e3e96a97f72b86850c8ce03c975444899b501c', 1, NULL),
(83, '3132123231', '25498ea40376aa5c8a279479fedf9dd9d8a45e0e014cd6527ec6ec5081cdf0a56f3f323470e475819e4cb6ab8d0c333f3a51eac1fca9ba1de75745c66ce29f53', NULL, NULL),
(92, '41234312', '0125c6c0b1be373c61b8a46c64696e3228b94b69071b1af0c8b08f3a69d53088e256e617ce2821390a2ca748ccf855d44d79fa09e05fcc59f9a7a1e9948e8d51', NULL, 1),
(93, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(96, '111111111111111111111111111111', 'e51ff1957f5b97fdaa2c525fa61ac6414e6481ff6f4d61fd53766bafb043f2237879d96e2a730d33877e2eb5b63df8a2e5afec516f5ac38399aa969b61d7ff0a', NULL, NULL),
(98, 'My_Test_Login', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', 1, NULL),
(99, '12121212', '591f110c5f0e1bdce3ce99ee4d25a60959f343e90d120e4d473e3ccae5811d5d07cd991a64b6f18ef670b772d48adbb9c08206bb99e621b60046b3921b204b77', NULL, NULL),
(100, 'ae', 'ыаывавы', NULL, NULL),
(101, 'фвапрп', 'sfsdf', NULL, NULL),
(102, 'asdfd', 'asdfd', NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT для таблицы `learned_words`
--
ALTER TABLE `learned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `unlearned_words`
--
ALTER TABLE `unlearned_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
