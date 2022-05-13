<?php 

require 'process.php';
if( isset($_POST["submit"])){

    if(tambahUser($_POST) > 0 ){
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  icon: 'info',
                  title: 'Pendaftaran berhasil',
                  text: 'Selamat dan semangat bertugasnya ya!',
                  type: 'success',
                  timer: 3000,
                  showConfirmButton: true,
                  confirmButtonColor: '#3085d6'
              });   
        },30);  
        window.setTimeout(function(){ 
          window.location.replace('../login/index.php');
        } ,3000); 
        </script>";
    }else{
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'berita.php';
			</script>
		";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/libraries/fontawesome-free/css/all.min.css  " />
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/sweetalert.css">
</head>
<body>
    
    <div class="container-box">
        <h3>Daftar Resepsionis</h3>

        <form action="" method="POST">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control"><br /> <br />

            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"> <br /> <br />

            <label>Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control"> <br /> <br />

            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control"><br /> <br />

            <label>Job</label>
            <select name="roles" id="roles" class="form-control">
                <option value="Resepsionis">Resepsionis</option>
            </select>  <br /> <br />
            

            <button type="submit" name="submit">Daftar</button>
        </form>
    </div>


    <script src="../assets/libraries/bootstrap/js/sweetalert.min.js"></script>
    <script src="../assets/libraries/jquery/jquery.min.js"></script>
</body>
</html>