-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 09:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_loker`
--

CREATE TABLE `apply_loker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_loker` bigint(20) UNSIGNED NOT NULL,
  `status` enum('menunggu','diterima','ditolak') NOT NULL DEFAULT 'menunggu',
  `waktu_apply` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply_loker`
--

INSERT INTO `apply_loker` (`id`, `id_user`, `id_loker`, `status`, `waktu_apply`) VALUES
(2, 4, 6, 'menunggu', '2023-12-12 16:43:23'),
(3, 7, 7, 'menunggu', '2023-12-12 16:53:51'),
(4, 7, 5, 'menunggu', '2023-12-12 16:53:57'),
(5, 7, 3, 'menunggu', '2023-12-12 16:54:02'),
(6, 4, 7, 'menunggu', '2023-12-12 20:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `slug` text NOT NULL,
  `isi` longtext NOT NULL,
  `waktu_publikasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` longtext DEFAULT NULL,
  `status` enum('menunggu','aktif','tidak aktif') NOT NULL DEFAULT 'menunggu',
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `waktu_publikasi`, `img`, `status`, `id_user`) VALUES
(1, 'Merasa Pertanyaan soal HAM Tak Dijawab Prabowo, Ganjar Anggap Tak Tegas', 'merasa-pertanyaan-soal-ham-tak-dijawab-prabowo-ganjar-anggap-tak-tegas-baca-artikel-detiknews-merasa-pertanyaan-soal-ham-tak-dijawab-prabowo-ganjar-anggap-tak-tegas', '<p>Jakarta - Capres nomor urut 3, Ganjar Pranowo, menyayangkan capres nomor urut 2, Prabowo Subianto tak menjawab pertanyaannya soal pengadilan HAM. Ganjar menyebut Prabowo tak tegas.</p><p>\"Pak Prabowo ini punya ketegasan yang luar biasa, luar biasa, tapi sayang pada dua jawaban ini (menunjukan Prabowo) sama sekali tidak punya ketegasan itu,\" ujar Ganjar di Gedung KPU, Menteng, Jakpus, Selasa (12/12/2023).</p><p><br></p><p>Diketahui, Ganjar bertanya soal apakah Prabowo akan membuat pengadilan HAM bila terpilih menjadi presiden. Selain itu, Ganjar juga bertanya apakah Prabowo akan membantu mencarikan makam aktivis-aktivis yang hilang di masa lalu.</p><p><br></p><p>\"Pertanyaan saya sebenarnya satu apakah kalau bapak jadi presiden akan membuat pengadilan HAM. Pertanyaan nomor dua apakah bapak bisa menemukan menunjukkan membantu pada keluarga (aktivis) agar kemudian bisa berziarah. Dua (pertanyaan) ini sama-sama tidak dijawab,\" kata Ganjar.</p><p><br></p><p>\"Maka kalau boleh saya meminta, kalau saya jadi presiden saya akan bereskan ini agar kemudian dalam kontestasi Pilpres berikutnya ini (isu pelanggaran HAM) tidak akan muncul lagi kena presidennya tegas menuntaskan pekerjaan itu pada era-nya,\" terangnya.</p>', '2023-12-12 15:47:08', '1702395977.png', 'menunggu', 5),
(2, 'Ganjar Singgung kasus HAM berat, prabowo tunjuk mahfud md', 'ganjar-singgung-kasus-ham-berat-prabowo-tunjuk-mahfud-md', '<p><span style=\"color: rgb(0, 0, 0);\">Jakarta - Capres nomor urut 3 Ganjar Pranowo menanyakan soal penanganan kasus HAM berat terdahulu kepada capres nomor urut 2 Prabowo Subianto. Apa jawab Prabowo?</span></p><p><span style=\"color: rgb(0, 0, 0);\">Ganjar awalnya diberi kesempatan oleh moderator untuk bertanya kepada Prabowo. Ganjar memaparkan ada 12 kasus pelanggaran HAM berat seperti Peristiwa 65, penembakan misterius, Talangsari, penghilangan paksa sampai Wamena.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Saya ingatkan tahun 2009 DPR sudah mengeluarkan 4 rekomendasi pada saat itu kepada presiden. Satu, membentuk pengadilan HAM ad hoc. Yang kedua, menemukan 13 korban penghilangan paksa. Yang ketiga memberikan kompensasi dan pemulihan, dan yang keempat meratifikasi konvensi antipenghilangan paksa sebagai upaya pencegahan,\" kata Ganjar dalam Debat Capres Pertama yang digelar di gedung KPU, Jakarta Pusat, Selasa (12/12/2023).</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Ganjar lalu menyampaikan dua pertanyaannya. Salah satunya terkait pengadilan HAM ad hoc.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Pertanyaan saya ada dua, kalau Bapak ada di situ apakah akan membuat pengadilan HAM dan membereskan rekomendasi DPR? Pertanyaan kedua, di luar sana banyak menunggu ibu-ibu, apakah Bapak bisa membantu menemukan di mana kuburnya yang hilang agar mereka bisa berziarah?\" tanya Ganjar.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Prabowo mengatakan sudah berkali-kali menjawab masalah kasus pelanggaran HAM berat. Prabowo menuturkan jawaban-jawabannya bisa dilacak di jejak digital.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Pak Ganjar, justru tadi Anda sebut tahun 2009 kan, jadi sekian tahun yang lalu kan, dan masalah ini ditangani oleh wakil presiden (Mahfud Md) Anda, ya jadi apalagi yang mau ditanyakan kepada saya, saya sudah menjawab berkali-kali, ada rekam digitalnya, saya sudah menjawab berkali-kali,\" jawab Prabowo.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Untuk diketahui, cawapres Ganjar yang dimaksud Prabowo adalah Mahfud Md. Mahfud saat ini masih menjabat sebagai Menko Polhukam.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Prabowo menuturkan masalah ini selalu ditanyakan setiap 5 tahun jika polling-nya naik.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Bapak tahu data nggak? Bapak tanya ke kapolda tahun ini berapa orang hilang di DKI, ada mayat yang diketemukan beberapa hari yang lalu, dan sebagainya, come on Mas Ganjar, ya. Jadi saya tadi katakan saya merasa bahwa saya sangat keras membela hak asasi manusia,\" ujarnya.</span></p>', '2023-12-12 15:50:06', '1702396206.png', 'menunggu', 5),
(3, 'Prabowo Sindir Anies soal Polusi Jakarta: Susah Kalau Salahkan Angin  Baca artikel detikHealth, \"Prabowo Sindir Anies soal Polusi Jakarta: Susah Kalau Salahkan Angin\"', 'prabowo-sindir-anies-soal-polusi-jakarta-susah-kalau-salahkan-angin-baca-artikel-detikhealth-prabowo-sindir-anies-soal-polusi-jakarta-susah-kalau-salahkan-angin', '<p><strong>Jakarta</strong> - Calon Presiden (Capres) nomor urut 2 Prabowo Subianto mempertanyakan kinerja Anies Baswedan, Capres nomor urut 1, mengenai upaya menyelesaikan masalah polusi udara saat Anies menjabat sebagai Gubernur DKI.</p><p>Prabowo mengatakan DKI sudah diberi anggaran cukup besar setiap tahunnya namun masalah polusi udara masih terus hadir di Jakarta.</p><p><br></p><p>\"Selama Mas Anies memimpin, sering sekali DKI menerima indeks polusi tertinggi di dunia. Bagaimana dengan anggaran Rp 80 triliun? Pak Anies sebagai gubernur tidak dapat berbuat sesuatu yang berarti untuk mengurangi polusi?\" tanya Prabowo dalam debat yang diselenggarakan Komisi Pemilihan Umum (KPU) di Gedung KPU RI, Jakarta, Selasa (12/12/2023).</p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Anies menanggapi pertanyaan Prabowo dengan menyebutkan masalah polusi tak hanya berasal dari Jakarta. Hal tersebut tercermin dari indeks polusi udara di DKI yang cenderung berubah-ubah.</span></p><p><span style=\"color: rgb(0, 0, 0);\">Polutan polusi udara disebut Anies berasal dari Pembangkit Listrik Tenaga Uap (PLTU) yang anginnya \'terbang\' ke Jakarta.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ya kita punya maslah polusi karena itu kita kerjakan dengan pengendalian emisi dari kendaraan bermotor, elektrifikasi kendaraan umum dan ketiga konversi kendaraan umum,\" beber Anies.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Menanggapi, Prabowo menyinggung jawaban Anies mengenai angin tentang penyebab polusi di DKI Jakarta.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ya susah kalau kita menyalahkan angin. Jadi saya bertanya, saya bertanya dengan anggaran segitu besar, langkah-langkah yang bisa dilakukan dengan real dalam 5 tahun mengurangi polusi juga, di mana rakyat Jakarta begitu banyak yang mengalami sakit pernapasan,\" ujar Prabowo.</span></p>', '2023-12-12 15:51:39', '1702396299.jpg', 'menunggu', 7),
(4, 'MU Jual 5 Pemain ini di bulan januari', 'mu-jual-5-pemain-ini-di-bulan-januari', '<p><span style=\"color: rgb(0, 0, 0);\">Manchester - Manchester United dilaporkan mau jual lima pemainnya di bulan Januari alias pada bursa transfer musim dingin 2024 mendatang. Siapa saja?</span></p><p><span style=\"color: rgb(0, 0, 0);\">ilansir dari Sports Mole, Raphael Varane dikabarkan mau dijual MU karena sudah tersisih dari skuad utama. Varane juga langganan cedera (AP)</span></p><p><br></p>', '2023-12-12 15:54:17', '1702396457.png', 'menunggu', 5),
(5, 'Roller Coaster Lukaku: Bikin Gol Cepat, lalu Lakukan Tekel Horor', 'roller-coaster-lukaku-bikin-gol-cepat-lalu-lakukan-tekel-horor', '<p><strong>Roma</strong> - AS Roma mesti berbagi angka dengan Fiorentina usai berimbang 1-1. Striker Roma Romelu Lukaku menjalani pertandingan bak rollercoaster.</p><p>Laga Roma vs Fiorentina dilangsungkan di Stadion Olimpico, Senin (11/12/2023) dinihari WIB. Lukaku membuat publik tuan rumah bersorak setelah menciptakan gol cepat di menit kelima.</p><p><br></p><p>Lukaku menuntaskan umpan silang Paulo Dybala dari sayap kanan dengan tandukan dari jarak dekat. Roma memimpin 1-0 dari Fiorentina, yang bertahan sampai sekitar sejam kemudian.</p><p><br></p><p>Sayang sekali, Roma kemudian kehilangan Nicola Zalewski setelah menerima kartu kuning kedua (kartu merah) di menit ke-64. Fiorentina langsung memanfaatkan keunggulan jumlah pemain untuk mencetak gol balasan dari Lucas Martinez Quarta hanya dua menit berselang.</p><p><br></p><p>Giallorossi lantas menghadapi gempuran Fiorentina, yang mencari gol tambahan. Akan tetapi, Lukaku justru membuat kesalahan ceroboh di empat menit terakhir waktu normal.</p><p><br></p><p>Mantan bomber Chelsea, Manchester United, dan Inter Milan ini melakukan tekel horor kepada Christian Kouame. Lukaku menyasar pergelangan kaki kiri Kuame sehingga jatuh sambil meringis kesakitan.</p>', '2023-12-12 16:10:30', '1702396504.jpg', 'menunggu', 7),
(6, 'Michael Owen Menyanjung Moch Salah', 'michael-owen-menyanjung-moch-salah62023-12-12 23:07:57', '<p><span style=\"color: rgb(0, 0, 0);\">Capaian Mo Salah bikin legenda The Reds, Michael Owen seolah tidak percaya. Owen membuka, awalnya mungkin Salah tidak diperhitungkan bisa jadi setajam ini!</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ketika di Chelsea, dia terlihat biasa-biasa saja. Selanjutnya di AS Roma tiba-tiba dia mencetak banyak gol, lalu lanjut di Liverpool,\" jelas Owen dilansir dari Sky Sports.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Saya rasa kedatangannya di Liverpool bersamaan dengan cara bermain yang baru. Salah lantas mencetak banyak gol di musim pertamanya dan dicap one season wonder, tapi setelahnya dia tidak pernah berhenti bikin gol,\" tambahnya.</span></p>', '2023-12-12 20:13:15', '1702411995.jpg', 'aktif', 5),
(7, 'Jeka Saragih Menang di UFC, Bukti Jangan Remehkan \'Si Tendangan Maut\'', 'jeka-saragih-menang-di-ufc-bukti-jangan-remehkan-si-tendangan-maut72023-12-12 22:58:50', '<p><strong>Las Vegas</strong> - Jeka Saragih menang KO atas Lucas Alexander pada debut duelnya di UFC. Fighter berjuluk \'Si Tendangan Maut\' itu menjawab kritikan kepadanya.</p><p>Jeka menghabisi Alexander hanya di ronde pertama duel UFC Fight Night 232 di UFC Apex, Las Vegas, Minggu (19/11/2023) dini hari WIB. Jeka hanya butuh waktu 1 menit 31 detik untuk menang.</p><p>Punch keras Jeka membuat Alexander terhuyung, dan langsung dihujani pukulan lagi. Wasit memaksa duel dihentikan, fighter Indonesia dinyatakan menang.</p><p><br></p><p>Jeka sendiri merebut kemenangan pada duel debutnya di UFC. Sukses di oktagon itu membuatnya diganjar bonus penampilan sebesar 50 ribu dolar AS, sehingga total membawa pulang hadiah mencapai 85 ribu dolar AS atau sekitar Rp 1,2 miliar.</p><p>Jeka mengaku duel itu sekaligus menjadi jawaban atas kritikan banyak pihak. Ia senang bisa membuktikan dirinya menang pada debutnya.</p><p>\"Sebelum pertarungan banyak yang meragukan kemampuan saya, bahkan tidak yakin saya bisa menang. Tapi hal itu saya jadikan motivasi, dan saya buktikan kepada semua pihak yang meragukan, bahwa mereka salah, dan saya berhasil memenangkan pertarungan pertama saya,\" ucap Jeka Saragih, dalam rilis yang diterima detikSport.</p><p>Mola, sebagai official broadcaster UFC di Indonesia, menyebut masyarakat juga antusias menyaksikan pertarungan Jeka. Itu terlihat dari jumlah penonton yang menyaksikannya momen bersejarah Jeka.</p><p>\"Meski berlangsung singkat, laga Jeka Saragih melawan Lucas Alexander ini ditonton lebih dari 450.000 subscriber. Sempat mengalami kekhawatiran karena 2 kali adanya pembatalan pihak lawan Jeka, kami percaya Jeka Saragih dan tim telah bekerja keras dalam mempersiapkan pertarungan pertamanya ini. Kami ikut bangga dengan keberhasilan Jeka, namun ini baru langkah awal. Masih akan ada 4 laga yang harus dilalui Jeka dan prestasi ini semoga bisa diikuti petarung Indonesia lain yang akan bertanding di laga Cage Warriors yang nantinya juga akan ditayangkan secara langsung oleh Mola dan dapat disaksikan secara gratis,\" kata perwakilan Mola, Mirwan Suwarso.</p><p>Tak cuma itu, kemenangan Jeka juga membuat UFC Asia bangga. President UFC Asia, Kevin Chang, memuji Jeka dan berharap banyak fighter Indonesia bisa berbicara di pentas dunia.</p><p>\"Terima kasih pada Mola yang terus mendukung mengembangkan talenta Indonesia. Semoga Jeka Saragih menginspirasi petarung-petarung yang akan menjadi generasi penerus dalam mengejar mimpi mereka menjadi petarung terbaik di dunia,\" ujar Kevin.</p>', '2023-12-12 16:09:42', '1702397382.jpg', 'menunggu', 7),
(8, 'Ini Target Jonatan Christie di BWF World Tour Finals 2023', 'ini-target-jonatan-christie-di-bwf-world-tour-finals-202382023-12-12 23:04:48', '<p><span style=\"color: rgb(0, 0, 0);\">Jakarta - Pebulutangkis Indonesia Jonatan Christie punya tiga target utama di BWF World Tour Finals 2023. Salah satunya ia katakan dengan nada berkelakar.</span></p><p><span style=\"color: rgb(0, 0, 0);\">\"Targetnya pasti mau tampil semaksimal mungkin untuk mendapat hasil terbaik dan cari balikan modal nikah,\" kata Jonatan kepada pewarta di Pelatnas PBSI, Cipayung.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Tapi untuk pertama ingin mempertahankan (hasil) tahun lalu, kan kemarin semifinal. Karena itu berpengaruh ke ranking, poin, jadi sepertinya target pertama semifinal dulu,\" tuturnya</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">BWF World Tour Finals 2023 diselenggarakan di Hangzhou, China, pada 13-17 Desember mendatang. Jumlah hadiahnya meningkat dari edisi sebelumnya, kini berada di angka total 2,5 juta dolar AS.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Dua pekan sebelum BWF World Tour Finals 2023, Jonatan Christie melangsungkan pernikahan dengan Shania Junianatha, tepatnya pada 1 Desember lalu. Di sisi lain, pernikahan itu tak mengusik komitmennya berlatih.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Di BWF World Tour Finals tahun lalu, Jonatan berhasil menembus semifinal. Ia kalah dari Anthony Sinisuka Ginting, yang pada akhirnya takluk dari Viktor Axelsen di final. Babak empat besar kini juga menjadi target minimal Jojo.</span></p>', '2023-12-12 16:05:21', '1702397121.png', 'aktif', 5),
(9, 'Quartararo \'Ancam\' Yamaha Lagi', 'quartararo-ancam-yamaha-lagi92023-12-12 23:04:26', '<p><strong>Jakarta </strong>- Fabio Quartararo kembali menegaskan, dirinya tak akan ragu untuk meninggalkan Yamaha. Quartararo merasa Yamaha cuma punya waktu sebentar untuk bisa kompetitif.</p><p>Pebalap Prancis itu berhasil mempersembahkan titel juara dunia pada 2021, di musim debutnya setelah promosi dari Petronas SRT. Itu adalah titel Yamaha pertama sejak Jorge Lorenzo memenanginya pada 2015.</p><p>Namun, setelah finis runner-up di 2022 Quartararo semakin sulit kompetitif. Bahkan pada musim ini El Diablo tak sekalipun bisa memenangi balapan baik sprint race atau pun di hari Minggu. Pencapaian terbaik Quartararo hanya tiga kali finis podium ketiga di Austin, India, dan Mandalika.</p><p><br></p><p>Sinyalemen kurang meyakinkan diperlihatkan Yamaha setelah Fabio Quartararo cuma finis ke-14 pada tes post season di Valencia, November silam. Pabrikan Jepang itu tinggal memiliki waktu kurang dari tiga bulan untuk meyakinkan Quartararo dengan menunjukkan progres di dua tes pramusim di Sepang dan Qatar.</p><p>Seperti sebagian besar pebalap lainnya, kontrak Quartararo akan habis di akhir 2024. Rider berusia 24 tahun itu siap angkat kaki jika memang Yamaha tidak mampu memenuhi ekspektasinya.</p><p>\"Tentu saja sebagai seorang pebalap, Yamaha memberiku kesempatan tampil di MotoGP,\" ungkap Quartararo kepada Autosport. \"Aku memberi mereka sebuah titel juara. Hubungan kami bagus.\"</p><p><br></p><p>\"Sebagai seorang pebalap, aku ingin sekali bangkit dengan Yamaha, kembali meraih kemenangan-kemenangan. Kami pernah berada di momen-momen terbaik, momen-momen terburuk, dan aku ingin sekali kembali ke momen-momen terbaik itu.\"</p><p>\"Namun, masalahnya adalah kami punya waktu yang sangat-sangat singkat untuk melakukannya, terutama untuk diriku sendiri untuk yakin bahwa ini adalah sebuah proyek juara,\" lanjut dia.</p><p>\"Tentu saja, jika aku merasa aku tidak mempunyai sebuah proyek kemenangan, dan aku harus pergi, tentu saja aku harus membuat langkah itu. Namun, kulihat Yamaha sedang sangat berusaha dan aku ingin sekali kembali juara bersama mereka,\" Quartararo menambahkan.</p>', '2023-12-12 16:12:43', '1702397066.png', 'aktif', 7),
(10, 'Landmark Ikonik Hollywood Rayakan 100 Tahun', 'landmark-ikonik-hollywood-rayakan-100-tahun102023-12-12 23:09:28', '<p><strong>Amerika Serikat</strong> - Landmark Hollywood merayakan ulang tahun ke-100. Landmark ini diterangi lampu saat perayaan ke-100nya.</p><p>Matahari terbenam di depan papan ikonik Hollywood di Los Angeles, California, Amerika Serikat, Jumat (8/12/2023).&nbsp;</p>', '2023-12-12 16:13:30', '1702397610.jpg', 'aktif', 7),
(11, 'Terungkap! Alasan Panca Darmansyah Bunuh 4 Anaknya di Jagakarsa', 'terungkap-alasan-panca-darmansyah-bunuh-4-anaknya-di-jagakarsa', '<p><strong>Solo</strong> - Kapolres Metro Jakarta Selatan, Kombes Ade Ary Syam Indradi, membeberkan motif Panca Darmansyah alias Panca tega membunuh sadis 4 anak kandungnya di Jagakarsa, Jakarta Selatan. Aksi keji itu dilakukan Panca karena rasa cemburu kepada istrinya.</p><p>\"Inilah yang mendasari dia dari rasa cemburu ini terhadap saudara D,\" ucapnya saat ditemui di Polres Metro Jakarta Selatan, Selasa (12/12/2023) dilansir detikNews.</p><p><br></p><p>Ade menambahkan, Panca memilih melakukan aksinya menghabisi anak-anaknya ketika sang istri berada di rumah sakit. Dalihnya agar sang istri dapat hidup lebih leluasa.</p>', '2023-12-12 16:18:25', '1702397905.jpg', 'menunggu', 7),
(12, 'Buang Limbah ke Kali Pepe Brajan Boyolali, 2 Pria Disergap Warga', 'buang-limbah-ke-kali-pepe-brajan-boyolali-2-pria-disergap-warga', '<p><strong>Boyolali</strong> - Warga di Desa Brajan, Kecamatan Mojosongo, Kabupaten Boyolali, menangkap basah pelaku pembuangan limbah. Limbah cair yang diduga berbahaya itu dibuang di aliran Sungai Pepe.</p><p>Lokasi persisnya di tepi Kali Pepe, di bawah underpass jalan tol Dukuh Klepu, Desa Brajan, Kecamatan Mojosongo. Limbah dalam tujuh drum itu diangkut menggunakan mobil pikap.</p><p><br></p><p>\"Tiga drum sudah dibuang (di Kali Pepe) di underpass barat Dukuh Klepu. Ketahuan warga kemudian pergi, pindah ke sini ini (underpass timur Dukuh Klepu). Ini masih satu aliran,\" kata Kepala Desa Brajan, Siswanto, di lokasi kejadian, Selasa (12/12/2023).</p>', '2023-12-12 16:21:06', '1702398066.jpg', 'menunggu', 7),
(13, 'Kalender Jawa Selasa Pahing 12 Desember 2023: Bikin Ayang Terpesona', 'kalender-jawa-selasa-pahing-12-desember-2023-bikin-ayang-terpesona', '<p><strong>Solo</strong> - Hari ini, Selasa (12/12/2023) bertemu dengan pasaran Pahing. Dalam penanggalan Jawa, hari ini juga bertepatan dengan 28 Jumadilawal 1957, berada di Tahun Jimawal, Windu Sancaya dan Wuku Watugunung.</p><p>Selasa Pahing</p><p>Weton (hari kelahiran) Selasa Pahing memiliki neptu 12. Kecenderungan umumnya pandai, banyak akal, dan bisa memberikan pencerahan.</p><p><br></p><p>Pangarasan</p><p>Pangarasan pada weton ini adalah Aras Kembang, artinya gampang tampa sihing panggedhe alias mudah menerima asihnya atasan atau pimpinan.</p>', '2023-12-12 16:22:59', '1702398179.jpg', 'menunggu', 7),
(14, 'Unik! Desa di Klaten Abadikan Para Eks Kades Jadi Nama Jalan', 'unik-desa-di-klaten-abadikan-para-eks-kades-jadi-nama-jalan', '<p><strong>Klaten</strong> - Jamaknya, nama jalan kampung atau perumahan menggunakan nama pahlawan nasional, tokoh pewayangan, nama buah, bunga, ikan atau burung. Namun di Desa Sidowayah, Kecamatan Polanharjo, Klaten nama yang digunakan justru nama tokoh lokal setempat yang sudah meninggal, ini ceritanya.</p><p>detikJateng yang kebetulan melintas di desa tersebut sempat dibuat berpikir dua kali. Pasalnya di setiap jalan dan gang desa yang terletak di tepi jalan Tegalgondo-Janti itu terpampang papan nama jalan yang asing.</p><p><br></p><p>Papan nama jalan di desa tersebut terbuat dari besi bercat hijau dengan tiang cokelat. Tulisan ada yang memakai huruf alfabet dan di bawahnya huruf Jawa.</p><p><br></p>', '2023-12-12 16:24:31', '1702398271.jpg', 'menunggu', 7),
(15, 'Lahan Pertanian di Demak Terus Susut, BPS: Dampak Proyek Tol-Banjir Rob', 'lahan-pertanian-di-demak-terus-susut-bps-dampak-proyek-tol-banjir-rob', '<p><strong>Demak </strong>- Lahan pertanian di Kabupaten Demak terus berkurang dari tahun ke tahun. Hal tersebut dipengaruhi adanya proyek pembangunan hingga dampak banjir rob.</p><p>Kepala Badan Pusat Statistik (BPS) Demak Henri Wagiyanto menyebut dari hasil pencacahan sensus pertanian 2023 tahap I, dari 10 tahun sejak 2013-2023 menunjukkan penurunan. Yaitu Usaha Pertanian Perorangan (UTP) di Demak mengalami penurunan sekitar 13,60 persen atau 20.006 unit.</p><p><br></p><p>Penurunan juga terjadi pada Rumah Tangga Usaha Pertanian (RTUP) sebanyak 4,4 persen atau 125.659 rumah tangga. Berbeda dengan data 10 tahun sebelumnya pada tahun 2013 yang mencapai 131.474 rumah tangga.</p>', '2023-12-12 16:25:40', '1702398340.jpg', 'menunggu', 7),
(106, 'Merasa Pertanyaan soal HAM Tak Dijawab Prabowo, Ganjar Anggap Tak Tegas', 'merasa-pertanyaan-soal-ham-tak-dijawab-prabowo-ganjar-anggap-tak-tegas-baca-artikel-detiknews-merasa-pertanyaan-soal-ham-tak-dijawab-prabowo-ganjar-anggap-tak-tegas', '<p>Jakarta - Capres nomor urut 3, Ganjar Pranowo, menyayangkan capres nomor urut 2, Prabowo Subianto tak menjawab pertanyaannya soal pengadilan HAM. Ganjar menyebut Prabowo tak tegas.</p><p>\"Pak Prabowo ini punya ketegasan yang luar biasa, luar biasa, tapi sayang pada dua jawaban ini (menunjukan Prabowo) sama sekali tidak punya ketegasan itu,\" ujar Ganjar di Gedung KPU, Menteng, Jakpus, Selasa (12/12/2023).</p><p><br></p><p>Diketahui, Ganjar bertanya soal apakah Prabowo akan membuat pengadilan HAM bila terpilih menjadi presiden. Selain itu, Ganjar juga bertanya apakah Prabowo akan membantu mencarikan makam aktivis-aktivis yang hilang di masa lalu.</p><p><br></p><p>\"Pertanyaan saya sebenarnya satu apakah kalau bapak jadi presiden akan membuat pengadilan HAM. Pertanyaan nomor dua apakah bapak bisa menemukan menunjukkan membantu pada keluarga (aktivis) agar kemudian bisa berziarah. Dua (pertanyaan) ini sama-sama tidak dijawab,\" kata Ganjar.</p><p><br></p><p>\"Maka kalau boleh saya meminta, kalau saya jadi presiden saya akan bereskan ini agar kemudian dalam kontestasi Pilpres berikutnya ini (isu pelanggaran HAM) tidak akan muncul lagi kena presidennya tegas menuntaskan pekerjaan itu pada era-nya,\" terangnya.</p>', '2023-12-12 15:47:08', '1702395977.png', 'menunggu', 5),
(107, 'Ganjar Singgung kasus HAM berat, prabowo tunjuk mahfud md', 'ganjar-singgung-kasus-ham-berat-prabowo-tunjuk-mahfud-md', '<p><span style=\"color: rgb(0, 0, 0);\">Jakarta - Capres nomor urut 3 Ganjar Pranowo menanyakan soal penanganan kasus HAM berat terdahulu kepada capres nomor urut 2 Prabowo Subianto. Apa jawab Prabowo?</span></p><p><span style=\"color: rgb(0, 0, 0);\">Ganjar awalnya diberi kesempatan oleh moderator untuk bertanya kepada Prabowo. Ganjar memaparkan ada 12 kasus pelanggaran HAM berat seperti Peristiwa 65, penembakan misterius, Talangsari, penghilangan paksa sampai Wamena.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Saya ingatkan tahun 2009 DPR sudah mengeluarkan 4 rekomendasi pada saat itu kepada presiden. Satu, membentuk pengadilan HAM ad hoc. Yang kedua, menemukan 13 korban penghilangan paksa. Yang ketiga memberikan kompensasi dan pemulihan, dan yang keempat meratifikasi konvensi antipenghilangan paksa sebagai upaya pencegahan,\" kata Ganjar dalam Debat Capres Pertama yang digelar di gedung KPU, Jakarta Pusat, Selasa (12/12/2023).</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Ganjar lalu menyampaikan dua pertanyaannya. Salah satunya terkait pengadilan HAM ad hoc.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Pertanyaan saya ada dua, kalau Bapak ada di situ apakah akan membuat pengadilan HAM dan membereskan rekomendasi DPR? Pertanyaan kedua, di luar sana banyak menunggu ibu-ibu, apakah Bapak bisa membantu menemukan di mana kuburnya yang hilang agar mereka bisa berziarah?\" tanya Ganjar.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Prabowo mengatakan sudah berkali-kali menjawab masalah kasus pelanggaran HAM berat. Prabowo menuturkan jawaban-jawabannya bisa dilacak di jejak digital.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Pak Ganjar, justru tadi Anda sebut tahun 2009 kan, jadi sekian tahun yang lalu kan, dan masalah ini ditangani oleh wakil presiden (Mahfud Md) Anda, ya jadi apalagi yang mau ditanyakan kepada saya, saya sudah menjawab berkali-kali, ada rekam digitalnya, saya sudah menjawab berkali-kali,\" jawab Prabowo.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Untuk diketahui, cawapres Ganjar yang dimaksud Prabowo adalah Mahfud Md. Mahfud saat ini masih menjabat sebagai Menko Polhukam.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Prabowo menuturkan masalah ini selalu ditanyakan setiap 5 tahun jika polling-nya naik.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Bapak tahu data nggak? Bapak tanya ke kapolda tahun ini berapa orang hilang di DKI, ada mayat yang diketemukan beberapa hari yang lalu, dan sebagainya, come on Mas Ganjar, ya. Jadi saya tadi katakan saya merasa bahwa saya sangat keras membela hak asasi manusia,\" ujarnya.</span></p>', '2023-12-12 15:50:06', '1702396206.png', 'menunggu', 5),
(108, 'Prabowo Sindir Anies soal Polusi Jakarta: Susah Kalau Salahkan Angin  Baca artikel detikHealth, \"Prabowo Sindir Anies soal Polusi Jakarta: Susah Kalau Salahkan Angin\"', 'prabowo-sindir-anies-soal-polusi-jakarta-susah-kalau-salahkan-angin-baca-artikel-detikhealth-prabowo-sindir-anies-soal-polusi-jakarta-susah-kalau-salahkan-angin', '<p><strong>Jakarta</strong> - Calon Presiden (Capres) nomor urut 2 Prabowo Subianto mempertanyakan kinerja Anies Baswedan, Capres nomor urut 1, mengenai upaya menyelesaikan masalah polusi udara saat Anies menjabat sebagai Gubernur DKI.</p><p>Prabowo mengatakan DKI sudah diberi anggaran cukup besar setiap tahunnya namun masalah polusi udara masih terus hadir di Jakarta.</p><p><br></p><p>\"Selama Mas Anies memimpin, sering sekali DKI menerima indeks polusi tertinggi di dunia. Bagaimana dengan anggaran Rp 80 triliun? Pak Anies sebagai gubernur tidak dapat berbuat sesuatu yang berarti untuk mengurangi polusi?\" tanya Prabowo dalam debat yang diselenggarakan Komisi Pemilihan Umum (KPU) di Gedung KPU RI, Jakarta, Selasa (12/12/2023).</p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Anies menanggapi pertanyaan Prabowo dengan menyebutkan masalah polusi tak hanya berasal dari Jakarta. Hal tersebut tercermin dari indeks polusi udara di DKI yang cenderung berubah-ubah.</span></p><p><span style=\"color: rgb(0, 0, 0);\">Polutan polusi udara disebut Anies berasal dari Pembangkit Listrik Tenaga Uap (PLTU) yang anginnya \'terbang\' ke Jakarta.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ya kita punya maslah polusi karena itu kita kerjakan dengan pengendalian emisi dari kendaraan bermotor, elektrifikasi kendaraan umum dan ketiga konversi kendaraan umum,\" beber Anies.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Menanggapi, Prabowo menyinggung jawaban Anies mengenai angin tentang penyebab polusi di DKI Jakarta.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ya susah kalau kita menyalahkan angin. Jadi saya bertanya, saya bertanya dengan anggaran segitu besar, langkah-langkah yang bisa dilakukan dengan real dalam 5 tahun mengurangi polusi juga, di mana rakyat Jakarta begitu banyak yang mengalami sakit pernapasan,\" ujar Prabowo.</span></p>', '2023-12-12 15:51:39', '1702396299.jpg', 'menunggu', 7),
(109, 'MU Jual 5 Pemain ini di bulan januari', 'mu-jual-5-pemain-ini-di-bulan-januari', '<p><span style=\"color: rgb(0, 0, 0);\">Manchester - Manchester United dilaporkan mau jual lima pemainnya di bulan Januari alias pada bursa transfer musim dingin 2024 mendatang. Siapa saja?</span></p><p><span style=\"color: rgb(0, 0, 0);\">ilansir dari Sports Mole, Raphael Varane dikabarkan mau dijual MU karena sudah tersisih dari skuad utama. Varane juga langganan cedera (AP)</span></p><p><br></p>', '2023-12-12 15:54:17', '1702396457.png', 'menunggu', 5),
(110, 'Roller Coaster Lukaku: Bikin Gol Cepat, lalu Lakukan Tekel Horor', 'roller-coaster-lukaku-bikin-gol-cepat-lalu-lakukan-tekel-horor', '<p><strong>Roma</strong> - AS Roma mesti berbagi angka dengan Fiorentina usai berimbang 1-1. Striker Roma Romelu Lukaku menjalani pertandingan bak rollercoaster.</p><p>Laga Roma vs Fiorentina dilangsungkan di Stadion Olimpico, Senin (11/12/2023) dinihari WIB. Lukaku membuat publik tuan rumah bersorak setelah menciptakan gol cepat di menit kelima.</p><p><br></p><p>Lukaku menuntaskan umpan silang Paulo Dybala dari sayap kanan dengan tandukan dari jarak dekat. Roma memimpin 1-0 dari Fiorentina, yang bertahan sampai sekitar sejam kemudian.</p><p><br></p><p>Sayang sekali, Roma kemudian kehilangan Nicola Zalewski setelah menerima kartu kuning kedua (kartu merah) di menit ke-64. Fiorentina langsung memanfaatkan keunggulan jumlah pemain untuk mencetak gol balasan dari Lucas Martinez Quarta hanya dua menit berselang.</p><p><br></p><p>Giallorossi lantas menghadapi gempuran Fiorentina, yang mencari gol tambahan. Akan tetapi, Lukaku justru membuat kesalahan ceroboh di empat menit terakhir waktu normal.</p><p><br></p><p>Mantan bomber Chelsea, Manchester United, dan Inter Milan ini melakukan tekel horor kepada Christian Kouame. Lukaku menyasar pergelangan kaki kiri Kuame sehingga jatuh sambil meringis kesakitan.</p>', '2023-12-12 16:10:30', '1702396504.jpg', 'menunggu', 7),
(111, 'Michael Owen Menyanjung Moch Salah', 'michael-owen-menyanjung-moch-salah1112023-12-12 23:07:57', '<p><span style=\"color: rgb(0, 0, 0);\">Capaian Mo Salah bikin legenda The Reds, Michael Owen seolah tidak percaya. Owen membuka, awalnya mungkin Salah tidak diperhitungkan bisa jadi setajam ini!</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Ketika di Chelsea, dia terlihat biasa-biasa saja. Selanjutnya di AS Roma tiba-tiba dia mencetak banyak gol, lalu lanjut di Liverpool,\" jelas Owen dilansir dari Sky Sports.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Saya rasa kedatangannya di Liverpool bersamaan dengan cara bermain yang baru. Salah lantas mencetak banyak gol di musim pertamanya dan dicap one season wonder, tapi setelahnya dia tidak pernah berhenti bikin gol,\" tambahnya.</span></p>', '2023-12-12 20:13:38', '1702412018.jpg', 'aktif', 5),
(112, 'Jeka Saragih Menang di UFC, Bukti Jangan Remehkan \'Si Tendangan Maut\'', 'jeka-saragih-menang-di-ufc-bukti-jangan-remehkan-si-tendangan-maut72023-12-12 22:58:50', '<p><strong>Las Vegas</strong> - Jeka Saragih menang KO atas Lucas Alexander pada debut duelnya di UFC. Fighter berjuluk \'Si Tendangan Maut\' itu menjawab kritikan kepadanya.</p><p>Jeka menghabisi Alexander hanya di ronde pertama duel UFC Fight Night 232 di UFC Apex, Las Vegas, Minggu (19/11/2023) dini hari WIB. Jeka hanya butuh waktu 1 menit 31 detik untuk menang.</p><p>Punch keras Jeka membuat Alexander terhuyung, dan langsung dihujani pukulan lagi. Wasit memaksa duel dihentikan, fighter Indonesia dinyatakan menang.</p><p><br></p><p>Jeka sendiri merebut kemenangan pada duel debutnya di UFC. Sukses di oktagon itu membuatnya diganjar bonus penampilan sebesar 50 ribu dolar AS, sehingga total membawa pulang hadiah mencapai 85 ribu dolar AS atau sekitar Rp 1,2 miliar.</p><p>Jeka mengaku duel itu sekaligus menjadi jawaban atas kritikan banyak pihak. Ia senang bisa membuktikan dirinya menang pada debutnya.</p><p>\"Sebelum pertarungan banyak yang meragukan kemampuan saya, bahkan tidak yakin saya bisa menang. Tapi hal itu saya jadikan motivasi, dan saya buktikan kepada semua pihak yang meragukan, bahwa mereka salah, dan saya berhasil memenangkan pertarungan pertama saya,\" ucap Jeka Saragih, dalam rilis yang diterima detikSport.</p><p>Mola, sebagai official broadcaster UFC di Indonesia, menyebut masyarakat juga antusias menyaksikan pertarungan Jeka. Itu terlihat dari jumlah penonton yang menyaksikannya momen bersejarah Jeka.</p><p>\"Meski berlangsung singkat, laga Jeka Saragih melawan Lucas Alexander ini ditonton lebih dari 450.000 subscriber. Sempat mengalami kekhawatiran karena 2 kali adanya pembatalan pihak lawan Jeka, kami percaya Jeka Saragih dan tim telah bekerja keras dalam mempersiapkan pertarungan pertamanya ini. Kami ikut bangga dengan keberhasilan Jeka, namun ini baru langkah awal. Masih akan ada 4 laga yang harus dilalui Jeka dan prestasi ini semoga bisa diikuti petarung Indonesia lain yang akan bertanding di laga Cage Warriors yang nantinya juga akan ditayangkan secara langsung oleh Mola dan dapat disaksikan secara gratis,\" kata perwakilan Mola, Mirwan Suwarso.</p><p>Tak cuma itu, kemenangan Jeka juga membuat UFC Asia bangga. President UFC Asia, Kevin Chang, memuji Jeka dan berharap banyak fighter Indonesia bisa berbicara di pentas dunia.</p><p>\"Terima kasih pada Mola yang terus mendukung mengembangkan talenta Indonesia. Semoga Jeka Saragih menginspirasi petarung-petarung yang akan menjadi generasi penerus dalam mengejar mimpi mereka menjadi petarung terbaik di dunia,\" ujar Kevin.</p>', '2023-12-12 16:09:42', '1702397382.jpg', 'menunggu', 7),
(113, 'Ini Target Jonatan Christie di BWF World Tour Finals 2023', 'ini-target-jonatan-christie-di-bwf-world-tour-finals-202382023-12-12 23:04:48', '<p><span style=\"color: rgb(0, 0, 0);\">Jakarta - Pebulutangkis Indonesia Jonatan Christie punya tiga target utama di BWF World Tour Finals 2023. Salah satunya ia katakan dengan nada berkelakar.</span></p><p><span style=\"color: rgb(0, 0, 0);\">\"Targetnya pasti mau tampil semaksimal mungkin untuk mendapat hasil terbaik dan cari balikan modal nikah,\" kata Jonatan kepada pewarta di Pelatnas PBSI, Cipayung.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">\"Tapi untuk pertama ingin mempertahankan (hasil) tahun lalu, kan kemarin semifinal. Karena itu berpengaruh ke ranking, poin, jadi sepertinya target pertama semifinal dulu,\" tuturnya</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">BWF World Tour Finals 2023 diselenggarakan di Hangzhou, China, pada 13-17 Desember mendatang. Jumlah hadiahnya meningkat dari edisi sebelumnya, kini berada di angka total 2,5 juta dolar AS.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Dua pekan sebelum BWF World Tour Finals 2023, Jonatan Christie melangsungkan pernikahan dengan Shania Junianatha, tepatnya pada 1 Desember lalu. Di sisi lain, pernikahan itu tak mengusik komitmennya berlatih.</span></p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">Di BWF World Tour Finals tahun lalu, Jonatan berhasil menembus semifinal. Ia kalah dari Anthony Sinisuka Ginting, yang pada akhirnya takluk dari Viktor Axelsen di final. Babak empat besar kini juga menjadi target minimal Jojo.</span></p>', '2023-12-12 16:05:21', '1702397121.png', 'aktif', 5),
(114, 'Quartararo \'Ancam\' Yamaha Lagi', 'quartararo-ancam-yamaha-lagi92023-12-12 23:04:26', '<p><strong>Jakarta </strong>- Fabio Quartararo kembali menegaskan, dirinya tak akan ragu untuk meninggalkan Yamaha. Quartararo merasa Yamaha cuma punya waktu sebentar untuk bisa kompetitif.</p><p>Pebalap Prancis itu berhasil mempersembahkan titel juara dunia pada 2021, di musim debutnya setelah promosi dari Petronas SRT. Itu adalah titel Yamaha pertama sejak Jorge Lorenzo memenanginya pada 2015.</p><p>Namun, setelah finis runner-up di 2022 Quartararo semakin sulit kompetitif. Bahkan pada musim ini El Diablo tak sekalipun bisa memenangi balapan baik sprint race atau pun di hari Minggu. Pencapaian terbaik Quartararo hanya tiga kali finis podium ketiga di Austin, India, dan Mandalika.</p><p><br></p><p>Sinyalemen kurang meyakinkan diperlihatkan Yamaha setelah Fabio Quartararo cuma finis ke-14 pada tes post season di Valencia, November silam. Pabrikan Jepang itu tinggal memiliki waktu kurang dari tiga bulan untuk meyakinkan Quartararo dengan menunjukkan progres di dua tes pramusim di Sepang dan Qatar.</p><p>Seperti sebagian besar pebalap lainnya, kontrak Quartararo akan habis di akhir 2024. Rider berusia 24 tahun itu siap angkat kaki jika memang Yamaha tidak mampu memenuhi ekspektasinya.</p><p>\"Tentu saja sebagai seorang pebalap, Yamaha memberiku kesempatan tampil di MotoGP,\" ungkap Quartararo kepada Autosport. \"Aku memberi mereka sebuah titel juara. Hubungan kami bagus.\"</p><p><br></p><p>\"Sebagai seorang pebalap, aku ingin sekali bangkit dengan Yamaha, kembali meraih kemenangan-kemenangan. Kami pernah berada di momen-momen terbaik, momen-momen terburuk, dan aku ingin sekali kembali ke momen-momen terbaik itu.\"</p><p>\"Namun, masalahnya adalah kami punya waktu yang sangat-sangat singkat untuk melakukannya, terutama untuk diriku sendiri untuk yakin bahwa ini adalah sebuah proyek juara,\" lanjut dia.</p><p>\"Tentu saja, jika aku merasa aku tidak mempunyai sebuah proyek kemenangan, dan aku harus pergi, tentu saja aku harus membuat langkah itu. Namun, kulihat Yamaha sedang sangat berusaha dan aku ingin sekali kembali juara bersama mereka,\" Quartararo menambahkan.</p>', '2023-12-12 16:12:43', '1702397066.png', 'aktif', 7),
(115, 'Landmark Ikonik Hollywood Rayakan 100 Tahun', 'landmark-ikonik-hollywood-rayakan-100-tahun102023-12-12 23:09:28', '<p><strong>Amerika Serikat</strong> - Landmark Hollywood merayakan ulang tahun ke-100. Landmark ini diterangi lampu saat perayaan ke-100nya.</p><p>Matahari terbenam di depan papan ikonik Hollywood di Los Angeles, California, Amerika Serikat, Jumat (8/12/2023).&nbsp;</p>', '2023-12-12 16:13:30', '1702397610.jpg', 'aktif', 7),
(116, 'Terungkap! Alasan Panca Darmansyah Bunuh 4 Anaknya di Jagakarsa', 'terungkap-alasan-panca-darmansyah-bunuh-4-anaknya-di-jagakarsa', '<p><strong>Solo</strong> - Kapolres Metro Jakarta Selatan, Kombes Ade Ary Syam Indradi, membeberkan motif Panca Darmansyah alias Panca tega membunuh sadis 4 anak kandungnya di Jagakarsa, Jakarta Selatan. Aksi keji itu dilakukan Panca karena rasa cemburu kepada istrinya.</p><p>\"Inilah yang mendasari dia dari rasa cemburu ini terhadap saudara D,\" ucapnya saat ditemui di Polres Metro Jakarta Selatan, Selasa (12/12/2023) dilansir detikNews.</p><p><br></p><p>Ade menambahkan, Panca memilih melakukan aksinya menghabisi anak-anaknya ketika sang istri berada di rumah sakit. Dalihnya agar sang istri dapat hidup lebih leluasa.</p>', '2023-12-12 16:18:25', '1702397905.jpg', 'menunggu', 7),
(117, 'Buang Limbah ke Kali Pepe Brajan Boyolali, 2 Pria Disergap Warga', 'buang-limbah-ke-kali-pepe-brajan-boyolali-2-pria-disergap-warga', '<p><strong>Boyolali</strong> - Warga di Desa Brajan, Kecamatan Mojosongo, Kabupaten Boyolali, menangkap basah pelaku pembuangan limbah. Limbah cair yang diduga berbahaya itu dibuang di aliran Sungai Pepe.</p><p>Lokasi persisnya di tepi Kali Pepe, di bawah underpass jalan tol Dukuh Klepu, Desa Brajan, Kecamatan Mojosongo. Limbah dalam tujuh drum itu diangkut menggunakan mobil pikap.</p><p><br></p><p>\"Tiga drum sudah dibuang (di Kali Pepe) di underpass barat Dukuh Klepu. Ketahuan warga kemudian pergi, pindah ke sini ini (underpass timur Dukuh Klepu). Ini masih satu aliran,\" kata Kepala Desa Brajan, Siswanto, di lokasi kejadian, Selasa (12/12/2023).</p>', '2023-12-12 16:21:06', '1702398066.jpg', 'menunggu', 7),
(118, 'Kalender Jawa Selasa Pahing 12 Desember 2023: Bikin Ayang Terpesona', 'kalender-jawa-selasa-pahing-12-desember-2023-bikin-ayang-terpesona', '<p><strong>Solo</strong> - Hari ini, Selasa (12/12/2023) bertemu dengan pasaran Pahing. Dalam penanggalan Jawa, hari ini juga bertepatan dengan 28 Jumadilawal 1957, berada di Tahun Jimawal, Windu Sancaya dan Wuku Watugunung.</p><p>Selasa Pahing</p><p>Weton (hari kelahiran) Selasa Pahing memiliki neptu 12. Kecenderungan umumnya pandai, banyak akal, dan bisa memberikan pencerahan.</p><p><br></p><p>Pangarasan</p><p>Pangarasan pada weton ini adalah Aras Kembang, artinya gampang tampa sihing panggedhe alias mudah menerima asihnya atasan atau pimpinan.</p>', '2023-12-12 16:22:59', '1702398179.jpg', 'menunggu', 7),
(119, 'Unik! Desa di Klaten Abadikan Para Eks Kades Jadi Nama Jalan', 'unik-desa-di-klaten-abadikan-para-eks-kades-jadi-nama-jalan', '<p><strong>Klaten</strong> - Jamaknya, nama jalan kampung atau perumahan menggunakan nama pahlawan nasional, tokoh pewayangan, nama buah, bunga, ikan atau burung. Namun di Desa Sidowayah, Kecamatan Polanharjo, Klaten nama yang digunakan justru nama tokoh lokal setempat yang sudah meninggal, ini ceritanya.</p><p>detikJateng yang kebetulan melintas di desa tersebut sempat dibuat berpikir dua kali. Pasalnya di setiap jalan dan gang desa yang terletak di tepi jalan Tegalgondo-Janti itu terpampang papan nama jalan yang asing.</p><p><br></p><p>Papan nama jalan di desa tersebut terbuat dari besi bercat hijau dengan tiang cokelat. Tulisan ada yang memakai huruf alfabet dan di bawahnya huruf Jawa.</p><p><br></p>', '2023-12-12 16:24:31', '1702398271.jpg', 'menunggu', 7),
(120, 'Lahan Pertanian di Demak Terus Susut, BPS: Dampak Proyek Tol-Banjir Rob', 'lahan-pertanian-di-demak-terus-susut-bps-dampak-proyek-tol-banjir-rob', '<p><strong>Demak </strong>- Lahan pertanian di Kabupaten Demak terus berkurang dari tahun ke tahun. Hal tersebut dipengaruhi adanya proyek pembangunan hingga dampak banjir rob.</p><p>Kepala Badan Pusat Statistik (BPS) Demak Henri Wagiyanto menyebut dari hasil pencacahan sensus pertanian 2023 tahap I, dari 10 tahun sejak 2013-2023 menunjukkan penurunan. Yaitu Usaha Pertanian Perorangan (UTP) di Demak mengalami penurunan sekitar 13,60 persen atau 20.006 unit.</p><p><br></p><p>Penurunan juga terjadi pada Rumah Tangga Usaha Pertanian (RTUP) sebanyak 4,4 persen atau 125.659 rumah tangga. Berbeda dengan data 10 tahun sebelumnya pada tahun 2013 yang mencapai 131.474 rumah tangga.</p>', '2023-12-12 16:25:40', '1702398340.jpg', 'menunggu', 7);

-- --------------------------------------------------------

--
-- Table structure for table `berita_has_kategori`
--

CREATE TABLE `berita_has_kategori` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita_has_kategori`
--

INSERT INTO `berita_has_kategori` (`id_berita`, `id_kategori`) VALUES
(6, 3),
(111, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_loker` bigint(20) UNSIGNED NOT NULL,
  `isi_chat` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `waktu_chat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('3a356aae-5403-4337-9446-d036622f4be2', 7, 9, 'halo gi', NULL, 0, '2023-12-12 16:52:47', '2023-12-12 16:52:47'),
('63afd104-ffe2-4d96-869e-916cd4cdc09e', 6, 7, 'tersedia pak', NULL, 1, '2023-12-12 16:53:11', '2023-12-12 16:53:12'),
('826433f0-8f79-4f46-be8c-9becdcaff827', 6, 7, 'langsung daftar saja', NULL, 1, '2023-12-12 16:53:19', '2023-12-12 16:53:20'),
('b054f68d-11e4-4c53-812d-66e74ed3d3f2', 7, 6, 'Halo selamat malam', NULL, 1, '2023-12-12 16:51:19', '2023-12-12 16:53:00'),
('c5dcb300-d621-4267-825c-b10d2d0d9a82', 6, 6, 'akowoakw', NULL, 0, '2023-12-12 16:28:58', '2023-12-12 16:28:58'),
('d339f4e4-f98d-4c64-97e3-8e96c6e6c6b8', 7, 6, 'Mohon maaf menggangu waktunya', NULL, 1, '2023-12-12 16:51:57', '2023-12-12 16:53:00'),
('d666d181-8072-411a-987c-810109a2c502', 7, 6, 'Apakah tersedia lokernya?', NULL, 1, '2023-12-12 16:51:33', '2023-12-12 16:53:00'),
('ef9dea2b-88bd-425b-92dc-cf483b43f566', 7, 6, 'Saya ingin mendaftar', NULL, 1, '2023-12-12 16:51:51', '2023-12-12 16:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Pendidikan', 'Berisi tentang pendidikan'),
(2, 'Sosial', 'Berisi tentang sosial'),
(3, 'Sport', 'Berisi tentang sport'),
(4, 'Ekonomi', 'Berisi tentang ekonomi'),
(5, 'Teknologi', 'Berisi tentang teknologi'),
(6, 'Hiburan', 'Berisi tentang hiburan'),
(7, 'Olahraga', 'Berisi tentang olahraga'),
(8, 'Kesehatan', 'Berisi tentang kesehatan'),
(9, 'Fashion', 'Berisi tentang fashion'),
(10, 'Web Developer', 'Berisi tentang web developer'),
(11, 'UI UX Designer', 'Berisi tentang UI UX Designer'),
(12, 'Frontend Developer', 'Berisi tentang frontend Designer'),
(13, 'Backend Developer', 'Berisi tentang backend developer'),
(14, 'Mobile App Developer', 'Berisi tentang mobile app developer'),
(15, 'IT Consultant', 'Berisi tentang IT Consultant'),
(16, 'Guru', 'Berisi tentang guru'),
(17, 'Keuangan', 'Berisi tentang keuangan'),
(18, 'Staff', 'Berisi tentang staff'),
(19, 'Dokter', 'Berisi tentang dokter'),
(20, 'Manajer', 'Berisi tentang manajer');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_berita`, `id_user`, `isi_komentar`, `waktu_komentar`) VALUES
(3, 15, 4, 'bagus banget', '2023-12-12 20:03:38'),
(4, 12, 4, 'bagus', '2023-12-12 20:04:13'),
(5, 12, 4, 'keren beritanya', '2023-12-12 20:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `id_berita`, `id_user`) VALUES
(4, 15, 4),
(5, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_loker` text NOT NULL,
  `slug` text NOT NULL,
  `deskripsi_loker` longtext NOT NULL,
  `alamat` text NOT NULL,
  `waktu_publikasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `id_user`, `nama_loker`, `slug`, `deskripsi_loker`, `alamat`, `waktu_publikasi`) VALUES
(1, 6, 'Kurir Motor', 'kurir-motor-2023-12-12 23:20:17', '<p><span style=\"color: rgb(32, 33, 36);\">- Memuat, mengangkut, dan mengirimkan barang menggunakan sepeda motor ke tempat tujuan dengan aman dan tepat waktu</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Pengantaran 40-70 paket/hari</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Bersedia masuk pagi jam 8 pagi</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Meninjau pesanan sebelum dan sesudah pengiriman untuk memastikan kualitas pengiriman</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Mencatat dan melaporkan kegiatan pengiriman kepada perusahaan</span></p>', 'Tangerang, Kota Tangerang, Banten', '2023-12-12 16:20:17'),
(2, 6, 'Sales And Marketing Specialist', 'sales-and-marketing-specialist-2023-12-12 23:22:59', '<p><span style=\"color: rgb(32, 33, 36);\">Tips: Provide a summary of the role, what success in the position looks like, and how this role fits into the organization overall.</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Responsibilities</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">[Be specific when describing each of the responsibilities. Use gender-neutral, inclusive language.]</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Example: Determine and develop user requirements for systems in production, to ensure maximum usability</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Qualifications</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">[Some qualifications you may want to include are Skills, Education, Experience, or Certifications.]</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Example: Excellent verbal and written communication skills .</span></p>', 'Tangerang, Kota Tangerang, Banten', '2023-12-12 16:22:59'),
(3, 6, 'Lowongan Dokter pada Shape Up Jakarta Selatan', 'lowongan-dokter-pada-shape-up-jakarta-selatan-2023-12-12 23:24:16', '<p><span style=\"color: rgb(32, 33, 36);\">Keuntungan 5 Hari Kerja Office Hours (8 Jam per Hari) Attractive Benefit Package Tugas &amp; Tanggung Jawab : Melakukan konsultasi kepada pasien</span></p>', 'Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', '2023-12-12 16:24:16'),
(4, 6, 'Front End Developer (intern)', 'front-end-developer-intern-2023-12-12 23:25:25', '<p><span style=\"color: rgb(32, 33, 36);\">Sebagai Front End Developer (Intern), Anda akan bertanggung jawab dalam penerapan elemen visual dan berinteraksi dengan pengguna dalam aplikasi web, serta melakukan terjemahan wireframe desain UI / UX ke kode aktual yang akan menghasilkan elemen visual aplikasi dalam web (akan bekerja dengan desainer UI / UX dan menjembatani kesenjangan antara desain grafis dan implementasi teknis). Skill Requirements : Modern Framework Rest API Responsive web design, security standard web, microservices architecture Web/ Mobile/ Application Management</span></p>', 'Jakarta, Daerah Khusus Ibukota Jakarta', '2023-12-12 16:25:25'),
(5, 6, 'Mekanik Kendaraan', 'mekanik-kendaraan-2023-12-12 23:27:06', '<p><span style=\"color: rgb(32, 33, 36);\">Melakukan pengecekan berkala kondisi semua kendaraan operasional sebelum beroperasi atau setelah beroperasi</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Melakukan perawatan dan perbaikan seluruh unit kendaraan operasional</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Memastikan seluruh kendaraan operasional berfungsi dengan baik</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Melakukan storing jika dibutuhkan</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Jenis Kendaraan yang akan ditangani Granmax, CDE, CDD, dan Fuso</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Laki - laki</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Pendidikan mínimal SMK Otomotif / Diploma</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Usia masksimal 35 tahun</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Memiliki SIM A dan SIM C</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Memiliki pengalaman mínimal 1 tahun sebagai mekanik</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Berpengalaman sebagai Mekanik Mobil &amp; Truck</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Menguasai semua perbaikan dan perawatan mobil &amp; truck baik ringan maupun berat</span></p><p><span style=\"color: rgb(32, 33, 36);\">- Dapat bergabung segera</span></p>', 'Jakarta, Daerah Khusus Ibukota Jakarta', '2023-12-12 16:27:06'),
(6, 6, 'Web Developer & Data Analyst Internship', 'web-developer-data-analyst-internship-2023-12-12 23:30:22', '<p>J<span style=\"color: rgb(32, 33, 36);\">ob Responbility:</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Iteratively build company website and maintain web page design</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Optimizing company website data to check traffic levels and fix site errors</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Develop integration and automation to third-party tools for business development purposes (e-commerce, CMS, LMS, CRM)</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Job Requirements:</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Pursuing degree in UI/UX, Computer Science, Information System or closely related discipline or equivalent work experience</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Experience in Webflow development and integration (e-commerce, CMS, LMS, CRM)</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Able to understand data analytics &amp; visualization with Python (Pandas, Numpy, Requests)</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Willing to learn performance ads management: Meta, Google, Tiktok</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Willing to learn Cloudflare &amp; Amazon Web Services (S3,EC2, RDS)</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Nice to have: Experienced in using: Wordpress, Wordpress plugins (E-commerce,</span></p><p><span style=\"color: rgb(32, 33, 36);\">• Learning Management System), HTML, CSS, JavaScript</span></p>', 'Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', '2023-12-12 16:30:22'),
(7, 6, 'Senior Software Engineer - Android', 'senior-software-engineer-android-2023-12-12 23:32:32', '<p><span style=\"color: rgb(32, 33, 36);\">About the Role</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">We are seeking a Senior Android Engineer who has a passion for solving engineering challenges such as enhancing the build system, optimizing app performance, refining platform tools, and creating internal frameworks for reusable code. We are looking for someone with experience in collaborating within distributed teams of at least three Android developers and who enjoys advocating for innovative engineering concepts. This engineer will be part of a mobile platform team responsible for setting engineering direction and developing foundational components for over 100+ Android engineers.</span></p><p><br></p><p><span style=\"color: rgb(32, 33, 36);\">Initially, your focus will be improving the mobile build system currently using Gradle. Your tasks will include enhancing build performance, implementing automation to streamline the development process for product developers, and working on automation for code analysis, various test frameworks, and enhancements to the CI pipeline, among other responsibilities.</span></p>', 'Jakarta, Daerah Khusus Ibukota Jakarta', '2023-12-12 16:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `loker_has_kategori`
--

CREATE TABLE `loker_has_kategori` (
  `id_loker` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loker_has_kategori`
--

INSERT INTO `loker_has_kategori` (`id_loker`, `id_kategori`) VALUES
(1, 18),
(2, 4),
(2, 17),
(3, 8),
(3, 19),
(4, 12),
(5, 5),
(6, 5),
(6, 10),
(6, 12),
(6, 13),
(7, 5),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_07_164409_kategori', 1),
(6, '2023_11_07_164441_berita', 1),
(7, '2023_11_07_173100_komentar', 1),
(8, '2023_11_07_173309_like', 1),
(9, '2023_11_11_203449_loker', 1),
(10, '2023_11_11_203904_apply_loker', 1),
(11, '2023_11_11_204236_loker_has_kategori', 1),
(12, '2023_11_11_204449_berita_has_kategori', 1),
(13, '2023_11_11_204632_chat', 1),
(14, '2023_11_11_204944_pengaduan', 1),
(15, '2023_12_01_125608_team', 1),
(16, '2023_12_12_999999_add_active_status_to_users', 1),
(17, '2023_12_12_999999_add_avatar_to_users', 1),
(18, '2023_12_12_999999_add_dark_mode_to_users', 1),
(19, '2023_12_12_999999_add_messenger_color_to_users', 1),
(20, '2023_12_12_999999_create_chatify_favorites_table', 1),
(21, '2023_12_12_999999_create_chatify_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `waktu_pengaduan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('menunggu','diterima','ditolak') NOT NULL DEFAULT 'menunggu',
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_user`, `isi_pengaduan`, `waktu_pengaduan`, `status`, `file`) VALUES
(1, 4, 'Jalanan Rusak Di kota serang banten', '2023-12-12 20:34:10', 'diterima', NULL),
(2, 4, 'Tolongg, fasilitas masyarakat rusak', '2023-12-12 20:12:07', 'menunggu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `role` enum('Backend Developer','Project Manager','Frontend Developer','AFK') NOT NULL DEFAULT 'AFK',
  `program_studi` varchar(20) NOT NULL,
  `asal_kampus` text NOT NULL,
  `foto` text NOT NULL,
  `github` text NOT NULL,
  `instagram` text NOT NULL,
  `whatsapp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `nama_anggota`, `nim`, `role`, `program_studi`, `asal_kampus`, `foto`, `github`, `instagram`, `whatsapp`) VALUES
(1, 'Bagus Muhammad Mumtaza', '21.230.0173', 'Project Manager', 'Sistem Informasi', 'STMIK Widya Pratama', 'Bagus_Muhammad_Mumtaza.jpg', 'Mmtza', 'mmtza.mm/', '6285875282178'),
(2, 'Muhammad Anwar Fauzan', '1101211032', 'Backend Developer', 'Teknik Informatika', 'Universitas Banten Jaya', 'Muhammad_Anwar_Fauzan.jpg', 'Anuraaaa', 'anwarfz__/', '6285939410330'),
(3, 'Erick Darmawan Boeniarto', '1101211023', 'Frontend Developer', 'Teknik Informatika', 'Universitas Banten Jaya', 'Erick_Darmawan_Boeniarto.jpg', 'Erickdb', 'erick.db13/', '6285282568210');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('user','penulis','penyedia_loker','admin') NOT NULL DEFAULT 'user',
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi_diri` longtext DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `tanggal_lahir`, `alamat`, `deskripsi_diri`, `foto`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-12-12 15:33:56', '$2y$12$1PoX193RLfbSLSIoAwJpI.FJnUlfj1LXYBp83bRGCoJZD.Cep6qfW', 'GMJWv9xy4JIIx2xeNNxECRn0iNirOIHEwICsOaXm6UV4DQ8SISLAhsCfQj4Z', 'admin', NULL, NULL, '<p><br></p>', '1702413167.jpg', '2023-12-12 15:33:56', '2023-12-12 20:33:05', 0, 'avatar.png', 0, NULL),
(2, 'penyedialoker', 'penyedialoker@gmail.com', '2023-12-12 15:33:57', '$2y$12$xl9Lnkn0QkhQDy1gdx7bAexcZmlJ7buz3m9HykWphWHwkSMXLoR16', 'VCBuvTK7AN', 'penyedia_loker', NULL, NULL, NULL, NULL, '2023-12-12 15:33:57', '2023-12-12 15:33:57', 0, 'avatar.png', 0, NULL),
(3, 'penulis', 'penulis@gmail.com', '2023-12-12 15:33:57', '$2y$12$u7bJvYV.tSM5O7sKctuYxOHEcb9YJvDTun2O1bmO5qik52YFpiwx6', 'm5Cg4ysHxm', 'penulis', NULL, NULL, NULL, NULL, '2023-12-12 15:33:57', '2023-12-12 15:33:57', 0, 'avatar.png', 0, NULL),
(4, 'user', 'user@gmail.com', '2023-12-12 15:33:58', '$2y$12$QK5zSPd1mrmD5ANteZhsXe8JV4O7t6QUWTjnVh1Jv59vc0.WaXdZi', 'BULdm6Lngk3mPpOmek1S8ZQhOcUcfC6pMJ2inAAOKQH0J11kI9UmWV97vSW6', 'user', NULL, NULL, NULL, NULL, '2023-12-12 15:33:58', '2023-12-12 15:33:58', 0, 'avatar.png', 0, NULL),
(5, 'Erick Darmawan', 'test@gmail.com', NULL, '$2y$12$p7McuTadlH/h.UH0QtpXNuQTfvN6RcvasiF1LsCcAf6aNrW.Z9Uvi', NULL, 'penulis', '2003-08-13', 'Kalimantan', '<p>Yoooo</p>', '1702395556.jpg', NULL, NULL, 0, 'avatar.png', 0, NULL),
(6, 'PT Tadika Mesra', 'Tadika@gmail.com', NULL, '$2y$12$p7myMY77qu6hgOqkDj2NruIJlO1y1qW7cWx7U4xoByE18.gS4s5m6', NULL, 'penyedia_loker', '2000-03-08', 'Kalimantan', '<p>PTPTPTPTPTPT</p>', '1702400124.jpg', NULL, '2023-12-12 20:51:00', 0, '41ebe9be-e4b8-45a5-ae93-be4070643105.jpg', 0, NULL),
(7, 'Anwar Fauzan', 'anwarfauzan@gmail.com', NULL, '$2y$12$ZLa7tASVdZacrHFxkd4gMeULWu9XAn/dOQab50lYq/6OCWxkiekkW', NULL, 'penulis', '2015-02-06', 'Banten', '<p><span style=\"color: rgb(55, 65, 81);\">Saya adalah seorang profesional muda yang bersemangat dan proaktif dengan latar belakang di bidang teknologi informasi. Saya memiliki gelar sarjana di bidang Ilmu Komputer dan telah bekerja selama tiga tahun sebagai pengembang perangkat lunak di sebuah perusahaan teknologi terkemuka.</span></p>', '1702395972.jpg', NULL, '2023-12-12 16:52:58', 1, 'avatar.png', 0, NULL),
(8, 'Anwar Hadi', 'anwarhadi@gmail.com', NULL, '$2y$12$/2sTjcnpTFndKiDhl02SVOYAtxbOsc910YjsLhduZTCue7dyzmMOO', NULL, 'user', '2005-04-14', 'Mulawarman', '<p><span style=\"color: rgb(55, 65, 81);\">Saya memiliki minat yang besar dalam teknologi baru dan terus meningkatkan diri saya melalui pembelajaran mandiri dan mengikuti perkembangan industri. Saya percaya pada pendekatan yang proaktif terhadap pekerjaan dan selalu mencari cara untuk meningkatkan efisiensi dan efektivitas.</span></p>', '1702395937.jpg', NULL, NULL, 0, 'avatar.png', 0, NULL),
(9, 'Anwar Egi', 'anwaregi@gmail.com', NULL, '$2y$12$8s6zqEWmztkbiWoqh0zWYOq32buQN9GLYJ0MMKwVViwO7ShzaTtea', NULL, 'penulis', '2004-08-13', 'Banten Walantaka', '<p><span style=\"color: rgb(55, 65, 81);\">Saya memiliki minat yang besar dalam teknologi baru dan terus meningkatkan diri saya melalui pembelajaran mandiri dan mengikuti perkembangan industri. Saya percaya pada pendekatan yang proaktif terhadap pekerjaan dan selalu mencari cara untuk meningkatkan efisiensi dan efektivitas.</span></p>', '1702396068.jpg', NULL, NULL, 0, 'avatar.png', 0, NULL),
(10, 'anwar loker', 'anwarloker@gmail.com', NULL, '$2y$12$vmJVgQEhe3M43oeev9gD5u0kEkZrE0lEGpJNFtuZ899bWCgL1EVmu', NULL, 'penyedia_loker', NULL, NULL, '<p><br></p>', '1702414185.jpg', NULL, NULL, 0, 'avatar.png', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_loker_id_user_foreign` (`id_user`),
  ADD KEY `apply_loker_id_loker_foreign` (`id_loker`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_id_user_foreign` (`id_user`);

--
-- Indexes for table `berita_has_kategori`
--
ALTER TABLE `berita_has_kategori`
  ADD KEY `berita_has_kategori_id_berita_foreign` (`id_berita`),
  ADD KEY `berita_has_kategori_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id_user_foreign` (`id_user`),
  ADD KEY `chat_id_loker_foreign` (`id_loker`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_id_berita_foreign` (`id_berita`),
  ADD KEY `komentar_id_user_foreign` (`id_user`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_id_berita_foreign` (`id_berita`),
  ADD KEY `like_id_user_foreign` (`id_user`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loker_id_user_foreign` (`id_user`);

--
-- Indexes for table `loker_has_kategori`
--
ALTER TABLE `loker_has_kategori`
  ADD KEY `loker_has_kategori_id_loker_foreign` (`id_loker`),
  ADD KEY `loker_has_kategori_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_id_user_foreign` (`id_user`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_loker`
--
ALTER TABLE `apply_loker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_loker`
--
ALTER TABLE `apply_loker`
  ADD CONSTRAINT `apply_loker_id_loker_foreign` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_loker_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_has_kategori`
--
ALTER TABLE `berita_has_kategori`
  ADD CONSTRAINT `berita_has_kategori_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_has_kategori_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_id_loker_foreign` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loker_has_kategori`
--
ALTER TABLE `loker_has_kategori`
  ADD CONSTRAINT `loker_has_kategori_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loker_has_kategori_id_loker_foreign` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
