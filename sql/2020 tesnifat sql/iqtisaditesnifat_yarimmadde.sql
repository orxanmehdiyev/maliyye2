-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 May 2019, 12:17:38
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
-- Tablo için tablo yapısı `iqtisaditesnifat_yarimmadde`
--

CREATE TABLE `iqtisaditesnifat_yarimmadde` (
  `iqtisaditesnifat_yarimmadde_id` int(11) NOT NULL,
  `iqtisaditesnifat_madde_id` int(11) NOT NULL,
  `iqtisaditesnifat_yarimmadde_ad` varchar(250) NOT NULL,
  `iqtisaditesnifat_yarimmadde_kod` int(11) NOT NULL,
  `iqtisaditesnifat_yarimmadde_status` enum('0','1') NOT NULL DEFAULT '0',
  `iqtisaditesnifat_yarimmadde_aciqlama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iqtisaditesnifat_yarimmadde`
--

INSERT INTO `iqtisaditesnifat_yarimmadde` (`iqtisaditesnifat_yarimmadde_id`, `iqtisaditesnifat_madde_id`, `iqtisaditesnifat_yarimmadde_ad`, `iqtisaditesnifat_yarimmadde_kod`, `iqtisaditesnifat_yarimmadde_status`, `iqtisaditesnifat_yarimmadde_aciqlama`) VALUES
(5, 14, 'Ölkədaxili telefon danışıq haqlarının ödənilməsi', 222311, '1', '<p><strong>222311. &ldquo;&Ouml;lkədaxili telefon danışıq haqlarının &ouml;dənilməsi&rdquo;&nbsp;</strong>yarımmaddəsinə&nbsp;&ouml;lkənin daxilindəki telefon danışıqları, faks xidməti, telefon, teleqraf, fiberoptik və optik kanallarının abunəsi və icarəsi, GPS/GSM nəzarət qurğusuna g&ouml;rə xidmət haqlarının &ouml;dənilməsi, telefon danışıq haqları ilə bağlı sair xidmətlər &uuml;zrə xərclər, abunə haqlarının &ouml;dənilməsi xərcləri və bu qəbildən olan digər xərclər daxildir.</p>'),
(6, 14, 'Beynəlxalq telefon danışıqları haqlarının ödənilməsi', 222312, '1', '<p><strong>222312. &ldquo;Beynəlxalq telefon danışıqları haqlarının &ouml;dənilməsi&rdquo;</strong>&nbsp;yarımmadəsinə xarici &ouml;lkələrlə bağlı telefon danışıqları, faks xidməti ilə bağlı xərclər daxildir.</p>'),
(7, 22, 'Əsas fondlara xidmət haqqı xərcləri', 222441, '1', '<p><strong>222441. &ldquo;Əsas fondlara xidmət haqqı xərcləri&rdquo;</strong>&nbsp;yarımmaddəsinə hesablama texnikası və avadanlıqlara g&ouml;stərilən xidmət haqları, liftlərə texniki xidmətlə bağlı xərclər, soyutma və isitmə sistemlərinə, inzibati binalara buraxılış sistemlərinə (turniketlərə) xidmət haqlarının &ouml;dənilməsi ilə bağlı və bu qəbildən olan digər xərclər daxildir.</p>'),
(8, 22, 'Sanitariya-gigiyena və digər xidmət haqqı xərcləri', 222442, '1', '<p><strong>222442. &ldquo;Sanitariya-gigiyena və digər xidmət haqqı xərcləri&rdquo;</strong>&nbsp;yarımmaddəsinə dezinfeksiya xərcləri, sanitariya-gigiyena xərcləri, bina və tikililərin fasadlarının yuyulması və təmizlənməsi, nəqliyyat vasitələrinin yuyulması və təmizlənməsi ilə bağlı və bu qəbildən olan digər xərclər daxildir.</p>'),
(9, 28, 'Bank xidmətləri haqqının ödənilməsi', 222941, '1', '<p><strong>222941. &ldquo;Bank xidmətləri haqqının &ouml;dənilməsi&rdquo;</strong>&nbsp;yarımmaddəsinə m&uuml;əssisə və təşkilatlara banklar tərəfindən nağd və nağdsız əməliyyatların aparılmasına g&ouml;rə bank xidmətləri haqqının &ouml;dənilməsi xərcləri daxildir.</p>'),
(10, 28, 'Plastik kartların dəyəri və digər ödənişlər', 222942, '1', '<p>222942. &ldquo;Plastik kartların dəyəri və digər &ouml;dənişlər&rdquo;&nbsp;yarımmaddəsinə m&uuml;əssisə və təşkilatlar tərəfindən alınan plastik kartların, bankdan alınan m&uuml;xtəlif &ccedil;eklərin dəyərinin &ouml;dənilməsi və bu qəbildən olan digər xərclər daxildir.</p>'),
(11, 39, 'Yaşa görə əmək pensiyasının sığorta hissəsi', 271111, '1', '<p><strong>271111. &ldquo;Yaşa g&ouml;rə əmək pensiyasının sığorta hissəsi&rdquo;</strong>&nbsp;yarımmaddəsinə m&ouml;vcud qanunvericiliyə uyğun olaraq yaşa g&ouml;rə əmək pensiyasının sığorta hissəsinə aid edilən xərclər daxildir.</p>'),
(12, 39, 'Yaşa görə əmək pensiyasının yığım hissəsi', 271112, '1', '<p><strong>271112. &ldquo;Yaşa g&ouml;rə əmək pensiyasının yığım hissəsi&rdquo;</strong>&nbsp;yarımmaddəsinə m&ouml;vcud qanunvericiliyə uyğun olaraq yaşa g&ouml;rə əmək pensiyasının yığım hissəsinə aid edilən xərclər daxildir.</p>'),
(13, 40, 'Əlilliyə görə əmək pensiyasının sığorta hissəsi', 271121, '1', '<p>271121. &ldquo;Əlilliyə g&ouml;rə əmək pensiyasının sığorta hissəsi&rdquo;&nbsp;yarımmaddəsinə m&ouml;vcud qanunvericiliyə uyğun olaraq əlilliyə g&ouml;rə əmək pensiyasının sığorta hissəsinə aid edilən xərclər daxildir.</p>'),
(14, 40, 'Əlilliyə görə əmək pensiyasının yığım hissəsi', 271122, '1', '<p><strong>271122. &ldquo;Əlilliyə g&ouml;rə əmək pensiyasının yığım hissəsi&rdquo;&nbsp;</strong>yarımmaddəsinə m&ouml;vcud qanunvericiliyə uyğun olaraq əlilliyə g&ouml;rə əmək pensiyasının yığım hissəsinə aid edilən xərclər daxildir.</p>'),
(15, 49, 'İşsizlikdən sığorta ödənişi', 271911, '1', '<p><strong>271911. &ldquo;İşsizlikdən&nbsp;sığorta &ouml;dənişi&rdquo;</strong>&nbsp;yarımmaddəsinə işsizlərə işsizliyə g&ouml;rə &ouml;dənilən sığorta &ouml;dənişləri ilə bağlı xərclər daxildir.</p>'),
(16, 49, 'Peşə hazırlığınıntəşkili', 271912, '1', '<p><strong>271912. &ldquo;Peşə&nbsp;hazırlığının&nbsp;təşkili&rdquo;&nbsp;</strong>yarımmaddəsinə&nbsp;işaxtaran və işsiz şəxslər&nbsp;&uuml;&ccedil;&uuml;n peşə hazırlığı, yenidənhazırlıq və ixtisasartırma tədbirlərinin təşkili ilə bağlı xərclər daxildir.</p>'),
(17, 49, 'Haqqı ödənilən ictimai işlərin təşkili', 271913, '1', '<p><strong>271913. &ldquo;Haqqı &ouml;dənilən ictimai işlərin təşkili&rdquo;</strong>&nbsp;yarımmaddəsinə m&uuml;vəqqəti xarakterli haqqı &ouml;dənilən ictimai işlərin təşkili ilə bağlı xərclər daxildir.</p>'),
(18, 49, 'Peşəyönümünə dair məsləhət xidmətlərinin göstərilməsi', 271914, '1', '<p><strong>271914. &ldquo;Peşəy&ouml;n&uuml;m&uuml;nə dair məsləhət xidmətlərinin g&ouml;stərilməsi&rdquo;&nbsp;</strong>yarımmaddəsinə işaxtaran və işsiz&nbsp;şəxslərə&nbsp;peşəy&ouml;n&uuml;m&uuml; məsləhət xidmətlərinin g&ouml;stərilməsi ilə bağlı xərclər daxildir.</p>'),
(19, 49, 'Özünəməşğulluq tədbirlərinin təşkili', 271915, '1', '<p><strong>271915. &ldquo;&Ouml;z&uuml;n&uuml;məşğulluq tədbirlərinin təşkili&rdquo;</strong>&nbsp;yarım-maddəsinə&nbsp;işsiz şəxslərin&nbsp;&ouml;z&uuml;n&uuml;məşğulluğunun təmin olunması&nbsp;&uuml;zrə xərclər daxildir.</p>'),
(20, 49, 'Əmək yarmarkalarının və əmək birjalarının təşkili', 271916, '1', '<p><strong>271916. &ldquo;Əmək yarmarkalarının və əmək birjalarının təşkili&rdquo;</strong>&nbsp;yarımmaddəsinə&nbsp;&nbsp;və&nbsp;əmək birjalarının yaradılması, əmək yarmarkalarının təşkili ilə bağlı xərclər daxildir.</p>'),
(21, 49, 'İşəgötürənlərlə birlikdə işçilərinəməkhaqqının maliyyələşdirilməsi', 271917, '1', '<p><strong>271917.&nbsp;&ldquo;İşəg&ouml;t&uuml;rənlərlə birlikdə iş&ccedil;ilərin&nbsp;əməkhaqqının maliyyələşdirilməsi&rdquo;</strong>&nbsp;yarımmaddəsinə&nbsp;sosial iş yerlərində iş&ccedil;ilərin əməkhaqqının&nbsp;m&uuml;əyyən hissəsinin m&uuml;əyyən m&uuml;ddətə (3, 6, 9 ay və 1 il)&nbsp;işəg&ouml;t&uuml;rənlərlə&nbsp;birlikdə maliyyələşdirilməsi ilə bağlı xərclər daxildir.</p>'),
(22, 49, 'Sosial müdafiəyə xüsusi ehtiyacı olan və işə düzəlməkdə çətinlik çəkən şəxslərinməşğulluğunun təmin olunması', 271918, '1', '<p><strong>271918. &ldquo;Sosial m&uuml;dafiəyə x&uuml;susi ehtiyacı olan və işə d&uuml;zəlməkdə &ccedil;ətinlik &ccedil;əkən&nbsp;şəxslərin&nbsp;məşğulluğunun təmin olunması&rdquo;&nbsp;</strong>yarımmaddəsinə sosial m&uuml;dafiəyə x&uuml;susi ehtiyacı olan və işə d&uuml;zəlməkdə &ccedil;ətinlik &ccedil;əkən&nbsp;şəxslərin&nbsp;məşğulluğunun təmin olunması ilə bağlı xərclər daxildir.</p>'),
(23, 49, 'Aktiv məşğulluqtədbirləri üzrə digər ödənişlər', 271919, '1', '<p><strong>271919. &ldquo;Aktiv məşğulluq&nbsp;tədbirləri &uuml;zrə digər &ouml;dənişlər&rdquo;</strong>&nbsp;yarımmaddəsinə 271911-271918-ci yarımmaddələrdə nəzərdə tutulmayan və mahiyyət etibarilə&nbsp;aktiv&nbsp;məşğulluq tədbirləri &uuml;zrə &ouml;dəniş hesab edilən digər xərclər daxildir.</p>'),
(24, 50, 'Əlillərin sağlamlığının mühafizəsi və tibbi bərpası', 271921, '1', '<p><strong>271921. &ldquo;Əlillərin sağlamlığının m&uuml;hafizəsi və tibbi bərpası&rdquo;</strong>&nbsp;yarımmaddəsinə əlillərin dərmanla təminatı, əlillərin m&uuml;alicəsinə k&ouml;məklik g&ouml;stərilməsi, əlillərin texniki-bərpa vasitələri ilə təmin edilməsi, əlillərin sanatoriya-kurort m&uuml;alicəsinin təşkili &uuml;&ccedil;&uuml;n yollayışların alınması ilə bağlı xərclər daxildir.</p>'),
(25, 50, 'Reabilitasiya tədbirlərinin təşkili', 271922, '1', '<p><strong>271922. &ldquo;Reabilitasiya tədbirlərinin təşkili&rdquo;&nbsp;</strong>yarımmaddəsinə əlillərin sosial m&uuml;dafiəsi və reabilitasiya sahəsində beynəlxalq təcr&uuml;bənin tətbiqi ilə bağlı əməkdaşlıq və informasiya m&uuml;badiləsi, əlillərin asudə vaxtının təşkili məqsədi ilə onların istirahət zonalarına g&ouml;ndərilməsi, idman tədbirlərinin ke&ccedil;irilməsi və əlillərin beynəlxalq yarışlarda iştirakına şəraitin yaradılması, əlillərin &uuml;mumrespublika sərgi-m&uuml;sabiqəsinin ke&ccedil;irilməsi, incəsənət və xalq sənət n&ouml;vlərinin &ouml;yrədilməsinə yardım g&ouml;stərilməsi ilə bağlı xərclər daxildir.</p>'),
(26, 50, 'Əlillərə maddi və texniki yardımın təşkili', 271923, '1', '<p><strong>271923. &ldquo;Əlillərə maddi və texniki yardımın təşkili&rdquo;&nbsp;</strong>yarımmaddəsinə &Uuml;mumxalq h&uuml;zn g&uuml;n&uuml;, Novruz bayramı, &Ccedil;ernobıl qəzasının ild&ouml;n&uuml;m&uuml;, faşizm &uuml;zərində qələbə g&uuml;n&uuml;, Bilik g&uuml;n&uuml;, Beynəlxalq əlillər g&uuml;n&uuml; m&uuml;nasibəti ilə tədbirlərin ke&ccedil;irilməsi və əlillərə maddi yardımların g&ouml;stərilməsi, əlil uşaqların təhsili ilə bağlı texniki yardımın g&ouml;stərilməsi, əlillərə sosial-məişət problemlərinin həlli ilə bağlı yardımların g&ouml;stərilməsi ilə bağlı xərclər daxildir.</p>'),
(27, 50, 'Digər ödənişlər', 271929, '1', '<p><strong>271929. &ldquo;Digər &ouml;dənişlər&rdquo;&nbsp;</strong>yarımmaddəsinə 271921-271923-c&uuml; yarımmaddələrdə nəzərdə tutulmayan və mahiyyət etibarilə əlilliklə bağlı &ouml;dəniş hesab edilən digər xərclər daxildir.</p>'),
(28, 82, 'Yaşayış binalarının alınması', 311111, '1', '<p><strong>311111. &ldquo;Yaşayış binalarının alınması&rdquo;</strong>&nbsp;yarımmaddəsinə yaşayış binalarının alınması ilə bağlı xərclər daxildir.</p>'),
(29, 82, 'Yaşayış binalarının tikintisi', 311112, '1', '<p><strong>311112. &ldquo;Yaşayış binalarının tikintisi&rdquo;</strong>&nbsp;yarımmaddəsinə yaşayış binalarının tikintisi ilə bağlı xərclər daxildir.</p>'),
(30, 83, 'Qeyri-yaşayış binalarının alınması', 311121, '1', '<p><strong>311121. &ldquo;Qeyri-yaşayış binalarının alınması&rdquo;</strong>&nbsp;yarımmaddəsinə qeyri-yaşayış binalarının alınması ilə bağlı xərclər daxildir.</p>'),
(31, 83, 'Qeyri-yaşayış binalarının tikintisi', 311122, '1', '<p><strong>311122. &ldquo;Qeyri-yaşayış binalarının tikintisi&rdquo;</strong>&nbsp;yarımmaddəsinə qeyri-yaşayış binalarının tikintisi ilə bağlı xərclər daxildir.</p>'),
(32, 84, 'Qurğuların (tikintilərin) alınması', 311131, '1', '<p><strong>311131. &ldquo;Qurğuların (tikintilərin) alınması&rdquo;</strong>&nbsp;yarımmaddəsinə qurğuların (tikintilərin) alınması və quraşdırılması ilə bağlı xərclər daxildir.</p>'),
(33, 84, 'Qurğuların (tikintilərin) tikintisi', 311132, '1', '<p><strong>311132. &ldquo;Qurğuların (tikintilərin) tikintisi&rdquo;</strong>&nbsp;yarımmaddəsinə qurğuların (tikintilərin) tikintisi ilə bağlı xərclər daxildir.</p>'),
(34, 85, 'Ötürücü qurğuların alınması', 311141, '1', '<p><strong>311141. &ldquo;&Ouml;t&uuml;r&uuml;c&uuml; qurğuların alınması&rdquo;&nbsp;</strong>yarımmaddəsinə istehlak&ccedil;ıya &ccedil;atdırılacaq enerji, maye və qaz halındakı məhsulların &ouml;t&uuml;r&uuml;lməsində iştirak edən b&uuml;t&uuml;n n&ouml;v avadanlıqların, qurğuların (metal, dəmir-beton və taxta dayaqlar &uuml;zərində qurulmuş qatarlar (o c&uuml;mlədən trolleybus və tramvaylar) &uuml;&ccedil;&uuml;n elektrik&ouml;t&uuml;r&uuml;c&uuml; qurğular şəbəkəsi, dayaqlar &uuml;zərində qurulmuş elektrik&ouml;t&uuml;r&uuml;c&uuml; naqillər, elektrik&ouml;t&uuml;r&uuml;c&uuml; kabel naqilləri, rabitə kabel naqilləri, y&uuml;ksək-tezlikli dalğaların, radio dalğalarının və sair rabitə dalğalarının &ouml;t&uuml;r&uuml;lməsi &uuml;&ccedil;&uuml;n nəzərdə tutulmuş qurğular, qaz kəmərləri, kanalizasiya xətləri və bunlara aid olan b&uuml;t&uuml;n n&ouml;v aralıq avadanlıqları və qurğuları, sair &ouml;t&uuml;r&uuml;c&uuml; qurğular, o c&uuml;mlədən neft məhsulları &uuml;&ccedil;&uuml;n boru kəmərləri, istilik sistemi &uuml;&ccedil;&uuml;n boru kəmərləri, habelə başqa &ouml;t&uuml;r&uuml;c&uuml; qurğular)&nbsp;alınması və quraşdırılması ilə bağlı xərclər daxildir.</p>'),
(35, 85, 'Ötürücü qurğuların tikilməsi', 311142, '1', '<p><strong>311142. &ldquo;&Ouml;t&uuml;r&uuml;c&uuml; qurğuların tikilməsi&rdquo;</strong>&nbsp;yarımmaddəsinə istehlak&ccedil;ıya &ccedil;atdırılacaq enerji, maye və qaz halındakı məhsulların &ouml;t&uuml;r&uuml;lməsində iştirak edən b&uuml;t&uuml;n &ouml;t&uuml;r&uuml;c&uuml; qurğuların tikilməsi ilə bağlı xərclər daxildir.</p>'),
(36, 99, 'İl ərzində alınmış', 321211, '1', '<p><strong>321211. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(37, 99, 'İl ərzində satılmış', 321212, '1', '<p><strong>321212. &ldquo;İl ərzində satılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində satılmış&nbsp;qısam&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(38, 100, 'İl ərzində alınmış', 321221, '1', '<p><strong>321221. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(39, 100, 'İl ərzində satılmış', 321222, '1', '<p><strong>321222. &ldquo;İl ərzində satılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində satılmış&nbsp;uzunm&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(40, 101, 'İl ərzində alınmış', 321311, '1', '<p><strong>321311. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(41, 101, 'İl ərzində qaytarılmış', 321312, '1', '<p><strong>321312. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qaytarılmış&nbsp;qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(42, 102, 'İl ərzində alınmış', 321321, '1', '<p><strong>321321. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(43, 102, 'İl ərzində qaytarılmış', 321322, '1', '<p><strong>321322. &ldquo;İl ərzində qaytarılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində qaytarılmış&nbsp;uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(44, 103, 'İl ərzində alınmış', 321411, '1', '<p><strong>321411. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(45, 103, 'İl ərzində satılmış', 321412, '1', '<p><strong>321412. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın satılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(46, 104, 'İl ərzində alınmış', 321421, '1', '<p><strong>321421. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(47, 104, 'İl ərzində satılmış', 321422, '1', '<p><strong>321422. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın satılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(48, 107, 'İl ərzində alınmış', 322211, '1', '<p><strong>322211. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(49, 107, 'İl ərzində satılmış', 322212, '1', '<p><strong>322212. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində satılmış&nbsp;qısam&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(50, 108, 'İl ərzində alınmış', 322221, '1', '<p><strong>322221. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(51, 108, 'İl ərzində satılmış', 322222, '1', '<p><strong>322222. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində satılmış&nbsp;uzunm&uuml;ddətli qiymətli kağızlar &uuml;zrə əməliyyatlar daxildir.</p>'),
(52, 109, 'İl ərzində alınmış', 322311, '1', '<p><strong>322311. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(53, 109, 'İl ərzində qaytarılmış', 322312, '1', '<p><strong>322312. &ldquo;İl ərzində qaytarılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində qaytarılmış&nbsp;qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(54, 110, 'İl ərzində alınmış', 322321, '1', '<p><strong>322321. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(55, 110, 'İl ərzində qaytarılmış', 322322, '1', '<p><strong>322322. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qaytarılmış&nbsp;uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(56, 111, 'İl ərzində alınmış', 322411, '1', '<p><strong>322411. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(57, 111, 'İl ərzində satılmış', 322412, '1', '<p><strong>322412. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın satılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(58, 112, 'İl ərzində alınmış', 322421, '1', '<p><strong>322421. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın, o c&uuml;mlədən Azərbaycan Respublikasının &uuml;zv olduğu beynəlxalq və regional maliyyə institutlarının səhmlərinin alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(59, 112, 'İl ərzində satılmış', 322422, '1', '<p><strong>322422. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın satılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(60, 115, 'İl ərzində alınmış', 331311, '1', '<p><strong>331311. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(61, 115, 'İl ərzində qaytarılmış', 331312, '1', '<p><strong>331312. &ldquo;İl ərzində qaytarılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində qaytarılmış&nbsp;qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(63, 116, 'İl ərzində alınmış', 331321, '1', '<p><strong>331321. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(64, 116, 'İl ərzində qaytarılmış', 331322, '1', '<p><strong>331322. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qaytarılmış&nbsp;uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(65, 117, 'İl ərzində alınmış', 331411, '1', '<p><strong>331411. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qısam&uuml;ddətli səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(66, 117, 'İl ərzində qaytarılmış', 331412, '1', '<p><strong>331412. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qısam&uuml;ddətli səhm və digər kapitalın qaytarılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(67, 118, 'İl ərzində alınmış', 331421, '1', '<p><strong>331421. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində uzunm&uuml;ddətli səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(68, 118, 'İl ərzində qaytarılmış', 331422, '1', '<p><strong>331422. &ldquo;İl ərzində satılmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində uzunm&uuml;ddətli səhm və digər kapitalın satılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(69, 120, 'İl ərzində alınmış', 332311, '1', '<p><strong>332311. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(70, 120, 'İl ərzində qaytarılmış', 332312, '1', '<p><strong>332312. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qaytarılmış&nbsp;qısam&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(71, 121, 'İl ərzində alınmış', 332321, '1', '<p><strong>332321. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində alınmış uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(72, 121, 'İl ərzində qaytarılmış', 332322, '1', '<p><strong>332322. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində qaytarılmış uzunm&uuml;ddətli ssudalar &uuml;zrə əməliyyatlar daxildir.</p>'),
(73, 122, 'İl ərzində alınmış', 332411, '1', '<p><strong>332411. &ldquo;İl ərzində alınmış&rdquo;&nbsp;</strong>yarımmaddəsinə il ərzində səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(74, 122, 'İl ərzində qaytarılmış', 332412, '1', '<p><strong>332412. &ldquo;İl ərzində satılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın qaytarılması &uuml;zrə əməliyyatlar daxildir.</p>'),
(75, 123, 'İl ərzində alınmış', 332421, '1', '<p><strong>332421. &ldquo;İl ərzində alınmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın alınması &uuml;zrə əməliyyatlar daxildir.</p>'),
(76, 123, 'İl ərzində qaytarılmış', 332422, '1', '<p><strong>332422. &ldquo;İl ərzində qaytarılmış&rdquo;</strong>&nbsp;yarımmaddəsinə il ərzində səhm və digər kapitalın qaytarılması &uuml;zrə əməliyyatlar daxildir.</p>');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iqtisaditesnifat_yarimmadde`
--
ALTER TABLE `iqtisaditesnifat_yarimmadde`
  ADD PRIMARY KEY (`iqtisaditesnifat_yarimmadde_id`),
  ADD UNIQUE KEY `iqtisaditesnifat_yarimmadde_id` (`iqtisaditesnifat_yarimmadde_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iqtisaditesnifat_yarimmadde`
--
ALTER TABLE `iqtisaditesnifat_yarimmadde`
  MODIFY `iqtisaditesnifat_yarimmadde_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
