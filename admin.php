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

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
}

/* Header (H1 dan H2) */
h1, h2 {
    text-align: center;
    color: #1c1c1c; /* Warna teks hitam */
    margin-bottom: 20px;
}

/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff; /* Warna latar belakang putih */
    border-radius: 5px;
    overflow: hidden;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: center;
    color: #1c1c1c; /* Warna teks hitam */
}

th {
    background-color: #ffd700; /* Warna latar belakang header kuning */
    color: #1c1c1c; /* Warna teks hitam */
}

tr:nth-child(even) {
    background-color: #f9f9f9; /* Warna latar belakang baris genap */
}

tr:hover {
    background-color: #f1f1f1; /* Warna latar belakang baris saat hover */
}

/* Gambar */
img {
    max-width: 100px; /* Lebar maksimal gambar */
    border-radius: 5px; /* Border melengkung pada gambar */
}

/* Tautan */
a {
    text-decoration: none;
    color: #b8860b; /* Warna teks tautan emas gelap */
}

a:hover {
    text-decoration: underline; /* Garis bawah pada tautan saat hover */
}

/* Tombol Logout */
.logout-button {
    display: inline-block;
    background-color: #b8860b; /* Background emas gelap */
    color: #fff; /* Warna teks putih */
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #d4af37; /* Background kuning saat hover */
}

/* CSS untuk Gambar dan Deskripsi */
.container2 {
    text-align: center;
    margin-top: 50px;
}

.dashboard-image {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border: 2px solid #b8860b; /* Border emas gelap */
}

.deskripsi {
    margin-top: 20px;
    color: #1c1c1c; /* Warna teks hitam */
    font-size: 18px;
    line-height: 1.6;
}

    </style>
</head>
<body>
    <!-- Container Utama -->
    <div class="container">

    <!-- Placeholder konten admin -->
<div class="container2">
    <img src="konten/bg.jpg" alt="Admin Dashboard Image" class="dashboard-image">
    <p>
        Selamat datang di panel admin.
    </p>
</div>

    </div>
</body>
</html>

