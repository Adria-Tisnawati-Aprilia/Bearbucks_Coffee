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
            <p class="tulisan_login"><h1>Please Login</h1> </p>
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
            <td><button name="btn-submit" type="submit">submit</button></td>
        </tr>
    </table>
    </form>

    <?php
        if (isset($_POST['btn-submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $mysql_object->query("SELECT * FROM login WHERE username = '$username' ");

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);

                if (password_verify($password, $data['password'])) {

                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $data['username'];
    
                    echo "<script>alert('Berhasil Login');</script>";
                    echo "<script>window.location.replace('index.php');</script>";
                } else {
                    echo "<script>alert('Gagal Login');</script>";
                    echo "<script>window.location.replace('login.php');</script>";
                }
            } else {
                echo "<script>alert('Gagal Login');</script>";
                echo "<script>window.location.replace('login.php');</script>";
            }
        }
    ?>
</body>
</html>