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

$resepsionis = mysqli_query($conn, "SELECT * FROM user WHERE roles='Resepsionis'");
$jumlahresepsionis = mysqli_num_rows($resepsionis);

$pengunjung = mysqli_query($conn, "SELECT * FROM kunjungan");
$jumlahpengunjung = mysqli_num_rows($pengunjung);

$pengunjungtoday = mysqli_query($conn, "SELECT * FROM kunjungan WHERE DATE(tanggal_kunjungan) = CURDATE()");
$jumlahpengunjungtoday = mysqli_num_rows($pengunjungtoday);

$datapengunjung= query("SELECT * FROM kunjungan WHERE DATE(tanggal_kunjungan) = CURDATE()");






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
                <h2 class="dashboard-titlte">Dashboard Admin</h2>
                <p class="dashboard-subtitle">
                  Hallo Admin SMK Jakarta Pusat 1, Semangat ya tugasnya!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <a href="resepsionis.php" class="text-decoration-none">
                          <div class="dashboard-card-title">
                            Jumlah Resepsionis
                          </div>
                          <div class="dashboard-card-subtitle">
                            <?= $jumlahresepsionis; ?>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                      <a href="pengunjung_today.php" class="text-decoration-none">
                          <div class="dashboard-card-title">
                            Pengunjung Hari ini
                          </div>
                          <div class="dashboard-card-subtitle">
                            <?= $jumlahpengunjungtoday; ?>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <a href="pengunjung_today.php" class="text-decoration-none">
                          <div class="dashboard-card-title">
                            Data Pengunjung
                          </div>
                          <div class="dashboard-card-subtitle">
                            <?= $jumlahpengunjung; ?>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid mt-5">
              <div class="dashboard-heading">  
                <h2 class="dashboard-titlte mb-3">Data Pengunjung Hari ini</h2>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="col-lg-12 p-3">
                    <a href="tambahpengunjung.php" class="btn" style="background:#1757ED; color: #ffffff;">
                        <i class="fas fa-plus me-2"></i>Tambah Pengunjung
                    </a>
                    <a href="cetakToday.php" target="_blank" class="btn btn-outline-secondary">
                        <i class="fas fa-print me-2"></i>Cetak Data
                    </a>
                </div>

                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            class="table table-stripped"
                            id="dataTable"
                            width="100%"
                            cellspacing="0"
                          >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Nama Pengunjung</th>
                                <th>Asal</th>
                                <th>Keterangan</th>
                                <th>Janji</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th class="text-center">Opsi</th>
                              </tr>
                            </thead>

                            <tbody class="pt-5">
                              <?php $i = 1; ?>
                              <?php foreach($datapengunjung as $row) : ?>
                              <tr class="align-items-center">
                                <td><?= $i; ?></td>
                                <td><?= date('d-m-Y'); ?></td>
                                <td><?= $row["waktu_kunjungan"]; ?></td>
                                <td><?= $row["nama_pengunjung"] ?></td>
                                <td><?= $row["asal"]; ?></td>
                                <td>
                                  <?= $row["keterangan"]; ?>
                                </td>
                                <td><?= $row["janji"]; ?></td>
                                <td><?= $row["keperluan"]; ?></td>
                                <td>
                                <?php 
                                if($row["status"] == "Waiting"){
                                    ?>
                                     <a href="checkin.php?id=<?= $row["id_kunjungan"]; ?>" class="btn btn-secondary btn-sm" onclick="return confirm('Pengunjung sudah Checkin ?')">
                                        <?= $row["status"]; ?>
                                     </a>
                                    <?php 
                                }else if($row["status"] == "Checkin"){
                                    ?>
                                        <a href="checkout.php?id=<?= $row["id_kunjungan"]; ?>"class="btn btn-success btn-sm" onclick="return confirm('Pengunjung ingin checkout ?')"><?= $row["status"]; ?></a>
                                    <?php
                                }else if($row["status"] == 'Checkout'){
                                  ?>
                                  <a class="btn btn-danger btn-sm"><?= $row["status"]; ?></a>
                                  <?php
                                } ?>
                               
                                </td>
                              
                                <td class="text-center">
                                  <a
                                    href="detail_pengunjung.php?id=<?= $row["id_kunjungan"]; ?>"
                                    class="
                                      btn btn-icon-split btn-sm
                                      mb-2
                                      text-white
                                    "
                                    style="background: #1757ed"
                                  >
                                    <span class="icon text-white-50">
                                      <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text"></span>
                                  </a>
                                  <a href="edit_pengunjung.php?id=<?= $row["id_kunjungan"]; ?>" class="
                                                    btn btn-icon-split btn-sm
                                                    mb-2
                                                    text-white
                                                  " style="background: #3b3f5a">
                                      <span class="icon text-white-50">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </span>
                                      <span class="text"></span>
                                  </a>
                                  <a href="hapus_pengunjung.php?id=<?= $row["id_kunjungan"]; ?>" class="
                                                    btn btn-danger btn-icon-split btn-sm
                                                    mb-2
                                                  " onclick="return confirm('Yakin ingin menghapus?')">
                                      <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                  </span>
                                      <span class="text"></span>
                                  </a>
                    </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>

        <?php require '../layouts/footer-admin.php'; ?>