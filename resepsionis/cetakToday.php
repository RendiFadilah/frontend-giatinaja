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
      alert("Anda bukan Resepsionis");
      window.location = "../login/index.php";
  </script>';
}


$datapengunjung = query("SELECT * FROM kunjungan WHERE status='Checkout' AND DATE(tanggal_kunjungan) = CURDATE()");


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
  <h1 class="dashboard-title text-center mb-4">Data Pengunjung SMK Jakarta Pusat 1</h1>
</div>

  
  <div class="container-fluid">
          <div class="table-responsive">
            <table
              class="table table-stripped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Nama Tamu</th>
                  <th>Asal</th>
                  <th>Keterangan</th>
                  <th>Bertemu dengan</th>
                  <th>Janji</th>
                  <th>Keperluan</th>
    
                </tr>
              </thead>';

            
              $i = 1;
              foreach( $datapengunjung as $row){
                $html .= '<tr>
                
                <td>'. $i++  .'</td>
                <td>'. $row["tanggal_kunjungan"].'</td>
                <td>'. $row["waktu_kunjungan"].'</td>
                <td>'. $row["nama_pengunjung"] .'</td>
                <td>'. $row["asal"] .'</td>
                <td>'. $row["keterangan"] .'</td>
                <td>'. $row["bertemu_dengan"].'</td>
                <td>'. $row["janji"].'</td>
                <td>'. $row["keperluan"] .'</td>
            
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


