<?php

    include "koneksi.php";
    if(!isset($_SESSION['user'])) {
        header("location: page/frontend/login.php");
    } else {
        header("location: page/frontend/index.php");
    }
?>
