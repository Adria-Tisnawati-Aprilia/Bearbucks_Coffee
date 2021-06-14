<section class="product" id="product">

	<h1 class="heading"><span>products</span></h1>
	<div class="box-container">
		<?php $query = $con->query("SELECT * FROM tb_produk"); ?>
		<?php foreach ($query as $data) : ?>
			<div class="box">
				<img src="admin/image/<?php echo $data['foto'] ?>" alt="">
				<h3><?php echo $data['nama'] ?></h3>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<div class="price"> Rp. <?php echo number_format($data['harga']) ?> </div>
				<a href="?page=beli&id_produk=<?php echo $data['id_produk'] ?>" class="btn">Beli</a>
			</div>
		<?php endforeach ?>

	</div>

</section>