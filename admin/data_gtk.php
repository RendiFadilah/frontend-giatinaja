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




$jumlahDataPerHalaman = 20;
$jumlahData = count(query("SELECT * FROM gtk"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$gtk = query("SELECT * FROM gtk LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST["cari"])) {
  $gtk = cariGtk($_POST["keyword"]);
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
                  
                <h2 class="dashboard-titlte">Data Guru dan Tenaga Kependidikan SMK Jakarta Pusat 1</h2>
                <p class="dashboard-subtitle">
                  Hallo Admin SMK Jakarta Pusat 1, Semangat ya tugasnya!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="col-lg-12 p-3">
                        <div class="d-flex align-items-center">
                          <div class="col-lg-8 p-3">
                            <a href="tambahgtk.php" class="btn me-2 text-decoration-none" style="background:#1757ED; color: #ffffff;">
                              <i class="fas fa-plus me-2"></i>Tambah GTK
                            </a>
                          </div>
                          <div class="col-lg-4 p-3">
                            <form action="" method="POST">
                              <div class="d-flex align-items-center">
                                <input type="text" name="keyword" class="form-control me-2" placeholder="Masukkan keyword pencarian . . ." autocomplete="on">
                                <button type="submit" name="cari" class="btn btn-primary btn-sm">Cari</button>
                              </div>
                            </form>
                          </div>
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
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                           
                                <th class="text-center">Aksi</th>
                              </tr>
                            </thead>

                            <tbody class="pt-5">
                              <?php $i = 1; ?>
                              <?php foreach($gtk as $row) : ?>
                              <tr class="align-items-center">
                                <td><?= $i; ?></td>

                                <td><?= $row["namalengkap"] ?></td>
                                <td><?= $row["job"]; ?></td>
                            
                                <td class="text-center">
                                <a href="https://web.whatsapp.com/send?phone=<?= $row['nomor_whatsapp']; ?>&text=Assalamu'alaikum%20warahmatullahi%20wabarakatuh.%20Hallo bapak/ibu,%20kami%20dari%20Resepsionis%20SMK %20Jakarta%20Pusat%201.%20ada%20yang%20ingin%20bertemu,%20mohon%20maaf%20posisi%20Bapak/Ibu%20ada%20dimana,%20ya?" target="_blank" class="
                                                    btn
                                                    mb-2
                                                    text-white
                                                  " style="background: #25D366; border-radius: 20px;">
                                      <span class="icon text-white">
                                                    <i class="fab fa-whatsapp"> Hubungi</i>
                                                  </span>
                                      <span class="text"></span>
                                  </a>
                                  <a hre

                                
                                  <a href="edit_gtk.php?id=<?= $row['id_gtk']; ?>" class="
                                                    btn btn-icon-split btn-sm
                                                    mb-2
                                                    text-white
                                                  " style="background: #3b3f5a">
                                      <span class="icon text-white-50">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </span>
                                      <span class="text"></span>
                                  </a>
                                  <a href="hapus_gtk.php?id=<?= $row['id_gtk']; ?>" class="
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