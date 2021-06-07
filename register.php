<?php
session_start();

if (isset($_SESSION['login'])) {
    echo "<script>alert('Logout Dahulu');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}

include 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div class="kotak_login">
        <p class="tulisan_login"><h1>FORM REGISTER</h1> </p>

            <form method="POST">
            <table>
        <tr>
            <td>username </td>
            <td>:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>password </td>
            <td>:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>confirm password</td>
            <td>:</td>
            <td><input type="password" name="confirm"></td>
        </tr>
        <tr>
            <td><button name="btn-register" type="submit">submit</button></td>
        </tr>
    </table>
            </form>
        <?php
            if (isset($_POST['btn-register'])) {

                $username = $_POST['username'];
                $password = mysqli_real_escape_string($mysql_object, $_POST['password']);
                $confirm = mysqli_real_escape_string($mysql_object, $_POST['confirm']);

                $result = $mysql_object->query("SELECT username FROM login WHERE username = '$username' ");

                if (mysqli_fetch_assoc($result) > 0) {
                    echo "<script>alert('Username Sudah Terdaftar');</script>";
                }

                if ($password !== $confirm) {
                    echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";

                }

                $password = password_hash($password, PASSWORD_DEFAULT);
                
                $query = $mysql_object->query("INSERT INTO login VALUES('', '$username', '$password')");

                if ($query != 0) {
                    echo "<script>alert('Berhasil');</script>";
                    echo "<script>window.location.replace('login.php');</script>";
                } else {
                    echo "<script>alert('Gagal');</script>";
                    echo "<script>window.location.replace('login.php');</script>";
                }
            }

            ?>

</body>
</html>