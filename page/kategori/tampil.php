<?php

include "../../koneksi/koneksi.php";

$sql = $mysql_object->query("SELECT * FROM kategori");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_kategori' => $ambil['id_kategori'],
        'nama_kategori' => $ambil['nama_kategori']
    );
}

echo json_encode($data);
exit;