<style type="text/css">
	.form-control {
		position: relative;
		width: 100%;
		padding: 7px;
		font-size: 16px;
		box-shadow: 5px;
	}
</style>
<?php
if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Maaf, Anda Harus Login Dahulu');</script>";
	echo "<script>window.location.replace('?page=login');</script>";
} else if (!isset($_SESSION['keranjang'])) {
	echo "<script>alert('Tidak Ada Checkout');</script>";
	echo "<script>window.location.replace('?page=dashboard');</script>";
}
?>

<form method="POST">
	<section class="product">	
		<h1 class="heading"><span> Checkout </span> </h1>
		<div class="box-container">
			<div class="box">
				<table width="100%" style="background-color: #F0F0F0;">
					<thead style="font-size: 20px; background: white;">
						<tr>
							<th class="text-center">No.</th>
							<th>Nama Barang</th>
							<th class="text-center">Harga</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Total Harga</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody style="font-size: 20px;">
						<?php $no = 0; ?>
						<?php $totalbelanja = 0; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
							<?php
							$ambil = $con->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
							$pecah = $ambil->fetch_assoc();

							$subharga = $pecah["harga"] * $jumlah;
							?>
							<tr>
								<td style="text-align: center;"><?php echo ++$no; ?>.</td>
								<td><?php echo $pecah['nama']; ?></td>
								<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td style="text-align: center;">
									<?php echo $jumlah; ?>
								</td>
								<td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
								<td style="text-align: center;">
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus ?')" href="?page=hapus_keranjang&id_produk=<?php echo $id_produk; ?>" class="btn btn-danger">
										<i class="fa fa-trash-o"></i> Hapus
									</a>
								</td>
							</tr>
							<?php $totalbelanja+=$subharga; ?>
						<?php endforeach ?>
					</tbody>
					<tfoot style="font-size: 20px;">
						<tr>
							<th colspan="6" style="text-align: center;">Total Belanja : Rp. <?php echo number_format($totalbelanja); ?> </th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section>


	<section class="contact" id="contact">
		<div class="inputBox">
			<input type="text" class="form-control" name="" style="background-color: #F0F0F0;" placeholder="Masukkan Email" value="<?php echo $_SESSION['email'] ?>">
		</div>
		<br>
		<div class="inputBox">
			<textarea class="form-control" style="background-color: #F0F0F0;" rows="4" placeholder="Masukkan Pesan"></textarea>
		</div>

		<input type="submit" value="Checkout" name="checkout" class="btn">
	</section>

</form>

<?php
if (isset($_POST['checkout'])) {
	$id_user = $_SESSION['id_pelanggan'];
	$total_belanja = $totalbelanja;
	date_default_timezone_set("Asia/Jakarta");
	$tgl_beli = date("Y-m-d");
	$status = 0;

	$query = $con->query("SELECT * FROM tb_users WHERE id_user = $id_user ");
	$data = $query->fetch_assoc();
	$nama_pemesan = $data['nama'];
	$alamat_pemesan = $data['alamat'];
	$telepon_pemesan = $data['telepon'];

	$con->query("INSERT INTO tb_checkout (id_user, nama_pemesan, telepon_pemesan, alamat_pemesan, total_belanja, tgl_beli, status) VALUES('$id_user','$nama_pemesan','$telepon_pemesan','$alamat_pemesan','$total_belanja','$tgl_beli','$status')");

	$id_checkout = $con->insert_id;

	foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

		$ambil = $con->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
		$perproduk = $ambil->fetch_assoc();
		$id_produk = $perproduk['id_produk'];
		$con->query("INSERT INTO tb_pembelian (id_pembelian, id_checkout, id_produk, jumlah) VALUES ('', '$id_checkout', '$id_produk', '$jumlah')");
	}

	unset($_SESSION["keranjang"]);

	echo "<script>alert('Pembelian Berhasil');</script>";
	echo "<script>location='?page=riwayat';</script>";
}
?>