<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sunbucks_coffee";

// Create connection
$mysql_object = new mysqli($servername, $username, $password, $database);
$mysql_procedur = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($mysql_object->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$mysql_procedur) {
    die("Connection failed: " . mysqli_connect_error());
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=sunbucks_coffee", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
?>