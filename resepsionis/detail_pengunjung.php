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

if($_SESSION["roles"] !="Resepsionis"){
  echo 
  '<script type="text/javascript">
      alert("Anda bukan Resepsionis");
      window.location = "../login/index.php";
  </script>';
}

$id = $_GET["id"];


$datapengunjung = query("SELECT * FROM kunjungan WHERE id_kunjungan = $id")[0];




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
                <h2 class="dashboard-titlte mt-5">Detail Data Pengunjung SMK Jakarta Pusat 1</h2>
                <p class="dashboard-subtitle">
                  Hallo <?= $_SESSION["nama_lengkap"]; ?>, Semangat ya tugasnya!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-4">Tanggal Kunjungan</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= date("d-m-Y"); ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Nama Pengunjung</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["nama_pengunjung"] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Asal Pengunjung</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["asal"] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Keterangan</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["keterangan"] ?></div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="col-4">Bertemu dengan</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["bertemu_dengan"] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Sudah memiliki janji ?</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["janji"] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Keperluan</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $datapengunjung["keperluan"] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Status</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><button class="btn btn-danger btn-sm">
                                <?= $datapengunjung["status"] ?>
                                </button></div>
                            </div>
                            
                        </div>
            </div>
        </div>
    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php require '../layouts/footer-admin.php'; ?>