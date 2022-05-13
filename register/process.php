<?php 

$conn = mysqli_connect('localhost', 'root', '', 'bukutamu');

function tambahUser($data) {

    global $conn;
    $username = htmlspecialchars($data["username"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $password = htmlspecialchars($data["password"]);
    $role = $data["roles"];
    $query = "INSERT INTO user VALUES(NULL, '$username', '$nama_lengkap', '$kelas', '$password', '$role')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}






?>