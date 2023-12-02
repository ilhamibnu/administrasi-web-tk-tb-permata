<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
  header("location: ../login.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
}


?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/permata-logo.png" />
  <title>Report - Permata Dashboard</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->

  <link id="pagestyle" href="../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="
        background-image: url('../assets/img/bg-foto-permata.jpg');
        background-position-y: 50%;
      ">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <div class="min-height-300 position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./dashboard.php">
        <img src="../assets/img/permata-logo.png" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">Permata Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">


        <li class='nav-item'>
          <a class='nav-link' href='dashboard.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-tv-2 text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Dashboard</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='tagihan.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-tag text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Tagihan</span>
          </a>
        </li>

        <li class='nav-item'>
          <a class='nav-link' href='cicilan.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-bulb-61 text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Cicilan</span>
          </a>
        </li>

        <li class='nav-item'>
          <a class='nav-link' href='layanan.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-single-02 text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Layanan</span>
          </a>
        </li>


        <li class='nav-item'>
          <a class='nav-link' href='data_siswa.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-send text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Data Siswa</span>
          </a>
        </li>


        <li class='nav-item'>
          <a class='nav-link active' href='report.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-send text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Report</span>
          </a>
        </li>

        <li class='nav-item'>
          <a class='nav-link' href='profile.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-chart-bar-32 text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Profile</span>
          </a>
        </li>

      </ul>
    </div>

  </aside>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Permata
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Permata</h6>
        </nav>
        <span class="font-weight-bolder text-white mb-0" id="date_time"></span>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center"> -->
          <!-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..." />
            </div> -->
          <!-- </div> -->
          <ul class="ms-md-auto pe-md-3 d-flex align-items-center navbar-nav justify-content-end">
            <!-- <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li> -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>

            <?php
            error_reporting(0);


            $tampilprofil = ("SELECT * FROM tb_user WHERE id = '$data_id'");
            $result   = mysqli_query($koneksi, $tampilprofil);

            while ($row = mysqli_fetch_array($result)) {

              $profilName   = $row['nama'];

            ?>

              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <span class="d-sm-inline d-none">Halo, <?php echo $profilName ?></span>
                </a>
              </li>

            <?php

            }
            ?>


            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="#" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-chevron-circle-down cursor-pointer"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">

                <li class="dropdown-item d-flex align-items-center">
                  <a href="profile.php" class="dropdown-item">
                    <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i> Profile
                  </a>

                </li>
                <li class="dropdown-item d-flex align-items-center">
                  <a href="logout.php" class="dropdown-item">
                    <i class="fa fa-sign-out cursor-pointer"></i> Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="card shadow-lg mx-4 mt-3">
      <div class="card-body">
        <div class="row gx-4">

          <form class="row gx-4" action="" method="post">


            <div class="dropdown col-auto">
              <div class="form-group">
                <select class="btn btn-sm form-select mb-1 px-5" name="jenis-kelas">
                  <?php

                  echo "<option> Pilih Kelas</option>";
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_kelas") or die(mysqli_error($koneksi));
                  while ($row = mysqli_fetch_array($query)) {
                    echo "<option value=$row[id]> $row[nama]</option>";
                  }

                  ?>
                </select>
              </div>


            </div>

            <div class="dropdown col-auto">

              <div class="form-group">
                <input class="form-control btn btn-sm bg-gradient-white mb-1 px-3" value="<?php if (isset($_POST['from_date'])) {
                                                                                            echo $_POST['from_date'];
                                                                                          }  ?>" type="date" name="from_date" />

              </div>

            </div>

            <div class="dropdown col-auto">

              <button class="btn btn-sm bg-gradient-white mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                To Date
              </button>

            </div>

            <div class="dropdown col-auto">

              <div class="form-group">
                <input class="form-control btn btn-sm bg-gradient-white mb-1 px-3" value="<?php if (isset($_POST['to_date'])) {
                                                                                            echo $_POST['to_date'];
                                                                                          }  ?>" type="date" name="to_date" />

              </div>

            </div>


            <div class="dropdown col-auto">

              <button class="btn btn-sm bg-gradient-dark mb-1 px-3" name="lihat-filter" type="submit" aria-expanded="false">
                Lihat
              </button>


            </div>

            <div class="dropdown col-auto">

              <a href="export_report.php?from_date=<?= $_POST['from_date'] ?>&to_date=<?= $_POST['to_date'] ?>&jenis-kelas=<?= $_POST['jenis-kelas'] ?>" target=”_blank” class="btn btn-sm bg-gradient-dark mb-1 px-3" aria-expanded="false"> Export</a>


            </div>

            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                  <div class="input-group">
                    <input type="text" class="form-control ms-4" name="data" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                    <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                  </div>

                </div>
              </div>
            </div>


          </form>




        </div>
        <div class="row gx-4">

          <form class="row gx-4" action="" method="post">


            <div class="dropdown col-auto">
              <div class="form-group">
                <select class="btn btn-sm form-select mb-1 px-4" name="nama-siswa">
                  <?php

                  echo "<option> Pilih Siswa</option>";
                  $query = mysqli_query($koneksi, "SELECT tb_siswa.id, tb_siswa.nama, tb_kelas.nama as kelas FROM tb_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas") or die(mysqli_error($koneksi));
                  while ($row = mysqli_fetch_array($query)) {
                    echo "<option value=$row[id]> $row[nama] - $row[kelas]</option>";
                  }

                  ?>
                </select>
              </div>


            </div>

            <div class="dropdown col-auto">

              <div class="form-group">
                <input class="form-control btn btn-sm bg-gradient-white mb-1 px-3" value="<?php if (isset($_POST['from_date2'])) {
                                                                                            echo $_POST['from_date2'];
                                                                                          }  ?>" type="date" name="from_date2" />

              </div>

            </div>

            <div class="dropdown col-auto">

              <button class="btn btn-sm bg-gradient-white mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                To Date
              </button>

            </div>

            <div class="dropdown col-auto">

              <div class="form-group">
                <input class="form-control btn btn-sm bg-gradient-white mb-1 px-3" value="<?php if (isset($_POST['to_date2'])) {
                                                                                            echo $_POST['to_date2'];
                                                                                          }  ?>" type="date" name="to_date2" />

              </div>

            </div>


            <div class="dropdown col-auto">

              <button class="btn btn-sm bg-gradient-dark mb-1 px-3" name="lihat-filter-siswa" type="submit" aria-expanded="false">
                Lihat
              </button>


            </div>

            <div class="dropdown col-auto">

              <a href="export_report_siswa.php?from_date2=<?= $_POST['from_date2'] ?>&to_date2=<?= $_POST['to_date2'] ?>&nama-siswa=<?= $_POST['nama-siswa'] ?>" target=”_blank” class="btn btn-sm bg-gradient-dark mb-1 px-3" aria-expanded="false"> Export</a>


            </div>


          </form>




        </div>
      </div>
    </div>




    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">

              <div class="d-flex align-items-center">
                <h6>Services table</h6>
                <!-- <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambah">Tambah</button> -->

              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Kelas
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        SPP
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Seragam
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Kegiatan
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Gedung
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        SPP Belum Bayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Seragam Belum Bayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Kegiatan Belum Bayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Gedung Belum Bayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Terbayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Belum Bayar
                      </th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 100000;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;



                    $data = $_POST['data'];

                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];

                    $jenis_kelas = $_POST['jenis-kelas'];

                    $from_date2 = $_POST['from_date2'];
                    $to_date2 = $_POST['to_date2'];

                    $nama_siswa = $_POST['nama-siswa'];


                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id WHERE tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_report.id LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id GROUP BY tb_report.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id GROUP BY tb_report.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['lihat-filter'])) {
                      $namadesc = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id WHERE tb_report.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_kelas.id = '$jenis_kelas' GROUP BY tb_report.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['lihat-filter-siswa'])) {
                      $namadesc = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id WHERE tb_report.tanggal BETWEEN '$from_date2' AND '$to_date2' AND tb_siswa.id = '$nama_siswa' GROUP BY tb_report.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } else {
                      $query  = ("SELECT tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, tb_gedung.biaya as gedung, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+ tb_gedung.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, (SELECT(tb_gedung.biaya)) - (SELECT(SUM(tb_cicilan_gedung.bayar))) as jmlgedungbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya+tb_gedung.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar+tb_cicilan_gedung.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_report.id_tagihan_gedung INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id AND tb_tagihan_gedung.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id GROUP BY tb_report.id LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $ReportNama = $row['nama'];
                      $ReportKelas = $row['kelas'];
                      $ReportSPP = $row['spp'];
                      $ReportSeragam = $row['seragam'];
                      $ReportKegiatan = $row['kegiatan'];
                      $ReportGedung = $row['gedung'];
                      $ReportTotal = $row['total'];
                      $ReportTanggal = $row['tanggal'];
                      $ReportJumlahSPPBelumBayar = $row['jmlsppbelumbayar'];
                      $ReportJumlahSeragamBelumBayar = $row['jmlseragambelumbayar'];
                      $ReportJumlahKegiatanBelumBayar = $row['jmlkegiatanbelumbayar'];
                      $ReportJumlahGedungBelumBayar = $row['jmlgedungbelumbayar'];
                      $ReportJumlahTerbayar = $row['jmlterbayar'];
                      $ReportJumlahBelumTerbayar = $row['ygbelumdibayar'];



                    ?>

                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportNama; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportKelas; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportSPP; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportSeragam; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportKegiatan; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportGedung; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportTotal; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportTanggal; ?></span>
                        </td>



                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahSPPBelumBayar; ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportJumlahSeragamBelumBayar; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahKegiatanBelumBayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahGedungBelumBayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $ReportJumlahTerbayar; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $ReportJumlahBelumTerbayar; ?></span>
                        </td>




                      <tr></tr>


                      </tr>




                    <?php

                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT tb_report.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as spp, tb_seragam.biaya as seragam, tb_kegiatan.biaya as kegiatan, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya) as total, tb_report.tanggal, (SELECT(tb_spp.biaya)) - (SELECT(SUM(tb_cicilan_spp.bayar))) as jmlsppbelumbayar, (SELECT(tb_seragam.biaya)) - (SELECT(SUM(tb_cicilan_seragam.bayar))) as jmlseragambelumbayar, (SELECT(tb_kegiatan.biaya)) - (SELECT(SUM(tb_cicilan_kegiatan.bayar))) as jmlkegiatanbelumbayar, SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar) as jmlterbayar, SUM(tb_spp.biaya+tb_seragam.biaya+tb_kegiatan.biaya) - SUM(tb_cicilan_spp.bayar+tb_cicilan_seragam.bayar+tb_cicilan_kegiatan.bayar) as ygbelumdibayar FROM tb_report INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_report.id_tagihan_spp INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_report.id_tagihan_seragam INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_report.id_tagihan_kegiatan INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan INNER JOIN tb_siswa ON tb_tagihan_spp.id_siswa=tb_siswa.id AND tb_siswa.id=tb_tagihan_seragam.id_siswa AND tb_tagihan_kegiatan.id_siswa=tb_siswa.id INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id GROUP BY tb_report.id");
              $hitung = $ngab->fetch_all(MYSQLI_ASSOC);
              $jmldata = $hitung[0]['id'];
              $jmlhalaman = ceil($jmldata / $batas);

              $Previous = $halaman - 1;
              $Next = $halaman + 1;

              ?>

              <div class="my-4 ms-2 me-2">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item">
                      <a class="page-link" href="data_siswa.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"data_siswa.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>

                    <li class="page-item">
                      <a class="page-link" href="data_siswa.php?halaman=<?= $Next; ?>" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>


            </div>
          </div>
        </div>
      </div>



      <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold">Permata</a>
                for a better web.
              </div>
            </div>
            <!-- <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <script type="text/javascript" src="../assets/js/datetime.js"></script>
  <script type="text/javascript">
    window.onload = date_time('date_time');
  </script>
</body>

</html>