<?php
session_start();
include 'admin/koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Starbucks Landing </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/landing.css">

</head>
<body>

    <header>

        <div class="header-1">

            <a href="#" class="logo"><i class="fas fa-shopping-basket"></i> Starbucks </a>

        </div>

        <div class="header-2">

            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">
                <a href="?page=dashboard">home</a>
                <a href="?page=keranjang">keranjang</a>
                <?php if (@$_SESSION['pelanggan']) : ?>
                    <a href="?page=riwayat"> Riwayat </a>
                    <a href="?page=logout"> Logout </a>
                <?php else : ?>
                    <a href="?page=login">login</a>
                    <a href="?page=daftar">daftar</a>
                <?php endif ?>
                    <a href="?page=checkout"> Checkout </a>
            </nav>

        </div>

    </header>

    <?php require 'mod/halaman.php'; ?>

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <a href="#" class="logo"><i class="fas fa-shopping-basket"></i> Starbucks </a>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam culpa sit enim nesciunt rerum laborum illum quam error ut alias!</p>
                <div class="share">
                    <a href="#" class="btn fab fa-facebook-f"></a>
                    <a href="#" class="btn fab fa-twitter"></a>
                    <a href="#" class="btn fab fa-instagram"></a>
                    <a href="#" class="btn fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>our location</h3>
                <div class="links">
                    <a href="#">india</a>
                    <a href="#">USA</a>
                    <a href="#">france</a>
                    <a href="#">japan</a>
                    <a href="#">russia</a>
                </div>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <div class="links">
                    <a href="#">home</a>
                    <a href="#">category</a>
                    <a href="#">product</a>
                    <a href="#">deal</a>
                    <a href="#">contact</a>
                </div>
            </div>

            <div class="box">
                <h3>download app</h3>
                <div class="links">
                    <a href="#">google play</a>
                    <a href="#">window xp</a>
                    <a href="#">app store</a>
                </div>
            </div>

        </div>

        <h1 class="credit"> Created by <span> Kelompok 1 </span> | all rights reserved! </h1>

    </section>

    <script src="js/script.js"></script>
    
</body>
</html>