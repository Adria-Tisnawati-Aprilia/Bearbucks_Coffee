<?php
	$id_checkout = $_GET['id_checkout'];
	$query = $con->query("SELECT * FROM tb_pembelian JOIN tb_produk ON tb_pembelian.id_produk = tb_produk.id_produk WHERE tb_pembelian.id_checkout = $id_checkout ");
	$tb_checkout = $con->query("SELECT * FROM tb_checkout WHERE id_checkout = $id_checkout ");
	$q_checkout = $tb_checkout->fetch_assoc();
?>
<section class="product">
	<div class="box-container">
		<div class="box">
            <a href="#" class="logo"> Data Checkout </a>
            <p style="font-size: 20px;">
            	Nama Pemesan : <?php echo $q_checkout['nama_pemesan'] ?>
            	<br>
            	Telepon : <?php echo $q_checkout['telepon_pemesan'] ?>
            	<br>
            	Alamat : <?php echo $q_checkout['alamat_pemesan']; ?>
            </p>
            <div class="share"></div>
        </div>
	</div>
</section>

<section class="product" id="product">
	<div class="box-container">
		<div class="box">
			<table width="100%" style="padding: 20px; font-size: 20px; background-color: #F0F0F0;" cellpadding="10">
				<thead style="background-color: black; color: white;">
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>

					</tr>
				</thead>
				<tbody style="font-size: 20px; ">
					<?php $no = 0; ?>
					<?php foreach ($query as $data) : ?>
					<tr>
						<td><?php echo ++$no ?>.</td>
						<td><?php echo $data['nama'] ?></td>
						<td>Rp. <?php echo number_format($data['harga']); ?></td>
						<td><?php echo $data['jumlah'] ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</section>