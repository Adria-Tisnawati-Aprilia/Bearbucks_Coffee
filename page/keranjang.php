<?php
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Data Keranjang Tidak Ada');</script>";
	echo "<script>location='?page=dashboard';</script>";
}
?>

<section class="product">	
	<h1 class="heading"><span>Keranjang Belanja</span> <a href="?page=dashboard"> Lanjut Belanja</a></h1>
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
						<tr style="background-color: white;">
							<td style="text-align: center;"><?php echo ++$no; ?>.</td>
							<td><?php echo $pecah['nama']; ?></td>
							<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
							<td style="text-align: center;">
								<?php echo $jumlah; ?>
							</td>
							<td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
							<td style="text-align: center;">
								<a onclick="return confirm('Yakin ? Anda Ingin Menghapus ?')" href="?page=hapus_keranjang&id_produk=<?php echo $id_produk; ?>" class="btn btn-danger btn-sm">
									<i class="fa fa-trash-o"></i> Hapus
								</a>
							</td>
						</tr>
						<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot style="font-size: 20px; background-color: white;">
					<tr>
						<th colspan="6" style="text-align: center; padding: 10px;">Total Belanja : Rp. <?php echo number_format($totalbelanja); ?> </th>
					</tr>
				</tfoot>
			</table>
			<a href="?page=checkout" class="btn btn-primary">
				<i class="fa fa-sign-in"></i> Checkout
			</a>
		</div>
	</div>
</section>