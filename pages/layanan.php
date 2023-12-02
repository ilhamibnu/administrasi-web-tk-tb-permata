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
  <title>Layanan - Permata Dashboard</title>
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
      <a class="navbar-brand m-0" href="dashboard.php">
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
          <a class='nav-link active' href='layanan.php'>
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






    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>SPP Table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambah-dataspp">Tambah</button>
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
                        Biaya
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

                    $query  = ("SELECT id, nama, format(biaya,0) as biaya FROM tb_spp  LIMIT $posisi, $batas");
                    $result = mysqli_query($koneksi, $query);



                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $SPPid = $row['id'];
                      $SPPNama = $row['nama'];
                      $SPPBiaya = $row['biaya'];

                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>



                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $SPPNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $SPPBiaya; ?></span>
                        </td>

                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-delete-spp<?php echo $row['id']; ?>'>Delete</button>
                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-edit-spp<?php echo $row['id']; ?>'>Edit</button>


                        </td>


                      <tr></tr>
                      </tr>

                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-edit-spp<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Layanan SPP</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-nama-spp" type="text" value="<?= $SPPNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Biaya</label>
                                  <input class="form-control" name="edit-biaya-spp" type="text" value="<?= $SPPBiaya ?>" maxlength="30" placeholder="Enter Biaya" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-dataspp" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-delete-spp<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data <?= $SPPNama ?>?</h4>
                              </div>
                              <form class="yayyay" action="layanan.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-dataspp">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->




                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_spp");
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
                      <a class="page-link" href="layanan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"layanan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="layanan.php?halaman=<?= $Next; ?>" aria-label="Next">
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


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Seragam Table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambahseragam">Tambah</button>
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
                        Biaya
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

                    $query  = ("SELECT id, nama, format(biaya,0) as biaya FROM tb_seragam  LIMIT $posisi, $batas");
                    $result = mysqli_query($koneksi, $query);



                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $Seragamid = $row['id'];
                      $SeragamNama = $row['nama'];
                      $SeragamBiaya = $row['biaya'];

                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>



                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $SeragamNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $SeragamBiaya; ?></span>
                        </td>

                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-deleteseragam<?php echo $row['id']; ?>'>Delete</button>
                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-editseragam<?php echo $row['id']; ?>'>Edit</button>


                        </td>


                      <tr></tr>
                      </tr>

                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-editseragam<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Layanan Seragam</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-nama-seragam" type="text" value="<?= $SeragamNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Biaya</label>
                                  <input class="form-control" name="edit-biaya-seragam" type="text" value="<?= $SeragamBiaya ?>" maxlength="30" placeholder="Enter Biaya" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-dataseragam" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-deleteseragam<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data <?= $SeragamNama ?>?</h4>
                              </div>
                              <form class="yayyay" action="layanan.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-dataseragam">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->




                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_seragam");
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
                      <a class="page-link" href="layanan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"layanan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="layanan.php?halaman=<?= $Next; ?>" aria-label="Next">
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


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Kegiatan Table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambahkegiatan">Tambah</button>
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
                        Biaya
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

                    $query  = ("SELECT id, nama, format(biaya,0) as biaya FROM tb_kegiatan  LIMIT $posisi, $batas");
                    $result = mysqli_query($koneksi, $query);



                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $Kegiatanid = $row['id'];
                      $KegiatanNama = $row['nama'];
                      $KegiatanBiaya = $row['biaya'];

                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>



                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $KegiatanNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $KegiatanBiaya; ?></span>
                        </td>

                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-deletekegiatan<?php echo $row['id']; ?>'>Delete</button>
                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-editkegiatan<?php echo $row['id']; ?>'>Edit</button>


                        </td>


                      <tr></tr>
                      </tr>

                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-editkegiatan<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Layanan Kegiatan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-nama-kegiatan" type="text" value="<?= $KegiatanNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Biaya</label>
                                  <input class="form-control" name="edit-biaya-kegiatan" type="text" value="<?= $KegiatanBiaya ?>" maxlength="30" placeholder="Enter Biaya" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-datakegiatan" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-deletekegiatan<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data <?= $KegiatanNama ?>?</h4>
                              </div>
                              <form class="yayyay" action="layanan.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-datakegiatan">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->




                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan");
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
                      <a class="page-link" href="layanan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"layanan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="layanan.php?halaman=<?= $Next; ?>" aria-label="Next">
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


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h6>Gedung Table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambahgedung">Tambah</button>
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
                        Biaya
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

                    $query  = ("SELECT id, nama, format(biaya,0) as biaya FROM tb_gedung  LIMIT $posisi, $batas");
                    $result = mysqli_query($koneksi, $query);



                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $Gedungid = $row['id'];
                      $GedungNama = $row['nama'];
                      $GedungBiaya = $row['biaya'];

                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>



                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $GedungNama; ?></span>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Rp. <?php echo $GedungBiaya; ?></span>
                        </td>

                        <td class="align-middle text-center">

                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-deletegedung<?php echo $row['id']; ?>'>Delete</button>
                          <button class='btn btn-dark btn-sm px-3 py-1 me-1 mt-3' data-bs-toggle='modal' data-bs-target='#modal-editgedung<?php echo $row['id']; ?>'>Edit</button>


                        </td>


                      <tr></tr>
                      </tr>

                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-editgedung<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Layanan Gedung</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-nama-gedung" type="text" value="<?= $GedungNama ?>" maxlength="30" placeholder="Enter Nama" required />
                                </div>


                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Biaya</label>
                                  <input class="form-control" name="edit-biaya-gedung" type="text" value="<?= $GedungBiaya ?>" maxlength="30" placeholder="Enter Biaya" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-datagedung" class="btn btn-success btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-deletegedung<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus data <?= $GedungNama ?>?</h4>
                              </div>
                              <form class="yayyay" action="layanan.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-datagedung">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->




                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_gedung");
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
                      <a class="page-link" href="layanan.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"layanan.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="layanan.php?halaman=<?= $Next; ?>" aria-label="Next">
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

      <!-- Modal Add SPP -->
      <div class="modal fade" id="tambah-dataspp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Form SPP</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-spp" type="text" value="" maxlength="30" placeholder="Enter Nama" required />
                </div>


                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="biaya-spp" type="text" value="" maxlength="30" placeholder="Enter Biaya" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-dataspp" class="btn btn-success btn-sm ms-auto">Save</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal Add SPP -->


      <!-- Modal Add Seragam -->
      <div class="modal fade" id="modal-tambahseragam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Form Seragam</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="layanan.php" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-seragam" type="text" value="" maxlength="30" placeholder="Enter Nama" required />
                </div>


                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="biaya-seragam" type="text" value="" maxlength="30" placeholder="Enter Biaya" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-dataseragam" class="btn btn-success btn-sm ms-auto">Save</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal Add Seragam -->


      <!-- Modal Add Kegiatan -->
      <div class="modal fade" id="modal-tambahkegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Form Kegiatan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-kegiatan" type="text" value="" maxlength="30" placeholder="Enter Nama" required />
                </div>


                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="biaya-kegiatan" type="text" value="" maxlength="30" placeholder="Enter Biaya" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-datakegiatan" class="btn btn-success btn-sm ms-auto">Save</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal Add Kegiatan -->

      <!-- Modal Add Gedung -->
      <div class="modal fade" id="modal-tambahgedung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Form Gedung</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="layanan.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-gedung" type="text" value="" maxlength="30" placeholder="Enter Nama" required />
                </div>


                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="biaya-gedung" type="text" value="" maxlength="30" placeholder="Enter Biaya" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-datagedung" class="btn btn-success btn-sm ms-auto">Save</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal Add Gedung -->

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
if (isset($_POST['tambah-dataspp'])) {

  $AddNamaSPP = $_POST['nama-spp'];
  $AddBiayaSPP = $_POST['biaya-spp'];

  $query    = "INSERT INTO tb_spp SET id = '', nama = '$AddNamaSPP', biaya = '$AddBiayaSPP'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'layanan.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'layanan.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$EditNamaSPP = $_POST['edit-nama-spp'];
$EditBiayaSPP = $_POST['edit-biaya-spp'];


if (isset($_POST['edit-dataspp'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_spp` SET nama = '$EditNamaSPP', biaya = '$EditBiayaSPP' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'layanan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'layanan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-dataspp'])) {

  if (isset($_POST['delete-dataspp'])) {
    $querydel = "DELETE FROM tb_spp WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  }
}


?>

<!-- ==================================== -->


<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-dataseragam'])) {

  $AddNamaSeragam = $_POST['nama-seragam'];
  $AddBiayaSeragam = $_POST['biaya-seragam'];

  $query    = "INSERT INTO tb_seragam SET id = '', nama = '$AddNamaSeragam', biaya = '$AddBiayaSeragam'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'layanan.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'layanan.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$EditNamaSeragam = $_POST['edit-nama-seragam'];
$EditBiayaSeragam = $_POST['edit-biaya-seragam'];


if (isset($_POST['edit-dataseragam'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_seragam` SET nama = '$EditNamaSeragam', biaya = '$EditBiayaSeragam' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'layanan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'layanan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-dataseragam'])) {

  if (isset($_POST['delete-dataseragam'])) {
    $querydel = "DELETE FROM tb_seragam WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  }
}


?>

<!-- ==================================================== -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-datakegiatan'])) {

  $AddNamaKegiatan = $_POST['nama-kegiatan'];
  $AddBiayaKegiatan = $_POST['biaya-kegiatan'];

  $query    = "INSERT INTO tb_kegiatan SET id = '', nama = '$AddNamaKegiatan', biaya = '$AddBiayaKegiatan'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'layanan.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'layanan.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$EditNamaKegiatan = $_POST['edit-nama-kegiatan'];
$EditBiayaKegiatan = $_POST['edit-biaya-kegiatan'];


if (isset($_POST['edit-datakegiatan'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_kegiatan` SET nama = '$EditNamaKegiatan', biaya = '$EditBiayaKegiatan' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'layanan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'layanan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-datakegiatan'])) {

  if (isset($_POST['delete-datakegiatan'])) {
    $querydel = "DELETE FROM tb_kegiatan WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  }
}


?>

<!-- ==================================================== -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-datagedung'])) {

  $AddNamaGedung = $_POST['nama-gedung'];
  $AddBiayaGedung = $_POST['biaya-gedung'];

  $query    = "INSERT INTO tb_gedung SET id = '', nama = '$AddNamaGedung', biaya = '$AddBiayaGedung'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'layanan.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'layanan.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$EditNamaGedung = $_POST['edit-nama-gedung'];
$EditBiayaGedung = $_POST['edit-biaya-gedung'];


if (isset($_POST['edit-datagedung'])) {
  $sql = mysqli_query($koneksi, "UPDATE `tb_gedung` SET nama = '$EditNamaGedung', biaya = '$EditBiayaGedung' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'layanan.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'layanan.php';}
          })</script>";
  }
}

?>

<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-datagedung'])) {

  if (isset($_POST['delete-datagedung'])) {
    $querydel = "DELETE FROM tb_gedung WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'layanan.php';}
    })</script>";
  }
}


?>