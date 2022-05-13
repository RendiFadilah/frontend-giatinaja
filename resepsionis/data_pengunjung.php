


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


$jumlahDataPerHalaman = 15;
$jumlahData = count(query("SELECT * FROM kunjungan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$datapengunjung = query("SELECT * FROM kunjungan WHERE status='Checkout' LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST["cari"])) {
  $datapengunjung = cariPengunjung($_POST["keyword"]);
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
                <h2 class="dashboard-titlte">Data Pengunjung SMK Jakarta Pusat 1</h2>
                <p class="dashboard-subtitle">
                  Hallo <?= $_SESSION["nama_lengkap"]; ?>, Semangat ya tugasnya!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                      <div class="d-flex align-items-center">

                        <div class="col-lg-6 p-3">
                          <a href="cetak.php" target="_blank" class="btn" style="background:#1757ED; color: #ffffff;">
                            <i class="fas fa-print me-2"></i>Cetak Data
                          </a>
                        </div>
                        <div class="col-lg-6 p-3">
                          <form action="" method="POST">
                            <div class="d-flex align-items-center">
                              <input type="text" name="keyword" class="form-control me-2" placeholder="Masukkan keyword pencarian . . ." autocomplete="on">
                              <button type="submit" name="cari" class="btn btn-primary btn-sm">Cari</button>
                            </div>
                          </form>
                        </div>
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
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th class="text-center">Opsi</th>
                              </tr>
                            </thead>

                            <tbody class="pt-5">
                              <?php $i = $awalData + 1; ?>
                              <?php foreach($datapengunjung as $row) : ?>
                              <tr class="align-items-center">
                                <td><?= $i; ?></td>
                                <td><?= $row["tanggal_kunjungan"]; ?></td>
                                <td><?= $row["waktu_kunjungan"]; ?></td>
                                <td><?= $row["nama_pengunjung"] ?></td>
                                <td><?= $row["asal"]; ?></td>
                                <td>
                                  <?= $row["keterangan"]; ?>
                                </td>
                                <td><?= $row["keperluan"]; ?></td>
                                <td>
                                  <button class="btn btn-danger btn-sm">
                                    <?= $row["status"]; ?>
                                  </button>  
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
                                    <a 
                                    href="hapus_pengunjung.php?id=<?= $row["id_kunjungan"]; ?>" 
                                    class="btn btn-danger btn-icon-split btn-sm mb-2" onclick="return confirm('Yakin ingin menghapus?')">
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
                      <div class="col-lg  ">
                            <nav aria-label="Halaman">
                                <ul class="pagination pagination-sm justify-content-center">

                                    <?php if($halamanAktif > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
                                    </li>
                                    <?php endif; ?>

                                    <?php for( $i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                    <?php if($i == $halamanAktif) : ?>
                                    <li class="page-item active"> <a class="page-link"
                                            href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                        <?php else: ?>
                                    <li class="page-item"> <a class="page-link"
                                            href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                        <?php endif; ?>
                                    </li>
                                    <?php endfor; ?>

                                    <?php if($halamanAktif < $jumlahHalaman ) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </nav>
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