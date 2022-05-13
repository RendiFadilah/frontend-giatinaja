<?php 

$conn = mysqli_connect('localhost', 'root', '', 'bukutamu');

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahKunjungan($data){

    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    
    $tanggal_kunjungan = date("Y-m-d");
    $time = date("H:i:s");
    $nama_pengunjung = htmlspecialchars($data["nama_pengunjung"]);
    $asal = htmlspecialchars($data["asal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $bertemu_dengan = htmlspecialchars($data["bertemu_dengan"]);
    $janji = htmlspecialchars($data["janji"]);
    $keperluan = htmlspecialchars($data["keperluan"]);
    $status = "Waiting";
    


    $query = "INSERT INTO kunjungan VALUES(NULL, '$tanggal_kunjungan', '$time', '$nama_pengunjung', '$asal', '$keterangan', '$bertemu_dengan', '$janji', '$keperluan', '$status')";

    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editKunjungan($data){
    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    $id = $data["id_kunjungan"];
    $tanggal_kunjungan = date("Y-m-d");
    $time = date("H:i:s");
    $nama_pengunjung = htmlspecialchars($data["nama_pengunjung"]);
    $asal = htmlspecialchars($data["asal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $bertemu_dengan = htmlspecialchars($data["bertemu_dengan"]);
    $janji = htmlspecialchars($data["janji"]);
    $keperluan = htmlspecialchars($data["keperluan"]);

    $query = "UPDATE kunjungan SET
    tanggal_kunjungan = '$tanggal_kunjungan',
    waktu_kunjungan = '$time',
    nama_pengunjung = '$nama_pengunjung',
    asal = '$asal',
    keterangan = '$keterangan',
    bertemu_dengan = '$bertemu_dengan',
    janji = '$janji',
    keperluan = '$keperluan' WHERE id_kunjungan = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function hapusPengunjung($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM kunjungan WHERE id_kunjungan = $id");
    return mysqli_affected_rows($conn);
}

function tambahResepsionis($data){
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $password = htmlspecialchars($data["password"]);
    $roles = $data["roles"];

    $query = "INSERT INTO user VALUES(NULL, '$username', '$nama_lengkap', '$kelas', '$password', '$roles')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function uploadResepsionis($data){
//     global $conn;

//     include "admin/excel_reader2.php";

//     $target = basename($_FILES['fileresepsionis']['name']);
//     move_uploaded_file($_FILES['fileresepsionis']['tmp_name'], $target);

//     chmod($_FILES['fileresepsionis']['name'], 0777);

//     $data = new Spreadsheet_Excel_Reader($_FILES['fileresepsionis']['name'], false);
//     $jumlah_baris = $data->rowcount($sheet_index = 0);

//     $berhasil = 0;

//     for ($i=2; $i<=$jumlah_baris; $i++){
//         $username     = $data->val($i, 1);
//         $nama_lengkap   = $data->val($i, 2);
//         $kelas  = $data->val($i, 3);
//         $password = $data->val($i, 4);
//         $roles = $data ->val($i, 5);
     
//         if($username != "" && $nama_lengkap != "" && $kelas != "" && $password != "" && $roles != ""){
//             mysqli_query($conn,"INSERT INTO user VALUES('','$username','$nama_lengkap','$kelas', '$password' '$roles')");
//             $berhasil++;
//         }
//     }

//     unlink($_FILES['fileresepsionis']['name']);

//     return mysqli_affected_rows($conn);
// }

function editResepsionis($data){
    global $conn;

    $id = $data["id_user"];
    $username = htmlspecialchars($data["username"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $password = htmlspecialchars($data["password"]);
    $roles = $data["roles"];

    $query = "UPDATE user SET
    username = '$username',
    nama_lengkap = '$nama_lengkap',
    kelas = '$kelas',
    password = '$password',
    roles = '$roles' WHERE id_user = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusResepsionis($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

function tambahGtk($data){
    global $conn;

    $namalengkap = htmlspecialchars($data["namalengkap"]);
    $job = htmlspecialchars($data["job"]);
    $roles = htmlspecialchars($data["roles"]);
    $whatsapp = htmlspecialchars($data["nomor_whatsapp"]);
    // $foto =  $_FILES["foto"]["name"];
    // $files = $_FILES["foto"]["tmp_name"];

    
    $query = "INSERT INTO gtk VALUES(NULL, '$namalengkap', '$job', '$roles', '$whatsapp')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function hapusGTK($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM gtk WHERE id_gtk = $id");
    return mysqli_affected_rows($conn);
}

function editGtk($data){
    global $conn;

    $id = $data["id_gtk"];
    $namalengkap = htmlspecialchars($data["namalengkap"]);
    $job = htmlspecialchars($data["job"]);
    $roles = htmlspecialchars($data["roles"]);
    $nomor_whatsapp = htmlspecialchars($data["nomor_whatsapp"]);

    $query = "UPDATE gtk SET
    namalengkap = '$namalengkap',
    job = '$job',
    roles = '$roles',
    nomor_whatsapp = '$nomor_whatsapp' WHERE id_gtk = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cariPengunjung($keyword) {
    $query = "SELECT * FROM kunjungan WHERE 
    nama_pengunjung LIKE '%$keyword%' OR
    asal LIKE '%$keyword%' OR
    keperluan LIKE '%$keyword%'
    ";
    return query($query);
}

function cariResepsionis($keyword) {
    $query = "SELECT * FROM user WHERE 
    username LIKE '%$keyword%' OR
    nama_lengkap LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%'
    ";
    return query($query);
}

function cariGtk($keyword) {
    $query = "SELECT * FROM gtk WHERE 
    namalengkap LIKE '%$keyword%' 
    ";
    return query($query);
}




?>