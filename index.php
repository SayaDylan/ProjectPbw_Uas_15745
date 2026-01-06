<?php
session_start();
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolioku - Dylan Rifqi Alfaizi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif; 
            margin: 0; /* Menghilangkan margin default dari browser */
            background-color: #f4f4f4; /* Warna abu-abu muda untuk latar belakang */
            color: #333333; /* Warna teks utama (abu-abu gelap) */
            line-height: 1.6;
            text-align: justify;  
        }

        

        /*  HEADER  */
        header {
            background-color: #306497; /* Warna biru sebagai aksen utama */
            color: #ffffff; /* Teks putih */
            padding: 20px 0;
            text-align: center;
        }

        /* mengatur foto profil */
        header img {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Membuat gambar lingkaran */
            object-fit: cover; 
            margin-bottom: 15px;
            border: 3px solid #000000; /* Garis tepi untuk foto profil */
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        header p {
            font-size: 1.2em;
            opacity: 0.9; /* transparan */
        }

        /* NAVIGASI (MENU) */
        nav {
            background-color: #333; /* Latar belakang menu  */
            padding: 10px 0;
            text-align: center;
            position: sticky; /* Membuat menu tetap menempel di atas saat di-scroll */
            top: 0;
            z-index: 100;
        }

        nav ul {
            list-style: none; /* Menghilangkan tanda bullet */
            padding: 0;
            margin: 0;
            display: flex; /* Membuat menu jadi horizontal */
            justify-content: center; /* Menengahkan menu */
            flex-wrap: wrap; /* Agar menu bisa turun ke bawah di layar kecil */
        }

        nav ul li {
            margin: 5px 15px; /* Memberi jarak antar menu */
        }

        nav ul li a {
            color: #ffffff; /* Warna link menu */
            text-decoration: none; /* Menghilangkan garis bawah link */
            font-weight: bold;
            padding: 5px 10px;
            transition: all 0.3s ease; /* Transisi halus untuk hover */
        }

        nav ul li a:hover {
            background-color: #007BFF; /* Ubah latar belakang saat disentuh mouse */
            border-radius: 5px; /* Membuat sudut sedikit melengkung */
        }

        /* KONTEN UTAMA (MAIN & SECTION)  */
        main {
            /* Mengatur semua layar dari atas ke bawah dengan ukuran */
            max-width: 10000px;
            margin: 20px auto; /* Menengahkan konten utama */
            padding: 0 20px;
        }

        section {
            background-color: #ffffff; /* Latar belakang putih untuk setiap bagian */
            margin-bottom: 20px; 
            padding: 30px;
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Efek bayangan  */
        }

        section h2 {
            color: #007BFF; /* Judul bagian menggunakan warna aksen */
            border-bottom: 2px solid #f4f4f4; /* Garis bawah tipis */
            padding-bottom: 10px;
        }

        section h3 {
            color: #333;
        }

        /*  BAGIAN GALERI Foto */
        #gallery {
            /* Menggunakan Grid untuk layout   */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 2fr)); /* digunakan untuk menyesuaikan dengan sendiri nya pada setiap kolom gambar/foto*/
            gap: 20px; /* Jarak antar item galeri */
        }

        /* "article"  Pengalaman */
        #gallery article {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            display: flex; /* Digunakan untuk mengatur tampilan pada web*/
            flex-direction: column; /* Konten kartu ditumpuk vertikal */
        }

        #gallery article:hover {
            transform: translateY(-5px); /* Efek  */
        }

        #gallery article img { /* untuk menaruh foto2 project */
            max-width: 100%; /* Membuat gambar responsif (memenuhi kartu) */
            height: 200px; /*  Tinggi gambar di galeri  */
            object-fit: cover; /* Memastikan gambar memenuhi area  */
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        /* bagian gallery foto*/
        .card-content {
            padding: 15px;
            flex-grow: 1; /* Membuat konten teks mengisi sisa ruang */
            display: flex;
            flex-direction: column;
        }

        .card-content h3 {
            margin-top: 0;
        }

        .card-content p {
            flex-grow: 1; /* Mendorong tombol ke bagian bawah */
            font-size: 0.9em; /* Sedikit perkecil ukuran teks deskripsi */
            color: #555;
        }

        #gallery article a { /*mengatur tombol galerry menjadi biru*/
            display: inline-block;
            margin-top: 10px; /* Jarak dari paragraf di atasnya */
            background-color: #007BFF;
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            width: fit-content; /* Lebar tombol pas dengan teks */
        }

        #gallery article a:hover {
            background-color: #0056b3; /*berfungsi untuk mengubah tampilan warna tombol semula biru menjadi biru gelap*/
        }


        /*  (PENGALAMAN) */
        #article article {
            border-bottom: 1px dashed #ccc;
            padding-bottom: 15px;
            margin-bottom: 15px;
            text-align:justify;
        }

        #article article:last-child {
            border-bottom: none; /* menghilangkan garis di artikel terakhir */
        }

        #article article h3 {
            margin-bottom: 5px;
        }

        #article article p {
            margin-top: 5px;
        }

        /* CSS Tambahan: List di dalam artikel */
        #article article ul {
            margin-top: 10px;
            padding-left: 20px;
        }

       
        /* BAGIAN KONTAK (FORMULIR) */
        form div {
            margin-bottom: 15px; 
        }

        form label {
            display: block; /* Buat label di atas input field */
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="nama"], /*form input ini digunakan untuk membuat pada bagian untuk mengisi email,pesan,teks */
        form input[type="email"],
        form input[type="pesan"] {
            width: 100%; 
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] { /*digunakan pada KIRIM PESAN*/
            background-color: #28a745; /* Warna hijau untuk tombol kirim */
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 1em;
            text-align: justify;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer; /* Mengubah kursor menjadi tangan */
            transition: background-color 0.5s ease;
        }

        form input[type="submit"]:hover { /*Pada bagian Kirim Pesan ketika di klik berubah menjadi warna hitam pada background nya */
            background-color: #218838; /* Warna hijau jadi gelap saat hover */
        }

        

        /* CSS untuk bagian Skills */
        .skills-container {
            display: flex;
            flex-wrap: wrap; /* Agar bisa responsif di layar kecil */
            gap: 20px; /* Jarak antar 2 kolom skills */
        }

        .skills-column {
            flex: 1; /* Masing-masing kolom mengambil setengah ruang */
            min-width: 250px; /* Lebar minimum sebelum pindah ke bawah */
        }

        .skills-column h3 {
            color: #007BFF;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .skill-list {
            list-style: none; /* Hilangkan bullet */
            padding-left: 0;
        }

        .skill-list li {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            padding: 8px 12px;
            margin-bottom: 8px;
            border-radius: 5px;
            transition: all 0.2s ease;
        }

        .skill-list li:hover {
            transform: translateX(5px);
            border-left: 4px solid #007BFF;
        }

        /* CSS untuk info kontak di atas form */
        .contact-info {
            list-style: none;
            padding-left: 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #f4f4f4;
            padding-bottom: 10px;
        }

        .contact-info li {
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .contact-info li a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        .contact-info li a:hover {
            text-decoration: underline;
        }

        /* bagian job */
        /* Container khusus untuk section Job */
#job {
    background-color: #f9f9f9;
    padding: 50px 20px;
}

#job h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2em;
    color: #306497;
}

/* Grid Layout untuk Kartu Jasa */
.job-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1000px;
    margin: 0 auto;
}

/* Styling Kartu */
.job-card {
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.job-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

/* Ukuran Foto yang Seragam */
.job-card img {
    width: 100%;
    height: 250px; /* Tinggi tetap agar rapi */
    object-fit: cover; /* Memastikan gambar tidak gepeng */
    border-bottom: 5px solid #306497;
}

.job-content {
    padding: 20px;
    text-align: center;
}

.job-content h3 {
    margin: 10px 0;
    font-size: 1.5em;
    color: #333;
}

.job-content p {
    color: #666;
    margin-bottom: 20px;
    font-size: 1em;
}

/* Tombol Pesan yang Lebih Cantik */
.btn-pesan {
    display: inline-block;
    padding: 12px 25px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 50px; /* Membuat tombol lonjong/rounded */
    font-weight: bold;
    transition: background 0.3s ease;
}

.btn-pesan:hover {
    background-color: #218838;
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.4);
}

/* --- SECTION KARYA VIDEO --- */
#karya {
    background-color: #ffffff;
    padding: 50px 20px;
    text-align: center;
}

#karya h2 {
    color: #306497;
    margin-bottom: 10px;
}

.video-wrapper {
    max-width: 900px; /* Lebar maksimal video landscape */
    margin: 30px auto;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    background: #000; /* Background hitam jika video loading */
}

.video-wrapper video {
    width: 100%;
    display: block;
}

.karya-desc {
    color: #666;
    max-width: 700px;
    margin: 0 auto;
    font-style: italic;
}

#contact {
    text-align: center;
    padding: 50px 20px;
    background-color: #fff;
}

.contact-buttons {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 15px; /* Jarak antar tombol */
    flex-wrap: wrap;
}

.btn-contact {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 25px;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: bold;
    font-size: 16px;
    transition: transform 0.3s, box-shadow 0.3s;
}

/* Warna WhatsApp */
.btn-wa {
    background-color: #25D366;
}

/* Warna Instagram Gradasi */
.btn-ig {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
}

.btn-contact:hover {
    transform: translateY(-5px); /* Efek melompat sedikit ke atas */
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    color: white;
}

/* Responsif untuk HP */
@media (max-width: 600px) {
    .contact-buttons {
        flex-direction: column;
        align-items: center;
    }
    .btn-contact {
        width: 80%;
        justify-content: center;
    }
}


        /*  FOOTER  */
      footer {
    display: block !important; /* Memastikan elemen dianggap sebagai blok */
    text-align: center !important; /* Memaksa teks ke tengah */
    padding: 20px 0;
    width: 100%; /* Memastikan footer selebar layar */
    clear: both; /* Menghindari gangguan dari elemen floating di atasnya */
}

footer p {
    margin: 0; /* Menghilangkan margin bawaan paragraf */
    display: inline-block; /* Memastikan teks dianggap satu kesatuan */
}

    </style>
</head>
<body>

    <header>
        <img src="profil.png">
        <h1>DYLAN RIFQI ALFAIZI</h1>
        <p>Saya Dylan Rifqi Alfaizi, Mahasiswa Teknik Informatika & Content Creator.</p>
    </header>

    <nav>
        <ul>
            <li><a href="#home">Tentang Saya</a></li>
            <li><a href="#gallery">Galeri </a></li>
            <li><a href="#article">Pengalaman</a></li>
            <li><a href="#karya">Karya Terbaru</a></li>
            <li><a href="#job">Jasa Fotografi & VIdeografi</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>

    <main>

        <section id="home">
            <h2>Tentang Saya</h2>
            <p>Perkenalkan, saya Dylan Rifqi Alfaizi, mahasiswa Teknik Informatika yang memiliki ketertarikan pada dunia teknologi dan komunikasi kreatif.

                Bagi sebagian orang, dunia pemrograman dan kreasi konten mungkin terlihat sangat berbeda - yang satu penuh dengan logika dan struktur, sementara yang lain menuntut imajinasi dan kebebasan berekspresi. Bagi saya, keduanya justru saling melengkapi.

                    Melalui pemrograman, saya belajar memahami cara kerja sistem, memecahkan masalah, serta membangun solusi yang efisien dan bermanfaat. Saya percaya bahwa teknologi adalah alat terkuat untuk menciptakan perubahan positif.

                        Di sisi lain, melalui konten yang saya buat, saya berusaha menjembatani dunia teknologi dengan masyarakat. Saya merasa puas ketika dapat membantu orang lain memahami konsep yang sulit, atau ketika karya saya mampu menumbuhkan rasa ingin tahu mereka terhadap teknologi.

                            Misi saya sederhana: menjadikan teknologi lebih mudah dipahami, relevan, dan bermanfaat bagi semua orang.

                                Portofolio ini menjadi cerminan perjalanan saya dalam menggabungkan logika untuk membangun dan kreativitas untuk berbagi.
            </p>

            <br>
            <h2>Keahlian Saya</h2>
            <div class="skills-container">
                <div class="skills-column">
                    <h3>Personal Skills</h3>
                    <ul class="skill-list">
                        <li>Disiplin dan Bertanggung jawab</li>
                        <li>Kemampuan komunikasi yang baik</li>
                        <li>Bekerja sama tim</li>
                        <li>Kemampuan dalam memimpin</li>
                        <li>Manajemen waktu yang baik</li>
                        <li>Fokus dalam suatu job</li>
                        <li>Kemampuan belajar hal baru</li>
                    </ul>
                </div>
                <div class="skills-column">
                    <h3>Software Skills</h3>
                    <ul class="skill-list">
                        <li>VN</li>
                        <li>CapCut</li>
                        <li>Canva</li>
                        <li>HTML & CSS (Dasar)</li>
                        <li>Mysql (Dasar)</li>
                        <li>C++ (Dasar)</li>
                    </ul>
                </div>
            </div>

        </section>

        <section id="gallery">

            <article>
            <img src="Pengalaman4.jpeg" alt="Juara 1 Lomba Vlog Kudus">
            <div class="card-content">
            <h3>Juara I Lomba Vlog Kategori Umum</h3>
            <p>Juara Videografi Bertema Hari Jadi Kota Kudus ke-475 (2024).</p>
            <a href="PiagamJur1.jpeg" target="_blank">Lihat Sertifikat</a>
        </div>
            </article>
            

            <article>
                <img src="ftjur2.jpeg" alt="Penghargaan Lomba Gempur Rokok Ilegal">
                <div class="card-content">
                    <h3>Juara II Lomba Vlog "Gempur Rokok Ilegal"</h3>
                    <p>Menerima apresiasi dari Pemerintah Kabupaten Kudus (2023).</p>
                    <a href="PiagamJur2.jpeg" target="_blank">Lihat Sertifikat</a>
                </div>
            </article>

            <article>
                <img src="BoxTTG.jpeg" alt="Piagam Juara 3 Lomba TTG">
                <div class="card-content">
                    <h3>Juara III Lomba Teknologi Tepat Guna</h3>
                    <p>Dalam kegiatan Perkemahan Prestasi Ma'arif NU Jawa Tengah 2023.</p>
                    <a href="PiagamTTG.jpeg" target="_blank">Lihat Piagam</a>
                </div>
            </article>

            <article>
                <img src="pengalaman5.jpeg" alt="Pengalaman Lomba Videografi Edukasi Lalu Lintas">
                <div class="card-content">
                    <h3>Pengalaman Lomba Videografi Edukasi Lalu Lintas</h3>
                    <p>Meraih Juara 1 yang diselenggarakan oleh Satlantas Polres Kudus, tahun 2024</p>
                    <a href="Satlantas.jpeg" target="_blank">Lihat Detail</a>
                </div>
            </article>

            <article>
                <img src="pengalaman2.jpeg" alt=" Dokumentasi Event Sekolah">
                <div class="card-content">
                    <h3>Mengelola Dokumentasi Event</h3>
                    <p>Berperan aktif dalam tim dokumentasi untuk berbagai kegiatan di sekolah.</p>
                    <a href="Image 3.jpeg" target="_blank">Lihat Detail</a>
                </div>
            </article>

            <article>
                <img src="kegiatandesa.jpeg" alt="Berpatisipasi di Desa">
                <div class="card-content">
                    <h3>Aktif Kegiatan Desa</h3>
                    <p>Membantu mengenalkan teknologi konten foto dan video di desa</p>
                    <a href="Image 3.jpeg" target="_blank">Lihat Detail</a>
                </div>
            </article>

             <article>
                <img src="timcreator.jpeg" alt="Tim Creator ">
                <div class="card-content">
                    <h3>Membentuk Tim Conten Creator</h3>
                    <p>Bekerja sama dan konsisten bersama, tidak takut hasil dan selalu berproses.</p>
                    <a href="Image 3.jpeg" target="_blank">Lihat Detail</a>
                </div>
            </article>

            <article>
                <img src="partisipasievent.jpeg" alt="Berpatisipasi Event Luar">
                <div class="card-content">
                    <h3>Dokumentasi Event Olahraga Futsal</h3>
                    <p>Berpengalaman selama 1 tahun menjadi bagian dari tim dokumentasi event olahraga futsal</p>
                    <a href="Image 3.jpeg" target="_blank">Lihat Detail</a>
                </div>
            </article>

        </section>

        <section id="article">
            <h2>Pengalaman Organisasi & Event</h2>
            <p>Rangkuman pengalaman saya di bidang *event* dan organisasi.</p>

            <article>
                <h3>Detail Pengalaman</h3>
                <ul>
                    <li>Ikut serta berbagai *event* vlog kabupaten (Meraih Juara 1 & 2).</li>
                    <li>Ikut serta *event* Teknologi Tepat Guna (Meraih Juara 3).</li>
                    <li>Berkontribusi aktif dalam dokumentasi kegiatan di sekolah dan di desa.</li>
                    <li>Terlibat dalam proses produksi dan *editing* konten video.</li>
                    <li>Pengalaman dalam kerja sama tim dan kepemimpinan dalam berbagai project.</li>
                    <li>Membantu mengenalkan teknologi konten di desa</li>
                    <li>Membentuk Tim Creator dengan bagian nya masing2 dengan kerja sama yang solid</li>
                </ul>
            </article>

        </section>

        <section id="karya">
                    <h2>Karya Terbaru</h2>
                    <p>Juara 2 Lomba Video Kreatif Ijti Kabupaten Demak Dari Desa untuk Indonesia 25 November 2025</p>

             <div class="video-wrapper">
                    <video controls poster="cvr.jpeg">
                    <source src="vd.mp4" type="video/mp4">
                    Maaf, browser Anda tidak mendukung pemutaran video langsung.
             </video>
            </div>

            <p class="karya-desc">
                     "Kemandirian yang Ditanam, Digitalisasi yang menumbuhkan"
            </p>
        </section>


    <section id="job">
    <h2>Jasa Fotografi & Videografi</h2>
    <p style="text-align: center; max-width: 600px; margin: 0 auto 40px auto;">
        Butuh dokumentasi keren? Saya siap membantu mengabadikan momen berharga Anda dengan kualitas terbaik.
    </p>

    <div class="job-grid">
        <div class="job-card">
            <img src="ftgrafi.jpg" alt="Jasa Fotografi">
            <div class="job-content">
                <h3>Fotografi </h3>
                <p>Wisuda, Event, Dokumentasi Produk, dan Organisasi.</p>
                <a href="pesan.php?jasa=fotografi" class="btn-pesan">Pesan Sekarang</a>
            </div>
        </div>

        <div class="job-card">
            <img src="videograper.jpg" alt="Jasa Videografi">
            <div class="job-content">
                <h3>Videografi Kreatif</h3>
                <p>Cinematic Video, Konten Promosi, dan Dokumentasi Event.</p>
                <a href="pesan.php?jasa=videografi" class="btn-pesan">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</section>




       <section id="contact">
    <h2>Hubungi Saya</h2>
    <p>Jika butuh konsultasi silahkan hubungi saya dibawah ini.</p>

    <div class="contact-buttons">
        <a href="https://wa.me/6281297287018?text=Halo%20Dylan,%20saya%20tertarik%20dengan%20jasa%20Anda" target="_blank" class="btn-contact btn-wa">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>

        <a href="https://www.instagram.com/rdyz_fz" target="_blank" class="btn-contact btn-ig">
            <i class="fab fa-instagram"></i> Instagram
        </a>
    </div>
</section>

    </main>

   <footer>
    <div style="width: 100%; text-align: center;">
        <?php if(isset($_SESSION['status_login'])): ?>
            <div style="margin-bottom: 10px;">| 
                <a href="logout.php" style="color: red; text-decoration: none;">Logout</a>
            </div>
        <?php endif; ?>

        <p>&copy; 2025 Dylan Rifqi Alfaizi. Hak cipta dilindungi.</p>
    </div>
</footer>

</body>
</html>