-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 04:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `commics`
--

CREATE TABLE `commics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commics`
--

INSERT INTO `commics` (`id`, `title`, `name`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Supreme Demon Warrior ,妖者为王', 'Rise Of The Demon King', 'https://static.youmadcdn.xyz/thumb/rise-of-the-demon-king.png', 'You are reading Rise Of The Demon King manga, one of the most popular manga covering in Action, Adventure, Comedy, Fantasy, Martial arts, Shounen, Webtoons genres, written by Ai Lu Mao, Yao Ye, Qing Man at MangaBuddy, a top manga site to offering for read manga online free. Rise Of The Demon King has 256 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Rise Of The Demon King to your bookmark.\r\n\r\nThe young Xiao Lang awakened with a Divine Spirit, but the others believed it to be a useless one. He was ridiculed by everyone and some even sent assassins after him, thus forcing him to leave his clan. From then on, he surpassed his limits and attained unimaginable strength! \"If the Heavens restrict me, then I shall break the Heavens!\"', 'Ongoing', NULL, NULL),
(2, '异世界和智能手机在一起 ; 異世界はスマートフォンとともに ; In a Different World with a Smartphone ; Isekai Smartphone ; Isekai wa smartphone to tomoni ; 이세계는 스마트폰과 함께', 'In Another World With My Smartphone', 'https://static.youmadcdn.xyz/thumb/in-another-world-with-my-smartphone.png', 'You are reading In Another World With My Smartphone manga, one of the most popular manga covering in Action, Comedy, Drama, Fantasy, Harem, Mecha, Romance, Shounen, Slice of life genres, written by Fuyubaru Patra at MangaBuddy, a top manga site to offering for read manga online free. In Another World With My Smartphone has 61 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add In Another World With My Smartphone to your bookmark.\r\n\r\nAfter a freak accident involving some lightning winds up zapping him dead, 15-year-old Mochizuki Touya wakes up to find himself face-to-face with God. \"I am afraid to say that I have made a bit of a blunder\" laments the old coot. But all is not lost! God says that he can reincarnate Touya into a world of fantasy, and as a bonus, he gets to bring his smartphone along with! So begins Touya\'s adventure in a new, anachronistic pseudo-medieval world. Friends! Laughs! Tears! Inexplicable Deus ex Machina! He sets off on a journey full of wonder as he absentmindedly travels from place to place, following whatever goal catches his fancy. The curtains lift on an epic tale of swords, sorcery, and smartphone apps!', 'Ongoing', NULL, NULL),
(3, 'Versatile Mage', 'Versatile Mage', 'https://static.youmadcdn.xyz/thumb/versatile-mage.png', 'You are reading Versatile Mage manga, one of the most popular manga covering in Action, Adventure, Drama, Fantasy, Martial arts, School life, Supernatural, Tragedy genres, written by Chaos at MangaBuddy, a top manga site to offering for read manga online free. Versatile Mage has 779 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Versatile Mage to your bookmark.\r\n\r\n', 'Ongoing', NULL, NULL),
(4, 'Curse of Gods and demons; God of Demons; Бог Демонов; 神魔天煞', 'Vengeance Of The Heavenly Demon', 'https://static.youmadcdn.xyz/thumb/vengeance-of-the-heavenly-demon.png', 'You are reading Vengeance Of The Heavenly Demon manga, one of the most popular manga covering in Adventure, Fantasy, Martial arts, Seinen, Supernatural genres, written by Shi Bu Ci Yuan at MangaBuddy, a top manga site to offering for read manga online free. Vengeance Of The Heavenly Demon has 123 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Vengeance Of The Heavenly Demon to your bookmark.\r\n\r\nSurprise! Mu Tian Ran has been set up, his martial arts skills crippled at the hands of his own brother. Not only that, he\'s been rejected by his own family, who tortured him only to finally disown him and throw him out, all because he has the Bloodline of a Slave. At the lowest point of his life, a mysterious man arrives to mentor him and help him develop his own hidden talents. It turns out that his Bloodline, which was so repugnant to mankind, is actually a gift from the Heavens called the \"Heavenly Demon Bloodline,\" making Mu Tian Ran an extremely rare child said to be favored by the gods themselves. As he grows stronger, Mu Tian Ran begins his journey to wreak vengeance on those who had shamed him in the past.', 'Ongoing', NULL, NULL),
(5, 'Yarichin ☆ Bitch Club ; ヤリチン☆ビッチ', 'Yarichin Bitch Club', 'https://static.youmadcdn.xyz/thumb/yarichin-bitch-club.png', 'You are reading Yarichin Bitch Club manga, one of the most popular manga covering in Comedy, School life, Smut, Yaoi genres, written by Ogeretsu Tanaka at MangaBuddy, a top manga site to offering for read manga online free. Yarichin Bitch Club has 34 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Yarichin Bitch Club to your bookmark.\r\n\r\nDESCRIPTION by Koyukiya An all-boys boarding school deep in the mountains where love unfolds. Despite the brimming sexual desire, the overly awkward love story hooks you in! First year Toono transfers from Tokyo to the all-boys boarding school deep in the mountains, \"Mori Moori Private School\". The friendly Yaguchi who calls out to him becomes his only friend, but his dislike of sports makes him join the most laid-back looking photography club instead of Yaguchi\'s soccer club. However, the photography club is in name only, and is actually nicknamed the \"Yarichin Bitch Club\", filled with colourful seniors. In contrast to the troubled Toono, Kajima , who joined the club at the same time, is completely unphased and even slips a confession to Toono into the confusion. Toono himself thinks Yaguchi is cute, but Yaguchi finds himself blushing around Kajima and stuff happens. Furthermore, complications arise between the seniors', 'Ongoing', NULL, NULL),
(6, '神厨狂后\r\n', 'Holy Chef, Crazy Empress', 'https://static.youmadcdn.xyz/thumb/holy-chef-crazy-empress.png', 'You are reading Holy Chef, Crazy Empress manga, one of the most popular manga covering in Comedy, Drama, Fantasy, Harem, Historical, Romance, Webtoons genres, written by Young Dream at MangaBuddy, a top manga site to offering for read manga online free. Holy Chef, Crazy Empress has 275 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Holy Chef, Crazy Empress to your bookmark.\r\nThe top killer of the 21st century crossed time and space into the Cold Palace as a useless Empress. To have a good life in the harem, you need to be good in the Royal Kitchen and excellent in the Emperor bed. There is a super handsome and evil-minded husband and a cute baby genius - not to forget the superb Royal Kitchen system for lotteries. Conquer this dapper man with a pot and a spoon, dominate the harem and embark on the pinnacle of life!\r\n\r\n', 'Ongoing', NULL, NULL),
(7, '熱血江湖 (Chinese); 열강; 열혈강호 (Korean); Burning Blood Kangho; Hiệp Khách Giang Hồ (Vietnamese - Tiếng Việt - TV); Dragon; Sabre et Dragon (French); The Ruler of the Land (English); Yul Hyul Gang Ho; Yul Hyul Kang Ho; Yulgang; Yeolhyeol Gangho', 'Ruler Of The Land', 'https://static.youmadcdn.xyz/thumb/ruler-of-the-land.png', 'You are reading Ruler Of The Land manga, one of the most popular manga covering in Action, Adult, Adventure, Comedy, Drama, Historical, Martial arts, Romance, Manhwa genres, written by JEON Geuk-jin at MangaBuddy, a top manga site to offering for read manga online free. Ruler Of The Land has 563 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Ruler Of The Land to your bookmark.\r\n\r\nBi-Kwang is a handsome young warrior who becomes a drooling mess whenever he sees a pretty girl. Out on the road he meets an extraordinary swordfighter with no name who is searching for a legendary master warrior. Bi-Kwang promises to aid the swordfighter if he lets Bi-Kwang meet his beautiful sister. Of course, it turns out the swordfighter is the sister, Hwa-Rin Dahm, and she must switch identities to keep the plot moving along. Bi-Kwang is immediately smitten, and thus we have a triangle involving only two people.', 'Ongoing', NULL, NULL),
(8, 'Cultivation Chat Group', 'Cultivation Chat Group', 'https://static.youmadcdn.xyz/thumb/cultivation-chat-group.png', 'You are reading Cultivation Chat Group manga, one of the most popular manga covering in Action, Comedy, Martial arts, School life genres, written by Legend Of The Sacred Knight at MangaBuddy, a top manga site to offering for read manga online free. Cultivation Chat Group has 383 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Cultivation Chat Group to your bookmark.\r\n\r\nOne day, Song Shuhang was suddenly added to a chat group with many seniors that suffered from chuuni disease. The people inside the group would call each other Fellow Daoist\' and had all different kinds of titles: Palace Master, Cave Lord, True Monarch, Immortal Master, etc. And even the pet of the founder of the group that had run away from home was called monster dog\'. They would talk all day about pill refining, exploring ancient ruins, or share their experience on techniques.However, after lurking inside the group for a while, he discovered that not all was what it seemed', 'Ongoing', NULL, NULL),
(9, 'ブラッククローバー ; 黑色五叶草 ; Black Five Leaf Grass', 'Black Clover', 'https://static.youmadcdn.xyz/thumb/black-clover.png', 'You are reading Black Clover manga, one of the most popular manga covering in Action, Adult, Comedy, Fantasy, Sci fi, Shounen, Supernatural genres, written by Tabata Yuuki at MangaBuddy, a top manga site to offering for read manga online free. Black Clover has 324 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add Black Clover to your bookmark.\r\n\r\nFrom MangaHelpers: Aster and Yuno were abandoned together at the same church, and have been inseparable since. As children, they promised that they would compete against each other to see who would become the next sorcerous emperor. However, as they grew up, some differences between them became plain. Yuno was a genius with magic, with amazing power and control, while Aster could not use magic at all, and tried to make up for his lack by training physically. When they received their grimoires at age 15, Yuno got a spectacular book with a four-leaf-clover (most people receive a three-leaf-clover), while Aster received nothing at all. However, when Yuno was threatened, the truth about Asterpower was revealed-- he received a five-leaf-clover grimoire, a black cloverbook of anti-magic. Now the two friends are heading out in the world, both seeking the same goal! + Last GameManga Next Chapter (Next Issue) Black Clover chapter 324 online for free Black Clover chapter 325 online for free Black Clover chapter 326 online for free', 'Ongoing', NULL, NULL),
(10, 'One Piece', 'One Piece', 'https://static.youmadcdn.xyz/thumb/one-piece.png', 'You are reading One Piece manga, one of the most popular manga covering in Action, Adventure, Comedy, Drama, Fantasy, Shounen genres, written by Oda Eiichiro at MangaBuddy, a top manga site to offering for read manga online free. One Piece has 1047 translated chapters and translations of other chapters are in progress. Lets enjoy.\r\nIf you want to get the updates about latest chapters, lets create an account and add One Piece to your bookmark.\r\n\r\nAs a child, Monkey D. Luffy dreamed of becoming the King of the Pirates. But his life changed when he accidentally gained the power to stretch like rubber...at the cost of never being able to swim again! Now Luffy, with the help of a motley collection of nakama, is setting off in search of \"One Piece,\" said to be the greatest treasure in the world...', 'Ongoing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_10_19_134053_create_model_products_table', 1),
(3, '2021_10_19_152449_create_genres_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commics`
--
ALTER TABLE `commics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commics`
--
ALTER TABLE `commics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
