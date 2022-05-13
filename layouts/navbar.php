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
    <link rel="stylesheet" href="assets/styles/main.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <nav class="
        navbar navbar-expand-lg navbar-light
        bg-white
        fixed-top
        navbar-fixed-top
      ">
        <div class="container p-2">
            <a class="navbar-brand ms-2" href="index.html">
                <img class="ml-2" src="assets/images/header.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item">
                        <a href="index.php" <?php if($page == 'index.php')
                        { 
                            echo 'class="nav-link me-3 active"';
                        }else if($page != 'index.php')
                        { 
                            echo 'class="nav-link me-3"';
                        
                        }; ?> >Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="bukutamu.php" <?php if($page == 'bukutamu.php')
                        { 
                            echo 'class="nav-link me-3 active"';
                        }else if($page != 'bukutamu.php')
                        { 
                            echo 'class="nav-link me-3"';
                        
                        }; ?> >Buku Tamu</a>
                    </li>
                  
                    <a href="login" class="btn btn-custom px-4 me-4">Masuk</a
            >
          </ul>
        </div>
      </div>
    </nav>