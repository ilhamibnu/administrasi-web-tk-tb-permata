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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/permata-logo.png" />
  <title>Tagihan - Permata Dashboard</title>
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
          <a class='nav-link active' href='tagihan.php'>
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
          <a class='nav-link' href='report.php'>
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
              Tagihan
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tagihan</h6>
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

          <div class="dropdown col-auto">
            <form class="" action="" method="post">
              <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" name="namaasc" type="submit"> Nama Asc (A-Z)</button>
                <button class="dropdown-item" name="namadesc" type="submit"> Nama Desc (Z-A)</button>

              </ul>
            </form>

          </div>

          <!-- <div class="dropdown col-auto">
            <form class="" action="" method="post">
              <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Status
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" name="menunggu" type="submit">Belum Lunas</button>
                <button class="dropdown-item" name="selesai" type="submit">Lunas</button>

              </ul>
            </form>

          </div> -->


          <form class="row gx-4" action="" method="post">
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

              <button class="btn btn-sm bg-gradient-dark mb-1 px-3" type="submit" aria-expanded="false">
                Filter
              </button>


            </div>

            <!-- <div class="dropdown col-auto">

              <a href="export_transaksi.php" target=”_blank” class="btn btn-sm bg-gradient-dark mb-1 px-3" aria-expanded="false"> Export</a>

            </div> -->




            <div class="col-lg-4 col-md-6 me-sm-10 mx-auto mt-0">
              <div class="nav-wrapper position-relative end-0">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <!-- <form class="input-group" action="" method="post"> -->
                  <div class="input-group">

                    <input type="text" class="form-control ms-4" name="data" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                    <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>

                  </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>



    <!-- Table SPP -->


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table SPP</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-tagihan-spp">Tambah</button>
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
                        Status
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        SPP
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Terbayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
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


                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT tb_tagihan_spp.id, tb_siswa.id as idsiswa, tb_spp.id as idspp, tb_spp.nama as namaspp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya as total, tb_tagihan_spp.tanggal FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id where tb_tagihan_spp.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_tagihan_spp.id, tb_siswa.id as idsiswa, tb_spp.id as idspp, tb_spp.nama as namaspp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya as total, tb_tagihan_spp.tanggal FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_tagihan_spp.id, tb_siswa.id as idsiswa, tb_spp.id as idspp, tb_spp.nama as namaspp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya as total, tb_tagihan_spp.tanggal FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_tagihan_spp.id, tb_siswa.id as idsiswa, tb_spp.id as idspp, tb_spp.nama as namaspp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya as total, tb_tagihan_spp.tanggal FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_tagihan_spp.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } elseif (isset($_POST['menunggu'])) {
                      $pending = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Belum Lumas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $pending);
                    } elseif (isset($_POST['selesai'])) {
                      $delivery = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Lunas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $delivery);
                    } else {
                      $query  = ("SELECT tb_tagihan_spp.id, tb_siswa.id as idsiswa, tb_spp.id as idspp, tb_spp.nama as namaspp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya as total, tb_tagihan_spp.tanggal FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $TagihanSPPId = $row['id'];
                      $TagihanSPPNama = $row['nama'];
                      $TagihanSPPKelas = $row['kelas'];
                      $TagihanSPP = $row['SPP'];
                      $TagihanSPPSudahBayar = $row['jml_terbayar'];
                      $TagihanSPPTotal = $row['total'];
                      $TagihanSPPTanggal = $row['tanggal'];

                      $SPPidsiswa = $row['idsiswa'];
                      $SPPid = $row['idspp'];
                      $SPPnama = $row['namaspp'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSPPNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSPPKelas; ?></span>
                        </td>


                        <td class="align-middle text-center text-sm">

                          <?php

                          if ($TagihanSPPSudahBayar < $TagihanSPPTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-warning px-3'>Belum Lunas</span>
                          ";
                          } elseif ($TagihanSPPSudahBayar = $TagihanSPPTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-success px-4'>Lunas</span>
                            ";
                          }
                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanSPP; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <?php

                          if ($TagihanSPPSudahBayar == 0) {

                            echo "

                            <span class='text-secondary text-xs font-weight-bold'>0</span>
                            
                            ";
                          } else {
                            echo "
                            <span class='text-secondary text-xs font-weight-bold'>Rp. $TagihanSPPSudahBayar</span>
                            ";
                          }


                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanSPPTotal; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSPPTanggal; ?></span>
                        </td>



                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#edit-tagihan-spp<?php echo $row['id']; ?>">Edit</button>
                          <!-- <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#delete-tagihan-spp<?php echo $row['id']; ?>">Delete</button> -->
                        </td>



                      <tr></tr>
                      </tr>

                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="edit-tagihan-spp<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan SPP</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="tagihan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="bahan">Nama</label>
                                  <select class="form-select" name="edit-nama-spp">

                                    <?php

                                    echo "<option value = '$row[idsiswa]'>$TagihanSPPNama</option>";
                                    $query = mysqli_query($koneksi, "select  id, nama from tb_siswa") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama]</option>";
                                    }

                                    ?>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label for="bahan">SPP</label>
                                  <select class="form-select" name="edit-jenis-spp">
                                    <?php

                                    echo "<option value = '$SPPid'>$SPPnama - (Rp. $TagihanSPP)</option></option>";
                                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_spp") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama] - (Rp. $row[biaya])</option>";
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-tagihan-spp" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT tb_tagihan_spp.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, tb_spp.biaya total FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id GROUP BY tb_tagihan_spp.id ORDER BY tb_siswa.nama asc");
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
                      <a class="page-link" href="tagihan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"tagihan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="tagihan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table SPP -->


      <!-- Table Seragam -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Seragam</h6>
                <!-- <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-tagihan-seragam">Tambah</button> -->
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
                        Status
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Seragam
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Terbayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;

                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];

                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT tb_tagihan_seragam.id, tb_siswa.id as idsiswa, tb_seragam.id as idseragam, tb_seragam.nama as namaseragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total, tb_tagihan_seragam.tanggal FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id where tb_tagihan_seragam.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_tagihan_seragam.id, tb_siswa.id as idsiswa, tb_seragam.id as idseragam, tb_seragam.nama as namaseragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total, tb_tagihan_seragam.tanggal FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_tagihan_seragam.id, tb_siswa.id as idsiswa, tb_seragam.id as idseragam, tb_seragam.nama as namaseragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total, tb_tagihan_seragam.tanggal FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_tagihan_seragam.id, tb_siswa.id as idsiswa, tb_seragam.id as idseragam, tb_seragam.nama as namaseragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total, tb_tagihan_seragam.tanggal FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_tagihan_seragam.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } elseif (isset($_POST['menunggu'])) {
                      $pending = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Belum Lumas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $pending);
                    } elseif (isset($_POST['selesai'])) {
                      $delivery = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Lunas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $delivery);
                    } else {
                      $query  = ("SELECT tb_tagihan_seragam.id, tb_siswa.id as idsiswa, tb_seragam.id as idseragam, tb_seragam.nama as namaseragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total, tb_tagihan_seragam.tanggal FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $TagihanSeragamId = $row['id'];
                      $TagihanSeragamNama = $row['nama'];
                      $TagihanSeragamKelas = $row['kelas'];
                      $TagihanSeragam = $row['Seragam'];
                      $TagihanSeragamSudahBayar = $row['jml_terbayar'];
                      $TagihanSeragamTotal = $row['total'];
                      $TagihanSeragamTanggal = $row['tanggal'];

                      $Seragamidsiswa = $row['idsiswa'];
                      $Seragamid = $row['idseragam'];
                      $Seragamnama = $row['namaseragam'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSeragamNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSeragamKelas; ?></span>
                        </td>


                        <td class="align-middle text-center text-sm">

                          <?php

                          if ($TagihanSeragamSudahBayar < $TagihanSeragamTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-warning px-3'>Belum Lunas</span>
                          ";
                          } elseif ($TagihanSeragamSudahBayar = $TagihanSeragamTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-success px-4'>Lunas</span>
                            ";
                          }
                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanSeragam; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <?php

                          if ($TagihanSeragamSudahBayar == 0) {

                            echo "

                            <span class='text-secondary text-xs font-weight-bold'>0</span>
                            
                            ";
                          } else {
                            echo "
                            <span class='text-secondary text-xs font-weight-bold'>Rp. $TagihanSeragamSudahBayar</span>
                            ";
                          }


                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanSeragamTotal; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanSeragamTanggal; ?></span>
                        </td>



                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#edit-tagihan-seragam<?php echo $row['id']; ?>">Edit</button>
                          <!-- <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#delete-tagihan-seragam<?php echo $row['id']; ?>">Delete</button> -->
                        </td>



                      <tr></tr>
                      </tr>




                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="edit-tagihan-seragam<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan Seragam</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="tagihan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="bahan">Nama</label>
                                  <select class="form-select" name="edit-nama-seragam">

                                    <?php

                                    echo "<option value = '$row[idsiswa]'>$TagihanSeragamNama</option>";
                                    $query = mysqli_query($koneksi, "select  id, nama from tb_siswa") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama]</option>";
                                    }

                                    ?>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label for="bahan">Seragam</label>
                                  <select class="form-select" name="edit-jenis-seragam">
                                    <?php

                                    echo "<option value = '$Seragamid'>$Seragamnama - (Rp.$TagihanSeragam)</option></option>";
                                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_seragam") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama] - (Rp. $row[biaya])</option>";
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-tagihan-seragam" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT tb_tagihan_seragam.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, tb_seragam.biaya total FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id GROUP BY tb_tagihan_seragam.id ORDER BY tb_siswa.nama asc");
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
                      <a class="page-link" href="tagihan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"tagihan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="tagihan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Seragam -->




      <!-- Table Kegiatan -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Kegiatan</h6>
                <!-- <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-tagihan-kegiatan">Tambah</button> -->
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
                        Status
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Kegiatan
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Terbayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;

                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];

                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id where tb_tagihan_kegiatan.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_tagihan_kegiatan.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } elseif (isset($_POST['menunggu'])) {
                      $pending = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Belum Lumas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $pending);
                    } elseif (isset($_POST['selesai'])) {
                      $delivery = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Lunas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $delivery);
                    } else {
                      $query  = ("SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $TagihanKegiatanId = $row['id'];
                      $TagihanKegiatanNama = $row['nama'];
                      $TagihanKegiatanKelas = $row['kelas'];
                      $TagihanKegiatan = $row['Kegiatan'];
                      $TagihanKegiatanSudahBayar = $row['jml_terbayar'];
                      $TagihanKegiatanTotal = $row['total'];
                      $TagihanKegiatanTanggal = $row['tanggal'];


                      $Kegiatanid = $row['idkegiatan'];
                      $Kegiatannama = $row['namakegiatan'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanKegiatanNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanKegiatanKelas; ?></span>
                        </td>


                        <td class="align-middle text-center text-sm">

                          <?php

                          if ($TagihanKegiatanSudahBayar < $TagihanKegiatanTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-warning px-3'>Belum Lunas</span>
                          ";
                          } elseif ($TagihanKegiatanSudahBayar = $TagihanKegiatanTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-success px-4'>Lunas</span>
                            ";
                          }
                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanKegiatan; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <?php

                          if ($TagihanKegiatanSudahBayar == 0) {

                            echo "

                            <span class='text-secondary text-xs font-weight-bold'>0</span>
                            
                            ";
                          } else {
                            echo "
                            <span class='text-secondary text-xs font-weight-bold'>Rp. $TagihanKegiatanSudahBayar</span>
                            ";
                          }


                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanKegiatanTotal; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanKegiatanTanggal; ?></span>
                        </td>



                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#edit-tagihan-kegiatan<?php echo $row['id']; ?>">Edit</button>
                          <!-- <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-delete-tagihan<?php echo $row['id']; ?>">Delete</button> -->
                        </td>



                      <tr></tr>
                      </tr>





                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="edit-tagihan-kegiatan<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan Kegiatan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="tagihan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="bahan">Nama</label>
                                  <select class="form-select" name="edit-nama-kegiatan">

                                    <?php

                                    echo "<option value = '$row[idsiswa]'>$TagihanKegiatanNama</option>";
                                    $query = mysqli_query($koneksi, "select  id, nama from tb_siswa") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama]</option>";
                                    }

                                    ?>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label for="bahan">Seragam</label>
                                  <select class="form-select" name="edit-jenis-kegiatan">
                                    <?php

                                    echo "<option value = '$Kegiatanid'>$Kegiatannama - (Rp.$TagihanKegiatan)</option></option>";
                                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_kegiatan") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama] - (Rp. $row[biaya])</option>";
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-tagihan-kegiatan" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT tb_tagihan_kegiatan.id, tb_kegiatan.id as idkegiatan, tb_siswa.id as idsiswa, tb_kegiatan.nama as namakegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, tb_kegiatan.biaya total, tb_tagihan_kegiatan.tanggal FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id GROUP BY tb_tagihan_kegiatan.id ORDER BY tb_siswa.nama asc");
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
                      <a class="page-link" href="tagihan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"tagihan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="tagihan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Kegiatan -->

      <!-- Table Gedung -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Gedung</h6>

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
                        Status
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Gedung
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Terbayar
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;


                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];

                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_tagihan_gedung.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_tagihan_gedung.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } elseif (isset($_POST['menunggu'])) {
                      $pending = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Belum Lumas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $pending);
                    } elseif (isset($_POST['selesai'])) {
                      $delivery = ("SELECT tb_tagihan.id, tb_spp.nama as namaspp, tb_seragam.nama as namaseragam, tb_siswa.id as siswaid, tb_spp.id as sppid, tb_seragam.id as seragamid, tb_siswa.nama, tb_siswa.kelas, tb_spp.biaya AS SPP, tb_seragam.biaya AS Seragam, SUM(tb_cicilan.bayar) as jml_sudah_bayar, (tb_spp.biaya + tb_seragam.biaya) AS total, tb_tagihan.tanggal FROM tb_tagihan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan.id_siswa tb_spp ON tb_spp.id=tb_tagihan.id_spp INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan.id_seragam LEFT JOIN tb_cicilan ON tb_siswa.id=tb_cicilan.id_siswa WHERE tb_tagihan.status_tagihan = 'Lunas' ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $delivery);
                    } else {
                      $query  = ("SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $TagihanGedungId = $row['id'];
                      $TagihanGedungNama = $row['nama'];
                      $TagihanGedungKelas = $row['kelas'];
                      $TagihanGedung = $row['Gedung'];
                      $TagihanGedungSudahBayar = $row['jml_terbayar'];
                      $TagihanGedungTotal = $row['total'];
                      $TagihanGedungTanggal = $row['tanggal'];


                      $Gedungid = $row['idgedung'];
                      $Gedungnama = $row['namagedung'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanGedungNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanGedungKelas; ?></span>
                        </td>


                        <td class="align-middle text-center text-sm">

                          <?php

                          if ($TagihanGedungSudahBayar < $TagihanGedungTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-warning px-3'>Belum Lunas</span>
                          ";
                          } elseif ($TagihanGedungSudahBayar = $TagihanGedungTotal) {
                            echo "
                          <span class='badge badge-sm bg-gradient-success px-4'>Lunas</span>
                            ";
                          }
                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanGedung; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <?php

                          if ($TagihanGedungSudahBayar == 0) {

                            echo "

                            <span class='text-secondary text-xs font-weight-bold'>0</span>
                            
                            ";
                          } else {
                            echo "
                            <span class='text-secondary text-xs font-weight-bold'>Rp. $TagihanGedungSudahBayar</span>
                            ";
                          }


                          ?>

                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $TagihanGedungTotal; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $TagihanGedungTanggal; ?></span>
                        </td>



                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#edit-tagihan-gedung<?php echo $row['id']; ?>">Edit</button>
                          <!-- <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-delete-tagihan<?php echo $row['id']; ?>">Delete</button> -->
                        </td>



                      <tr></tr>
                      </tr>





                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="edit-tagihan-gedung<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan Gedung</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="tagihan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="bahan">Nama</label>
                                  <select class="form-select" name="edit-nama-gedung">

                                    <?php

                                    echo "<option value = '$row[idsiswa]'>$TagihanGedungNama</option>";
                                    $query = mysqli_query($koneksi, "select  id, nama from tb_siswa") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama]</option>";
                                    }

                                    ?>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label for="bahan">Seragam</label>
                                  <select class="form-select" name="edit-jenis-gedung">
                                    <?php

                                    echo "<option value = '$Gedungid'>$Gedungnama - (Rp.$TagihanGedung)</option></option>";
                                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_gedung") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($query)) {
                                      echo "<option value=$row[id]> $row[nama] - (Rp. $row[biaya])</option>";
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-tagihan-gedung" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT tb_tagihan_gedung.id, tb_gedung.id as idgedung, tb_siswa.id as idsiswa, tb_gedung.nama as namagedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, tb_gedung.biaya total, tb_tagihan_gedung.tanggal FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id GROUP BY tb_tagihan_gedung.id ORDER BY tb_siswa.nama asc");
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
                      <a class="page-link" href="tagihan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"tagihan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="tagihan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Gedung  -->






      <!-- Modal Tambah SPP -->
      <div class="modal fade" id="tambah-tagihan-spp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Tagihan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="tagihan.php" method="post">

                <div class="form-group">
                  <label for="bahan">Nama</label>
                  <select class="form-select" name="nama-siswa-spp" required>

                    <?php

                    echo "<option id> Pilih Nama</option>";
                    $query = mysqli_query($koneksi, "SELECT tb_siswa.id, tb_siswa.nama, tb_kelas.nama as kelas FROM tb_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id]> $row[nama] - $row[kelas]</option>";
                    }

                    ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="bahan">SPP</label>
                  <select class="form-select" name="jenis-spp" required>
                    <?php

                    echo "<option> Pilih SPP</option>";
                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_spp") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id]> $row[nama] (Rp. $row[biaya])</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="bahan">Seragam</label>
                  <select class="form-select" name="jenis-seragam" required>
                    <?php

                    echo "<option> Pilih Seragam</option>";
                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_seragam") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id]> $row[nama] (Rp. $row[biaya])</option>";
                    }

                    ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="bahan">Kegiatan</label>
                  <select class="form-select" name="jenis-kegiatan" required>
                    <?php

                    echo "<option> Pilih Kegiatan</option>";
                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_kegiatan") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id]> $row[nama] (Rp. $row[biaya])</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="bahan">Gedung</label>
                  <select class="form-select" name="jenis-gedung" required>
                    <?php

                    echo "<option> Pilih Gedung</option>";
                    $query = mysqli_query($koneksi, "select  id, nama, format(biaya,0) as biaya from tb_gedung") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id]> $row[nama] (Rp. $row[biaya])</option>";
                    }

                    ?>
                  </select>
                </div>


                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-tagihan-spp" class="btn btn-success btn-sm ms-auto">Add</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Tambah SPP -->












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


  <script type="text/javascript" src="../assets/js/datetime.js"></script>
  <script type="text/javascript">
    window.onload = date_time('date_time');
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</body>

</html>

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-tagihan-spp'])) {
  // $orderNama = $_POST['nama'];
  $TagihanNamaSPP = $_POST['nama-siswa-spp'];
  $TagihanJenisSPP = $_POST['jenis-spp'];

  $TagihanJenisSeragam = $_POST['jenis-seragam'];

  $TagihanJenisKegiatan = $_POST['jenis-kegiatan'];

  $TagihanJenisGedung = $_POST['jenis-gedung'];

  // insert to tagihan spp
  $queryspp    = "INSERT INTO tb_tagihan_spp SET id = '', id_siswa = '$TagihanNamaSPP', id_spp = '$TagihanJenisSPP', tanggal = now()";
  $resultspp   = mysqli_query($koneksi, $queryspp);

  // insert to tagihan seragam
  $queryseragam    = "INSERT INTO tb_tagihan_seragam SET id = '', id_siswa = '$TagihanNamaSPP', id_seragam = '$TagihanJenisSeragam', tanggal = now()";
  $resultseragam   = mysqli_query($koneksi, $queryseragam);

  // insert to tagihan kegiatan
  $querykegiatan    = "INSERT INTO tb_tagihan_kegiatan SET id = '', id_siswa = '$TagihanNamaSPP', id_kegiatan = '$TagihanJenisKegiatan', tanggal = now()";
  $resultkegiatan   = mysqli_query($koneksi, $querykegiatan);

  // insert to tagihan gedung
  $querygedung    = "INSERT INTO tb_tagihan_gedung SET id = '', id_siswa = '$TagihanNamaSPP', id_gedung = '$TagihanJenisGedung', tanggal = now()";
  $resultgedung   = mysqli_query($koneksi, $querygedung);


  // tampil id tagihan spp
  $sql_idtagihanspp = "SELECT * FROM tb_tagihan_spp order by id desc";
  $query_idtagihanspp = mysqli_query($koneksi, $sql_idtagihanspp);
  $data_idtagihanspp = mysqli_fetch_array($query_idtagihanspp, MYSQLI_BOTH);


  // tampil id tagihan seragam
  $sql_idtagihanseragam = "SELECT * FROM tb_tagihan_seragam order by id desc";
  $query_idtagihanseragam = mysqli_query($koneksi, $sql_idtagihanseragam);
  $data_idtagihanseragam = mysqli_fetch_array($query_idtagihanseragam, MYSQLI_BOTH);


  // tampil id tagihan kegiatan
  $sql_idtagihankegiatan = "SELECT * FROM tb_tagihan_kegiatan order by id desc";
  $query_idtagihankegiatan = mysqli_query($koneksi, $sql_idtagihankegiatan);
  $data_idtagihankegiatan = mysqli_fetch_array($query_idtagihankegiatan, MYSQLI_BOTH);

  // tampil id tagihan gedung
  $sql_idtagihangedung = "SELECT * FROM tb_tagihan_gedung order by id desc";
  $query_idtagihangedung = mysqli_query($koneksi, $sql_idtagihangedung);
  $data_idtagihangedung = mysqli_fetch_array($query_idtagihangedung, MYSQLI_BOTH);


  // insert to report

  $ReportIdTagihanSPP = $data_idtagihanspp['id'];
  $ReportIdTagihanSeragam = $data_idtagihanseragam['id'];
  $ReportIdTagihanKegiatan = $data_idtagihankegiatan['id'];
  $ReportIdTagihanGedung = $data_idtagihangedung['id'];

  $queryreport    = "INSERT INTO tb_report SET id = '', id_tagihan_spp = '$ReportIdTagihanSPP', id_tagihan_seragam = '$ReportIdTagihanSeragam', id_tagihan_kegiatan = '$ReportIdTagihanKegiatan', id_tagihan_gedung = '$ReportIdTagihanGedung', tanggal = now()";
  $resultreport   = mysqli_query($koneksi, $queryreport);


  if ($resultspp && $resultseragam && $resultkegiatan && $resultgedung  && $resultreport) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'tagihan.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'tagihan.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$TagihanNamaSPPEdit = $_POST['edit-nama-spp'];
$TagihanJenisSPPEdit = $_POST['edit-jenis-spp'];


if (isset($_POST['edit-tagihan-spp'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_tagihan_spp` SET id_siswa='$TagihanNamaSPPEdit', id_spp = '$TagihanJenisSPPEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'tagihan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'tagihan.php';}
          })</script>";
  }
}

?>




<!-- ============================================================================================ -->




<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$TagihanNamaSeragamEdit = $_POST['edit-nama-seragam'];
$TagihanJenisSeragamEdit = $_POST['edit-jenis-seragam'];


if (isset($_POST['edit-tagihan-seragam'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_tagihan_seragam` SET id_siswa='$TagihanNamaSeragamEdit', id_seragam = '$TagihanJenisSeragamEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'tagihan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'tagihan.php';}
          })</script>";
  }
}

?>




<!-- ============================================================================================ -->




<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$TagihanNamaKegiatanEdit = $_POST['edit-nama-kegiatan'];
$TagihanJenisKegiatanEdit = $_POST['edit-jenis-kegiatan'];


if (isset($_POST['edit-tagihan-kegiatan'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_tagihan_kegiatan` SET id_siswa='$TagihanNamaKegiatanEdit', id_kegiatan = '$TagihanJenisKegiatanEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'tagihan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'tagihan.php';}
          })</script>";
  }
}

?>

<!-- ============================================================================================ -->

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$TagihanNamaKegiatanEdit = $_POST['edit-nama-kegiatan'];
$TagihanJenisKegiatanEdit = $_POST['edit-jenis-kegiatan'];


if (isset($_POST['edit-tagihan-kegiatan'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_tagihan_kegiatan` SET id_siswa='$TagihanNamaKegiatanEdit', id_kegiatan = '$TagihanJenisKegiatanEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'tagihan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'tagihan.php';}
          })</script>";
  }
}

?>

<!-- ============================================================================================ -->

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$TagihanNamaGedungEdit = $_POST['edit-nama-gedung'];
$TagihanJenisGedungEdit = $_POST['edit-jenis-gedung'];


if (isset($_POST['edit-tagihan-gedung'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_tagihan_gedung` SET id_siswa='$TagihanNamaGedungEdit', id_gedung = '$TagihanJenisGedungEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'tagihan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'tagihan.php';}
          })</script>";
  }
}

?>