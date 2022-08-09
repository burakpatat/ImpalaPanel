-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 29 Eyl 2021, 19:11:47
-- Sunucu sürümü: 8.0.21
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `impalapanel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `mail`, `number`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Poison Admin', 'admin', '$2y$10$PM83X1CvocbUBIdrOAb4m.YKwcQqS4.9USLhLBt7eCyvQep2V.ja.', 'info@impalasoftware.co', '5455258612', '/uploads/poison-admin.jpg', NULL, '2021-09-13 08:34:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0' COMMENT '0: Pasif, 1: Aktif',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `image`, `content`, `hit`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nea Makri de Yaşam', '/uploads/nea-makri-de-yasam.jpeg', '<p style=\"text-align: center; \">Deneme&nbsp;<span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme</span></p>', 21, 1, 'nea-makri-de-yasam', NULL, '2021-08-16 07:48:53', '2021-09-13 08:54:21'),
(2, 1, 'Nea Makri de Yaşam', '/uploads/nea-makri-de-yasam.jpeg', '<p style=\"text-align: center; \">Deneme&nbsp;<span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme&nbsp;</span><span style=\"font-size: 1rem;\">Deneme</span></p>', 0, 0, 'nea-makri-de-yasam', '2021-08-16 07:53:56', '2021-08-16 07:52:46', '2021-08-16 07:53:56'),
(3, 1, 'Kayaköy Hakkında', '/uploads/kayakoy-hakkinda.jpeg', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\"><span style=\"font-size: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: 100%;\">Hüzünlü bir hikaye, tarihe dikilen bir mihenk taşı, harika bir doğa, muhteşem bir hava ve sonunda sizi kucaklayacak eşsiz bir deneyim ve mutluluk... Evet bazılarınız anlamış, bazılarınız ise merak etmiş olabilirsiniz. Burası Kayaköy.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Geçmişi M.Ö 3000’li yıllara dayanan Fethiye #Kayaköy’de, Likya yolunun tam da başladığı yerde 3.500 m2 arazi üzerine kurulu Nea Makri Hotel, yemyeşil bir doğanın içinde 6 bungalov evden oluşuyor. Bungalov dediysek, aklınıza bambulardan yapılma salaş bir tesis gelmesin. Daha çok Amerikan tiny house tarzında inşa edilmiş, çevresiyle bütünleşmiş, şık, minik evler sizi karşılayacak. Gittik, inceledik ve biz çok beğendik.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Adını; mübadelede köyden göç edip, Atina yakınlarında mübadiller tarafından tekrar kurulan “Yeni Uzak Diyar” anlamına gelen şehirden alan tesis, dingin bir tatil geçirmek isteyenler için çok güzel bir alternatif...</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Nea Makri’nin kocaman bahçesinde havuza girmek ve dünyanın en eski ve en önemli yollarından biri olan, #Fethiye‘den başlayıp #Antalya’ya kadar devam eden #LikyaYolu’ndan Ölüdeniz‘e yürümek yapılacak aktiviteler arasında. Deniz sevenlerdenseniz, gemiler koyu, hatta #Ölüdeniz ve yakınlarındaki kristal berraklığındaki ve turkuaz rengindeki plajlar da sizi bekliyor olacak.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Eğer sonbahar veya ilkbahar aylarında ziyaret ederseniz de size özel bir tavsiyemiz olacak: Artık bir müze alanı olan köyü turlarken, tüm yol boyunca karşınıza çıkacak, yol kenarlarında bolca bulunan taze ve mis kokulu kekiklerden toplamayı unutmayın. Bir sonraki barbekünüzü yaparken kendi topladığınız kekiklerle marine etmeyi istemez misiniz?</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">✏️Gezerken Aldığımız Notlar:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Evler 35 m2, kestane ağacından yapılmış. İhtiyacınız olan herşeyi sığdırmışlar evlere, mutfak vs. Havuz bölümünün çevresi sedir ağacından yapılmış. Evler tek katlı veya dubleks şeklinde. Gayet lüks ve modern tasarıma sahip.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">Mesafeler: Denize 4 km, havaalanına 60 km, şehir merkezine 3 km.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(78, 78, 78); font-family: calibre, arial; font-size: 18px; text-align: justify;\">ekleme</p>', 26, 1, 'kayakoy-hakkinda', NULL, '2021-08-16 10:46:27', '2021-09-13 08:57:18'),
(4, 2, 'Poison', '/uploads/poison.jpeg', '<p style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); margin: 7px 0px 15px; color: rgb(66, 66, 66); font-family: &quot;PT Sans&quot;, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 17px;\">Dünyanın en saygın tv ve haber servislerinden birisi olan İngiltere merkezli BBC\'nin insanlara faydalı olacak makaleler hazırladığını biliyor muydunuz?&nbsp;</p><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); margin: 7px 0px 15px; color: rgb(66, 66, 66); font-family: &quot;PT Sans&quot;, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 17px;\">BBC\'nin arka bahçesi olarak nitelediğim bu servis genellikle insanlara faydalı bilgiler sunan içeriklerle dolu.&nbsp;</p><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); margin: 7px 0px 15px; color: rgb(66, 66, 66); font-family: &quot;PT Sans&quot;, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 17px;\">Kişisel gelişimden, ne, nasıl, neden temalı dergiler de bulabileceğiniz bu servisten az kişinin bildiği 13 içeriğe ulaşabileceğiniz bir galeri.&nbsp;</p><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); margin: 7px 0px 0px; color: rgb(66, 66, 66); font-family: &quot;PT Sans&quot;, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 17px;\">BBC\'nin, RSS servisi, Podcast servisi ve basın özetlerinin yer aldığı Türkçe kaynaklı internet sitesinin adresi ise;&nbsp;<span style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); font-weight: bolder;\"><a href=\"http://www.bbc.co.uk/turkce/\" target=\"_blank\" rel=\"nofollow\" data-trckimg=\"https://t.oned.io/onedio-inline-link.img\" class=\"external-link\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229, 231, 235, var(--tw-border-opacity)); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-blur:var(--tw-empty, ); --tw-brightness:var(--tw-empty, ); --tw-contrast:var(--tw-empty, ); --tw-grayscale:var(--tw-empty, ); --tw-hue-rotate:var(--tw-empty, ); --tw-invert:var(--tw-empty, ); --tw-saturate:var(--tw-empty, ); --tw-sepia:var(--tw-empty, ); --tw-drop-shadow:var(--tw-empty, ); --tw-filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow); --tw-backdrop-blur:var(--tw-empty, ); --tw-backdrop-brightness:var(--tw-empty, ); --tw-backdrop-contrast:var(--tw-empty, ); --tw-backdrop-grayscale:var(--tw-empty, ); --tw-backdrop-hue-rotate:var(--tw-empty, ); --tw-backdrop-invert:var(--tw-empty, ); --tw-backdrop-opacity:var(--tw-empty, ); --tw-backdrop-saturate:var(--tw-empty, ); --tw-backdrop-sepia:var(--tw-empty, ); --tw-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia); color: var(--text-anchor); text-decoration: inherit;\">http://www.bbc.co.uk/turkce/&nbsp;</a></span></p>', 2, 1, 'poison', NULL, '2021-09-13 08:21:08', '2021-09-13 08:26:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yaşam', 'yasam', 1, '2021-08-16 07:21:22', '2021-09-11 19:45:41'),
(2, 'Tatil', 'tatil', 1, '2021-09-13 08:19:04', '2021-09-13 08:19:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `configs`
--

INSERT INTO `configs` (`id`, `title`, `logo`, `favicon`, `active`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `github`, `created_at`, `updated_at`) VALUES
(1, 'Nea Makri', NULL, NULL, 1, 'https://www.facebook.com/%CE%9Dea-Makri-120796499780540/', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-13 20:26:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `topic`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Burak PATAT', 'poisonsoftwaredevelop@gmail.com', '0', 'denemedenemedenemedenemedenemedenemedenemedeneme', '2021-09-13 07:25:52', '2021-09-13 07:25:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `estates`
--

DROP TABLE IF EXISTS `estates`;
CREATE TABLE IF NOT EXISTS `estates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estatecategory_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0' COMMENT '0: Pasif, 1: Aktif',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatefeature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estateinfo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estates_estatecategory_id_foreign` (`estatecategory_id`),
  KEY `estates_estateinfo_foreign` (`estateinfo`),
  KEY `estates_estatefeature_foreign` (`estatefeature`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `estates`
--

INSERT INTO `estates` (`id`, `estatecategory_id`, `title`, `image`, `description`, `hit`, `status`, `slug`, `estatefeature`, `estateinfo`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nea Makri 1', '/uploads/nea-makri-11.jpeg|/uploads/nea-makri-12.jpeg|/uploads/nea-makri-13.jpeg|/uploads/nea-makri-14.jpeg', '<p><strong>deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;deneme&nbsp;</strong></p>', 0, 1, 'nea-makri-1', NULL, NULL, '123', '2021-09-28 20:22:34', '2021-09-07 09:51:33', '2021-09-28 20:22:34'),
(2, 1, 'Nea Makri 2', '/uploads/nea-makri-21.jpeg|/uploads/nea-makri-22.jpeg|/uploads/nea-makri-23.jpeg|/uploads/nea-makri-24.jpeg|/uploads/nea-makri-25.jpeg', '<p>Nea Makri2&nbsp;Nea Makri2Nea Makri2Nea Makri2Nea Makri2Nea Makri2Nea Makri2Nea Makri2Nea Makri2</p>', 0, 1, 'nea-makri-2', NULL, NULL, '250', NULL, '2021-09-08 09:23:13', '2021-09-13 08:11:55'),
(3, 1, 'Nea Makri 3', '/uploads/nea-makri-31.jpeg|/uploads/nea-makri-32.jpeg|/uploads/nea-makri-33.jpeg', '<p>asdasdasdasd</p>', 0, 1, 'nea-makri-3', NULL, NULL, '250', NULL, '2021-09-28 21:54:18', '2021-09-28 21:54:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `estate_categories`
--

DROP TABLE IF EXISTS `estate_categories`;
CREATE TABLE IF NOT EXISTS `estate_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `estate_categories`
--

INSERT INTO `estate_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Deniz Manzaralı', 'deniz-manzarali', 1, '2021-09-05 13:50:35', '2021-09-05 13:50:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `estate_features`
--

DROP TABLE IF EXISTS `estate_features`;
CREATE TABLE IF NOT EXISTS `estate_features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `features` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `estate_features`
--

INSERT INTO `estate_features` (`id`, `features`, `created_at`, `updated_at`) VALUES
(1, 'Doğa Manzarası', '2021-09-11 19:50:55', '2021-09-11 19:50:55'),
(2, 'Tarihi Destinasyon', '2021-09-11 19:51:09', '2021-09-11 19:51:09'),
(3, 'Havuz', '2021-09-11 19:52:22', '2021-09-11 19:52:22'),
(4, 'Bahçe', '2021-09-11 19:52:32', '2021-09-11 19:52:32'),
(5, 'Otopark', '2021-09-11 19:52:40', '2021-09-11 19:52:40'),
(6, 'Wifi', '2021-09-11 19:52:49', '2021-09-11 19:52:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `estate_infos`
--

DROP TABLE IF EXISTS `estate_infos`;
CREATE TABLE IF NOT EXISTS `estate_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` int NOT NULL,
  `bedroom` int NOT NULL,
  `bathroom` int NOT NULL,
  `heating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pool` int NOT NULL DEFAULT '0' COMMENT '0: Yok, 1: Var',
  `carpark` int NOT NULL DEFAULT '0' COMMENT '0: Yok, 1: Var',
  `area` int NOT NULL,
  `estateage` int NOT NULL,
  `floor` int NOT NULL,
  `swap` int NOT NULL DEFAULT '0' COMMENT '0: Yok, 1: Var',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `estate_infos`
--

INSERT INTO `estate_infos` (`id`, `room`, `person`, `bedroom`, `bathroom`, `heating`, `pool`, `carpark`, `area`, `estateage`, `floor`, `swap`, `created_at`, `updated_at`) VALUES
(1, '3+1', 2, 4, 3, 'Klima', 1, 1, 150, 2, 1, 0, '2021-09-05 13:52:26', '2021-09-05 13:52:26'),
(2, '3+1', 4, 2, 3, 'Klima', 1, 1, 150, 1, 1, 1, '2021-09-05 13:54:31', '2021-09-05 13:54:31'),
(3, '3+1', 2, 3, 2, 'Klima', 0, 0, 150, 1, 1, 0, '2021-09-06 13:51:22', '2021-09-06 13:51:22'),
(4, '3+1', 4, 4, 3, 'Klima', 0, 1, 150, 1, 1, 0, '2021-09-06 13:55:17', '2021-09-06 13:55:17'),
(5, '3+1', 1, 3, 4, 'Klima', 0, 1, 150, 2, 8, 0, '2021-09-06 15:19:10', '2021-09-06 15:19:10'),
(6, '3+1', 2, 1, 2, 'Klima', 1, 1, 150, 2, 8, 1, '2021-09-06 15:51:49', '2021-09-06 15:51:49'),
(7, '3+1', 2, 2, 3, 'Klima', 1, 0, 150, 2, 3, 1, '2021-09-06 16:10:03', '2021-09-06 16:10:03'),
(8, '3+1', 1, 1, 3, 'Klima', 1, 0, 150, 1, 1, 0, '2021-09-07 09:51:33', '2021-09-07 09:51:33'),
(9, '2+1', 2, 2, 2, 'Klima', 1, 1, 150, 1, 1, 0, '2021-09-08 09:23:13', '2021-09-08 09:23:13'),
(10, '1+25', 2, 3, 3, 'Klima', 0, 1, 150, 1, 1, 1, '2021-09-28 21:54:18', '2021-09-28 21:54:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feature_specials`
--

DROP TABLE IF EXISTS `feature_specials`;
CREATE TABLE IF NOT EXISTS `feature_specials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estatefeatures_id` bigint UNSIGNED NOT NULL,
  `estate_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `feature_specials`
--

INSERT INTO `feature_specials` (`id`, `estatefeatures_id`, `estate_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-09-05 13:52:26', '2021-09-05 13:52:26'),
(2, 1, 2, '2021-09-05 13:54:31', '2021-09-05 13:54:31'),
(3, 1, 3, '2021-09-06 13:51:22', '2021-09-06 13:51:22'),
(4, 1, 4, '2021-09-06 13:55:17', '2021-09-06 13:55:17'),
(5, 1, 5, '2021-09-06 15:19:10', '2021-09-06 15:19:10'),
(6, 1, 6, '2021-09-06 15:51:49', '2021-09-06 15:51:49'),
(7, 1, 7, '2021-09-06 16:10:03', '2021-09-06 16:10:03'),
(8, 1, 1, '2021-09-07 09:51:33', '2021-09-07 09:51:33'),
(9, 1, 2, '2021-09-08 09:23:13', '2021-09-08 09:23:13'),
(10, 1, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18'),
(11, 2, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18'),
(12, 3, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18'),
(13, 4, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18'),
(14, 5, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18'),
(15, 6, 3, '2021-09-28 21:54:18', '2021-09-28 21:54:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_21_134244_admin', 1),
(2, '2021_05_21_143640_articles', 1),
(3, '2021_05_21_143740_categories', 1),
(4, '2021_05_21_143816_pages', 1),
(5, '2021_05_21_143903_contact', 1),
(6, '2021_05_21_144019_configs', 1),
(7, '2021_05_26_141106_estatecategory', 1),
(8, '2021_05_26_141255_estateinfo', 1),
(9, '2021_05_26_141312_estatefeature', 1),
(10, '2021_05_28_000155_estate', 1),
(11, '2021_06_12_233626_create_feature_specials_table', 1),
(12, '2021_08_05_000931_reservation', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `villa_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villa_personcount` int NOT NULL,
  `checkin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0: Pasif, 1: Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `reservations`
--

INSERT INTO `reservations` (`id`, `villa_number`, `villa_personcount`, `checkin`, `checkout`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 2, '16 September, 2021', '24 September, 2021', 'Burak PATAT', 'poisonsoftwaredevelop@gmail.com', '+905455258612', 1, '2021-09-08 14:05:27', '2021-09-12 20:24:35'),
(3, '2', 2, '30 September, 2021', '07 October, 2021', 'Burak PATAT', 'poisonsoftwaredevelop@gmail.com', '+905455258612', 1, '2021-09-12 13:34:28', '2021-09-12 20:24:36'),
(4, '3', 2, '29 Eylül, 2021', '01 Ekim, 2021', 'Burak PATAT', 'develop@poisonsoftware.com', '+905455258612', 1, '2021-09-29 16:39:53', '2021-09-29 16:40:33'),
(5, '3', 2, '14-10-2021', '20-10-2021', 'Burak PATAT', 'develop@poisonsoftware.com', '+905455258612', 0, '2021-09-29 16:45:20', '2021-09-29 16:45:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
