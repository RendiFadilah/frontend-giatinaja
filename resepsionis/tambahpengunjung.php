<?php 

session_start();



if(!isset($_SESSION["username"])){
  echo 
  '<script type="text/javascript">
      alert("Anda belum login");
      window.location = "../login/index.php";
  </script>';
}

if($_SESSION["roles"] !="Resepsionis"){
  echo 
  '<script type="text/javascript">
      alert("Anda bukan Admin");
      window.location = "../login/index.php";
  </script>';
}


require '../functions.php';


if( isset($_POST["submit"])){
  if(tambahKunjungan($_POST) > 0 ){
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
      window.location.replace('index.php');
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
      window.location.replace('index.php');
    } ,1500); 
    </script>";
  }
}


?>

<?php require '../layouts/sidebar.php'; ?>
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
              <a href="index.php" class="btn btn-sm btn-icon-split" style="background: #1757ed;">
                <span class="icon text-white">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </span>

            </a>
                <h2 class="dashboard-titlte mt-5">Tambah Data Pengunjung SMK Jakarta Pusat 1</h2>
                <p class="dashboard-subtitle">
                  Hallo <?= $_SESSION["nama_lengkap"]; ?>, Semangat ya tugasnya!
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
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Tamu</label>
                                    <input type="text" name="nama_pengunjung" 
                                    class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                        <div class="form-group">  
                          <label for="name" class="form-label"
                            >Asal Pengunjung</label>
                            <select required  name="asal" id="asal" class="form-control">
                              <option value="" disabled selected>Pilih salah satu</option>
                              <option value="Dinas Pendidikan">Dinas Pendidikan</option>
                              <option value="Suku Dinas Pendidikan">Suku Dinas Pendidikan</option>
                              <option value="Wali Murid">Wali Murid</option>
                              <option value="Instansi">Instansi</option>
                              <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-12 mb-4">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Jabatan / Wali Murid Dari /  Nama Instansi /  Lain-lain"  required/>
                        </div>
                      </div>
                      <div class="col-md-12 mb-4">
                        <div class="form-group">  
                          <label for="name" class="form-label"
                            >Sudah memiliki janji ?</label>
                            <select required  name="janji" id="janji" class="form-control">
                              <option value="" disabled selected>Pilih salah satu</option>
                              <option value="Sudah">Sudah</option>
                              <option value="Belum">Belum</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-12 mb-4">
                        <div class="form-group">
                          <label for="name" class="form-label"
                            >Bertemu dengan ?</label
                          >
                          <input type="text" class="form-control" name="bertemu_dengan" required/>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <label for="" class="form-label">Keperluan</label>
                          <textarea
                            name="keperluan"
                            class="form-control"
                            rows="5"
                            cols="10"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row p-3">
            <div class="col text-right" style="margin-left: -25px;">
              <button type="submit" name="submit" class="btn btn-success px-5">
                Tambah
              </button>
            </div>
                        </div>
                      </div>
                      </form>
                    </div>
                </div>
                </div>
              </div>
        
  

        <?php require '../layouts/footer-admin.php'; ?>