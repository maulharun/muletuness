<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login untuk mengakses halaman ini.');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

$id = $_GET['id_products'];
$product = $conn->query("SELECT * FROM products WHERE id_products = '$id'")->fetch_assoc();

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if ($image) {
        $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id_products=$id";
        if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            header("Location: produk_admin.php");
        } else {
            echo "Failed to update product";
        }
    } else {
        $sql = "UPDATE products SET name='$name', price='$price' WHERE id_products=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: produk_admin.php");
        } else {
            echo "Failed to update product";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #d4af37;
            border-radius: 4px;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #d4af37;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
        }
        form button:hover {
            background-color: gold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            Name: <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
            Price: <input type="text" name="price" value="<?php echo $product['price']; ?>" required><br>
            Image: <input type="file" name="image"><br>
            <button type="submit" name="edit">Update</button>
        </form>
    </div>
</body>
</html>
