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
	$sql = "SELECT * FROM tb_checkout";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"no" => $i++,
			"id_checkout" => $row['id_checkout'],
			"id_user" => $row['id_user'],
			"nama_pemesan" => $row['nama_pemesan'],
			"total_belanja" => $row['total_belanja'],
			"tgl_beli" => $row['tgl_beli'],
			"status" => $row['status']
			);
	}

	echo json_encode($response);
	exit;
}

if($request == 3){

	$id_checkout = $_GET['id_checkout'];

	$sql = $con->query("UPDATE tb_checkout SET status = 1 WHERE id_checkout = $id_checkout ");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}