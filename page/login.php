<section class="contact" id="contact">

	<h1 class="heading"> <span>Login</span> </h1>

	<form method="POST">

		<div class="inputBox">
			<input type="text" placeholder="email" name="email">
			<input type="password" placeholder="password" name="password">
		</div>

		<input type="submit" name="login" value="Login" class="btn">

	</form>

</section>


<?php 

if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	if ($email == "" && $password == "") {
		echo "<script>alert('Data Tidak Boleh Kosong');</script>";
		echo "<script>window.location.replace('?page=login');</script>";
		exit;
	}

	$result = $con->query("SELECT * FROM tb_users WHERE email = '$email' ");

	if (mysqli_num_rows($result) === 1) {

		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row['password'])) {
			$_SESSION['id_pelanggan'] = $row['id_user'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['pelanggan'] = $row;
			echo "<script>alert('Berhasil');</script>";
			if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
				echo "<script>location='?page=checkout';</script>";
			} else {
				echo "<script>location='?page=riwayat';</script>";
			}
		} else {
			echo "<script>alert('Gagal');</script>";
			echo "<script>location='?page=login';</script>";
		}

	} else {
		echo "<script>alert('Gagal');</script>";
		echo "<script>location='?page=login';</script>";
	}

}

?>