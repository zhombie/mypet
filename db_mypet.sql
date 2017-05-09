-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2017 г., 15:13
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_mypet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clinic`
--

CREATE TABLE `clinic` (
  `clinicId` int(11) NOT NULL,
  `clinicName` varchar(60) NOT NULL,
  `userIIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `clinic`
--

INSERT INTO `clinic` (`clinicId`, `clinicName`, `userIIN`) VALUES
(1, 'apple', 54321);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctorIIN` int(11) NOT NULL,
  `userName` varchar(60) CHARACTER SET utf8 NOT NULL,
  `userSurname` varchar(60) CHARACTER SET utf8 NOT NULL,
  `userIIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id`, `doctorIIN`, `userName`, `userSurname`, `userIIN`) VALUES
(1, 54321, 'Адам', 'Сэндлер', 123456789),
(3, 54321, 'test', 'tester', 12345);

-- --------------------------------------------------------

--
-- Структура таблицы `feed`
--

CREATE TABLE `feed` (
  `feedId` int(11) NOT NULL,
  `feedHeading` varchar(100) CHARACTER SET utf8 NOT NULL,
  `feedDate` varchar(60) NOT NULL,
  `feedText` text CHARACTER SET utf8 NOT NULL,
  `feedImg` text CHARACTER SET utf8 NOT NULL,
  `userEmail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `feed`
--

INSERT INTO `feed` (`feedId`, `feedHeading`, `feedDate`, `feedText`, `feedImg`, `userEmail`) VALUES
(1, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', 'mask.jpg', 'test@test.kz'),
(2, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', '', 'test@test.kz'),
(3, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', 'ameba.jpg', 'test@test.kz'),
(4, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', 'mask.jpg', 'test@test.kz'),
(5, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', '', 'test@test.kz'),
(6, 'Lorem ipsum', '07/07/2017', 'Lorem ipsum dolor sit amet, te affert causae eirmod usu, sea omnes qualisque id, vis at vocent intellegat argumentum. Virtute pertinax vim no, ad mel quis doctus efficiendi, nobis repudiare temporibus ex vel.', 'ameba.jpg', 'test@test.kz'),
(7, 'Test', '8/6/2017', 'TestTestTestTestTestTestTest', '', 'test@test.kz'),
(8, 'Test2', '8/6/2017', 'TestTestTestTestTestTestTest', '', 'test@test.kz'),
(9, 'Test3', '8/6/2017', 'TestTestTestTestTestTestTest', '', 'test@test.kz'),
(10, 'qwer', '', 'qwerqwer', '', 'test@test.kz'),
(11, 'Test4', '', 'test4test4', '', 'test@test.kz'),
(12, 'Test5', '', 'test5test5', '', 'doctor@doctor.kz'),
(13, 'Test6', '18/04/2017', 'test6atest6atest6atest6atest6atest6atest6atest6atest6atest6a', '', 'test@test.kz'),
(14, 'Test7 img', '18/04/2017', 'imgimgimgimgimgimgimgimgimgimgimgimgimgimgimgimgimg', 'parrot-1394537_1280.png', 'test@test.kz'),
(15, 'Test8 img', '18/04/2017', 'imgimgimgimgimgimgimgimgimg', '0', 'test@test.kz'),
(16, 'Test9 img', '18/04/2017', 'tests', '0', 'test@test.kz'),
(17, 'Test10 img', '18/04/2017', 'testststsetsetsetsetste', '0', 'test@test.kz'),
(20, 'Test11', '18/04/2017', 'shut ', 'Shut-up-and-take-my-money.jpg', 'test@test.kz'),
(21, 'Test12', '20/04/2017', 'asdkjfhaslkdjfalksdhfalkshdflajksdfasdfasdfasdfasdf', 'animalli.com-animals-cats-pets-dogs-amazing-funny-animal-image-1600x900.jpg', 'test@test.kz'),
(22, '????????????????', '20/04/2017', '?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????', 'steve.png', 'test@test.kz'),
(23, 'qwer', '20/04/2017', 'qer', 'dobr.jpg', 'test@test.kz'),
(24, 'Тест13', '20/04/2017', 'тест тест тест', 'logo.png', 'test@test.kz'),
(25, 'Тест', '20/04/2017', 'тест', 'ameba.jpg', 'test@test.kz'),
(26, 'Lorem Ipsum', '23/04/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget mi nisi. Ut mauris velit, maximus vel odio sit amet, aliquam tincidunt leo. Sed eu scelerisque metus. Pellentesque interdum lacinia euismod. Mauris elit metus, volutpat sit amet nunc at, placerat congue enim. Donec aliquam turpis nec pretium lobortis. Etiam in blandit felis. Suspendisse laoreet erat elit, ut elementum diam lacinia eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent arcu ante, convallis a dignissim a, pellentesque eget sem. Sed facilisis sem quis porttitor semper. Suspendisse eget risus porta, mollis tortor nec, imperdiet ex. Pellentesque ultricies imperdiet luctus. Proin sodales velit vel tortor vulputate sagittis. Fusce sit amet augue hendrerit dolor blandit efficitur. Nunc blandit arcu vel massa ornare, vitae lobortis arcu egestas.', 'mask.jpg', 'adam_sandler@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `med_karta`
--

CREATE TABLE `med_karta` (
  `id` int(11) NOT NULL,
  `petCategory` varchar(60) CHARACTER SET utf8 NOT NULL,
  `userIIN` int(11) NOT NULL,
  `receipt_date` varchar(60) CHARACTER SET utf8 NOT NULL,
  `respiration` text CHARACTER SET utf8 NOT NULL,
  `temperature` text CHARACTER SET utf8 NOT NULL,
  `heart_rate` text CHARACTER SET utf8 NOT NULL,
  `frequency` text CHARACTER SET utf8 NOT NULL,
  `soznanie` text CHARACTER SET utf8 NOT NULL,
  `state` text CHARACTER SET utf8 NOT NULL,
  `complaint` text CHARACTER SET utf8 NOT NULL,
  `research_result` text CHARACTER SET utf8 NOT NULL,
  `initial_diagnosis` text CHARACTER SET utf8 NOT NULL,
  `final_diagnosis` text CHARACTER SET utf8 NOT NULL,
  `treatment_recom` text CHARACTER SET utf8 NOT NULL,
  `note` text CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `med_karta`
--

INSERT INTO `med_karta` (`id`, `petCategory`, `userIIN`, `receipt_date`, `respiration`, `temperature`, `heart_rate`, `frequency`, `soznanie`, `state`, `complaint`, `research_result`, `initial_diagnosis`, `final_diagnosis`, `treatment_recom`, `note`) VALUES
(6, 'Собака', 123456789, '18/18/18', 'дыха1', 'темп1', 'пульс1', 'частота1', 'созна1', 'состоя1', 'жалоы1', 'резлуь1', 'певр1', 'заклю1', 'леч1', 'прим1'),
(7, 'Кот', 123456789, '12/12/12', 'дыхание', '31', 'сре', 'частота', 'сознание', 'общее', 'жалобы', 'результат', 'перво', 'заключит', 'лечение', 'примечание');

-- --------------------------------------------------------

--
-- Структура таблицы `pet`
--

CREATE TABLE `pet` (
  `petId` int(11) NOT NULL,
  `petCategory` varchar(60) NOT NULL,
  `petDobDay` int(11) NOT NULL,
  `petDobMonth` int(11) NOT NULL,
  `petDobYear` int(11) NOT NULL,
  `userIIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet`
--

INSERT INTO `pet` (`petId`, `petCategory`, `petDobDay`, `petDobMonth`, `petDobYear`, `userIIN`) VALUES
(1, 'Собака', 13, 11, 1993, 12345),
(32, 'Собака', 19, 1, 2000, 124),
(33, 'Собака', 13, 3, 1999, 68464),
(34, 'Собака', 1, 1, 2010, 1234567),
(35, 'Собака', 1, 1, 2010, 123456789),
(36, 'Собака', 2, 2, 2017, 411),
(37, 'Птица', 1, 1, 2016, 12312),
(38, 'Кот', 18, 2, 2001, 123456789),
(39, 'Птица', 19, 2, 2000, 123456789);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userSurname` varchar(50) NOT NULL,
  `userIIN` int(15) NOT NULL,
  `userAddress` varchar(60) NOT NULL,
  `userEmail` varchar(60) CHARACTER SET latin1 NOT NULL,
  `userBirthdate` varchar(50) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userType` int(11) NOT NULL,
  `userAvatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userId`, `userName`, `userSurname`, `userIIN`, `userAddress`, `userEmail`, `userBirthdate`, `userPass`, `userType`, `userAvatar`) VALUES
(1, 'test', 'tester', 12345, '', 'test@test.kz', '', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 0, ''),
(2, 'doctor', 'surname', 54321, 'sdu', 'doctor@doctor.kz', '7/7/1967', '5f0a9c7f624afc79798e66d7fe80c2f0b85553e2d663fbabd45d4c47645e79b0', 1, 'dobr.jpg'),
(17, 'qwer', '', 124, '', 'qwer@a.a', '18/02/1938', '70f98078fb2c7d7bfb3ae17330b91eaa018110b03896979b4c88bfaed3805906', 0, ''),
(18, 'qwer', '', 68464, '', 'qwer@a.kz', '', '70f98078fb2c7d7bfb3ae17330b91eaa018110b03896979b4c88bfaed3805906', 0, ''),
(19, 'Тест', 'Тест', 1234567, 'Тест', 'test@gmail.com', '', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, ''),
(20, 'Адам', 'Сэндлер', 123456789, 'Бруклин, Нью-Йорк, США', 'adam_sandler@gmail.com', '09/09/1966', 'b6ad34b0b6b7e38f878a513b3f7927ebeb4cffb01aeb6d9fd9f9ad67fbc76517', 0, 'adam.jpg'),
(21, 'asdasd', '', 411, '', 'asdasd@a.a', '18/02/1999', '5fd924625f6ab16a19cc9807c7c506ae1813490e4ba675f843d5a10e0baacdb8', 0, ''),
(22, 'qqq', '', 12312, '', 'qqq@a.a', '17/01/1999', 'b6197fe0d62a4e463edd2925382d4d268c4fce0859378682608efa4fda326f26', 0, 'mask.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicId`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feedId`);

--
-- Индексы таблицы `med_karta`
--
ALTER TABLE `med_karta`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `feed`
--
ALTER TABLE `feed`
  MODIFY `feedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `med_karta`
--
ALTER TABLE `med_karta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `pet`
--
ALTER TABLE `pet`
  MODIFY `petId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
