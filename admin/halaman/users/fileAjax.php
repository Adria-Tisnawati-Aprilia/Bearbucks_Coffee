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
	$sql = "SELECT * FROM login";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"no" => $i++,
            "id_users" => $row['id_users'],
			"username" => $row['username'],
			"password" => $row['password'],
			);
	}

	echo json_encode($response);
	exit;
}

// Insert record
if($request == 2){

   // Read POST data
	$data = json_decode(file_get_contents("php://input"));

	$username = $data->username;
    $password = $data->password;
	
    $password = password_hash($password, PASSWORD_DEFAULT);

   // Insert record
	$sql = "INSERT INTO login VALUES ('', '$username', '$password')";
	if(mysqli_query($con,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id_users = $_GET["id_users"];
	$sql = $con->query("DELETE FROM login WHERE id_users = '$id_users'");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 4) {

	$id_users = $_GET["id_users"];
	$sql = $con->query("SELECT * FROM login WHERE id_users = $id_users ");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id_users' => $ambil['id_users'],
	        'username' => $ambil['username'],
            'password' => $ambil['password']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

    $id_users = $data->id_users;
	$username = $data->username;
	$password = $data->password;

    $password = password_hash($password, PASSWORD_DEFAULT);

	$sql = $con->query("UPDATE login SET username = '$username', password = '$password' WHERE id_users = $id_users");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}