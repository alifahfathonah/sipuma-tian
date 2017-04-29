-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 06:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipuma_tian`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `author` varchar(20) NOT NULL,
  `img_header` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `title`, `slug`, `date`, `time`, `author`, `img_header`, `content`, `category`, `status`) VALUES
(1, 'Ruhut Mengaku Lolos ke Senayan, Sutan Belum Pasti,', 'ruhut-mengaku-lolos-ke-senayan-sutan-belum-pasti-r', '2014-04-24', '13:10:00', 'Administrator', '0da861bc3b0984898521d6affe677bee.jpg', '<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\"><strong>JAKARTA, KOMPAS.com</strong>&nbsp;&mdash;&nbsp;Juru Bicara Partai Demokrat Ruhut Sitompul mengaku mendapat perolehan suara terbanyak Partai Demokrat di Daerah Pemilihan Sumatera Utara I. Ruhut memenangi wilayah Tebing Tinggi, Sedang Bedagai, Deli Serdang, dan Medan.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Ruhut menjelaskan, di Tebing Tinggi, dia mendapat suara tertinggi, sementara peringkat keduanya ditempati Ramadhan Pohan. Urutan peringkat yang sama juga terlihat di Serdang Bedagai. Sementara itu, di Deli Serdang, perolehan suara Ruhut juga berada pada posisi puncak, tetapi posisi kedua diisi oleh Abdul Wahab Dalimunthe. Di Medan, Ruhut meraih suara terbanyak, lalu diikuti jumlah suara Sutan Bhatoegana.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Dari Demokrat akhirnya dapat satu kursi dengan total 220.000 suara. Satu kursi aman berhasil aku ambil dengan total suara lebih dari 40.000,\" ujar Ruhut saat dihubungi, Kamis (24/4/2014).</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Untuk kursi kedua, Ruhut mengaku bahwa saat ini posisinya masih belum aman karena Partai Demokrat menunggu perhitungan suara dari partai-partai lain. Kalau misalnya bisa meraih kursi dari perhitungan suara tahap II, Ruhut memprediksi bahwa kursi itu akan menjadi perebutan antara Sutan dan Wahab.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Ramadhan Pohan sangat tipis peluangnya karena dia menang di wilayah yang penduduknya sedikit. Suaranya juga cukup jauh dari suaraku,\" imbuh politisi yang kerap dipanggil \"Si Poltak\" ini.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Untuk meraih kemenangan itu, Ruhut mengaku menerapkan gaya kampanye berbiaya rendah. Pada tahun ini, Ruhut mengaku hanya menghabiskan sekitar Rp 500 juta. Dia juga mengaku tak menggunakan tim sukses.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Aku langsung turun sendiri.&nbsp;<em>Door to door</em>, bertemu langsung, bahkan menginap di rumah penduduk. Makan gorengan di pinggir jalan, kayak begitu&nbsp;<em>aja,</em>\" ucap anggota Komisi III DPR ini.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Ruhut juga mengaku beruntung lantaran sering diliput media massa. Pernyataan Ketua KPK Abraham Samad yang menyebut Ruhut sebagai politisi bersih, sebutnya, juga mendukung pencalonannya saat ini.</p>\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Jadi saya berterima kasih kepada masyarakat, media, dan juga Ketua KPK,\" ujar anggota Komisi III DPR itu.</p>', 'news', 1),
(2, 'Jam Tangan Mewah Rp 1 Miliar Dibeli Jenderal Moeld', 'jam-tangan-mewah-rp-1-miliar-dibeli-jenderal-moeld', '2014-04-24', '13:10:00', 'Administrator', '48907f990cf605fbaa7007589d35cb82.JPG', '<p style=\"text-align: justify;\"><strong style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">JAKARTA, KOMPAS.com</strong><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">&nbsp;&mdash; Panglima TNI Jenderal Moeldoko mengakui, jam tangan yang dikenakannya bermerek Richard Mille. Ia mengatakan, jam tangan tersebut sangat mahal, tetapi ia membelinya dengan harga jauh lebih murah.</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Menurut Moeldoko, di pasaran, harga tipe jam tangan yang dikenakannya mencapai lebih dari Rp 1 miliar.</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Saat konferensi pers pelaksanaan Sidang Phipindo (Filipina-Indonesia) Military Corporation di Hotel Borobudur, Moeldoko dengan bergurau akan melepaskan jam tangan tersebut jika ada yang berani membelinya Rp 5 juta.</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">\"Sebuah jam yang dijual di pasaran harganya yang asli Rp 1 miliar lebih, tetapi saya bisa membeli Rp 5 juta,\" ujar Moeldoko, di Hotel Borobudur, Jakarta, Rabu (23/4/2014).</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Mantan Kepala Staf Angkatan Darat (KSAD) itu mengaku memiliki alasan mengapa ia mengenakan jam tangan mahal. Menurut Moeldoko, jam tangan tersebut melambangkan inovasi. Dengan mengenakannya, Moeldoko selalu teringat inovasi.</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">\"Kenapa saya pakai ini? Setelah saya baca komentar-komentar itu ada sedikit perbedaan persepsi. Kenapa saya membeli jam ini?</span><em style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Dengerin</em><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">&nbsp;dulu. Ini pelajaran bagi kita karena jam ini adalah jam yang sangat mahal, tetapi dijual sangat murah. Kenapa saya beli? karena ketika saya melihat jam ini, yang ada dalam pikiran saya adalah&nbsp;</span><em style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">innovation</em><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">,&nbsp;</span><em style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">innovation</em><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">. Inovasi dan inovasi,\" ujar pria asal Kediri, Jawa Timur, itu.</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Ia tidak menjelaskan lebih lanjut dari mana mendapatkan jam tangan tersebut, apakah jam tangan asli yang dibelinya dengan harga jauh lebih murah, atau jam tangan asli tetapi palsu yang banyak beredar di masyarakat?</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Jam tangan Moeldoko disorot media Singapura pada awal pekan ini karena nilainya yang dianggap fantastis. Bahkan, Moeldoko disebut memiliki lebih dari satu jam mewah.&nbsp;</span><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><br style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\" /><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Moeldoko menjadi figur yang diperbincangkan sejak artikel kontroversial di&nbsp;</span><em style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Strait Times</em><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">&nbsp;yang menyebut Panglima TNI itu meminta maaf kepada Pemerintah Singapura terkait penamaan kapal perang Usman-Harun. Namun, Moeldoko membantah hal tersebut dan menyebut bahwa media itu salah kutip. Ia mengaku meminta maaf kepada Singapura karena tidak bisa memenuhi permintaan agar tidak menggunakan nama Usman-Harun yang telah final. (</span><strong style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">Eri Komar Sinaga</strong><span style=\"color: #4b4b4b; font-size: 16px; font-family: Lucida, helvetica, sans-serif;\">)</span></p>', 'news', 1),
(3, 'Ruhut: Demokrat Buat Poros Baru, Akan Ada Capres y', 'ruhut-demokrat-buat-poros-baru-akan-ada-capres-yan', '2014-04-24', '13:10:00', 'Administrator', '11dc87b9de3003063811abc9bca89423.jpg', '<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\"><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Partai Demokrat disebut tengah membangun poros baru untuk menghadapi pemilu presiden mendatang. Partai yang dalam hasil hitung cepat pemilu legislatif 2014 berada di peringkat ke-empat itu disebut akan tetap mengusung calon Presiden.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Juru bicara Partai Demokrat Ruhut Sitompul mengatakan, partainya akan tetap mengusung calon Presiden dari hasil konvensi. Capres konvensi itu akan didukung oleh partai koalisi lain.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Oleh karena itu, saya mau bilang ini akan jadi poros baru. Jangan bilang ini poros ke-empat karena nanti akan ada capres yang menjadi korban,\" ujar Ruhut saat dihubungi, Kamis (24/4/2014).</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Ruhut menuturkan, dengan adanya koalisi baru pimpinan Demokrat ini, kemungkinan hanya akan ada tiga bakal calon Presiden. Bahkan, kata dia, bisa jadi hanya ada dua bakal capres, yakni bakal capres PDI Perjuangan Joko Widodo dan bakal capres poros Demokrat.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Kami melihat partai-partai Islam akan merapat ke kami, mitra koalisi kami terdahulu seperti dengan PKB, PAN, PPP, dan juga PKS. Bukan tidak mungkin yang dibawa seperti Hanura, PKPI, dan PBB juga turut bergabung. Pak SBY akan jadi&nbsp;<em>king maker</em>,\" kata anggota Komisi III DPR itu.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Politisi yang pernah menjadi bintang layar kaca tersebut mengatakan, jika sebagian besar partai bergabung ke Partai Demokrat, maka nasib Aburizal Bakrie dan Prabowo Subianto akan berada di ujung tanduk. Suara Partai Golkar dan Partai Gerindra di Pileg, versi hitung cepat, belum cukup untuk mengusung capres.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Menurut Ruhut, posisi tawar Demokrat dalam membentuk poros koalisi baru cukup besar. Dia mengklaim mitra koalisi Demokrat selama ini sangat nyaman berada di bawah koalisi Sekretariat Gabungan pemerintahan Susilo Bambang Yudhoyono karena tidak ada sanksi untuk setiap perbedaan sikap dan pandangan.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">SBY, lanjut Ruhut, juga sangat dekat dengan Ketua Majelis Syuro PKS Hilmi Aminuddin, Ketua Umum PAN Hatta Rajasa, elite PPP, dan juga PKB. Hal lainnya yang ditawarkan Demokrat adalah bagi-bagi kursi.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Munafik itu kabinet kerja, kabinet tidak bagi-bagi kursi. Hal seperti harusnya tidak dibicarakan, karena pada dasarnya koalisi, ya bagi-bagi kursi. Mana mau partai bergabung kalau tidak dapat apa-apa kan?\" imbuh Ruhut.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">Dia mengingatkan agar peta koalisi saat ini jangan sampai melupakan peranan SBY. Sebagai seorang petahana, ucap Ruhut, SBY masih berpengaruh. Dia mencontohkan Obama yang melobi mantan Presiden AS Bill Clinton untuk memenangi pertarungan pemilihan Presiden di Amerika Serikat.</p>\r\n<p style=\"color: #4b4b4b; font-size: 16px; font-family: OpenSansRegular, Arial, Helvetica, sans-serif; text-align: justify;\">\"Jadi sekarang, jokernya dipegang pak SBY. Di mana pak SBY meletakkan kartu Joker itu, dia akan menang,\" pungkasnya.</p>', 'news', 1),
(4, 'asdf', 'asdf', '2017-04-29', '23:09:04', 'firmann', 'd394ba545ef91d8cb7cbf2d0792224a6.jpg', '<p><strong>asdfasdfasdfa</strong>s<em>dfasdfasdfasdf</em></p>', 'news', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Administrator'),
(2, 'HIMA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`) VALUES
(1, 'firmann', '3fabc8d0b2db61c3302155c5b879958a', 1),
(2, 'rudy', 'cfce9735de7c3873a55331a4e74b70fc', 2),
(3, 'tantan', '2b3235efc1ec93e3437fdaa7a11ba212', 2),
(4, 'sheptian', 'e2d74b7c4ccda2a5a2ac3819f419e4ef', 1),
(5, 'kurniawan', '16ca55b4f29157780eabc6244f49d442', 1),
(6, 'himaif', 'c0599dfb4427dc97b6a71aa4900a4ef8', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
