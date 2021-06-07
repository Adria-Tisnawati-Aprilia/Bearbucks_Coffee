<?php

include "../../koneksi/koneksi.php";

$id_kategori = $_GET['id_kategori'];

$sql = $mysql_object->query("SELECT * FROM kategori WHERE id_kategori = $id_kategori ");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_kategori' => $ambil['id_kategori'],
        'nama_kategori' => $ambil['nama_kategori']
    );
}

echo json_encode($data);
exit;