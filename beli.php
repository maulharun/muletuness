<?php
session_start();
//mendapatkan id dari product
$id_produk = $_GET['id_products'];

// jk sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
    $_SESSION ['keranjang'][$id_produk]+=1;
}
//jk belum ada maka
else 
{
    $_SESSION['keranjang'][$id_produk]=1;
}

echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php'</script>";

?>