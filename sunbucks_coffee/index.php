<?php
    include 'koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?page=dashboard">Dashboard</a>
    <a href="?page=produk">Produk</a>
    <a href="?page=kategori">Kategori</a>
    <a href="?page=pembelian">Pembelian</a>

<br>
    <?php require "mod/halaman.php"; ?>
</body>
</html>