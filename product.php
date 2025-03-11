<?php
session_start();
include 'db.php';


// Logic for fetching products
$products = $conn->query("SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS sama seperti sebelumnya */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Mulai dari tengah */
    align-items: center; /* Sejajar vertikal */
    gap: 20px;
    padding: 20px;
    max-width: 1200px; /* Lebar maksimum container */
    margin: 0 auto; /* Posisi tengah */
    margin-top : 120px;
    margin-bottom : 120px;
}

/* Product Card */
.product {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    width: 200px; /* Tetap */
    height: 300px; /* Tetapkan tinggi tetap untuk menjaga konsistensi */
    text-align: center;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Pastikan elemen diatur rapi */
    margin-top : 20px;
    margin-right : 20px;
}


.product img {
    max-width: 100%;
    height: auto;
    object-fit: contain; 
    border-radius: 8px;
    height: 200px;
}

.product h3 {
    margin: 10px 0;
    font-size: 18px;
}

.product p {
    margin: 5px 0;
    font-size: 14px;
}

.product button {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Efek transisi */
}

.product button:hover {
    background-color: #0056b3;
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .product-container {
        padding: 10px;
        gap: 10px;
       
    }

.product {
        width: 150px; /* Lebar lebih kecil untuk layar kecil */
    }
}

/* Styling untuk tombol */
.btn-beli {
    display: inline-block;
    background-color: #4CAF50; /* Warna hijau */
    color: white; /* Teks berwarna putih */
    text-align: center;
    text-decoration: none; /* Menghilangkan garis bawah */
    padding: 10px 20px; /* Padding untuk ukuran tombol */
    font-size: 16px; /* Ukuran font */
    border-radius: 5px; /* Membuat sudut tombol melengkung */
    transition: background-color 0.3s, transform 0.2s; /* Animasi transisi */
}

/* Hover efek */
.btn-beli:hover {
    background-color: #45a049; /* Warna hijau yang lebih gelap */
    transform: scale(1.05); /* Membuat tombol sedikit membesar */
}

/* Efek ketika tombol ditekan */
.btn-beli:active {
    transform: scale(0.95); /* Sedikit mengecilkan tombol */
    background-color: #3e8e41; /* Warna hijau lebih gelap saat ditekan */
}

    </style>
</head>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="product-container">
        <?php while ($row = $products->fetch_assoc()) { ?>
            <div class="product">
                <img src="uploads/<?php echo $row['image']; ?>" alt="Product Image">
                <h3><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p>Price: Rp.<?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                <a href="beli.php?id_products=<?php echo $row['id_products']; ?>" class="btn-beli">Beli</a>
            </div>
        <?php } ?>
        </div>

    <?php include 'inc_footer.php'; ?>

</body>
</html>
