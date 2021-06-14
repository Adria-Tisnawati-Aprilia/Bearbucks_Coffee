<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php
    switch ($page) {
        case 'dashboard':
            include "halaman/dashboard.php";
            break;

        case 'kategori':
            include "halaman/kategori/data_kategori.php";
            break;

        case 'produk':
            include "halaman/produk/data_produk.php";
            break;

        case 'pelanggan':
            include "halaman/pelanggan/data_pelanggan.php";
            break;    

        case 'pembayaran':
            include "halaman/pembayaran/pembayaran.php";
            break;
        
        case 'laporan':
            include "halaman/laporan/laporan.php";
            break;
        
        case 'users':
            include "halaman/users/users.php";
            break;

        case 'logout' :
            include "../login/logout.php";
            break;

        default:
            echo "404 Not Found";
            break;
    }
?>