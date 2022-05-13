<?php 

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


$id = $_GET["id"];
$dataresepsionis = query("SELECT * FROM user WHERE id_user = $id")[0];

if( isset($_POST["submit"])){
    if(editResepsionis($_POST) > 0){
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  icon: 'info',
                  title: 'Data berhasil di ubah',
                  type: 'success',
                  timer: 1500,
                  showConfirmButton: true,
                  confirmButtonColor: '#3085d6'
              });   
        },30);  
        window.setTimeout(function(){ 
          window.location.replace('resepsionis.php');
        } ,1500); 
        </script>";
    }else{
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  type: 'error',
                  title: 'Data gagal di ubah',
                  timer: 1500,
                  showConfirmButton: true,
                  confirmButtonColor: '#3085d6'
              });   
        },30);  
        window.setTimeout(function(){ 
          window.location.replace('resepsionis.php');
        } ,1500); 
        </script>";
    }
}


?>

<?php require '../layouts/sidebar-admin.php'; ?>
        <!-- Page Content -->

        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
            aria-label="Navbar"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
            </div>
          </nav>

          <!-- Section Content -->
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
              <a href="resepsionis.php" class="btn btn-sm btn-icon-split" style="background: #1757ed;">
                <span class="icon text-white">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </span>

            </a>
                <h2 class="dashboard-titlte mt-5">Edit Data Pengunjung SMK Jakarta Pusat 1</h2>
                <p class="dashboard-subtitle">
                  Hallo Admin SMK Jakarta Pusat 1, Semangat ya tugasnya!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <form action="" method="POST">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-left: -25px;">
                      <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id_user" class="form-control" value="<?= $dataresepsionis["id_user"]; ?>">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" 
                                    class="form-control" value="<?= $dataresepsionis["username"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" 
                                    class="form-control" value="<?= $dataresepsionis["nama_lengkap"]; ?>">
                                </div>
                            </div>
                           
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" 
                                    class="form-control" value="<?= $dataresepsionis["kelas"]; ?>">
                                </div>
                            </div>
                             <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" 
                                    class="form-control" value="<?= $dataresepsionis["password"]; ?>">
                                </div> 
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Roles</label>
                                    <select name="roles" class="form-control">
                                      <option value="Resepsionis">Resepsionis</option>
                                    </select>
                                </div> 
                            </div>
                    </div>
                  </div>
                </div>
                <div class="row p-3">
            <div class="col text-right">
              <button type="submit" name="submit" class="btn btn-success px-5" style="margin-left: -25px;">
                Edit
              </button>
            </div>
                        </div>
                      </div>
                      </form>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php require '../layouts/footer-admin.php'; ?>