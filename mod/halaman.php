<?php

    if (isset($_GET["page"])) {
        $page = &$_GET["page"];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;

        case 'beli':
            include 'page/beli.php';
            break;

        case 'menu':
            include 'page/menu.php';
            break;

        case 'keranjang':
            include 'page/keranjang.php';
            break;

        case 'hapus_keranjang':
            include 'page/hapus_keranjang.php';
            break;

        case 'hapus_keranjang_checkout' :
            include 'page/hapus_keranjang_checkout.php';
            break;

        case 'checkout':
            include 'page/checkout.php';
            break;

        case 'login':
            include 'page/login.php';
            break;

        case 'profil':
            include 'page/profil.php';
            break;

        case 'daftar':
            include 'page/daftar.php';
            break;

        case 'checkout':
            include 'page/checkout.php';
            break;

        case 'nota':
            include 'page/nota.php';
            break;

        case 'logout':
            include 'page/logout.php';
            break;

        case 'detail_pesanan':
            include 'page/detail_pesanan.php';
            break;

        case 'riwayat':
            include 'page/riwayat.php';
            break;

        default:
            echo "404 Not Found";
            break;
    }
?>