<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();

require '../functions.php';

if(!isset($_SESSION["username"])){
  echo 
  '<script type="text/javascript">
      alert("Anda belum login");
      window.location = "../login/index.php";
  </script>';
}

if($_SESSION["roles"] !="Admin"){
  echo 
  '<script type="text/javascript">
      alert("Anda bukan Admin");
      window.location = "../login/index.php";
  </script>';
}


$resepsionis = query("SELECT * FROM user WHERE roles='Resepsionis'");


$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => 'A4-L',
  'orientation' => 'L'
]);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengunjung SMK Jakarta Pusat 1</title>
    <link rel="stylesheet" href="../assets/styles/print.css" />
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/libraries/fontawesome-free/css/all.min.css  " />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>
<body>
<div class="container-fluid">
<div class="dashboard-heading">
  <h1 class="dashboard-title text-center mb-4">Data Resepsionis SMK Jakarta Pusat 1</h1>
</div>

  
  <div class="container-fluid">
          <div class="table-responsive">
            <table
              class="table table-stripped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Keterangan</th>
                </tr>
              </thead>';

            
              $i = 1;
              foreach( $resepsionis as $row){
                $html .= '<tr>             
                <td>'. $i++  .'</td>
                <td>'. $row["username"].'</td>
                <td>'. $row["nama_lengkap"].'</td>
                <td>'. $row["kelas"] .'</td>
                <td>'. $row["roles"] .'</td>
                </tr>';
              }

 $html .= '</table>
  </div>
  
  <p>Mengetahui</p>
  <p>Kepala SMK Jakarta Pusat 1</p>
  <br />
  <br />
  <br />
  <p>Lilik Bintoro TP, S.H., M.M
</div>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('data-pengunjung.pdf', 'I');

?>


