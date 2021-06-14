<?php
	$id_produk = $_GET['id_produk'];
	unset($_SESSION["keranjang"][$id_produk]);

	echo "<script>alert('Produk Terhapus');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>