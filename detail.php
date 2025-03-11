<?php
session_start();
include 'db.php';

// Mendapatkan ID Pembelian dari URL
$id_pembelian = isset($_GET['id_pembelian']) ? $_GET['id_pembelian'] : '';

// Jika ID Pembelian tidak ada, redirect ke halaman laporan
if (empty($id_pembelian)) {
    header("Location: laporan.php");
    exit();
}

// Query untuk mendapatkan detail produk berdasarkan ID Pembelian
$query = "SELECT * FROM pembelian_produk WHERE id_pembelian = '$id_pembelian'";

$result = $conn->query($query);

// Query untuk mendapatkan informasi pembelian (untuk header)
$query_pembelian = "SELECT pembelian.id_pembelian, pembelian.tanggal_pembelian, pembelian.total_pembelian, pelanggan.nama, ongkir.tarif, ongkir.nama_kota, pembelian.alamat_pengiriman
                    FROM pembelian
                    JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
                    JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir
                    WHERE pembelian.id_pembelian = '$id_pembelian'";

$result_pembelian = $conn->query($query_pembelian);
$pembelian = $result_pembelian->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Card Style */
        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            padding: 20px;
        }

        .card h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .card .card-body {
            padding: 10px;
        }

        .card .card-body p {
            font-size: 16px;
            margin: 10px 0;
        }

        .card .card-body .label {
            font-weight: bold;
            color: #555;
        }

        .card table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .card table th,
        .card table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .card table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .card table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Styling for the back button */
        .btn-back {
            background-color: #6c757d;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detail Pembelian</h1>

        <!-- Informasi Pembelian Card -->
        <div class="card">
            <h2>Informasi Pembelian</h2>
            <div class="card-body">
                <?php if ($pembelian): ?>
                    <p><span class="label">ID Pembelian:</span> <?php echo $pembelian['id_pembelian']; ?></p>
                    <p><span class="label">Nama Pelanggan:</span> <?php echo $pembelian['nama']; ?></p>
                    <p><span class="label">Tanggal Pembelian:</span> <?php echo $pembelian['tanggal_pembelian']; ?></p>
                    <p><span class="label">Total Pembelian:</span> <?php echo number_format($pembelian['total_pembelian'], 0, ',', '.'); ?></p>
                    <p><span class="label">Nama Kota:</span> <?php echo $pembelian['nama_kota']; ?></p>
                    <p><span class="label">alamat pengiriman:</span> <?php echo $pembelian['alamat_pengiriman']; ?></p>
                    <p><span class="label">Ongkir:</span> <?php echo number_format($pembelian['tarif'], 0, ',', '.'); ?></p>
                <?php else: ?>
                    <p>Informasi pembelian tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Detail Produk Card -->
        <div class="card">
            <h2>Detail Produk</h2>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td>Rp. <?php echo number_format($row['harga']); ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td>Rp. <?php echo number_format($row['subharga']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2">Tidak ada produk yang ditemukan untuk pembelian ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <a href="laporan.php" class="btn btn-back">Kembali ke Laporan</a>
    </div>

</body>

