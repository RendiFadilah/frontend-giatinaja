<?php 

session_start();



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


require '../functions.php';


if(isset($_POST["submit"])){
  if(tambahGtk($_POST) > 0 ){
    echo "<script type='text/javascript'>
    setTimeout(function () { 
      swal({
              icon: 'info',
              title: 'Data berhasil di tambahkan',
              type: 'success',
              timer: 1500,
              showConfirmButton: true,
              confirmButtonColor: '#3085d6'
          });   
    },30);  
    window.setTimeout(function(){ 
      window.location.replace('data_gtk.php');
    } ,1500); 
    </script>";
  } else {
    echo "<script type='text/javascript'>
    setTimeout(function () { 
      swal({
              type: 'error',
              title: 'Data gagal di tambahkan',
              timer: 1500,
              showConfirmButton: true,
              confirmButtonColor: '#3085d6'
          });   
    },30);  
    window.setTimeout(function(){ 
      window.location.replace('data_gtk.php');
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
              <a href="data_gtk.php" class="btn btn-sm btn-icon-split" style="background: #1757ed;">
                <span class="icon text-white">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </span>

            </a>
                <h2 class="dashboard-titlte mt-5">Tambah Data GTK</h2>
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
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="namalengkap" class="form-control" id="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job</label>
                                            <input type="text" name="job" class="form-control" id="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Roles</label>
                                            <select name="roles" class="form-control" id="roles">
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Guru">Guru</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="">Nomor WhatsApp</label>
                                            <input type="text" name="nomor_whatsapp" class="form-control" id="" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" name="foto" class="form-control" id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-3 mt-3">
                                    <div class="col text-right" style="margin-left: -20px;">
                                      <button type="submit" name="submit" class="btn btn-success px-5">
                                        Tambah
                                      </button>
                                    </div>
                                  </div>
                            </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

        <?php require '../layouts/footer-admin.php'; ?>