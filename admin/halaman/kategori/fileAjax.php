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
	$sql = "SELECT * FROM kategori";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"no" => $i++,
			"id_kategori" => $row['id_kategori'],
			"nama_kategori" => $row['nama_kategori'],
			);
	}

	echo json_encode($response);
	exit;
}

// Insert record
if($request == 2){

   // Read POST data
	$data = json_decode(file_get_contents("php://input"));

	$nama_kategori = $data->nama_kategori;
	

   // Insert record
	$sql = "INSERT INTO kategori VALUES ('', '$nama_kategori')";
	if(mysqli_query($con,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id = $_GET["id_kategori"];
	$sql = $con->query("DELETE FROM kategori WHERE id_kategori = '$id'");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 4) {

	$id_kategori = $_GET["id_kategori"];
	$sql = $con->query("SELECT * FROM kategori WHERE id_kategori = $id_kategori ");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id_kategori' => $ambil['id_kategori'],
	        'nama_kategori' => $ambil['nama_kategori']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

	$id_kategori = $data->id_kategori;
	$nama_kategori = $data->nama_kategori;

	$sql = $con->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id_kategori");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}