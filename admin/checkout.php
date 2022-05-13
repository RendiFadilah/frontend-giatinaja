<?php


require '../koneksi.php';

$id = $_GET["id"];
$query = mysqli_query($conn, "UPDATE kunjungan SET status ='Checkout' WHERE id_kunjungan = '$id'");

if($query){
    echo '<script type="text/javascript">
    alert("Pengunjung telah Checkout");
    window.location = "index.php";
    </script>';
}


?>


