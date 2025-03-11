<?php
session_start();

include 'db.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Anda harus login untuk mengakses halaman ini.');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
if(empty($_SESSION["keranjang"])) 
    {
        echo "<script>alert('Keranjang Belanja Anda Kosong');</script>";
        echo "<script>location='product.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
/* Styling untuk section */
section {
    padding: 20px;
    background-color: #1c1c1c;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    max-width: 800px;
    margin: 20px auto;
}

/* Styling untuk judul */
.container h1 {
    font-size: 28px;
    text-align: center;
    color: #fff;
    margin-bottom: 10px;
}

/* Garis pemisah */
.container hr {
    border: 0;
    border-top: 2px solid #4CAF50;
    margin: 20px 0;
}

/* Styling tabel */
.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #2c2c2c;
    font-size: 16px;
    color: #fff;
}

/* Header tabel */
.table thead tr {
    background-color: #4CAF50;
    color: white;
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #444;
}

/* Hover efek untuk baris tabel */
.table tbody tr:hover {
    background-color: #383838;
}

.row {
  margin-right: -15px;
  margin-left: -15px;
}

.col-md-4 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

/* Mengatur form menjadi horizontal */
.form-group {
  display: flex; /* Mengatur elemen dalam form-group sejajar secara horizontal */
  align-items: center; /* Menyelaraskan elemen secara vertikal */
  margin-top: 10px; /* Menambahkan sedikit jarak vertikal */
  margin-bottom: 5px; /* Mengurangi jarak antar elemen form */
}

/* Label form untuk posisi horizontal */
.form-group label {
  flex: 0 0 100px; /* Lebar tetap untuk label */
  font-size: 12px; /* Mengurangi ukuran font */
  margin-right: 10px; /* Memberi jarak antara label dan input */
  text-align: right; /* Menyelaraskan teks ke kanan */
}

/* Input form */
.form-control {
  flex: 1; /* Mengisi sisa ruang setelah label */
  width: auto; /* Tidak menggunakan lebar penuh */
  height: 25px; /* Tinggi input lebih kecil */
  padding: 4px 8px; /* Padding lebih kecil */
  font-size: 12px; /* Ukuran font lebih kecil */
  line-height: 1.2; /* Jarak antar baris lebih kecil */
  color: #555;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

/* Fokus input */
.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px rgba(102, 175, 233, .6);
}

/* Elemen readonly */
.form-control[readonly],
fieldset[disabled] .form-control {
  cursor: not-allowed;
  background-color: #eee;
  opacity: 1;
}

.btn {
    margin-top : 20px;
    margin-right: 10px;
    display: inline-block;
    padding: 10px 20px; /* Ruang dalam tombol */
    font-size: 16px; /* Ukuran font */
    font-weight: bold; /* Teks tebal */
    text-align: center; /* Teks rata tengah */
    text-decoration: none; /* Menghilangkan garis bawah */
    border-radius: 8px; /* Membuat sudut melengkung */
    transition: all 0.3s ease; /* Efek transisi */
}

/* Tombol primary (Lanjutkan Belanja) */
.btn-primary {
    background-color: #4CAF50; /* Warna hijau */
    color: white; /* Teks putih */
    border: 2px solid #4CAF50; /* Border hijau */
}

.btn-primary:hover {
    background-color: white; /* Warna latar berubah putih */
    color: #4CAF50; /* Warna teks berubah hijau */
}


</style>
<body>
    <?php include 'header.php'; ?>
    <section>
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                    <?php  
                        $ambil = $conn->query("SELECT * FROM products WHERE id_products = '$id_produk'"); 
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["price"] * $jumlah;
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["name"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["price"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                        </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$subharga; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja)?></th>
                    </tr>
                </tfoot>
            </table>
                 <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email'] ?>" class="form-control">
                            </div>
                    </div>
                    <div class="col-md-4">
                            <select class="form-control" name="id_ongkir">
                                <option value="">Pilih Ongkos Kirim</option>
                                <?php 
                                $ambil=$conn->query("SELECT * FROM ongkir");
                                while($perongkir = $ambil->fetch_assoc()){
                                ?>
                                <option value="<?php echo $perongkir["id_ongkir"]?>">
                                    <?php echo $perongkir['nama_kota']; ?> -
                                    Rp. <?php echo number_format($perongkir['tarif']); ?></option>
                                </option>
                                <?php } ?>
                                </select>
                                </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <textarea name="alamat" class="form-control" placeholder="Masukan alamat lengkap pengiriman(termasuk kode pos)"></textarea>   
                    </div>
                    </div>
                 <button class="btn btn-primary" name="checkout">Checkout</button>           
                 </form>      
        <?php
if (isset($_POST["checkout"])) {
    // Cek jika data pelanggan atau ongkir kosong
    if (empty($_SESSION["pelanggan"]["id_pelanggan"]) || empty($_POST["id_ongkir"]) || empty($_POST["alamat"])) {
        echo "<script>alert('Data tidak lengkap! Silakan coba lagi.');</script>";
        echo "<script>location='keranjang.php';</script>";
        exit();
    }

    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
    $nama_pelanggan = $_SESSION["pelanggan"]["nama"];
    $id_ongkir = $_POST["id_ongkir"];
    $alamat_pengiriman = $_POST["alamat"];
    $tanggal_pembelian = date("Y-m-d");

    // Ambil data ongkir berdasarkan id_ongkir
    $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
    if ($ambil->num_rows == 0) {
        echo "<script>alert('Ongkir tidak ditemukan!');</script>";
        echo "<script>location='keranjang.php';</script>";
        exit();
    }

    $arrayongkir = $ambil->fetch_assoc();
    $nama_kota = $arrayongkir['nama_kota'];
    $tarif = $arrayongkir['tarif'];

    // Pastikan total belanja tidak kosong
    if (empty($totalbelanja)) {
        echo "<script>alert('Total belanja kosong! Silakan periksa kembali barang yang Anda beli.');</script>";
        echo "<script>location='keranjang.php';</script>";
        exit();
    }

    $total_pembelian = $totalbelanja + $tarif;

    // Menyimpan data ke tabel pembelian
    if ($conn->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, nama_pelanggan, alamat_pengiriman) 
    VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$nama_pelanggan', '$alamat_pengiriman')")) {
        // Mendapatkan id_pembelian yang baru saja dimasukkan
        $id_pembelian_barusan = $conn->insert_id;

        // Menyimpan data produk yang dibeli
        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
            // Mendapatkan data produk berdasarkan id_produk
            $ambil = $conn->query("SELECT * FROM products WHERE id_products = '$id_produk'");
            if ($ambil->num_rows == 0) {
                echo "<script>alert('Produk dengan ID $id_produk tidak ditemukan!');</script>";
                echo "<script>location='keranjang.php';</script>";
                exit();
            }

            $perproduk = $ambil->fetch_assoc();
            $nama = $perproduk['name'];
            $harga = $perproduk['price'];
            $subharga = $harga * $jumlah;

            // Menyimpan data ke tabel pembelian_produk
            $insert = $conn->query("INSERT INTO pembelian_produk (id_pembelian, id_products, nama, harga, subharga, jumlah) 
            VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$subharga', '$jumlah')");
            if ($insert === FALSE) {
                echo "<script>alert('Terjadi kesalahan saat menyimpan produk dengan ID $id_produk!');</script>";
                echo "<script>location='keranjang.php';</script>";
                exit();
            }
        }

        // Mengosongkan keranjang belanja
        unset($_SESSION["keranjang"]);

        // Menampilkan alert dan mengalihkan ke halaman nota
        echo "<script>alert('Pembelian sukses');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan dalam proses pembelian.');</script>";
        echo "<script>location='keranjang.php';</script>";
    }
}

        ?>         
                 
        </div>
    </section>
    <?php include 'inc_footer.php'; ?>
</body>
</html>