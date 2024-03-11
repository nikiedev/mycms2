-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 07 2022 г., 19:32
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mycms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_intro` text COLLATE utf8mb4_unicode_ci,
  `text_full` text COLLATE utf8mb4_unicode_ci,
  `images` json DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `page` tinyint(1) NOT NULL DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `rating` float(2,1) NOT NULL DEFAULT '0.0',
  `rating_count` int(11) DEFAULT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `likes` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `comments_on` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT '2021-06-30 15:04:58',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `meta_title`, `meta_desc`, `text_intro`, `text_full`, `images`, `featured`, `page`, `home`, `rating`, `rating_count`, `hits`, `likes`, `status`, `comments_on`, `user_id`, `category_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Где лучше всего провести время летом?', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"intro-article-4.jpg\"}', 0, 0, 0, 4.5, 1, 12, 4, 1, 0, 1, 2, 'title-1', '2021-06-30 15:04:58', '2021-09-10 10:56:04'),
(2, 'Что брать с собой на Аляску? Советы эспертов-путешественников', 'Заголовок 1 (seo)', 'Описание 1 (seo)', NULL, '<p>Аляска — самый северный и самый большой по территории штат США, который издавна признан как туристический центр Америки. А для русского туриста Аляска — это не только золото, холод и гризли, но и что-то свое, родное. Штат состоит из материковой части и большого числа островов: архипелаг Александра, Алеутские острова, Острова Прибылова, остров Кадьяк, остров Св. Лаврентия. Омывается Северным Ледовитым и Тихим океанами. До сих пор для многих людей Аляска представляется бесконечным, нетронутым природным массивом. Изрезанные ущельями глетчеры, фьорды и заливы разбросаны на морском побережье. Зима — полновластная хозяйка этого края. Поэтому сюда едут за приключениями, экстримом, общением с природой и прохладой (летом погода на Аляске очень приятная!).</p><p class=\"ql-align-center\"><strong>На Аляску едут за приключениями, экстримом, общением с природой и прохладой.</strong></p><p>Столица «земли полуночного солнца», как называют Аляску, — город <a href=\"https://tonkosti.ru/%D0%94%D0%B6%D1%83%D0%BD%D0%BE\" rel=\"noopener noreferrer\" target=\"_blank\">Джуно</a>. Однако это не самый крупный и известный город штата. Излюбленное место туристов со всего мира — город Анкоридж, куда съезжаются все желающие побывать на этом краю земли с его нетронутой первозданной красотой.</p><h2>Как добраться</h2><p>Самое удобное перевалочное место для путешествия по всей Аляске — Анкоридж, в котором построили современный комфортабельный аэропорт. Еще бы! Именно Аляска считается первым местом в мире по количеству частных самолетов на душу населения, так как здесь невозможно передвигаться на автомобиле, только на авиатранспорте, ввиду отсутствия дорог в отдаленные части этого северного озерного штата. Перелет в крупнейший город штата из Москвы стоит от 55 000 RUB и занимает от одного дня. К слову, лететь придется с одной или двумя пересадками со стыковками в городах Канады, США или Европы, так что запаситесь терпением и чем-нибудь «почитать».</p><h2>Погода на Аляске</h2><p>Аляска характеризуется разнообразием климатических поясов в зависимости от региона. На континентальной части климат резко субарктический. Летом здесь температура достигает +30 °C, зимой падает до -52 °C. Лето достаточно сухое, зимой выпадает много снега. Однако в Джуно и Анкоридже зима теплее, чем в России, -6...-7 °C, а вот лето — холоднее, +18...+22 °C. Летняя погода на Аляске обычно очень приятна, с температурой около +20 °C на побережье и +25 °C на материке. Идея отправиться из 35-градусной городской жары в место, где всего лишь около +18...+20 °C, кажется крайне привлекательной многим соотечественникам. Лучшее время для посещения Аляски — с мая по сентябрь. Прекрасная погода для приключений на природе!</p><p class=\"ql-align-center\"><strong>Лучшее время для посещения Аляски — с мая по сентябрь.</strong></p><p>Оригинал статьи: <a href=\"https://tonkosti.ru/%D0%90%D0%BB%D1%8F%D1%81%D0%BA%D0%B0\" rel=\"noopener noreferrer\" target=\"_blank\">здесь</a>.</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": \"alyaska_214.jpg\", \"image_intro\": \"chugach-national-forest-1622635-1280.jpg\"}', 1, 0, 0, 5.0, 4, 3, 0, 1, 0, 1, 6, 'title-2', '2021-06-30 15:04:58', '2021-11-27 19:30:20'),
(3, 'Заголовок 3', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"intro-article-3.jpg\"}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'zagolovok-3', '2021-06-30 15:04:58', '2021-09-13 14:20:21'),
(4, 'Что нужно знать туристу', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная часть 1', '<p>Описания еще нет...</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"4to-nyzno-znat-turisty.jpg\"}', 0, 0, 0, 3.0, 0, 0, 0, 1, 0, 1, 6, 'chto-nuzhno-znat-turistu', '2021-06-30 15:04:58', '2021-09-10 10:32:00'),
(5, 'Заголовок 5', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'title-5', '2021-06-30 15:04:58', '2021-09-10 10:35:34'),
(6, 'Заголовок 6', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"intro-article-4.jpg\"}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'zagolovok-6', '2021-06-30 15:04:58', '2021-09-11 19:53:16'),
(7, 'Заголовок 7', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 2, 0, 1, 0, '', '2021-06-30 15:04:58', NULL),
(8, 'Заголовок 8', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"robot_spider_3d.jpg\"}', 0, 0, 0, 4.7, 3, 0, 0, 1, 0, 1, 0, 'example', '2021-06-30 15:04:58', '2021-12-02 17:19:59'),
(9, 'О компании', 'О компании - Advant Travel', 'Описание компании Advant Travel.', 'Вступительная часть 1', '<p><strong>ADVANT Travel</strong> — это первое пользовательское онлайн-турагентство.</p><p>Наш онлайн сервис позволяет:</p><ul><li>онлайн находить, бронировать и приобретать туры</li><li>выбирать самое выгодное из всех предложений туроператоров</li><li>проводить поэтапную оплату</li><li>получать бонусы за пользование по прогрессивной программе лояльности, которые можно использовать для частичной оплаты будущих поездок</li><li>пользоваться службой поддержки 24/7</li></ul><p>Мы активно работаем над тем, чтобы вы могли выбирать и приобретать путешествия с комфортом, экономя силы, время и деньги и не портя предвкушение поездки бесконечным поиском, хлопотами и тревогами. Или исполнить желание — захотел, выбрал, купил все онлайн — и уже завтра ты в пути)</p><p><strong>ADVANT Travel</strong> — это сервис для людей, которые стремятся отдыхать в путешествиях в отпуске, на праздниках или даже на выходных.</p><p>Компания «Адвант Тревел» работает на рынке туристических услуг Украины с 2015 года. Лицензия субъекта туроператорской деятельности выдана на основании указа Министерства экономического развития Украины No 1358 от 30.10.2015.</p><p><img src=\"http://advant.com.ua/static/img/consumer_choice_2018_big.png\" alt=\"выбор потребителя 2018\"> <img src=\"http://advant.com.ua/static/img/consumer_choice_2019.png\" alt=\"выбор потребителя 2019\"></p><p>Национальное отличие \"Выбор потребителя\" 2018 и 2019 Ассоциации экономического сотрудничества и развития. По экспертной оценке Всеукраинского отраслевого аналитического центра, компания вошла в топ-3% приоритетных предприятий, как одна из наиболее значительных в туристической отрасли и была внесена в реестр \"Лучших поставщиков товаров и услуг\".</p><p><img src=\"http://advant.com.ua/static/img/lider_galuzi.png\" alt=\"Лидер отрасли 2019\"></p><p>Медаль \"Лидер отрасли 2019\" – награда Национального бизнес-рейтинга. Золото рейтинга среди туристических предприятий Украины. Подтверждает эффективность ведения бизнеса, открытость в отношениях с государством, стремление к высоким стандартам отрасли.</p><p><img src=\"http://advant.com.ua/static/img/Kompania_roku_2018.png\" alt=\"Компания года 2018\"></p><p>Награда \"Компания года 2018\" присвооена на основе реестра надежности и инвестиционной привлекательности. Подтверждает, что предприятие является надежным партнером, престижным работодателем и предлагает качественные услуги</p><p><img src=\"http://advant.com.ua/static/img/lider_roku_2018.jpg\" alt=\"Лидер года 2018\"></p><p>Медаль и сертификат \"Лидер года 2018\" за выдающиеся финансово-экономические показатели в туристической отрасли по версии Национального бизнес-рейтинга. Доказательство эффективности деятельности предприятия, его вклада в развитие отрасли и экономики в целом</p><p>ООО «Адвант Тревел» — единственный официальный партнер международной группы компаний ADVANT и сервиса Advant Club в Украине.</p><p>Мы официально сотрудничаем с туристическими операторами и даем Клиентам для самостоятельного выбора базу из более 2 миллионов туров в 200 тысяч отелей в 39 странах мира (* Информация по состоянию на 01.01.2019).</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"bg-heading.jpg\"}', 0, 1, 0, 0.0, 0, 14, 0, 1, 0, 1, 0, 'o-kompanii', '2021-06-30 15:04:58', '2021-12-11 17:58:16'),
(10, 'Заголовок 10', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"chugach-national-forest-1622635-1280.jpg\"}', 0, 0, 0, 4.2, 4, 0, 25, 1, 0, 1, 5, 'apt', '2021-06-30 15:04:58', NULL),
(11, 'Бизнес-путешествие. Особенности и рекомендации', 'Заголовок 1 (seo)', 'Описание 1 (seo)', NULL, '<p>Класс Business — гарантия приятного полета. Вас ждут изысканные блюда, самая современная система развлечений и удобные кресла. Выбирая класс Business, Вы можете почувствовать себя особым гостем. Путешествуйте с максимальным комфортом и зарабатывайте мили Miles&Smiles.</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"4to-nyzno-znat-turisty2.jpg\"}', 0, 0, 0, 4.0, 0, 0, 0, 1, 0, 1, 6, 'long-travel', '2021-06-30 15:04:58', NULL),
(12, 'Заголовок 12', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 's2', '2021-06-30 15:04:58', NULL),
(13, 'Заголовок 13', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'simple', '2021-06-30 15:04:58', NULL),
(14, 'Заголовок 14', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 1, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, '', '2021-06-30 15:04:58', NULL),
(15, 'Заголовок 15', 'Заголовок 1 (seo)', 'Описание 1 (seo)', 'Вступительная честь 1', 'Полный текст', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, '', '2021-06-30 15:04:58', NULL),
(16, 'Как правильно выбрать тур?', NULL, NULL, 'Это очень просто...', '<p>Чтобы выбрать <strong>тур</strong> надо...</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'kak-pravilno-vibrat-tur', '2021-06-30 15:04:58', NULL),
(17, 'Куда поехать на Новый год?', NULL, NULL, 'некне', '<p>паыыуыу <strong>лдолдо </strong>лодо.</p><ol><li>орор</li><li>шгг</li><li>щщшз</li><li>ьлто</li></ol><p>ненг</p><p>ттштю.</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 4.0, 1, 0, 0, 1, 1, 1, 6, 'kuda-poekhat-na-noviy-god', '2021-06-30 15:04:58', '2021-12-09 17:36:06'),
(18, 'Какая добраться до Окинавы?', NULL, NULL, NULL, '<p>авыа укц авыавы авыаыв</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 6, 'kakaya-dobratsya-do-okinavi', '2021-06-30 15:04:58', NULL),
(19, 'Какая добраться на Мальдивы?', NULL, NULL, 'ло', '<p>гшн</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 0, 'kakaya-dobratsya-na-maldivi', '2021-06-30 15:04:58', NULL),
(20, 'Какие есть достопримечательности в Нью-Йорке?', NULL, NULL, 'dfgdgdf', NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"intro-article-1.jpg\"}', 0, 0, 0, 0.0, 0, 0, 0, 1, 0, 1, 2, 'kakie-est-dostoprimechatelnosti-v-nyu-yorke', '2021-09-10 06:12:04', '2021-09-10 10:52:15'),
(21, 'Контакты', NULL, NULL, NULL, NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 1, 0, 0.0, 0, 0, 0, 2, 0, 1, 0, 'kontakty', '2021-09-11 19:34:30', '2021-09-13 14:19:48'),
(22, 'Что интересного в Шри-Ланка?', NULL, NULL, NULL, '<p>Шри-Ланка (ранее Цейлон) – островное государство, расположенное в Индийском океане у юго-восточного побережья Индии. Страна славится своими разнообразными ландшафтами: на ее территории есть тропические леса и засушливые равнины, горные плато и песчаные пляжи. В Шри-Ланке стоит посетить развалины буддийской крепости Сигирия V века с остатками дворца и огромными фресками. В древней столице <span style=\"color: rgb(102, 102, 0);\">Шри-Ланки</span> Анурадхапуре сохранились многочисленные архитектурные памятники древности, возраст которых превышает 2000 лет.</p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"shri-lanka.jpg\"}', 0, 0, 0, 0.0, 0, 1, 0, 1, 1, 1, 12, 'chto-interesnogo-v-shri-lanka', '2021-12-09 18:11:20', '2021-12-10 15:48:35'),
(23, 'Достопримечательности Анталии', NULL, NULL, 'Горящие туры в Турцию - отдых на любой вкусПо данным Всемирной Туристской…', '<h2>Горящие туры в Турцию - отдых на любой вкус</h2><p>По данным Всемирной Туристской организации, в 2014 г. Турция заняла шестую позицию в десятке самых популярных в туристическом отношении стран мира. В прошлом году с целью туризма страну посетили почти 40 млн. человек. Для украинских туристов - Турция – направление №1: близость расположения и короткий авиаперелет; разнообразие пейзажей, мягкий климат и длительный курортный сезон; любые пляжи – песок, галька, скалы и любые отели в различных ценовых категориях; отличный сервис, множество достопримечательностей и, конечно, система All Inclusive, избавляющая от любых хлопот. А вы знаете, что All Inclusive было придумано и впервые воплощено в жизнь именно в Турции? Отсутствие визовых формальностей и бесплатная виза также влияют на выбор страны отдыха.</p><p>Ежегодно сотни тысяч наших сограждан приезжают сюда снова и снова, при этом в каждый свой приезд они открывают для себя новые грани этой поистине уникальной страны.</p><p><strong>10 причин, чтобы посетить Турцию:</strong></p><p>1.<strong> Курорты на любой вкус.</strong> Летом Турция предлагает отдых на Анталийском побережье (от демократичной Аланьи, молодежного Кемера до элитного Белека), а также на Эгейском побережье, где туристы будут восхищаться красивой природой Фетхие и Мармариса, европейским стилем отдыха в Бодруме, спокойствием Дидима и Кушадасы.</p><p>2.<strong> Благоприятный климат.</strong></p><p>3.<strong> Разнообразие отельной базы.</strong></p><p>4.<strong> Отдых, доступный по цене.</strong></p><p>5.<strong> Короткий авиаперелет и отсутствие визы.</strong></p><p>6.<strong> All Inclusive: Все оплачено!</strong> Знаете ли Вы, что система All Inclusive, была придумана именно в Турции?</p><p>7.<strong> Все лучшее – детям.</strong> Давно известно, что главный гость турецких отелей – ребенок! В целом ряде отелей Турции от 4* до 5*deluxe представлена наша концепция семейного отдыха Sun Family Club.</p><p>8.<strong> Музей под открытым небом.</strong> Турция является родиной многих цивилизаций, империй, исторических личностей и легенд.</p><p>9.<strong> Развлечения и шоппинг.</strong> В свободное время можно пройтись по многочисленным магазинам, торговым центрам, бутикам, рынкам, которые есть в каждом курортном поселке. Для особых любителей шоппинга – всемирно известный Великий базар Стамбула, привлекающий своими восточными красками, колоритными торговцами и ценами.</p><p>10.<strong> Конференции, симпозиумы, форумы.</strong> Круглогодично во многих отелях Турции, особенно на Анталийском побережье, проходят различные конференции, съезды, симпозиумы.</p><h2>Основные города и курорты Турции</h2><p>В Турции несколько крупных аэропортов, Coral Travel предлагает как чартерную полетную программу на основные морские курорты, так и туры в Стамбул регулярными авиалиниями - выбирайте что хотите!</p><p>Столица Турции – Анкара. Но, наверное, славу самого популярного города заслужил </p>', '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": \"antalia.jpg\"}', 0, 0, 0, 0.0, 0, 8, 0, 1, 1, 1, 12, 'dostoprimechatelnosti-antalii', '2021-12-09 18:21:03', '2021-12-09 18:21:27'),
(24, 'Отдых на Кипре', NULL, NULL, NULL, NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 1, 1, 0, 'otdikh-na-kipre', '2021-12-09 18:31:06', NULL),
(25, 'Санаторий в Чехии', NULL, NULL, NULL, NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 1, 1, 0, 'sanatoriy-v-chekhii', '2021-12-09 18:37:43', NULL),
(26, 'Отдых в Нидерландах', NULL, NULL, NULL, NULL, '{\"gallery\": null, \"alt_full\": null, \"alt_intro\": null, \"image_full\": null, \"image_intro\": null}', 0, 0, 0, 0.0, 0, 0, 0, 1, 1, 1, 0, 'otdikh-v-niderlandah', '2021-12-09 18:37:49', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_category`
--

CREATE TABLE `articles_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_category`
--

INSERT INTO `articles_category` (`id`, `parent_id`, `name`, `url`, `img`) VALUES
(1, 0, 'Разное', 'raznoe', NULL),
(2, 0, 'Публикации', 'blog', NULL),
(3, 2, 'Здоровье', 'health', NULL),
(4, 2, 'Красота', 'beauty', NULL),
(5, 3, 'БАДы', 'bady', NULL),
(6, 2, 'Туризм', 'turizm', NULL),
(7, 0, 'IT технологии', 'it-tekhnologii', NULL),
(8, 7, 'Криптовалюта', 'kriptovalyuta', NULL),
(9, 8, 'Cardano', 'cardano', NULL),
(10, 8, 'Safemoon', 'safemoon', '208476.jpg'),
(11, 2, 'Испания', 'spain', NULL),
(12, 0, 'Туры', 'tury', NULL),
(13, 12, 'Пакетные туры', 'paketnye-tury', NULL),
(14, 12, 'Автобусные туры', 'avtobusnye-tury', NULL),
(15, 12, 'Экскурсионные туры', 'ekskursionnye-tury', NULL),
(16, 12, 'Океанские и морские круизы', 'okeanskie-i-morskie-kruizy', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_status`
--

CREATE TABLE `articles_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_status`
--

INSERT INTO `articles_status` (`id`, `name`) VALUES
(1, 'Опубликовано'),
(2, 'Не опубликовано');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_tags`
--

CREATE TABLE `articles_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_tags`
--

INSERT INTO `articles_tags` (`id`, `name`, `url`) VALUES
(1, 'Новости', 'novosti'),
(2, 'Туризм', 'turizm'),
(3, 'Спорт', 'sport'),
(4, 'Здоровье', 'zdorovie'),
(5, 'Аквариумы', 'akvariumy'),
(6, 'Строительство 	', 'stroitelstvo'),
(7, 'Путешествие', 'puteshestvie'),
(8, 'Природа', 'priroda'),
(9, 'Поездки', 'poezdki'),
(10, 'Япония', 'yaponyia'),
(11, 'Лето', 'leto'),
(12, 'Нью-Йорк', 'nyu-york'),
(13, 'Город', 'gorod'),
(14, 'Строительство', 'stroitelstvo'),
(15, 'Пальмы', 'palmi'),
(16, 'Приключения', 'priklyucheniya'),
(17, 'Здания', 'zdaniya'),
(18, 'Лондон', 'london'),
(19, 'Аляска', 'alyaska'),
(20, 'Горы', 'gori'),
(21, 'Новогоднее', 'novogodnee');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_tags_ids`
--

CREATE TABLE `articles_tags_ids` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_tags_ids`
--

INSERT INTO `articles_tags_ids` (`id`, `article_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(5, 4, 3),
(7, 1, 7),
(8, 7, NULL),
(9, 8, 1),
(10, 8, 5),
(11, 8, 7),
(12, 19, 10),
(13, 19, 11),
(14, 20, 12),
(15, 20, 13),
(16, 20, 2),
(18, 5, 14),
(31, 3, 5),
(32, 3, 8),
(33, 3, 10),
(34, 1, 11),
(35, 2, 19),
(36, 2, 20),
(37, 2, 3),
(38, 2, 7),
(39, 17, 21),
(40, 17, 7),
(41, 26, 2),
(42, 26, 7),
(43, 26, 8),
(44, 26, 4),
(45, 4, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `article_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote_up` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `vote_down` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `thank` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '2021-06-30 15:04:59',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `article_id`, `user_id`, `comment`, `vote_up`, `vote_down`, `thank`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'Обычный комментарий 1', 3, 1, 1, '2021-06-30 15:04:59', NULL),
(2, 1, 1, 1, 'Обычный комментарий 2', 2, 0, 5, '2021-07-30 15:04:59', NULL),
(3, 1, 1, 1, 'Обычный комментарий 3', 11, 2, 10, '2021-08-30 15:04:59', NULL),
(4, 0, 1, 1, 'Обычный комментарий 4', 40, 0, 4, '2021-09-28 15:04:58', NULL),
(5, 4, 1, 1, 'Обычный комментарий 5', 25, 0, 7, '2021-09-30 15:04:31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `side_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `url`, `icon`, `type_id`, `side_id`, `order`) VALUES
(1, 0, 'Главная', 'admin/dashboard', 'tachometer-alt', 1, 1, 0),
(2, 0, 'Материалы', 'admin/articles', 'newspaper', 2, 1, 1),
(3, 2, 'Страницы', 'admin/page', 'file', 1, 1, 2),
(4, 2, 'Публикации', 'admin/article', 'file-alt', 1, 1, 3),
(5, 2, 'Категории', 'admin/category', 'folder', 1, 1, 4),
(6, 2, 'Метки', 'admin/tag', 'tag', 1, 1, 5),
(7, 2, 'Статусы', 'admin/article-status', 'check-square', 1, 1, 6),
(8, 0, 'Участники', 'admin/participants', 'user-shield', 2, 1, 7),
(9, 8, 'Пользователи', 'admin/user', 'user', 1, 1, 8),
(10, 8, 'Группы', 'admin/group', 'users', 1, 1, 9),
(11, 8, 'Статусы', 'admin/user-status', 'check-square', 1, 1, 10),
(12, 0, 'Навигация', 'admin/navigation', 'th-list', 2, 1, 11),
(13, 12, 'Меню', 'admin/menu', 'bars', 1, 1, 12),
(14, 12, 'Типы', 'admin/menu-type', 'list-alt', 1, 1, 13),
(15, 0, 'Комуникации', 'admin/communications', 'comments', 2, 1, 14),
(16, 15, 'Комментарии', 'admin/comment', 'comment', 1, 1, 15),
(17, 15, 'Сообщения', 'admin/message', 'envelope', 1, 1, 16),
(18, 15, 'Уведомления', 'admin/notification', 'bell', 1, 1, 17),
(19, 0, 'Расширения', 'admin/extensions', 'puzzle-piece', 2, 1, 19),
(20, 19, 'Модули', 'admin/module', 'dice-d6', 1, 1, 20),
(21, 19, 'Статусы', 'admin/module-status', 'check-square', 1, 1, 21),
(22, 0, 'Настройки', 'admin/settings', 'tools', 2, 1, 22),
(23, 22, 'Общие', 'admin/common', 'cogs', 1, 1, 23),
(24, 22, 'Профиль', 'admin/profile', 'user-cog', 1, 1, 24),
(25, 0, 'Информация', 'admin/information', 'info-circle', 2, 1, 27),
(26, 25, 'Документация', 'admin/docs', 'book', 1, 1, 28),
(27, 25, 'Техподдержка', 'admin/support', 'question-circle', 1, 1, 29),
(28, 0, 'Медиаменеджер', 'admin/media', 'photo-video', 1, 1, 18),
(29, 22, 'Обновления', 'admin/update', 'sync-alt', 1, 1, 25),
(30, 22, 'Безопасность', 'admin/security', 'shield-alt', 1, 1, 26),
(31, 0, 'Главная', '/', NULL, 1, 2, 0),
(32, 0, 'О компании', 'o-kompanii', NULL, 1, 2, 1),
(33, 0, 'Туры', 'tury', NULL, 1, 2, 2),
(34, 0, 'Блог', 'blog', NULL, 1, 2, 3),
(35, 35, 'Команда', 'team', NULL, 1, 2, 4),
(36, 0, 'Контакты', 'kontakty', NULL, 5, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_side`
--

CREATE TABLE `menu_side` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_side`
--

INSERT INTO `menu_side` (`id`, `name`) VALUES
(1, 'Admin Menu'),
(2, 'User Menu');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_types`
--

CREATE TABLE `menu_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_types`
--

INSERT INTO `menu_types` (`id`, `name`, `title`) VALUES
(1, 'item', 'Пункт'),
(2, 'separator', 'Разделитель'),
(3, 'link', 'Ссылка'),
(4, 'anchor', 'Якорь'),
(5, 'page', 'Страница');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `chain_number` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `chain_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-06-30 15:05:00',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `chain_number`, `chain_title`, `message`, `type_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Дата релиза', 'Когда релиз?', 1, 1, '2021-06-30 15:05:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `messages_types`
--

CREATE TABLE `messages_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages_types`
--

INSERT INTO `messages_types` (`id`, `name`) VALUES
(1, 'Частное сообщение'),
(2, 'Уведомление');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-06-28-111331', 'App\\Database\\Migrations\\Articles', 'default', 'App', 1625083498, 1),
(2, '2021-06-28-111415', 'App\\Database\\Migrations\\ArticlesCategory', 'default', 'App', 1625083498, 1),
(3, '2021-06-28-111559', 'App\\Database\\Migrations\\ArticlesStatus', 'default', 'App', 1625083499, 1),
(4, '2021-06-28-111632', 'App\\Database\\Migrations\\ArticlesTags', 'default', 'App', 1625083499, 1),
(5, '2021-06-28-111712', 'App\\Database\\Migrations\\ArticlesTagsIds', 'default', 'App', 1625083499, 1),
(6, '2021-06-28-112005', 'App\\Database\\Migrations\\Comments', 'default', 'App', 1625083500, 1),
(7, '2021-06-28-112030', 'App\\Database\\Migrations\\Menu', 'default', 'App', 1625083500, 1),
(8, '2021-06-28-112036', 'App\\Database\\Migrations\\MenuTypes', 'default', 'App', 1625083500, 1),
(9, '2021-06-28-112051', 'App\\Database\\Migrations\\Modules', 'default', 'App', 1625083500, 1),
(10, '2021-06-28-112053', 'App\\Database\\Migrations\\Messages', 'default', 'App', 1625083500, 1),
(11, '2021-06-28-112054', 'App\\Database\\Migrations\\MessagesTypes', 'default', 'App', 1625083501, 1),
(12, '2021-06-28-112058', 'App\\Database\\Migrations\\ModulesStatus', 'default', 'App', 1625083501, 1),
(13, '2021-06-28-112105', 'App\\Database\\Migrations\\Users', 'default', 'App', 1625083501, 1),
(14, '2021-06-28-112117', 'App\\Database\\Migrations\\UsersGroups', 'default', 'App', 1625083502, 1),
(15, '2021-06-28-112128', 'App\\Database\\Migrations\\UsersStatus', 'default', 'App', 1625083502, 1),
(16, '2021-06-28-173603', 'App\\Database\\Migrations\\Settings', 'default', 'App', 1625083502, 1),
(17, '2021-06-28-173617', 'App\\Database\\Migrations\\Subscriptions', 'default', 'App', 1625083502, 1),
(18, '2021-06-28-112055', 'App\\Database\\Migrations\\Notifications', 'default', 'App', 1625401669, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `modules_status`
--

CREATE TABLE `modules_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-07-04 07:27:49',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-06-30 15:05:02',
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2021-06-30 15:05:02', NULL, NULL),
(2, 3, '2021-06-30 15:05:02', NULL, NULL),
(3, 4, '2021-06-30 15:05:02', NULL, NULL),
(4, 5, '2021-06-30 15:05:02', NULL, NULL),
(5, 6, '2021-06-30 15:05:02', NULL, NULL),
(6, 7, '2021-06-30 15:05:02', NULL, NULL),
(7, 8, '2021-06-30 15:05:02', NULL, NULL),
(8, 9, '2021-06-30 15:05:02', NULL, NULL),
(9, 10, '2021-06-30 15:05:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_thanks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '2021-06-30 15:05:01',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `group_id`, `login`, `pass`, `first_name`, `last_name`, `patronymic`, `nickname`, `email`, `tel`, `img`, `speciality`, `info`, `total_thanks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$ATonPl2XoWdY6LUB5yzpNubVSWaR4ui78XHnMpxdp6ek5lBPJxZUS', 'Имя', 'Фамилия', 'Отчество', NULL, 'info@advant-prod.local', '+380634827733', NULL, 'Разработчик', NULL, 0, 1, '2021-06-30 15:05:01', NULL),
(2, 0, 'User2', '$2y$10$nZiuXi.6ikYMBo7MQuFlY.X.K0Jqd9MyW6GgZkYwkESE0n4FFIS3O', NULL, NULL, NULL, NULL, 'nikiedev@mail.ru', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(3, 0, 'User3', '$2y$10$z5P5Kpsz6hhKd6cwVu73qeFJB1oFnU4C3i5q8YugbTPqiOU5i0Mhy', NULL, NULL, NULL, NULL, 'ya.jeremy-fox@yandex.ua', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(4, 0, 'User4', '$2y$10$7JsQfx.89H3reSmM3B4qze9V/7ll57XkgUFHnyh8pnpq99ZNQzzIG', NULL, NULL, NULL, NULL, 'john@60963@bigmir.net', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(5, 0, 'User5', '$2y$10$mmOmmpdtbh6qm7k5ryrAgeTdtU8pMtgirrmmLBgEYNwU4cL6EkoI2', NULL, NULL, NULL, NULL, 'nikiedev.test@gmail.com', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(6, 0, 'user6', '$2y$10$ANhhhuXBELW2FgdwZ.KL3O6aWYduP5kb7vQSUisQ1dNlA2hR548Qe', NULL, NULL, NULL, NULL, 'john60963@mail.ru', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(7, 0, 'user7', '$2y$10$Eu9GQq7Nbi3taMx7BBtizug/zBvEJ3MIkzQfDnfvRNisPx1JVAJlG', NULL, NULL, NULL, NULL, 'momo@ukr.net', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(8, 0, 'user8', '$2y$10$IEzQO18LNqsLrFeugdEerubLP/SmxB1nV//nUvWsyNc.I4.tglh0W', NULL, NULL, NULL, NULL, 'momo1@ukr.net', NULL, NULL, NULL, NULL, 0, 0, '2021-06-30 15:05:01', NULL),
(9, 0, 'user9', '$2y$10$rndaS9Q3RKrBnX1LRSKq7OnT.GnpEHrcOafgEsJGzr1AUZ/xb5pN2', NULL, NULL, NULL, NULL, 'momo2@ukr.net', NULL, NULL, NULL, NULL, 0, 1, '2021-06-30 15:05:01', NULL),
(10, 0, 'user10', '$2y$10$3FELNa/qs3aa0j3hTKsCuevWuVYO9rxSkn17LcUzMKAvS.ZAHTlFS', NULL, NULL, NULL, NULL, 'ella@gmail.com', NULL, NULL, NULL, NULL, 0, 1, '2021-06-30 15:05:01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_group`
--

CREATE TABLE `users_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_group`
--

INSERT INTO `users_group` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь'),
(3, 'Редактор'),
(4, 'Подписчик');

-- --------------------------------------------------------

--
-- Структура таблицы `users_status`
--

CREATE TABLE `users_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_category`
--
ALTER TABLE `articles_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_status`
--
ALTER TABLE `articles_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_tags_ids`
--
ALTER TABLE `articles_tags_ids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_side`
--
ALTER TABLE `menu_side`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages_types`
--
ALTER TABLE `messages_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules_status`
--
ALTER TABLE `modules_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `articles_category`
--
ALTER TABLE `articles_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `articles_status`
--
ALTER TABLE `articles_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `articles_tags_ids`
--
ALTER TABLE `articles_tags_ids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `menu_side`
--
ALTER TABLE `menu_side`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `messages_types`
--
ALTER TABLE `messages_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `modules_status`
--
ALTER TABLE `modules_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
