-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2024 pada 01.37
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `published_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `author`, `category`, `published_date`) VALUES
(1, 'Klasemen MotoGP 2024 usari Race Italia', 'Florence - Jorge Martin masih memimpin klasemen sementara MotoGP 2024 meski mengalami crash dalam sprint race Italia. Namun Francesco Bagnaia pelan-pelan menipiskan jarak, begitu juga dengan Marc Marquez.\r\nMartin crash saat memasuki lap kedelapan balapan adu cepat 11 putaran yang berlangsung di Mugello, Sabtu (1/6). Kegagalan melewati garis finis membuat koleksi poin Pramac Ducati itu tetap di angka 155.\r\n\r\nBagnaia yang menjadi pemenang di kandang sendiri kini memiliki 128 poin, bertambah 12 poin dari sebelumnya. Marquez yang finis di urutan kedua mendapat sembilan poin untuk duduk di peringkat tiga dengan 123 poin.\r\n\r\nEnea Bastianini yang gagal finis usai crash karena bersenggolan dengan Martin saat memasuki lap ketiga berada di posisi empat dengan 94 poin. Ia dikuntit Maverick Vinales dengan 92 poin usai rider Aprilia itu memperoleh tambahan lima poin berkat finis kelima.\r\n\r\nPedro Acosta yang baru saja diumumkan akan \'naik kelas\' ke KTM musim depan berada di urutan keenam dengan 90 poin. Ia memperoleh tambahan tujuh poin usai finis ketiga di sprint race. Brad Binder selanjutnya ada di posisi tujuh dengan 79 poin.\r\n\r\nKlasemen MotoGP 2024\r\nPosisi Nama Negara Tim Poin Selisih\r\n1 = Jorge Martin SPA Pramac Ducati (GP24) 155\r\n2 = Francesco Bagnaia ITA Ducati Lenovo (GP24) 128 (-27)\r\n3 = Marc Marquez SPA Gresini Ducati (GP23) 123 (-32)\r\n4 = Enea Bastianini ITA Ducati Lenovo (GP24) 94 (-61)\r\n5 = Maverick ViÃ±ales SPA Aprilia Racing (RS-GP24) 92 (-63)\r\n6 = Pedro Acosta SPA Red Bull GASGAS Tech3 (RC16)* 90 (-65)\r\n7 ^1 Brad Binder RSA Red Bull KTM (RC16) 79 (-76)\r\n8 Ë…1 Aleix Espargaro SPA Aprilia Racing (RS-GP24) 77 (-78)\r\n9 = Fabio di Giannantonio ITA VR46 Ducati (GP23) 65 (-90)\r\n10 ^1 Alex Marquez SPA Gresini Ducati (GP23) 44 (-111)\r\n11 Ë…1 Marco Bezzecchi ITA VR46 Ducati (GP23) 42 (-113)\r\n12 = Fabio Quartararo FRA Monster Yamaha (YZR-M1) 32 (-123)\r\n13 = Miguel Oliveira POR Trackhouse Aprilia (RS-GP24) 29 (-126)\r\n14 = Raul Fernandez SPA Trackhouse Aprilia (RS-GP23) 28 (-127)\r\n15 = Jack Miller AUS Red Bull KTM (RC16) 27 (-128)\r\n16 = Franco Morbidelli ITA Pramac Ducati (GP24) 21 (-134)\r\n17 = Augusto Fernandez SPA Red Bull GASGAS Tech3 (RC16) 13 (-142)\r\n18 = Joan Mir SPA Repsol Honda (RC213V) 13 (-142)\r\n19 = Johann Zarco FRA LCR Honda (RC213V) 9 (-146)\r\n20 = Takaaki Nakagami JPN LCR Honda (RC213V) 8 (-147)\r\n21 = Alex Rins SPA Monster Yamaha (YZR-M1) 7 (-148)\r\n22 = Daniel Pedrosa SPA Red Bull KTM (RC16) 7 (-148)\r\n\r\n', 'uploads/francesco-bagnaia-1_169.jpeg', 'Adhi Prasetya', 'Updated Category', '2024-06-02 08:54:34'),
(2, 'Intel Luncurkan Xeon 6, Chipset Data Center Tercanggih untuk Era AI Modern tahun 2024', 'Intel baru saja mengumumkan prosesor data center terbarunya dalam ajang Intel Tech Tour 2024 di Taipei, Taiwan. Dalam ajang ini, raksasa pembuat chip itu memperkenalkan dua varian Intel Xeon 6.\r\n\r\nAdapun kedua varian chipset Intel Xeon tersebut, yakni Granite Rapids 6900P dan Sierra Forest 6700E. Perusahaan mengklaim, seri CPU terbaru mereka yang dirancang khusus untuk data center dan beban kerja AI.\r\n\r\nIntel Xeon 6 hadir dalam dua konfigurasi yang disesuaikan untuk kebutuhan spesifik data center. Xeon 6 â€˜Granite Rapidsâ€™ 6900 P-Core adalah chipset ideal untuk aplikasi yang memerlukan performa tinggi.\r\n\r\nSementara itu, Xeon 6 â€˜Sierra Forestâ€™ 6700 E-Core dirancang untuk efisiensi, cocok untuk workload seperti cloud native, scale-out analytics, storage, network microservices, dan 5G Core.\r\n\r\nâ€œSolusi ini dirancang untuk memungkinkan konsumen di industri menjalankan bisnis mereka dengan lebih efisien. Banyak perusahaan kini bertransformasi menjadi perusahaan AI dan membutuhkan operasional yang lebih efektif,â€ ujar Matt Langman, VP & General Manager Intel.\r\n\r\nPeluncuran dan Roadmap Masa Depan\r\n\r\nMenariknya, Xeon 6 â€˜Sierra Forestâ€™ 6700 E akan rilis lebih awal, dengan sejumlah data center sudah menerima sampel produk ini. Sedangkan Intel Xeon 6 â€˜Granite Rapidsâ€™ 6900P dijadwalkan hadir pada kuartal ketiga tahun ini.\r\n\r\nRoadmap Intel menunjukkan, pada kuartal pertama tahun 2025, mereka akan meluncurkan varian lainnya seperti Xeon 6 6900E, 6700P, 6500P, Xeon 6 Soc, dan Xeon 6300P.\r\n\r\nDengan pembagian konfigurasi P-Core dan E-Core yang konsisten, Intel berkomitmen untuk memenuhi beragam kebutuhan data center dan menawarkan fleksibilitas tinggi.', 'uploads/images.png', 'Yuslianson', 'Teknologi', '2024-06-11 15:09:59'),
(3, '5 Fitur iOS 18 yang Ditiru Apple dari Android', 'Sistem operasi teranyar untuk iPhone, iOS 18, resmi diperkenalkan dalam ajang Worldwide Developers Conferences (WWDC) 2024, Selasa (11/6/2024) dini hari waktu Indonesia. iOS 18 baru ini datang dengan sejumlah peningkatan dan fitur baru. Meski \"baru\" bagi pengguna iPhone, ada sejumlah fitur yang ternyata sudah lama hadir di Android. Setidaknya ada lima fitur baru di iOS 18 yang ditiru Apple dari Android. Kelima fitur yang â€œdicontekâ€ Apple ini terdiri dari kustomisasi tampilan Home Screen dan Lock Screen, merekam panggilan suara, menyembunyikan aplikasi, kehadiran Game Mode, hingga memghapus objek lewat aplikasi galeri. Lantas, bagaimana cara kerja dari fitur-fitur di atas dan apa saja kesamaan fitur iOS 18 dengan Android? Simak penjelasannya berikut ini. \r\n\r\nKustomisasi Home Screen dan Lock Screen\r\nUntuk pertama kalinya, pengguna iPhone bisa mengotak-atik tampilan Home Screen-nya sesuka hati di iOS 18. Pengguna bisa menempatkan beberapa ikon aplikasi di mana saja di Home Screen. Jadi, penempatan ikon aplikasi ini bisa per ikon atau beberapa ikon sekaligus.  Sebelumnya, sistem secara otomatis mengatur tata letak ikon aplikasi sehingga tidak ada celah antara aplikasi. Smartphone Android sudah lebih dulu memiliki kemampuan kustomisasi ini. Ikon aplikasi di iOS 18 juga memiliki mode gelap. Dengan mode ini, warna ikon bakal berubah lebih redup. Elemen warnanya akan didominasi warna gelap. Apple juga turut menyuguhkan kemampuan mengubah warna ikon, supaya bisa lebih senada dengan wallpaper ponsel. Jadi, kehadiran fitur ini tidak sepenuhnya sama dengan Androis karena ada sedikit perbedaan, seperti kemampuan mengkustomisasi warna ikon-ikon di aplikasi.\r\n\r\nFitur perekam panggilan suara \r\nKemampuan merekam suara di iOS 18 sejatinya juga sudah lebih dulu dimiliki HP Android. Google sudah memperkenalkan fitur merekam suara di Google Pixel pada 2021. Kini, fitur tersebut juga hadir di iOS 18. Namun, Apple mengungkapkan bahwa pengguna tidak hanya dapat merekam panggilan saja, tetapi juga mampu membuat transkrip secara real-time (langsung) saat melakukan panggilan suara. Dukungan bahasa yang tersedia saat ini, yakni Inggris, Spanyol, Perancis, Jerman, Jepang, Mandarin (China), Kanton, dan Portugis. Sistem juga akan memberitahu penerima telepon, jika percakapan yang dilakukan sedang direkam. Sebagaimana dirangkum KompasTekno dari Mobile Syrup, Rabu (12/6/2024), Google sempat mengalami masalah soal fitur rekam panggilan suara ini. Mungkin, agar tidak bentrok dengan undang-undang di negara setempat, Apple menyiasatinya dengan memberitahu penerima telepon soal perekaman suara selama panggilan berlangsung.\r\n\r\nFitur untuk menyembunyikan aplikasi \r\nMenyembunyikan aplikasi mungkin bukan hal yang asing lagi bagi pengguna Android, seperti Redmi, Xiaomi, Samsung, OnePlus, Asus, dan lainnya. Sebab, sudah cukup lama fitur menyembunyikan aplikasi hadir di ponsel Android. Pengguna Android bisa langsung mengunci aplikasi mereka yang tersimpan dalam folder â€œSecureâ€, tidak dapat diakses oleh sembarang orang tanpa kode otentikasi.\r\nSamsung misalnya, memungkinkan pengguna mengunci aplikasi dengan sistem perlindungan biometrik. Kemudian OnePlus bahkan memungkinkan pemilik HP mengunci aplikasi tanpa harus diletakkan di folder terpisah. Di iOS 18 pengguna iPhone bisa mengunci aplikasi harus membukanya dengan beberapa opsi autentifikasi, seperti FaceID, TouchID, atau kode/kata sandi. Aplikasi yang tersembunyi juga tidak akan muncul di Home Screen, dan dipindah ke folder Hidden. \r\n\r\nGaming mode\r\nGaming mode menjadi fitur baru yang turut dihadirkan Apple ke iOS. Mode ini diklaim menghadirkan pengalaman bermain game yang lebih imersif. Tingkat refresh rate yang tinggi bakal menawarkan kinerja bermain game yang maksimal. Di Gaming mode, sistem juga secara otomatis menurunkan latensi, bila pengguna juga menggunakan AirPods sambil bermain.  Berbeda dengan di Android, fitur ini sudah hadir sejak Android 12. Saat mengaktifkan Gaming mode, akan ada fitur perekaman layar, mode DnD (Do-not-Disturb), menghitung frame per second (fps). Tujuannya sama, mengoptimalkan pengalaman bermain game sambil menawarkan kinerja terbaik.\r\n\r\nMenghapus objek foto\r\nDi iOS 18, nantinya pengguna bisa menghapus objek yang tidak diinginkan, tanpa melalui aplikasi pihak ketiga. Fitur ini diberi nama Clean Up. Fungsinya sama seperti Magic Eraser yang ada di smartphone Android. Google sudah memperkenalkan Magic Eraser ke Pixel 6 dan Pixel 6 Pro pada 2021. Alat edit ini memungkinkan pengguna menghapus objek atau orang tertentu yang tidak diinginkan muncul di frame foto.  Setidaknya, inilah lima fitur baru iOS 18 yang sudah ada lebih dulu di smartphone Android. Apple mengatakan bahwa iOS 18 masih tersedia dalam versi beta untuk para pengembang. Versi publiknya mungkin akan digelontorkan secara bertahap mulai dari September hingga akhir tahun 2024.\r\n\r\n\r\n\r\n\r\n', 'uploads/6657c03e3950f.png', 'Caroline Saskia, Yudha Pratomo', 'Updated Category', '2024-06-14 00:36:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
