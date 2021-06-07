<?php
    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
      }
?>
<section>
        <div class="circle"></div>
        <header>

            <form action="">
                <input type="text" size="70" placeholder="Search Here" style="padding: 5px; border-radius: 5px; border: 1px solid gray;">
                <button type="submit">
                    Search
                </button>
            </form>

            <p><b>Halaman Pembelian</b></p>

        </header>

            <div class="card">
	            <div class="card-header">
		            <p class="card-title"> Buko Pandan </p>
	            </div>
	            <div class="card-body">
		            <img src="img\product\prod1.jpg" hight="150" width="100">
              </div>
              <div class="card-footer">
                <form method="post" action="#" class="d-inline">
                  <center><button class="btn btn-success">Beli</button>
                  <center><a href="#" class="btn btn-primary">Detail</a>
                </form> 
              </div>
            </div>
            <div class="card">
	            <div class="card-header">
		            <p class="card-title"> Buko Pandan </p>
	            </div>
	            <div class="card-body">
		            <img src="img\product\prod2.jpg" hight="150" width="100">
              </div>
              <div class="card-footer">
                <form method="post" action="./beli.php?page=tambah&amp;id=14" class="d-inline">
                  <center><button class="btn btn-success">Beli</button>
                  <center><a href="./detail.php?search=buko-pandan" class="btn btn-primary">Detail</a>
                </form> 
              </div>
            </div>
            <div class="card">
	            <div class="card-header">
		            <p class="card-title"> Buko Pandan </p>
	            </div>
	            <div class="card-body">
		            <img src="img\product\prod3.jpg" hight="150" width="100">
              </div>
              <div class="card-footer">
                <form method="post" action="./beli.php?page=tambah&amp;id=14" class="d-inline">
                  <center><button class="btn btn-success">Beli</button>
                  <center><a href="./detail.php?search=buko-pandan" class="btn btn-primary">Detail</a>
                </form> 
              </div>
            </div>
            <div class="card">
	            <div class="card-header">
		            <p class="card-title"> Buko Pandan </p>
	            </div>
	            <div class="card-body">
		            <img src="img\product\prod4.jpg" hight="150" width="100">
              </div>
              <div class="card-footer">
                <form method="post" action="./beli.php?page=tambah&amp;id=14" class="d-inline">
                  <center><button class="btn btn-success">Beli</button>
                  <center><a href="./detail.php?search=buko-pandan" class="btn btn-primary">Detail</a>
                </form> 
              </div>
            </div>
            <div class="card">
	            <div class="card-header">
		            <p class="card-title"> Buko Pandan </p>
	            </div>
	            <div class="card-body">
		            <img src="img\product\prod5.jpg" hight="150" width="160">
              </div>
              <div class="card-footer">
                <form method="post" action="./beli.php?page=tambah&amp;id=14" class="d-inline">
                  <center><button class="btn btn-success">Beli</button>
                  <center><a href="./detail.php?search=buko-pandan" class="btn btn-primary">Detail</a>
                </form> 
              </div>
            </div>
            
        
<br>
<article

      </div>
</div>

      </div>