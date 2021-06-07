<?php

    include "../../koneksi/koneksi.php";

    $data = json_decode(file_get_contents("php://input"));

    $nama_kategori = $data->nama_kategori;

    $sql = $mysql_object->query("INSERT INTO kategori VALUES ('', '$nama_kategori')");

    if($sql){
        echo 1;
    }else{
        echo 2;
    }

    exit;