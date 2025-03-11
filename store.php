<?php
session_start();

include 'db.php';


$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ?>
    <!--Konten-->
    <style>

        /* Container untuk setiap toko */
        .store-container {
            display: flex; /* Menggunakan flexbox untuk layout */
            margin-bottom: 20px; /* Jarak antara setiap toko */
            margin-top: 20px; /* Jarak antara setiap toko */
            padding: 50px;
            background-color: #ffffff; /* Warna latar belakang putih */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
            border-radius: 5px; /* Sudut melengkung */
        }

        /* Gambar toko */
        .store-image {
            max-width: 200px; /* Lebar maksimal gambar */
            height: auto;
            border-radius: 5px; /* Sudut melengkung pada gambar */
            margin-right: 20px; /* Jarak antara gambar dan teks */
        }

        /* Informasi toko */
        .store-info {
            flex: 1; /* Memanjangkan informasi toko */
        }

        .store-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333333; /* Warna teks nama toko */
        }

        .store-description {
            color: #666666; /* Warna teks deskripsi toko */
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Container Utama -->
    <div class="container">
        <!-- Toko Pertama -->
        <div class="store-container">
            <img src="konten/toko2.jpg" alt="Toko 1" class="store-image">
            <div class="store-info">
                <div class="store-name">AudioHeaven (Indonesia)</div>
                <div class="store-description">
                    "AudioHeaven adalah toko terpercaya untuk pecinta musik di Indonesia. Kami menawarkan koleksi lengkap headphone, headset, dan perangkat audio premium untuk memenuhi semua kebutuhan mendengarkan Anda."


                </div>
            </div>
        </div>

        <!-- Toko Kedua -->
        <div class="store-container">
            <img src="konten/toko.png" alt="Toko 2" class="store-image">
            <div class="store-info">
                <div class="store-name">TokyoSound (Jepang)</div>
                <div class="store-description">
                    "Selamat datang di TokyoSound, tujuan utama untuk audio enthusiasts di Jepang. Temukan beragam pilihan headphone, headset, dan perangkat audio terbaik dari merek-merek terkemuka, untuk pengalaman mendengarkan yang tak tertandingi."
                </div>
            </div>
        </div>

        <!-- Toko Ketiga -->
        <div class="store-container">
            <img src="konten/toko3.jpg" alt="Toko 3" class="store-image">
            <div class="store-info">
                <div class="store-name">AudioFinesse (Jerman)</div>
                <div class="store-description">
                    "AudioFinesse, pilihan terbaik Anda untuk audio di Jerman. Dengan fokus pada kualitas dan inovasi, kami menyediakan headphone, headset, dan perangkat audio canggih untuk memenuhi standar pengalaman mendengarkan Anda."
                </div>
            </div>
        </div>
    </div>
</body>
    <!--Konten End-->
    <!--contact-->
    <?php include 'inc_footer.php'?>
    </section>

      <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>