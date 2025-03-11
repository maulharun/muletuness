<?php
session_start();
$username = $_SESSION['username'] ?? '';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login untuk mengakses halaman ini.');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <style>
/* Navbar */
/* Navbar Styling */
.container0 {
    background-color: #52595D; /* Latar belakang navbar hitam */
    padding: 15px;
    border-bottom: 2px solid #ffd700; /* Border bawah kuning */
    display: flex;
    justify-content: space-between; /* Posisi logo dan menu di kiri dan kanan */
    align-items: center;
}

.header_section_top ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex; /* Flexbox untuk tata letak yang responsif */
    align-items: center;
}

.header_section_top ul li {
    margin-right: 20px; /* Jarak antara item navbar */
}

.header_section_top ul li a {
    color: #ffd700; /* Warna teks tautan kuning */
    text-decoration: none; /* Hapus garis bawah tautan */
    font-size: 16px; /* Ukuran font */
    font-weight: bold; /* Tebal font */
    transition: color 0.3s; /* Transisi untuk hover */
}

.header_section_top ul li a:hover {
    color: #fff8dc; /* Warna teks tautan kuning terang saat hover */
}

.header_section_top ul li:last-child {
    margin-right: 0; /* Hapus margin untuk item terakhir */
}

.logo {
    font-size: 24px; /* Ukuran font logo */
    font-weight: bold; /* Tebal font logo */
    color: #ffd700; /* Warna teks logo kuning */
    text-decoration: none; /* Hapus garis bawah logo */
}

.logo:hover {
    color: #fff8dc; /* Warna logo kuning terang saat hover */
}
    </style>
</head>
<body>
<div class="container0">
        <div class="header_section_top">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="produk_admin.php">Produk</a></li>
                <li><a href="profil2.php">Profil</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <style>
        /* Gaya Umum untuk Halaman Admin */
        body {
            background-color: #ffefc4; /* Warna latar belakang kuning lembut */
            padding: 20px;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Container Utama */
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang putih dengan transparansi */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Bayangan */
            max-width: 800px;
            margin: 50px auto;
            backdrop-filter: blur(10px); /* Efek blur */
            border: 1px solid #b8860b; /* Border warna emas gelap */
            display: flex; /* Menggunakan flexbox untuk layout */
            flex-direction: row-reverse; /* Urutan terbalik: teks di kanan, gambar di kiri */
            align-items: center; /* Posisikan vertikal ke tengah */
        }

        /* Gambar */
        .dashboard-image {
            max-width: 200px; /* Lebar maksimal gambar */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border: 2px solid #b8860b; /* Border emas gelap */
            margin-left: 20px; /* Jarak antara gambar dan teks */
        }

        /* Teks Deskripsi */
        .deskripsi {
            color: #1c1c1c; /* Warna teks hitam */
            font-size: 18px;
            line-height: 1.6;
            margin-right: 20px; /* Jarak antara teks dan gambar */
            flex: 1; /* Memanjangkan teks untuk mengisi sisa ruang */
        }
    </style>
</head>
<body>
    <!-- Container Utama -->
    <div class="container">
        <div class="deskripsi">
            <h1>Profil Pemilik</h1>
            <p>Doni adalah pendiri dan CEO Muletune, memimpin perusahaan sejak 2018 dengan visi untuk mengintegrasikan teknologi canggih dengan kebutuhan musisi modern. Dengan latar belakang teknik elektro dan pengalaman lebih dari 2 tahun di industri audio, Doni berhasil membawa Muletune menjadi inovator terdepan dalam pengembangan peralatan musik yang kreatif dan berteknologi tinggi, menghadirkan solusi yang disukai musisi di seluruh dunia.</p>
        </div>
        <img src="konten/doni.jpg" alt="Admin Dashboard Image" class="dashboard-image">
    </div>
</body>
</html>
