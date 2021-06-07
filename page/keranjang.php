<?php
    session_start();
    if(!isset($_GET['beli']) && is_numeric($_GET['beli'])) {
        if (isset($_SESSION['chart'])) {
            $_SESSION['chart'] .= $_GET['beli'].' | ';
        } else {
            $_SESSION['chart'] = $_GET['beli'].' | ';
        }
    }

    echo $_SESSION['chart'];
?>

<a href="?beli=1">Beli 1</a><br>
<a href="?beli=1">Beli 2</a><br>
<a href="?beli=1">Beli 3</a><br>
<a href="?beli=1">Beli 4</a><br>