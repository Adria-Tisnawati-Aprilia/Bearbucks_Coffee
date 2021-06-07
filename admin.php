
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        echo "<script>alert('Login Dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
        exit;
    }
    include 'koneksi/koneksi.php';
?>
<center>
<body>
<div style="background-color:#f1f1f1;padding:15px;">
    <a href="?page=dashboard">Dashboard</a>
    <a href="?page=produk">Produk</a>
    <a href="?page=kategori">Kategori</a>
    <a href="?page=pembelian">Pembelian</a>
</div>
    <hr>