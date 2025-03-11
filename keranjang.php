<?php
session_start();


include 'db.php';

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
    <title>Keranjang</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
/* Styling untuk section */
section {
    padding: 20px;
    background-color: #1c1c1c; /* Warna latar belakang hitam keabu-abuan */
    border-radius: 8px; /* Membuat sudut melengkung */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Efek bayangan */
    max-width: 800px;
    margin: 20px auto;
}

/* Styling untuk judul */
.container h1 {
    font-size: 28px;
    text-align: center;
    color: #fff; /* Teks berwarna putih */
    margin-bottom: 10px;
}

/* Garis pemisah */
.container hr {
    border: 0;
    border-top: 2px solid #4CAF50; /* Warna hijau */
    margin: 20px 0;
}

/* Styling tabel */
.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #2c2c2c; /* Warna latar belakang tabel abu-abu gelap */
    font-size: 16px;
    color: #fff; /* Warna teks putih */
}

/* Header tabel */
.table thead tr {
    background-color: #4CAF50; /* Warna hijau untuk header */
    color: white; /* Warna teks putih */
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #444; /* Border abu-abu gelap */
}

/* Hover efek untuk baris tabel */
.table tbody tr:hover {
    background-color: #383838; /* Warna abu-abu sedikit lebih terang */
}

/* Gaya untuk sel header */
.table th {
    font-weight: bold;
    text-transform: uppercase; /* Huruf besar */
}

/* Gaya angka di kolom */
.table td:first-child {
    font-weight: bold;
    color: #4CAF50; /* Warna hijau */
}

/* Styling dasar untuk tombol */
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

/* Tombol secondary (Checkout) */
.btn-secondary {
    background-color: #FF5722; /* Warna oranye */
    color: white; /* Teks putih */
    border: 2px solid #FF5722; /* Border oranye */
}

.btn-secondary:hover {
    background-color: white; /* Warna latar berubah putih */
    color: #FF5722; /* Warna teks berubah oranye */
}

/* Menambahkan efek hover */
.btn:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan saat hover */
    transform: scale(1.05); /* Efek zoom */
}

.btn-hapus {
    display: inline-block;
    padding: 10px 20px;
    background-color: #e74c3c; /* Warna merah */
    color: #fff; /* Warna teks putih */
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-hapus:hover {
    background-color: #c0392b; /* Warna merah lebih gelap saat hover */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
    transform: translateY(-2px); /* Efek mengangkat */
}

.btn-hapus:active {
    background-color: #a93226; /* Warna saat tombol diklik */
    transform: translateY(0); /* Reset efek */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

</style>
<body>
    <?php include 'header.php';?>
    <section>
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1;?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                    <!--Menampilkan produk yang sudah dikeranjang dan diperulangan berdasarkan id-->
                    <?php  
                    $ambil = $conn->query ("SELECT * FROM products WHERE id_products = '$id_produk'"); 
                    $pecah = $ambil-> fetch_assoc();
                    $subharga = $pecah["price"]*$jumlah;
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["name"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["price"]);?></td>
                            <td><?php echo $jumlah?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td><a href="hapuskeranjang.php?id_products=<?php echo $id_produk; ?>" class="btn btn-hapus">Hapus</a></td>
                        </tr>
                    <?php $nomor++; ?>    
                    <?php endforeach ?>    
                </tbody>
            </table>
            <a href="product.php" class="btn btn-primary">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-secondary">checkout</a>
        </div>
    </section>
    <?php include 'inc_footer.php'?>
</body>

</html>