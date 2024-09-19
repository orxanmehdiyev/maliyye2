-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 May 2019, 12:17:20
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `maliyye`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iqtisaditesnifat_bolme`
--

CREATE TABLE `iqtisaditesnifat_bolme` (
  `iqtisaditesnifat_bolme_id` int(11) NOT NULL,
  `iqtisaditesnifat_bolme_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `iqtisaditesnifat_bolme_kod` int(11) NOT NULL,
  `iqtisaditesnifat_bolme_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `iqtisaditesnifat_bolme_aciqlama` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iqtisaditesnifat_bolme`
--

INSERT INTO `iqtisaditesnifat_bolme` (`iqtisaditesnifat_bolme_id`, `iqtisaditesnifat_bolme_ad`, `iqtisaditesnifat_bolme_kod`, `iqtisaditesnifat_bolme_status`, `iqtisaditesnifat_bolme_aciqlama`) VALUES
(32, 'Əməyin ödənişi', 210000, '1', '<p><strong>210000. &ldquo;Əməyin &ouml;dənişi&rdquo;&nbsp;</strong>b&ouml;lməsinin xərclərinə <strong>&rdquo;211000. Əməkhaqqı&rdquo;</strong> və<strong> &rdquo;212000. Əməkhaqqı &uuml;zrə işəg&ouml;t&uuml;rənlərin &ouml;dənişləri&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrinin xərcləri daxil edilir.</p>'),
(33, 'Malların (işlərin və xidmətin) satınalınması', 220000, '1', '<p><strong>220000. &ldquo;Malların (işlərin və xidmətin) satınalınması&rdquo;</strong>&nbsp;b&ouml;lməsinə<strong>&nbsp;&ldquo;221000. Malların satın alınması&rdquo;</strong> və <strong>&ldquo;222000. İş və xidmətlərin alınması&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrinin xərcləri daxildir.</p>\r\n'),
(34, 'Köhnəlmə', 230000, '1', '<p><strong>230000. K&ouml;hnəlmə</strong></p>\r\n'),
(35, 'Faizlər üzrə ödənişlər', 240000, '1', '<p><strong>240000. &ldquo;Faizlər &uuml;zrə &ouml;dənişlər&rdquo;</strong>&nbsp;b&ouml;lməsinin xərclərində faizlərin &ouml;dənilməsi, borc vəsaitlərindən istifadəyə g&ouml;rə həyata ke&ccedil;irilən &ouml;dənişlər nəzərdə tutulur. Bu b&ouml;lmənin xərclərinə d&ouml;vlət idarəetmə orqanları tərəfindən alınan kreditə g&ouml;rə həyata ke&ccedil;irilən faiz &ouml;dənişləri ilə bağlı xərclər daxildir. B&ouml;lmənin xərclərinə borc vəsaitlərinin alınmasına y&ouml;nəldilmiş komisyon yığımları və ya maliyyələşmə kimi hesab edilən borcun əsas məbləği &uuml;zrə &ouml;dənişlərlə bağlı xərclər daxil edilmir. Bu b&ouml;lmə&nbsp;<strong>241000. &ldquo;Qeyri-rezidentlər &uuml;zrə &ouml;dənişlər&rdquo;</strong>, <strong>242000. &ldquo;D&ouml;vlət idarəetmə sektoru &uuml;zrə &ouml;dənişlər&rdquo;</strong> və <strong>243000. &ldquo;D&ouml;vlət idarəetmə sektoruna aid olmayan təşkilatlar &uuml;zrə &ouml;dənişlər&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(36, 'Subsidiyalar', 250000, '1', '<p><strong>250000. &ldquo;Subsidiyalar&rdquo;</strong>&nbsp;b&ouml;lməsinə d&ouml;vlət b&uuml;dcəsindən subsidiyaların ayrılması &uuml;zrə xərclər daxildir. Bu b&ouml;lmə <strong>&ldquo;251000. Nax&ccedil;ıvan Muxtar Respublikasının b&uuml;dcəsinə subsidiyalar&rdquo;, &ldquo;252000. Yerli b&uuml;dcələrə subsidiyalar&rdquo;</strong> və <strong>&ldquo;253000. H&uuml;quqi şəxslərə subsidiyalar&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(37, 'Qrantlar və digər ödənişlər', 260000, '1', '<p><strong>260000. &ldquo;Qrantlar və digər &ouml;dənişlər&rdquo;</strong>&nbsp;b&ouml;lməsinin xərclərinə məqsədli maliyyə təyinatı &uuml;zrə əvəzsiz verilən qrantlar və digər &ouml;dənişlər daxildir. Bu b&ouml;lmə <strong>&ldquo;261000. Rezidentlərə verilən qrantlar və digər &ouml;dənişlər&rdquo;</strong> və <strong>&ldquo;262000. Qeyri-rezidentlərə verilən qrantlar və digər &ouml;dənişlər&rdquo; </strong>k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(38, 'Sosial ödənişlər', 270000, '1', '<p><strong>270000. &ldquo;Sosial &ouml;dənişlər&rdquo;</strong>&nbsp;b&ouml;lməsinə məcburi d&ouml;vlət sosial sığorta haqqı hesabına ahıllara,&nbsp;işsizlərə, sağlamlıq imkanları məhdud şəxslərə sosial yardım &uuml;zrə m&uuml;avinətlər və pensiyalar,&nbsp;işsizlikdən sığorta vəsaitləri hesabına işsiz şəxslərə işsizlik sığorta &ouml;dənişləri,&nbsp;həm&ccedil;inin d&ouml;vlət b&uuml;dcəsinin vəsaiti hesabına təqa&uuml;dlər, m&uuml;avinətlər, sosial yardımlar və bu qəbildən olan xərclər daxildir. Bu b&ouml;lmədə uşaqlı ailələrə verilən d&ouml;vlət m&uuml;avinəti və kompensasiyalar, b&uuml;t&uuml;n n&ouml;v pensiyalar, təqa&uuml;dlər, şəhid ailələrinə, qa&ccedil;qınlara və məcburi k&ouml;&ccedil;k&uuml;nlərə maddi yardım g&ouml;stərilməsi, hamiləliyə və doğuşa g&ouml;rə m&uuml;avinətlər, uşağın anadan olması ilə əlaqədar birdəfəlik m&uuml;avinət, dəfn &uuml;&ccedil;&uuml;n m&uuml;avinət, təbii fəlakətdən zərər &ccedil;əkən vətəndaşlara birdəfəlik pul yardımı, humanitar yardım, pulsuz m&uuml;alicəyə g&ouml;ndərilən pensiya&ccedil;ılara, ehtiyacı olan pensiya&ccedil;ıların ailə &uuml;zvlərinə maddi yardım,&nbsp;işsiz şəxslərə işsizlikdən sığorta &ouml;dənişlərinin&nbsp;&ouml;dənilməsi, əlillərə maddi yardım, əlil uşaqlara onların təhsili ilə bağlı yardım, birlikdə yaşayan &uuml;&ccedil; və daha &ccedil;ox əmək qabiliyyəti olmayan əlil ailələr &uuml;&ccedil;&uuml;n &uuml;nvanlı tədbirlərin ke&ccedil;irilməsi, əlillər &uuml;&ccedil;&uuml;n idman-sağlamlıq mərkəzlərinin yaradılması, əlillərin beynəlxalq və &ouml;lkədaxili idman yarışlarında iştirakı ilə bağlı proqramların, sərgilərin təşkili və ədəbi musiqi m&uuml;sabiqələrinin, konfransların ke&ccedil;irilməsi, d&ouml;vlət tərəfindən transfertlərin verilməsi xərcləri, sanatoriya-kurort m&uuml;alicəsi &uuml;zrə xərclərin tam və ya qismən &ouml;dənilməsi və əhaliyə sair &ouml;dənişlərlə bağlı xərclər daxildir. Bu b&ouml;lmə <strong>&ldquo;271000. Sosial sığorta&rdquo;, &ldquo;272000. Sosial yardım&rdquo;</strong> və <strong>&ldquo;279000. Digər sosial &ouml;dənişlər&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(39, 'Qeyri-maliyyə aktivləri', 310000, '1', '<p><strong>310000. &ldquo;Qeyri-maliyyə aktivləri&rdquo;</strong>&nbsp;b&ouml;lməsinə qeyri-maliyyə aktivlərinin alınması ilə bağlı xərclər daxildir. Bu b&ouml;lmə <strong>&ldquo;311000. Torpaq, tikili və avadanlıqlar&rdquo;, &ldquo;312000. Əsaslı təmir&rdquo;, &ldquo;313000. Əsaslı vəsait qoyuluşu (investisiya) xərci&rdquo;, &ldquo;314000. Qeyri-maddi aktivlər&rdquo;, &ldquo;315000. Bioloji aktivlər&rdquo;, &ldquo;316000. Sair uzunm&uuml;ddətli qeyri-maliyyə aktivləri&rdquo;, &ldquo;317000. Maddi-istehsal ehtiyatları&rdquo; </strong>və <strong>&ldquo;318000. Qeyri-istehsal aktivləri&rdquo; </strong>k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(40, 'Maliyyə aktivləri üzrə əməliyyatlar', 320000, '1', '<p><strong>320000. &ldquo;Maliyyə aktivləri &uuml;zrə əməliyyatlar&rdquo;</strong>&nbsp;b&ouml;lməsinə &ouml;lkə daxilində d&ouml;vlətə məxsus cari və tranzit hesablar, depozitlər, istiqrazlar, qiymətli kağızlar, daxili borclar &uuml;zrə əməliyyatlar, həm&ccedil;inin valyuta, qiymətli kağızlar (səhmlər istisna olmaqla), ssudalar, səhm və digər kapital, t&ouml;rəmə maliyyə alətləri və sair maliyyə aktivləri &uuml;zrə əməliyyatlar daxildir. Bu b&ouml;lmə <strong>&ldquo;321000. Daxili&rdquo;, &ldquo;322000. Xarici&rdquo;</strong> və <strong>&ldquo;323000. Qızıl və SDR&rdquo; </strong>k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n'),
(41, 'Öhdəliklər üzrə əməliyyatlar', 330000, '1', '<p><strong>330000. &ldquo;&Ouml;hdəliklər &uuml;zrə maliyyə əməliyyatları&rdquo;</strong>&nbsp;b&ouml;lməsi<strong> &ldquo;331000. Daxili&rdquo;</strong> və<strong> &ldquo;332000. Xarici&rdquo;</strong> k&ouml;mək&ccedil;i b&ouml;lmələrindən ibarətdir.</p>\r\n');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iqtisaditesnifat_bolme`
--
ALTER TABLE `iqtisaditesnifat_bolme`
  ADD PRIMARY KEY (`iqtisaditesnifat_bolme_id`),
  ADD UNIQUE KEY `iqtisaditesnifat_bolme_id` (`iqtisaditesnifat_bolme_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iqtisaditesnifat_bolme`
--
ALTER TABLE `iqtisaditesnifat_bolme`
  MODIFY `iqtisaditesnifat_bolme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
