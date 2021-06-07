<?php

include "../../koneksi/koneksi.php";

$id_produk = $_GET['id_produk'];
$sql = $mysql_object->query("DELETE FROM produk WHERE id_produk = $id_produk ");

if ($sql) {
    echo 1;
} else {
    echo 0;
}

exit;