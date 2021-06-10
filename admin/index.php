<?php
	session_start();

	if (!isset($_SESSION['login'])) {
		echo "<script>alert('Login Dahulu');</script>";
		echo "<script>window.location.replace('../login/login.php');</script>";
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn-warning {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 17px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        
        .btn-warning:hover {
            background-color: yellow;
        }

        .btn-danger {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        
        .btn-danger:hover {
            background-color: darkred;
        }

        .btn-primary {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        
        .btn-primary:hover {
            background-color: darkblue;
        }

        .form-control {
            position: relative;
            width: 100%;
            padding: 7px;
            font-size: 16px;
            box-shadow: 5px;
        }
    </style>
</head>
<body>

	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="fa fa-beer"></span> <span>Bearbucks</span> </h2>
		</div>

		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="?page=dashboard">
						<span class="fa fa-dashboard"></span>
						<span> Home </span>
					</a>
				</li>
                <li>
                    <a href="?page=kategori">
                        <span class="fa fa-bars"></span>
                        <span> Kategori </span>
                    </a>
                </li>
				<li>
					<a href="?page=produk">
						<span class="fa fa-shopping-cart"></span>
						<span> Produk </span>
					</a>
				</li>
				<li>
					<a href="?page=">
						<span class="fa fa-money"></span>
						<span> Pembayaran </span>
					</a>
				</li>
				<li>
					<a href="?page=users">
						<span class="fa fa-users"></span>
						<span> Users </span>
					</a>
				</li>
				<li>
					<a href="">
						<span class="fa fa-sign-out"></span>
						<span> Log Out </span>
					</a>
				</li>
			</ul>
		</div>
	</div>	

	<div class="main-content">
		<header>
			<h1>
				<label for="nav-toggle">
					<span class="fa fa-bars"></span>
				</label>

				.:: Aloha ::.
			</h1>

			<div class="search-wrapper">
				<span class="fa fa-search"></span>
				<input type="search" placeholder="Search Here" name="">
			</div>

			<div class="user-wrapper">
				<img src="img/people.png" width="30px" height="30px" alt="">
				<div>
					<h4>Admin</h4>
					<small>Super Admin</small>
				</div>
			</div>

		</header>

		<?php
            require 'link/halaman.php';
        ?>
	</div>

</body>
</html>