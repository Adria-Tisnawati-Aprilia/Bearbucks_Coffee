<section class="prduct">
	<h1 class="heading"><span> Riwayat Total Belanja </span> </h1>
	<div class="box-container">
		<div class="box">
			<table width="100%" style="background-color: #F0F0F0;">
				<thead style="font-size: 20px; background: white; padding: 10px;">
					<tr>
						<th class="text-center">No.</th>
						<th align="left">Nama Pemesan</th>
						<th class="text-center">Telepon Pemesan</th>
						<th align="center">Tanggal Beli</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody style="font-size: 20px;">
					<?php $no = 0; ?>
					<?php $id_user = $_SESSION['id_pelanggan']; ?>
					<?php $query = $con->query("SELECT * FROM tb_checkout WHERE id_user = $id_user "); ?>

					<?php foreach ($query as $data) : ?>
						<tr style="background-color: white;">
							<td align="center"><?php echo ++$no; ?>.</td>
							<td><?php echo $data['nama_pemesan']; ?></td>
							<td align="center"><?php echo $data['telepon_pemesan'] ?></td>
							<td align="center" class="text-center"><?php echo $data['tgl_beli'] ?></td>
							<td align="center">
								<a href="?page=detail_pesanan&id_checkout=<?php echo $data['id_checkout'] ?>" class="btn btn-info">
									Detail Pesanan
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>	
	</div>
</section>