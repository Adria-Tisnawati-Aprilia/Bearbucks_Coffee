<?php

    if (!isset($_SESSION['pelanggan'])) {
        echo "<script>alert('Login Dahulu');</script>";
        echo "<script>window.location.replace('?page=dashboard');</script>";
    }

    unset($_SESSION['pelanggan']);

    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>window.location.replace('?page=dashboard');</script>";

?>