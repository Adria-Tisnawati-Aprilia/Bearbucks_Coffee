<?php

include "../../koneksi/koneksi.php";

$request = 3;

// Read $_GET value
if(isset($_GET['request'])){
	$request = $_GET['request'];
}

// Fetch records 
if($request == 1){

   // Select record 
	$i = 1;
	$sql = "SELECT * FROM tb_produk";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"no" => $i++,
            "id_produk" => $row['id_produk'],
			"nama" => $row['nama'],
			"harga" => $row['harga'],
            "deskripsi" => $row['deskripsi'],
            "foto" => $row['foto']
			);
	}

	echo json_encode($response);
	exit;
}

// Insert record
if($request == 2){

   // Read POST data
	$data = json_decode(file_get_contents("php://input"));

	$id_kategori = $data->id_kategori;
    $nama = $data->nama;
	$harga = $data->harga;
    $deskripsi = $data->deskripsi;
    

   // Insert record
	$sql = "INSERT INTO tb_produk (id_produk, nama, harga, id_kategori, deskripsi) VALUES ('', '$nama', '$harga', '$id_kategori', '$deskripsi')";
	if(mysqli_query($con,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id_produk = $_GET['id_produk'];
	$sql = $con->query("DELETE FROM tb_produk WHERE id_produk = $id_produk ");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 4) {

	$id_produk = $_GET["id_produk"];
	$sql = $con->query("SELECT * FROM tb_produk WHERE id_produk = $id_produk ");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
            'id_produk' => $ambil['id_produk'],
	        'id_kategori' => $ambil['id_kategori'],
	        'nama' => $ambil['nama'],
            'harga' => $ambil['harga'],
            'deskripsi' => $ambil['deskripsi'],
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

    $id_produk = $data->id_produk;
	$id_kategori = $data->id_kategori;
	$nama = $data->nama;
    $harga = $data->harga;
    $deskripsi = $data->deskripsi;

	$sql = $con->query("UPDATE tb_produk SET id_kategori = '$id_kategori', nama = '$nama', harga = '$harga', deskripsi = '$deskripsi' WHERE id_produk = $id_produk");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}