<?php

include '../admin/koneksi/koneksi.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO login VALUES ('', '$username', '$password')";
if(mysqli_query($con,$sql)){
	echo 1; 
}else{
	echo 0;
}

exit;

?>