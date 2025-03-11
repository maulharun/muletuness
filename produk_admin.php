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
    background-color: #52595D ; /* Latar belakang navbar hitam */
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
    margin-right: 15px; /* Jarak antara item navbar */
}

.header_section_top ul li a {
    color: #ffd700; /* Warna teks tautan kuning */
    text-decoration: none; /* Hapus garis bawah tautan */
    font-size: 20px; /* Ukuran font */
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

<?php
include 'db.php';
// Pastikan direktori uploads ada
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = $uploadDir . basename($image);

    $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Product added successfully";
        } else {
            echo "Failed to upload image";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id_products=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_products'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = $uploadDir . basename($image);

    if ($image) {
        $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";
        if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Product updated successfully";
        } else {
            echo "Failed to update product";
        }
    } else {
        $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully";
        } else {
            echo "Failed to update product";
        }
    }
}

$products = $conn->query("SELECT * FROM products");
?>
    <style>
/* Gaya Umum untuk Halaman CRUD Produk */
body {
    background-color: #ffefc4; /* Warna latar belakang kuning lembut */
    padding: 20px;
    font-family: Arial, sans-serif;
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

/* Formulir */
form {
    margin-bottom: 20px;
}

form input[type="text"],
form input[type="file"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    color: #1c1c1c;
    background-color: #fff; /* Warna latar belakang putih */
}

form input[type="text"]:focus,
form input[type="file"]:focus {
    outline: none;
    border-color: #b8860b; /* Warna border emas gelap saat fokus */
    box-shadow: 0 0 10px rgba(212, 175, 55, 0.5); /* Bayangan fokus */
}

form button {
    width: 100%;
    padding: 12px;
    background: #ffd700; /* Gradien warna emas ke coklat */
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s;
}

form button:hover {
    background: #d4af37 ; /* Gradien warna emas ke coklat saat hover */
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

    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Price: <input type="text" name="price" required><br>
            Image: <input type="file" name="image" required><br>
            <button type="submit" name="add">Add</button>
        </form>

        <h2>Product List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $products->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id_products']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="uploads/<?php echo $row['image']; ?>" alt="Product Image"></td>
                    <td>
                        <a href="produk_admin.php?delete=<?php echo $row['id_products']; ?>">Delete</a>
                        <a href="edit.php?id_products=<?php echo $row['id_products']; ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
