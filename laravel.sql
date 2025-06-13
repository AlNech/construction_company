-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Июн 05 2025 г., 09:58
-- Версия сервера: 8.0.42
-- Версия PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_processed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `name`, `phone`, `email`, `message`, `is_processed`, `created_at`, `updated_at`) VALUES
(5, 'test1', '79123123123', 'example@example.com', 'test1', 1, '2025-05-29 10:16:11', '2025-05-29 10:19:54');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2025_05_27_124108_create_services_table', 1),
(20, '2025_05_27_124910_create_portfolios_table', 1),
(21, '2025_05_27_125429_create_news_table', 1),
(22, '2025_05_27_142445_create_applications_table', 1),
(23, '2025_05_28_032046_update_fields_users_table', 1),
(25, '2025_05_28_134255_update_fields_portfolio_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `publish_date`, `is_published`, `created_at`, `updated_at`) VALUES
(2, 'Завершение строительства жилого комплекса \"Эко-Хаус\"', 'zaversenie-stroitelstva-zilogo-kompleksa-eko-xaus', 'Наша компания успешно завершила строительство жилого комплекса \"Эко-Хаус\" с применением энергоэффективных технологий.', 'Мы рады сообщить о сдаче в эксплуатацию нового жилого комплекса \"Эко-Хаус\". Проект включает 5 этажей, 120 квартир и подземный паркинг. При строительстве использовались энергосберегающие технологии: солнечные панели, система рекуперации тепла и \"умное\" освещение. Все квартиры сданы с чистовой отделкой, а придомовая территория благоустроена детскими площадками и зонами отдыха. Наши клиенты уже оценили качество и комфорт нового жилья!', 'https://stroi.mos.ru/uploads/cache/gallery_media_full/gallery_media/0002/51/cc4d17ede9a154efea5885a34ee723ffd34b947c.jpeg', '2025-12-12', 1, '2025-05-30 10:01:47', '2025-05-30 10:01:47'),
(3, 'Внедрение BIM-технологий в проектирование', 'vnedrenie-bim-texnologii-v-proektirovanie', 'Наша компания переходит на BIM-моделирование для повышения точности расчетов и сокращения сроков строительства. Теперь каждый проект будет детализирован в 3D.', 'Мы внедряем Building Information Modeling (BIM) – цифровое проектирование, позволяющее создавать точные 3D-модели зданий. Это минимизирует ошибки, ускоряет процесс строительства и снижает затраты. BIM помогает визуализировать объект на всех этапах, от фундамента до инженерных сетей. Наши клиенты смогут увидеть будущий дом еще до начала работ и внести корректировки. Технология уже применяется в новых проектах.', 'https://egov-buryatia.ru/upload/iblock/43f/43f2d63c92508ff8c5a4fefff67ad867.jpeg', '2025-10-10', 1, '2025-05-30 10:05:07', '2025-05-30 10:05:07'),
(4, 'Специальные условия на ремонт офисных помещений', 'specialnye-usloviia-na-remont-ofisnyx-pomeshhenii', 'До конца месяца действует скидка 15% на комплексный ремонт офисов. Мы предлагаем дизайн, отделку и монтаж инженерных систем под ключ.', 'Строительная компания запускает акцию – скидка 15% на ремонт офисных помещений до 30 июня. В услуги входят: разработка дизайн-проекта, демонтаж, черновая и чистовая отделка, установка вентиляции, электрики и сантехники. Мы используем экологичные материалы и современное оборудование, гарантируя качество и соблюдение сроков. Успейте оставить заявку и получить выгодное предложение!', 'https://www.saturn163.ru/wp-content/uploads/2022/08/delta1.webp', '2025-05-30', 1, '2025-05-30 10:08:21', '2025-05-30 10:08:21');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `project_date` date NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `service_id`, `description`, `images`, `project_date`, `client`, `sort_order`, `is_active`, `created_at`, `updated_at`, `short_description`) VALUES
(4, 'Жилой комплекс \"Северный\"', 'сomplex-sever', 20, 'Жилой комплекс \"Северный\" — это современный многоэтажный комплекс в Москве, сочетающий комфорт, экологичность и удобную инфраструктуру. Проект включает просторные квартиры с панорамными окнами, подземный паркинг, благоустроенную территорию с зонами отдыха и детскими площадками. Отделка фасадов выполнена из качественных материалов, а планировки продуманы для максимального удобства жителей.\r\n\r\nРасположение обеспечивает отличную транспортную доступность — рядом магистрали, станции метро и социальные объекты (школы, детские сады, торговые центры). В ЖК \"Северный\" применяются энергоэффективные технологии, что снижает затраты на коммунальные услуги.', '\"[\\\"https:\\\\/\\\\/avatars.mds.yandex.net\\\\/get-altay\\\\/1592431\\\\/2a0000016b460e4632dfb2c61374815fcc31\\\\/XXL_height\\\",\\\"https:\\\\/\\\\/img.ridus.ru\\\\/images2\\\\/04\\\\/38\\\\/80438_1600x1020.webp\\\",\\\"https:\\\\/\\\\/avatars.mds.yandex.net\\\\/i?id=2a7144204cd79583d8c73e7b3f213f27_l-5332625-images-thumbs&n=13\\\"]\"', '2025-12-12', 'ООО SMART DEVELOPER', 0, 1, '2025-05-30 08:46:35', '2025-05-30 09:10:33', 'Многоэтажный жилой комплекс в Москве'),
(5, 'Проект \"Европейский квартал\"', 'proekt-cvartal', 20, 'Эксклюзивный проект жилого комплекса премиум-класса \"Европейский квартал\", расположенный в живописном и экологически благополучном районе Подмосковья. Этот современный жилой ансамбль сочетает в себе европейские стандарты качества, продуманную инфраструктуру и гармоничную архитектуру, создающую особую атмосферу уюта и престижа.\r\n\r\nКомплекс состоит из семи элегантных монолитно-кирпичных корпусов высотой от 6 до 14 этажей, объединенных единым архитектурным стилем. Просторные квартиры с панорамным остеклением отличаются тщательно проработанными планировками и высококачественной отделкой. На территории расположены собственный детский сад, фитнес-центр с бассейном, кафе и прогулочные зоны с ландшафтным дизайном. Подземный паркинг и система \"умный дом\" обеспечивают дополнительный комфорт для жителей.\r\n\r\nОсобое внимание уделено энергоэффективности - в проекте использованы современные теплоизоляционные материалы и инженерные решения, позволяющие минимизировать эксплуатационные расходы. Удобная транспортная доступность и развитая социальная инфраструктура делают \"Европейский квартал\" идеальным выбором для тех, кто ценит качество жизни.', '\"[\\\"https:\\\\/\\\\/avatars.mds.yandex.net\\\\/get-altay\\\\/11400839\\\\/2a0000018c34b67dbb176f37d2831b4b649e\\\\/XXL_height\\\",\\\"https:\\\\/\\\\/i.pinimg.com\\\\/736x\\\\/c2\\\\/98\\\\/83\\\\/c29883df57df1c9137c9c7acbe18f669.jpg\\\",\\\"https:\\\\/\\\\/vmasshtabe.ru\\\\/app\\\\/uploads\\\\/2016\\\\/04\\\\/375149-vms-Bezyimyannyiy.png\\\"]\"', '2025-12-12', 'ООО Иванов И.А.', 0, 1, '2025-05-30 09:08:52', '2025-05-30 09:08:52', 'Проект премиум-класса в экологически чистом районе Подмосковья'),
(6, 'Загородный коттедж \"Лесная Усадьба\"', 'cottedg-zagorodny', 19, 'В живописном уголке Подмосковья, окруженном хвойным лесом, расположился уютный коттеджный поселок \"Лесная Усадьба\". Наша строительная компания предлагает возведение современных загородных домов площадью от 120 до 250 м² по индивидуальным и типовым проектам. Каждый коттедж выполнен из экологичных материалов - клееного бруса и газобетона, с применением энергосберегающих технологий.\r\n\r\nПросторные планировки с каминами, панорамным остеклением и террасами создают атмосферу настоящего семейного гнезда. На участках предусмотрены ландшафтный дизайн, автономные коммуникации и места для парковки. Доступная транспортная доступность (30 км от МКАД) сочетается с преимуществами загородной жизни - чистым воздухом и тишиной.', '\"[\\\"https:\\\\/\\\\/www.avk-project.com\\\\/images\\\\/cottages\\\\/eskis-proekt\\\\/4.jpg\\\",\\\"https:\\\\/\\\\/www.avk-project.com\\\\/images\\\\/cottages\\\\/eskis-proekt\\\\/5.jpg\\\",\\\"https:\\\\/\\\\/www.avk-project.com\\\\/images\\\\/cottages\\\\/eskis-proekt\\\\/9.jpg\\\",\\\"https:\\\\/\\\\/www.avk-project.com\\\\/images\\\\/cottages\\\\/eskis-proekt\\\\/11.jpg\\\"]\"', '2020-12-12', 'ООО АВК ПРОЕКТ', 0, 1, '2025-05-30 09:19:09', '2025-05-30 09:19:09', 'Уютный коттедж среди леса с современными коммуникациями.');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `short_description`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`, `icon`) VALUES
(19, 'Архитектурное проектирование', 'arxitekturnoe-proektirovanie', 'Наша студия архитектурного проектирования предлагает полный комплекс услуг по созданию проектной документации для объектов любой сложности. Мы разрабатываем уникальные архитектурные решения, сочетающие функциональность, эстетику и экономическую эффективность. В процессе работы учитываем все пожелания клиента, особенности участка, климатические условия и требования нормативных документов. Наши проекты включают: эскизное проектирование с 3D-визуализацией, рабочие чертежи, инженерные разделы, спецификации материалов. Особое внимание уделяем энергоэффективности зданий, продумываем естественное освещение и вентиляцию. Для коммерческих объектов проводим анализ потоков посетителей и персонала. Предоставляем услуги авторского надзора и сопровождения проекта на всех этапах реализации.', 'Разработка индивидуальных проектов жилых и коммерческих зданий с учетом всех пожеланий клиента и требований нормативов.', 'https://avatars.mds.yandex.net/get-altay/6477742/2a0000018281a27f8e5b343d44c573ca58de/XXXL', 0, 1, '2025-05-28 20:56:11', '2025-05-28 20:56:11', 'fa-drafting-compass'),
(20, 'Строительство под ключ', 'stroitelstvo-pod-kliuc', 'Компания осуществляет строительство объектов \"под ключ\" с гарантией качества 10 лет. В наш комплекс услуг входят: геодезические работы, устройство фундаментов (ленточных, плитных, свайных), возведение несущих конструкций (монолитных, кирпичных, каркасных), монтаж кровельных систем, установка окон и дверей, наружная отделка фасадов (штукатурка, облицовка камнем, вентилируемые фасады), внутренние отделочные работы (стяжка полов, шпаклевка стен, покраска, поклейка обоев, укладка плитки), монтаж инженерных систем (электрика, сантехника, отопление, вентиляция, кондиционирование). Мы используем только сертифицированные материалы от проверенных поставщиков, применяем современные строительные технологии. Каждый этап работ проходит многоуровневый контроль качества. Предоставляем поэтапную отчетность с фотофиксацией процесса.', 'Полный цикл строительных работ от нулевого цикла до финишной отделки. Гарантия качества на всех этапах.', 'https://i.pinimg.com/736x/f8/4f/63/f84f63199ac2456fd4bad459c959530c.jpg', 0, 1, '2025-05-28 20:56:11', '2025-05-28 20:56:11', 'fa-home'),
(21, 'Ландшафтный дизайн', 'landsaftnyi-dizain', 'Наши специалисты по ландшафтному дизайну создадут уникальный проект благоустройства вашего участка, учитывая рельеф местности, состав почвы, климатические особенности и ваши пожелания. В услуги входит: разработка концепции с 3D-визуализацией, проектирование систем полива и освещения, планировка зон отдыха (патио, беседки, площадки для барбекю), устройство дорожек и подпорных стенок, создание искусственных водоемов и фонтанов, посадка деревьев и кустарников, оформление цветников и альпийских горок, укладка газонов. Мы используем качественные материалы: натуральный камень, тротуарную плитку, декоративные покрытия. Особое внимание уделяем подбору растений, которые будут хорошо расти в вашем регионе. Предоставляем услуги по дальнейшему обслуживанию участка: стрижка газонов, обрезка растений, подготовка к зиме.', 'Создание гармоничного пространства вокруг вашего дома. Озеленение, мощение, системы полива и освещение.', 'https://s0.rbk.ru/v6_top_pics/media/img/2/92/756533447990922.jpg', 0, 1, '2025-05-28 20:56:11', '2025-05-28 20:56:11', 'fa-tree'),
(22, 'Реконструкция зданий', 'rekonstrukciia-zdanii', 'Каждый проект, который мы берём в работу, требует особого внимания и индивидуального подхода, ведь каждое здание уникально и имеет свои особенности. Процесс реконструкции начинается с тщательного анализа объекта. Наши специалисты проводят детальное обследование здания, выявляя все слабые места и оценивая состояние несущих конструкций. На основе полученных данных разрабатывается проект, который учитывает все пожелания заказчика и современные требования к безопасности и функциональности. После утверждения проекта начинается этап реализации. Мы используем только проверенные и качественные материалы, а также современные технологии, которые позволяют добиться максимальной эффективности и долговечности. Наши инженеры и строители работают слаженно и профессионально, выполняя все работы в строгом соответствии с проектной документацией и нормативными требованиями.', 'Модернизация и перепланировка существующих зданий с увеличением полезной площади или изменением назначения.', 'https://bigfoto.name/photo/uploads/posts/2023-03/1678077965_bigfoto-name-p-perestroika-zdaniya-4.jpg', 0, 1, '2025-05-28 21:04:20', '2025-05-28 21:04:20', 'fa-hammer'),
(23, 'Техническое обслуживание', 'texniceskoe-obsluzivanie', 'Каждый проект, который мы берём в работу, требует особого внимания и индивидуального подхода, ведь каждое здание уникально и имеет свои особенности.\r\nПроцесс реконструкции начинается с тщательного анализа объекта. Наши специалисты проводят детальное обследование здания, выявляя все слабые места и оценивая состояние несущих конструкций. На основе полученных данных разрабатывается проект, который учитывает все пожелания заказчика и современные требования к безопасности и функциональности.\r\nПосле утверждения проекта начинается этап реализации. Мы используем только проверенные и качественные материалы, а также современные технологии, которые позволяют добиться максимальной эффективности и долговечности. Наши инженеры и строители работают слаженно и профессионально, выполняя все работы в строгом соответствии с проектной документацией и нормативными требованиями.\r\nОсобое внимание уделяется сохранению исторического облика зданий, если это предусмотрено проектом. Мы бережно относимся к архитектурным деталям и элементам, стараясь сохранить их первоначальный вид и при этом внедрить современные решения, которые повысят комфорт и функциональность объекта.', 'Комплексное обслуживание зданий и инженерных систем. Регулярные проверки и оперативное устранение неисправностей.', 'https://aktavest.ru/wp-content/uploads/2021/01/Tehnicheskoe-obsluzhivanie-zdanij-po-grafiku-i-po-vyzovam.jpg', 0, 1, '2025-05-28 21:06:33', '2025-05-28 21:16:12', 'fa-tools');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$gaT7r5VzVMVFiEbkF34ivOGCsLNuP5zLCyzKQGs.KVtnGTaGq7ibO', 'JjZYIZG0Vm4NrcC1h6SLqlQ41cuB2yP5LFUpLPAyb8KmcjWtSCIXxzhVHV0I', '2025-05-28 11:28:22', '2025-05-28 11:28:22', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_slug_unique` (`slug`),
  ADD KEY `portfolios_service_id_foreign` (`service_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
