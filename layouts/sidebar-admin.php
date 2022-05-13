<?php 
    $page = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buku Tamu SMK Jakarta Pusat 1</title>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/styles/main.css" />
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/libraries/fontawesome-free/css/all.min.css  " />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="../assets/images/logo-jp1.png" class="my-4" alt="" />
                </div>
                <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action p-3">
              Dashboard</a>
            <a href="resepsionis.php" class="list-group-item list-group-item-action p-3">
              Data Resepsionis</a>
            <a href="data_pengunjung.php" class="list-group-item list-group-item-action p-3">
              Data Pengunjung</a>
            <a href="data_gtk.php" class="list-group-item list-group-item-action p-3">
              Data Guru dan Tenaga Kependidikan</a>
            <a
              href="../logout.php"
              class="list-group-item list-group-item-action p-3"
            >
              Logout</a
            >
          </div>
        </div>