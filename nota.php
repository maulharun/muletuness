<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .thankyou-container {
            text-align: center;
            margin-top: 100px;
        }
        .thankyou-container h1 {
            font-size: 36px;
            color: #4CAF50;
        }
        .thankyou-container p {
            font-size: 18px;
            margin: 20px 0;
        }
        .thankyou-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .thankyou-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="wrapper">
            <div class="thankyou-container">
                <h1>Terima Kasih atas Pembeliannya!</h1>
                <p>Pesanan Anda telah berhasil diproses.</p>
                <a href="product.php">Lanjutkan Berbelanja</a>
        </div>
    </div>
</body>
</html>