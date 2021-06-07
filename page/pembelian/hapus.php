<?php

include "../../koneksi/koneksi.php";

$id_kategori = $_GET['id_kategori'];
$sql = $mysql_object->query("DELETE FROM kategori WHERE id_kategori = $id_kategori ");

if ($sql) {
    echo 1;
} else {
    echo 0;
}

exit;