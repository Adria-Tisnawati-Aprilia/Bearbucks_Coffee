<?php

    include "../../koneksi/koneksi.php";

    $data = json_decode(file_get_contents("php://input"));

    $id_kategori = $data->id_kategori;
    $nama_kategori = $data->nama_kategori;

    $sql = $mysql_object->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id_kategori ");

    if($sql){
        echo 1;
    }else{
        echo 2;
    }

    exit;