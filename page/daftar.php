<section class="contact" id="contact">

    <h1 class="heading"> <span>Daftar</span> </h1>

    <form method="POST">
        <div class="inputBox">
            <input type="text" placeholder="name" name="nama">
            <input type="email" placeholder="email" name="email">
        </div>

        <div class="inputBox">
            <input type="password" placeholder="password" name="password">
            <input type="text" placeholder="telepon" name="telepon">
        </div>

        <textarea placeholder="alamat" name="alamat" id="" cols="30" rows="10"></textarea>

        <input type="submit" name="simpan" value="Daftar" class="btn">

    </form>

</section>

<?php
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];

	$password = password_hash($password, PASSWORD_DEFAULT);

	$data = $con->query("INSERT INTO tb_users (id_user, nama, email, password, telepon, alamat) VALUES ('', '$nama' , '$email', '$password', '$telepon', '$alamat') ");

	if ($data != 0) {
		echo "<script>alert('Data Berhasil di Tambahkan');</script>";
		echo "<script>window.location.replace('?page=login');</script>";
		exit;
	} else {
		echo "<script>alert('Data Gagal di Tambahkan');</script>";
		echo "<script>window.location.replace('?page=daftar');</script>";
		exit;
	}
}
?>