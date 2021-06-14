<?php
	$id_produk = $_GET['id_produk'];

	if (isset($_SESSION['keranjang'][$id_produk])) {
		$_SESSION['keranjang'][$id_produk]+=1;
	}
	else{
		$_SESSION['keranjang'][$id_produk] = 1;
	}

	echo "<script>alert('Produk Sudah Masuk ke Keranjang');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>