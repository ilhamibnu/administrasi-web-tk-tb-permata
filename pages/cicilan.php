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
  <title>Cicilan - Permata Dashboard</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

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
          <a class='nav-link active' href='cicilan.php'>
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
              Cicilan
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Cicilan</h6>
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

            <div class="col-lg-4 col-md-6 me-sm-10 mx-auto mt-0">
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
      </div>
    </div>






    <div class="container-fluid py-4">

      <!-- Table Cicilan SPP -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Cicilan SPP</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-data-tagihan-spp">Tambah</button>
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
                        Jumlah Sudah Dibayar
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Cicilan
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
                      $caringab = ("SELECT tb_cicilan_spp.id, tb_tagihan_spp.id as id_tagihan_spp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, (SELECT(tb_spp.biaya) - SUM(tb_cicilan_spp.bayar)) as total, tb_tagihan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp WHERE tb_tagihan_spp.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_cicilan_spp.id_tagihan_spp ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_cicilan_spp.id, tb_tagihan_spp.id as id_tagihan_spp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, (SELECT(tb_spp.biaya) - SUM(tb_cicilan_spp.bayar)) as total, tb_tagihan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_spp.id_tagihan_spp ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_cicilan_spp.id, tb_tagihan_spp.id as id_tagihan_spp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, (SELECT(tb_spp.biaya) - SUM(tb_cicilan_spp.bayar)) as total, tb_tagihan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_spp.id_tagihan_spp ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_cicilan_spp.id, tb_tagihan_spp.id as id_tagihan_spp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, (SELECT(tb_spp.biaya) - SUM(tb_cicilan_spp.bayar)) as total, tb_tagihan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp WHERE tb_tagihan_spp.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_cicilan_spp.id_tagihan_spp ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } else {
                      $query  = ("SELECT tb_cicilan_spp.id, tb_tagihan_spp.id as id_tagihan_spp, tb_siswa.nama, tb_kelas.nama as kelas, tb_spp.biaya as SPP, SUM(tb_cicilan_spp.bayar) as jml_terbayar, (SELECT(tb_spp.biaya) - SUM(tb_cicilan_spp.bayar)) as total, tb_tagihan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp WHERE MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_spp.id_tagihan_spp ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;
                    while ($row = mysqli_fetch_array($result)) {

                      $CicilanSPPNama = $row['nama'];
                      $CicilanSPPKelas = $row['kelas'];
                      $CicilanSPP = $row['SPP'];
                      $CicilanSPPTerbayar = $row['jml_terbayar'];
                      $CicilanSPPTotal = $row['total'];
                      $CicilanSPPTanggal = $row['tanggal'];


                      $CicilanSPPIdTagihan = $row['id_tagihan_spp']




                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSPPNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSPPKelas; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $CicilanSPP; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanSPPTerbayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <button class="btn btn-success btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#detail-cicilan-spp<?= $row['id_tagihan_spp'] ?>">Detail</button>
                        </td>

                        <td class="align-middle text-center">

                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanSPPTotal; ?></span>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSPPTanggal; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#bayar-cicilan-spp<?php echo $row['id']; ?>'>Bayar</button>

                        </td>

                      <tr></tr>
                      </tr>


                      <!-- Modal Bayar -->
                      <div class="modal fade" id="bayar-cicilan-spp<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Bayar Cicilan SPP</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="cicilan.php?id_tagihan_spp=<?= $row['id_tagihan_spp']; ?>&total=<?= $row['total']; ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanSPPNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Kelas</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanSPPKelas ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Belum Dibayar</label>
                                  <input disabled class="form-control" name="" type="text" value="Rp. <?= $CicilanSPPTotal ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                                  <input class="form-control" name="jmlbayar-cicilan-spp" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="tambah-cicilan-spp" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal Bayar -->



                      <!-- Modal Detail Cicilan -->

                      <div class="modal fade bd-example-modal-xl" id="detail-cicilan-spp<?= $row['id_tagihan_spp'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Cicilan SPP</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No</label>

                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Bayar</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Action</label>

                                  </div>
                                </div>

                              </div>
                              <?php


                              $IdTagihanSPP = $row['id_tagihan_spp'];
                              $queryreport  = "SELECT tb_cicilan_spp.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_cicilan_spp.bayar as jml_bayar, tb_cicilan_spp.tanggal FROM tb_cicilan_spp INNER JOIN tb_tagihan_spp ON tb_tagihan_spp.id=tb_cicilan_spp.id_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas WHERE tb_cicilan_spp.id_tagihan_spp = '$IdTagihanSPP' ORDER BY tb_cicilan_spp.id asc";
                              $resultanjay = mysqli_query($koneksi, $queryreport);


                              $nomer    = 1;

                              while ($data = mysqli_fetch_array($resultanjay)) {

                                $CicilanSPPDetailNama = $data['nama'];
                                $CicilanSPPDetailKelas = $data['kelas'];
                                $CicilanSPPDetailCicilan = $data['jml_bayar'];
                                $CicilanSPPDetailTanggal = $data['tanggal'];




                              ?>
                                <div class="row centered">

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $nomer++; ?></span>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSPPDetailNama; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $CicilanSPPDetailKelas; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;&nbsp;&nbsp;Rp. <?php echo $CicilanSPPDetailCicilan; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSPPDetailTanggal; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">

                                    <form class="yyyyy" action="cicilan.php?id=<?= $data['id'] ?>" method="post">
                                      <div class="form-group">
                                        <button class="btn btn-danger btn-sm px-3 py-1 me-1 mt-3" name='delete-cicilan-spp' type='submit'>Delete</button>
                                      </div>
                                    </form>

                                  </div>


                                </div>

                              <?php

                              }


                              ?>

                            </div>
                            <div class="modal-footer">
                              <div class="align-middle text-center">
                                <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                              </div>
                              <!-- <button type="button" class="btn bg-gradient-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Cicilan -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * from tb_cicilan_spp");
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
                      <a class="page-link" href="cicilan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"cicilan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="cicilan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Cicilan SPP -->

      <!-- Table Cicilan Seragam -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Cicilan Seragam</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-data-tagihan-seragam">Tambah</button>
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
                        Seragam
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Sudah Dibayar
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Cicilan
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
                      $caringab = ("SELECT tb_cicilan_seragam.id, tb_tagihan_seragam.id as id_tagihan_seragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, (SELECT(tb_seragam.biaya) - SUM(tb_cicilan_seragam.bayar)) as total, tb_tagihan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam WHERE tb_tagihan_seragam.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_cicilan_seragam.id_tagihan_seragam ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_cicilan_seragam.id, tb_tagihan_seragam.id as id_tagihan_seragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, (SELECT(tb_seragam.biaya) - SUM(tb_cicilan_seragam.bayar)) as total, tb_tagihan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_seragam.id_tagihan_seragam ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_cicilan_seragam.id, tb_tagihan_seragam.id as id_tagihan_seragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, (SELECT(tb_seragam.biaya) - SUM(tb_cicilan_seragam.bayar)) as total, tb_tagihan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_seragam.id_tagihan_seragam ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_cicilan_seragam.id, tb_tagihan_seragam.id as id_tagihan_seragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, (SELECT(tb_seragam.biaya) - SUM(tb_cicilan_seragam.bayar)) as total, tb_tagihan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam WHERE tb_tagihan_seragam.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_cicilan_seragam.id_tagihan_seragam ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } else {
                      $query  = ("SELECT tb_cicilan_seragam.id, tb_tagihan_seragam.id as id_tagihan_seragam, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as Seragam, SUM(tb_cicilan_seragam.bayar) as jml_terbayar, (SELECT(tb_seragam.biaya) - SUM(tb_cicilan_seragam.bayar)) as total, tb_tagihan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam WHERE MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_seragam.id_tagihan_seragam ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;
                    while ($row = mysqli_fetch_array($result)) {

                      $CicilanSeragamNama = $row['nama'];
                      $CicilanSeragamKelas = $row['kelas'];
                      $CicilanSeragam = $row['Seragam'];
                      $CicilanSeragamTerbayar = $row['jml_terbayar'];
                      $CicilanSeragamTotal = $row['total'];
                      $CicilanSeragamTanggal = $row['tanggal'];


                      $CicilanSeragamIdTagihan = $row['id_tagihan_seragam']




                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSeragamNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSeragamKelas; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $CicilanSeragam; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanSeragamTerbayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <button class="btn btn-success btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#detail-cicilan-seragam<?= $row['id_tagihan_seragam'] ?>">Detail</button>
                        </td>

                        <td class="align-middle text-center">

                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanSeragamTotal; ?></span>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSeragamTanggal; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#bayar-cicilan-seragam<?php echo $row['id']; ?>'>Bayar</button>

                        </td>

                      <tr></tr>
                      </tr>


                      <!-- Modal Bayar -->
                      <div class="modal fade" id="bayar-cicilan-seragam<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Bayar Cicilan Seragam</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="cicilan.php?id_tagihan_seragam=<?= $row['id_tagihan_seragam']; ?>&total=<?= $row['total']; ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanSeragamNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Kelas</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanSeragamKelas ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Belum Dibayar</label>
                                  <input disabled class="form-control" name="" type="text" value="Rp. <?= $CicilanSeragamTotal ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                                  <input class="form-control" name="jmlbayar-cicilan-seragam" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="tambah-cicilan-seragam" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal Bayar -->



                      <!-- Modal Detail Cicilan -->

                      <div class="modal fade bd-example-modal-xl" id="detail-cicilan-seragam<?= $row['id_tagihan_seragam'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Cicilan Seragam</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No</label>

                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Bayar</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Action</label>

                                  </div>
                                </div>

                              </div>
                              <?php


                              $IdTagihanSeragam = $row['id_tagihan_seragam'];
                              $queryreport  = "SELECT tb_cicilan_seragam.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_cicilan_seragam.bayar as jml_bayar, tb_cicilan_seragam.tanggal FROM tb_cicilan_seragam INNER JOIN tb_tagihan_seragam ON tb_tagihan_seragam.id=tb_cicilan_seragam.id_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas WHERE tb_cicilan_seragam.id_tagihan_seragam = '$IdTagihanSeragam' ORDER BY tb_cicilan_seragam.id asc";
                              $resultanjay = mysqli_query($koneksi, $queryreport);


                              $nomer    = 1;

                              while ($data = mysqli_fetch_array($resultanjay)) {

                                $CicilanSeragamDetailNama = $data['nama'];
                                $CicilanSeragamDetailKelas = $data['kelas'];
                                $CicilanSeragamDetailCicilan = $data['jml_bayar'];
                                $CicilanSeragamDetailTanggal = $data['tanggal'];




                              ?>
                                <div class="row centered">

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $nomer++; ?></span>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSeragamDetailNama; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $CicilanSeragamDetailKelas; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;&nbsp;&nbsp;Rp. <?php echo $CicilanSeragamDetailCicilan; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanSeragamDetailTanggal; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">

                                    <form class="yyyyy" action="cicilan.php?id=<?= $data['id'] ?>" method="post">
                                      <div class="form-group">
                                        <button class="btn btn-danger btn-sm px-3 py-1 me-1 mt-3" name='delete-cicilan-seragam' type='submit'>Delete</button>
                                      </div>
                                    </form>

                                  </div>


                                </div>

                              <?php

                              }


                              ?>

                            </div>
                            <div class="modal-footer">
                              <div class="align-middle text-center">
                                <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                              </div>
                              <!-- <button type="button" class="btn bg-gradient-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Cicilan -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * from tb_cicilan_seragam");
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
                      <a class="page-link" href="cicilan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"cicilan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="cicilan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Cicilan Seragam -->

      <!-- Table Cicilan Kegiatan -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Cicilan Kegiatan</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-data-tagihan-kegiatan">Tambah</button>
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
                        Kegiatan
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Sudah Dibayar
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Cicilan
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
                      $caringab = ("SELECT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as id_tagihan_kegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, (SELECT(tb_kegiatan.biaya) - SUM(tb_cicilan_kegiatan.bayar)) as total, tb_tagihan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan where tb_tagihan_kegiatan.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_cicilan_kegiatan.id_tagihan_kegiatan ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as id_tagihan_kegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, (SELECT(tb_kegiatan.biaya) - SUM(tb_cicilan_kegiatan.bayar)) as total, tb_tagihan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_kegiatan.id_tagihan_kegiatan ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as id_tagihan_kegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, (SELECT(tb_kegiatan.biaya) - SUM(tb_cicilan_kegiatan.bayar)) as total, tb_tagihan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_kegiatan.id_tagihan_kegiatan ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as id_tagihan_kegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, (SELECT(tb_kegiatan.biaya) - SUM(tb_cicilan_kegiatan.bayar)) as total, tb_tagihan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan WHERE tb_tagihan_kegiatan.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_cicilan_kegiatan.id_tagihan_kegiatan ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } else {
                      $query  = ("SELECT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as id_tagihan_kegiatan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as Kegiatan, SUM(tb_cicilan_kegiatan.bayar) as jml_terbayar, (SELECT(tb_kegiatan.biaya) - SUM(tb_cicilan_kegiatan.bayar)) as total, tb_tagihan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan WHERE MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_kegiatan.id_tagihan_kegiatan ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;
                    while ($row = mysqli_fetch_array($result)) {

                      $CicilanKegiatanNama = $row['nama'];
                      $CicilanKegiatanKelas = $row['kelas'];
                      $CicilanKegiatan = $row['Kegiatan'];
                      $CicilanKegiatanTerbayar = $row['jml_terbayar'];
                      $CicilanKegiatanTotal = $row['total'];
                      $CicilanKegiatanTanggal = $row['tanggal'];


                      $CicilanKegiatanIdTagihan = $row['id_tagihan_kegiatan']




                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanKegiatanNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanKegiatanKelas; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $CicilanKegiatan; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanKegiatanTerbayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <button class="btn btn-success btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#detail-cicilan-kegiatan<?= $row['id_tagihan_kegiatan'] ?>">Detail</button>
                        </td>

                        <td class="align-middle text-center">

                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanKegiatanTotal; ?></span>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanKegiatanTanggal; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#bayar-cicilan-kegiatan<?php echo $row['id']; ?>'>Bayar</button>

                        </td>

                      <tr></tr>
                      </tr>


                      <!-- Modal Bayar -->
                      <div class="modal fade" id="bayar-cicilan-kegiatan<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Bayar Cicilan Kegiatan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="cicilan.php?id_tagihan_kegiatan=<?= $row['id_tagihan_kegiatan']; ?>&total=<?= $row['total']; ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanKegiatanNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Kelas</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanKegiatanKelas ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Belum Dibayar</label>
                                  <input disabled class="form-control" name="" type="text" value="Rp. <?= $CicilanKegiatanTotal ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                                  <input class="form-control" name="jmlbayar-cicilan-kegiatan" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="tambah-cicilan-kegiatan" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal Bayar -->



                      <!-- Modal Detail Cicilan -->

                      <div class="modal fade bd-example-modal-xl" id="detail-cicilan-kegiatan<?= $row['id_tagihan_kegiatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Cicilan Kegiatan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No</label>

                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Bayar</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Action</label>

                                  </div>
                                </div>

                              </div>
                              <?php


                              $IdTagihanKegiatan = $row['id_tagihan_kegiatan'];
                              $queryreport  = "SELECT tb_cicilan_kegiatan.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_cicilan_kegiatan.bayar as jml_bayar, tb_cicilan_kegiatan.tanggal FROM tb_cicilan_kegiatan INNER JOIN tb_tagihan_kegiatan ON tb_tagihan_kegiatan.id=tb_cicilan_kegiatan.id_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas WHERE tb_cicilan_kegiatan.id_tagihan_kegiatan = '$IdTagihanKegiatan' ORDER BY tb_cicilan_kegiatan.id asc";
                              $resultanjay = mysqli_query($koneksi, $queryreport);


                              $nomer    = 1;

                              while ($data = mysqli_fetch_array($resultanjay)) {

                                $CicilanKegiatanDetailNama = $data['nama'];
                                $CicilanKegiatanDetailKelas = $data['kelas'];
                                $CicilanKegiatanDetailCicilan = $data['jml_bayar'];
                                $CicilanKegiatanDetailTanggal = $data['tanggal'];




                              ?>
                                <div class="row centered">

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $nomer++; ?></span>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanKegiatanDetailNama; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $CicilanKegiatanDetailKelas; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;&nbsp;&nbsp;Rp. <?php echo $CicilanKegiatanDetailCicilan; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanKegiatanDetailTanggal; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">

                                    <form class="yyyyy" action="cicilan.php?id=<?= $data['id'] ?>" method="post">
                                      <div class="form-group">
                                        <button class="btn btn-danger btn-sm px-3 py-1 me-1 mt-3" name='delete-cicilan-kegiatan' type='submit'>Delete</button>
                                      </div>
                                    </form>

                                  </div>


                                </div>

                              <?php

                              }


                              ?>

                            </div>
                            <div class="modal-footer">
                              <div class="align-middle text-center">
                                <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                              </div>
                              <!-- <button type="button" class="btn bg-gradient-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Cicilan -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * from tb_cicilan_kegiatan");
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
                      <a class="page-link" href="cicilan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"cicilan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="cicilan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Cicilan Kegiatan -->


      <!-- Table Cicilan Gedung -->

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Table Cicilan Gedung</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-data-tagihan-gedung">Tambah</button>
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
                        Gedung
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Jumlah Sudah Dibayar
                      </th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Cicilan
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
                      $caringab = ("SELECT tb_cicilan_gedung.id, tb_tagihan_gedung.id as id_tagihan_gedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, (SELECT(tb_gedung.biaya) - SUM(tb_cicilan_gedung.bayar)) as total, tb_tagihan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung where tb_tagihan_gedung.tanggal BETWEEN '$from_date' AND '$to_date' AND tb_siswa.nama LIKE '" . $data . "%' GROUP BY tb_cicilan_gedung.id_tagihan_gedung ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT tb_cicilan_gedung.id, tb_tagihan_gedung.id as id_tagihan_gedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, (SELECT(tb_gedung.biaya) - SUM(tb_cicilan_gedung.bayar)) as total, tb_tagihan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_gedung.id_tagihan_gedung ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT tb_cicilan_gedung.id, tb_tagihan_gedung.id as id_tagihan_gedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, (SELECT(tb_gedung.biaya) - SUM(tb_cicilan_gedung.bayar)) as total, tb_tagihan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_gedung.id_tagihan_gedung ORDER BY tb_siswa.nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];

                      $filter_dek = ("SELECT tb_cicilan_gedung.id, tb_tagihan_gedung.id as id_tagihan_gedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, (SELECT(tb_gedung.biaya) - SUM(tb_cicilan_gedung.bayar)) as total, tb_tagihan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung WHERE tb_tagihan_gedung.tanggal BETWEEN '$from_date' AND '$to_date' GROUP BY tb_cicilan_gedung.id_tagihan_gedung ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $filter_dek);
                    } else {
                      $query  = ("SELECT tb_cicilan_gedung.id, tb_tagihan_gedung.id as id_tagihan_gedung, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as Gedung, SUM(tb_cicilan_gedung.bayar) as jml_terbayar, (SELECT(tb_gedung.biaya) - SUM(tb_cicilan_gedung.bayar)) as total, tb_tagihan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung WHERE MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) GROUP BY tb_cicilan_gedung.id_tagihan_gedung ORDER BY tb_siswa.nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;
                    while ($row = mysqli_fetch_array($result)) {

                      $CicilanGedungNama = $row['nama'];
                      $CicilanGedungKelas = $row['kelas'];
                      $CicilanGedung = $row['Gedung'];
                      $CicilanGedungTerbayar = $row['jml_terbayar'];
                      $CicilanGedungTotal = $row['total'];
                      $CicilanGedungTanggal = $row['tanggal'];


                      $CicilanGedungIdTagihan = $row['id_tagihan_gedung']




                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanGedungNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanGedungKelas; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $CicilanGedung; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanGedungTerbayar; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <button class="btn btn-success btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#detail-cicilan-gedung<?= $row['id_tagihan_gedung'] ?>">Detail</button>
                        </td>

                        <td class="align-middle text-center">

                          <span class='text-secondary text-xs font-weight-bold'>Rp. <?php echo $CicilanGedungTotal; ?></span>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanGedungTanggal; ?></span>
                        </td>


                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#bayar-cicilan-gedung<?php echo $row['id']; ?>'>Bayar</button>

                        </td>

                      <tr></tr>
                      </tr>


                      <!-- Modal Bayar -->
                      <div class="modal fade" id="bayar-cicilan-gedung<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Bayar Cicilan Gedung</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="cicilan.php?id_tagihan_gedung=<?= $row['id_tagihan_gedung']; ?>&total=<?= $row['total']; ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanGedungNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Kelas</label>
                                  <input disabled class="form-control" name="" type="text" value="<?= $CicilanGedungKelas ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Belum Dibayar</label>
                                  <input disabled class="form-control" name="" type="text" value="Rp. <?= $CicilanGedungTotal ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                                  <input class="form-control" name="jmlbayar-cicilan-gedung" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="tambah-cicilan-gedung" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal Bayar -->



                      <!-- Modal Detail Cicilan -->

                      <div class="modal fade bd-example-modal-xl" id="detail-cicilan-gedung<?= $row['id_tagihan_gedung'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Cicilan Gedung</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No</label>

                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Bayar</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal</label>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Action</label>

                                  </div>
                                </div>

                              </div>
                              <?php


                              $IdTagihanGedung = $row['id_tagihan_gedung'];
                              $queryreport  = "SELECT tb_cicilan_gedung.id, tb_siswa.nama, tb_kelas.nama as kelas, tb_cicilan_gedung.bayar as jml_bayar, tb_cicilan_gedung.tanggal FROM tb_cicilan_gedung INNER JOIN tb_tagihan_gedung ON tb_tagihan_gedung.id=tb_cicilan_gedung.id_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_kelas ON tb_kelas.id=tb_siswa.id_kelas WHERE tb_cicilan_gedung.id_tagihan_gedung = '$IdTagihanGedung' ORDER BY tb_cicilan_gedung.id asc";
                              $resultanjay = mysqli_query($koneksi, $queryreport);


                              $nomer    = 1;

                              while ($data = mysqli_fetch_array($resultanjay)) {

                                $CicilanGedungDetailNama = $data['nama'];
                                $CicilanGedungDetailKelas = $data['kelas'];
                                $CicilanGedungDetailCicilan = $data['jml_bayar'];
                                $CicilanGedungDetailTanggal = $data['tanggal'];




                              ?>
                                <div class="row centered">

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $nomer++; ?></span>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanGedungDetailNama; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;<?php echo $CicilanGedungDetailKelas; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold">&nbsp;&nbsp;&nbsp;Rp. <?php echo $CicilanGedungDetailCicilan; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <span class="text-secondary text-xs font-weight-bold"><?php echo $CicilanGedungDetailTanggal; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">

                                    <form class="yyyyy" action="cicilan.php?id=<?= $data['id'] ?>" method="post">
                                      <div class="form-group">
                                        <button class="btn btn-danger btn-sm px-3 py-1 me-1 mt-3" name='delete-cicilan-gedung' type='submit'>Delete</button>
                                      </div>
                                    </form>

                                  </div>


                                </div>

                              <?php

                              }


                              ?>

                            </div>
                            <div class="modal-footer">
                              <div class="align-middle text-center">
                                <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                              </div>
                              <!-- <button type="button" class="btn bg-gradient-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Cicilan -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * from tb_cicilan_gedung");
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
                      <a class="page-link" href="cicilan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"cicilan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="cicilan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- End Table Cicilan Gedung -->



      <!-- Add Data Cicilan SPP -->

      <div class="modal fade" id="tambah-data-tagihan-spp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Data Cicilan SPP</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="cicilan.php" method="post">
                <div class="form-group">
                  <label for="bahan">Tagihan</label>
                  <select class="form-select" name="tambah-data-nama-tagihanspp" required>
                    <option value="">Pilih Tagihan</option>
                    <?php


                    $querytagihanspp = mysqli_query($koneksi, "SELECT DISTINCT tb_cicilan_spp.id, tb_tagihan_spp.id as idtagihan, tb_siswa.nama, tb_kelas.nama as kelas,  tb_spp.biaya as spp FROM tb_tagihan_spp INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_spp.id_siswa INNER JOIN tb_spp ON tb_spp.id=tb_tagihan_spp.id_spp LEFT JOIN tb_cicilan_spp ON tb_cicilan_spp.id_tagihan_spp=tb_tagihan_spp.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_cicilan_spp.id is null AND MONTH(tb_tagihan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_spp.tanggal)=YEAR(curdate()) GROUP BY tb_tagihan_spp.id") or die(mysqli_error($koneksi));
                    while ($tagihanspp = mysqli_fetch_array($querytagihanspp)) {
                      echo "<option value=$tagihanspp[idtagihan]> $tagihanspp[nama] - $tagihanspp[kelas] - Tagihan SPP [Rp. $tagihanspp[spp]]</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                  <input class="form-control" name="tambah-data-bayar-cicilanspp" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                </div>


                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-data-cicilanspp" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- End SPP -->


      <!-- Add Data Cicilan Seragam -->

      <div class="modal fade" id="tambah-data-tagihan-seragam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Data Cicilan Seragam</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="cicilan.php" method="post">
                <div class="form-group">
                  <label for="bahan">Tagihan</label>
                  <select class="form-select" name="tambah-data-nama-tagihanseragam" required>
                    <option value="">Pilih Tagihan</option>
                    <?php


                    $querytagihanseragam = mysqli_query($koneksi, "SELECT DISTINCT tb_cicilan_seragam.id, tb_tagihan_seragam.id as idtagihan, tb_siswa.nama, tb_kelas.nama as kelas, tb_seragam.biaya as seragam FROM tb_tagihan_seragam INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_seragam.id_siswa INNER JOIN tb_seragam ON tb_seragam.id=tb_tagihan_seragam.id_seragam LEFT JOIN tb_cicilan_seragam ON tb_cicilan_seragam.id_tagihan_seragam=tb_tagihan_seragam.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_cicilan_seragam.id is null AND MONTH(tb_tagihan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_seragam.tanggal)=YEAR(curdate()) AND tb_seragam.biaya is not null GROUP BY tb_tagihan_seragam.id") or die(mysqli_error($koneksi));
                    while ($tagihanseragam = mysqli_fetch_array($querytagihanseragam)) {
                      echo "<option value=$tagihanseragam[idtagihan]> $tagihanseragam[nama] - $tagihanseragam[kelas] - Tagihan Seragam [Rp. $tagihanseragam[seragam]]</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                  <input class="form-control" name="tambah-data-bayar-cicilanseragam" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                </div>


                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-data-cicilanseragam" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- End Seragam -->




      <!-- Add Data Cicilan Kegiatan -->

      <div class="modal fade" id="tambah-data-tagihan-kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Data Cicilan Kegiatan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="cicilan.php" method="post">
                <div class="form-group">
                  <label for="bahan">Tagihan</label>
                  <select class="form-select" name="tambah-data-nama-tagihankegiatan" required>
                    <option value="">Pilih Tagihan</option>
                    <?php


                    $querytagihankegiatan = mysqli_query($koneksi, "SELECT DISTINCT tb_cicilan_kegiatan.id, tb_tagihan_kegiatan.id as idtagihan, tb_siswa.nama, tb_kelas.nama as kelas, tb_kegiatan.biaya as kegiatan FROM tb_tagihan_kegiatan INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_kegiatan.id_siswa INNER JOIN tb_kegiatan ON tb_kegiatan.id=tb_tagihan_kegiatan.id_kegiatan LEFT JOIN tb_cicilan_kegiatan ON tb_cicilan_kegiatan.id_tagihan_kegiatan=tb_tagihan_kegiatan.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_cicilan_kegiatan.id is null AND MONTH(tb_tagihan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_kegiatan.tanggal)=YEAR(curdate()) AND tb_kegiatan.biaya is not null GROUP BY tb_tagihan_kegiatan.id") or die(mysqli_error($koneksi));
                    while ($tagihankegiatan = mysqli_fetch_array($querytagihankegiatan)) {
                      echo "<option value=$tagihankegiatan[idtagihan]> $tagihankegiatan[nama] - $tagihankegiatan[kekas] - Tagihan Kegiatan [Rp. $tagihankegiatan[kegiatan]]</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                  <input class="form-control" name="tambah-data-bayar-cicilankegiatan" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                </div>


                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-data-cicilankegiatan" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- End Kegiatan -->

      <!-- Add Data Cicilan Gedung -->

      <div class="modal fade" id="tambah-data-tagihan-gedung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Data Cicilan Gedung</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="cicilan.php" method="post">
                <div class="form-group">
                  <label for="bahan">Tagihan</label>
                  <select class="form-select" name="tambah-data-nama-tagihangedung" required>
                    <option value="">Pilih Tagihan</option>
                    <?php


                    $querytagihangedung = mysqli_query($koneksi, "SELECT DISTINCT tb_cicilan_gedung.id, tb_tagihan_gedung.id as idtagihan, tb_siswa.nama, tb_kelas.nama as kelas, tb_gedung.biaya as gedung FROM tb_tagihan_gedung INNER JOIN tb_siswa ON tb_siswa.id=tb_tagihan_gedung.id_siswa INNER JOIN tb_gedung ON tb_gedung.id=tb_tagihan_gedung.id_gedung LEFT JOIN tb_cicilan_gedung ON tb_cicilan_gedung.id_tagihan_gedung=tb_tagihan_gedung.id INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id WHERE tb_cicilan_gedung.id is null AND MONTH(tb_tagihan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_tagihan_gedung.tanggal)=YEAR(curdate()) AND tb_gedung.biaya is not null GROUP BY tb_tagihan_gedung.id") or die(mysqli_error($koneksi));
                    while ($tagihangedung = mysqli_fetch_array($querytagihangedung)) {
                      echo "<option value=$tagihangedung[idtagihan]> $tagihangedung[nama] - $tagihangedung[kelas] - Tagihan Gedung [Rp. $tagihangedung[gedung]]</option>";
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Jumlah Yang Akan Dibayar</label>
                  <input class="form-control" name="tambah-data-bayar-cicilangedung" type="text" value="" maxlength="12" placeholder="Enter Nominal" required />
                </div>


                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-data-cicilangedung" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- End Gedung -->





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

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-data-cicilanspp'])) {


  $TambahDataIdTagihanSPP = $_POST['tambah-data-nama-tagihanspp'];
  $TambahDataBayarCicilanSPP = $_POST['tambah-data-bayar-cicilanspp'];


  if ($TambahDataBayarCicilanSPP == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($TambahDataBayarCicilanSPP <= 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } else {

    $query    = "INSERT INTO tb_cicilan_spp SET id_tagihan_spp = '$TambahDataIdTagihanSPP', bayar = '$TambahDataBayarCicilanSPP' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  }
}

?>




<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-cicilan-spp'])) {


  $CicilanSPPIdTagihan = $_GET['id_tagihan_spp'];
  $CicilanSPPSisaTotal = $_GET['total'];
  $CicilanSPPMauBayar = $_POST['jmlbayar-cicilan-spp'];


  if ($CicilanSPPMauBayar == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanSPPMauBayar < 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanSPPMauBayar <= $CicilanSPPSisaTotal) {

    $query    = "INSERT INTO tb_cicilan_spp SET id_tagihan_spp = '$CicilanSPPIdTagihan', bayar = '$CicilanSPPMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } elseif ($CicilanSPPSisaTotal == $CicilanSPPMauBayar) {

    $query    = "INSERT INTO tb_cicilan_spp SET id_tagihan_spp = '$CicilanSPPIdTagihan',bayar = '$CicilanSPPMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-cicilan-spp'])) {

  if (isset($_POST['delete-cicilan-spp'])) {
    $querydel = "DELETE FROM tb_cicilan_spp WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  }
}


?>




<!-- ================================================================== -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-data-cicilanseragam'])) {


  $TambahDataIdTagihanSeragam = $_POST['tambah-data-nama-tagihanseragam'];
  $TambahDataBayarCicilanSeragam = $_POST['tambah-data-bayar-cicilanseragam'];


  if ($TambahDataBayarCicilanSeragam == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($TambahDataBayarCicilanSeragam < 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } else {

    $query    = "INSERT INTO tb_cicilan_seragam SET id_tagihan_seragam = '$TambahDataIdTagihanSeragam', bayar = '$TambahDataBayarCicilanSeragam' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  }
}

?>




<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-cicilan-seragam'])) {


  $CicilanSeragamIdTagihan = $_GET['id_tagihan_seragam'];
  $CicilanSeragamSisaTotal = $_GET['total'];
  $CicilanSeragamMauBayar = $_POST['jmlbayar-cicilan-seragam'];


  if ($CicilanSeragamMauBayar == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanSeragamMauBayar < 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanSeragamMauBayar <= $CicilanSeragamSisaTotal) {

    $query    = "INSERT INTO tb_cicilan_seragam SET id_tagihan_seragam = '$CicilanSeragamIdTagihan', bayar = '$CicilanSeragamMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } elseif ($CicilanSeragamSisaTotal == $CicilanSeragamMauBayar) {

    $query    = "INSERT INTO tb_cicilan_seragam SET id_tagihan_seragam = '$CicilanSeragamIdTagihan',bayar = '$CicilanSeragamauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-cicilan-seragam'])) {

  if (isset($_POST['delete-cicilan-seragam'])) {
    $querydel = "DELETE FROM tb_cicilan_seragam WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  }
}


?>




<!-- ================================================================== -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-data-cicilankegiatan'])) {


  $TambahDataIdTagihanKegiatan = $_POST['tambah-data-nama-tagihankegiatan'];
  $TambahDataBayarCicilanKegiatan = $_POST['tambah-data-bayar-cicilankegiatan'];


  if ($TambahDataBayarCicilanKegiatan == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($TambahDataBayarCicilanKegiatan <= 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } else {

    $query    = "INSERT INTO tb_cicilan_kegiatan SET id_tagihan_kegiatan = '$TambahDataIdTagihanKegiatan', bayar = '$TambahDataBayarCicilanKegiatan' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  }
}

?>

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-cicilan-kegiatan'])) {


  $CicilanKegiatanIdTagihan = $_GET['id_tagihan_kegiatan'];
  $CicilanKegiatanSisaTotal = $_GET['total'];
  $CicilanKegiatanMauBayar = $_POST['jmlbayar-cicilan-kegiatan'];


  if ($CicilanKegiatanMauBayar == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanKegiatanMauBayar < 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanKegiatanMauBayar <= $CicilanKegiatanSisaTotal) {

    $query    = "INSERT INTO tb_cicilan_kegiatan SET id_tagihan_kegiatan = '$CicilanKegiatanIdTagihan', bayar = '$CicilanKegiatanMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } elseif ($CicilanKegiatanSisaTotal == $CicilanKegiatanMauBayar) {

    $query    = "INSERT INTO tb_cicilan_kegiatan SET id_tagihan_kegiatan = '$CicilanKegiatanIdTagihan',bayar = '$CicilanKegiatanMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-cicilan-kegiatan'])) {

  if (isset($_POST['delete-cicilan-kegiatan'])) {
    $querydel = "DELETE FROM tb_cicilan_kegiatan WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  }
}


?>

<!-- ================================================================== -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-data-cicilangedung'])) {


  $TambahDataIdTagihanGedung = $_POST['tambah-data-nama-tagihangedung'];
  $TambahDataBayarCicilanGedung = $_POST['tambah-data-bayar-cicilangedung'];


  if ($TambahDataBayarCicilanGedung == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($TambahDataBayarCicilanGedung <= 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } else {

    $query    = "INSERT INTO tb_cicilan_gedung SET id_tagihan_gedung = '$TambahDataIdTagihanGedung', bayar = '$TambahDataBayarCicilanGedung' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  }
}

?>

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-cicilan-gedung'])) {


  $CicilanGedungIdTagihan = $_GET['id_tagihan_gedung'];
  $CicilanGedungSisaTotal = $_GET['total'];
  $CicilanGedungMauBayar = $_POST['jmlbayar-cicilan-gedung'];


  if ($CicilanGedungMauBayar == 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanGedungMauBayar < 0) {
    echo "<script>
    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
      {window.location = 'cicilan.php';}
    })</script>";
  } elseif ($CicilanGedungMauBayar <= $CicilanGedungSisaTotal) {

    $query    = "INSERT INTO tb_cicilan_gedung SET id_tagihan_gedung = '$CicilanGedungIdTagihan', bayar = '$CicilanGedungMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } elseif ($CicilanGedungSisaTotal == $CicilanGedungMauBayar) {

    $query    = "INSERT INTO tb_cicilan_gedung SET id_tagihan_gedung = '$CicilanGedungIdTagihan',bayar = '$CicilanGedungMauBayar' , tanggal = now()";
    $result   = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>
        Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
          {window.location = 'cicilan.php';}
        })</script>";
    } else {

      echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
    }
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
            {window.location = 'cicilan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-cicilan-gedung'])) {

  if (isset($_POST['delete-cicilan-gedung'])) {
    $querydel = "DELETE FROM tb_cicilan_gedung WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'cicilan.php';}
    })</script>";
  }
}


?>