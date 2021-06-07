<div id="header">	
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome!<strong> User</strong></div>
			<div class="span6">
				<div class="pull-right">
					<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> Keranjang</span> </a> 
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<div id="logoArea" class="navbar">
			<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-inner">
				<a class="brand" style="margin-left: 5px;"  href="index.html"><img src="foto\LogoBB.jpeg"></a>
				<form class="form-inline navbar-search" method="post" action="index.php" >
					<input class="srchTxt" type="text" />
					<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
				</form>
				<ul id="topMenu" class="nav pull-right">
					<li class=""><a href="index.php">Home</a></li>
				<?php if (isset($_SESSION['pelanggan'])) : ?>
					<li class=""><a href="history.php">History Belanja</a></li>
					<li class=""><a href="logout.php">Logout</a></li>
				<?php else : ?>
					<li class=""><a href="login.php">Login</a></li>
					<li class=""><a href="daftar.php">Daftar</a></li>
				<?php endif ?>
				<li class=""><a href="checkout.php">Checkout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>