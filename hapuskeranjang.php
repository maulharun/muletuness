<?php
session_start();

$id_produk=$_GET["id_products"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk telah diahapus dalam keranjang');</script>";
echo "<script>location='keranjang.php'</script>";

?>