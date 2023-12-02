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
  <title>Dashboard Permata</title>
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
  <div class="position-absolute w-100 min-height-750 top-0" style="
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
          <a class='nav-link active' href='dashboard.php'>
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
              Dashboard
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <span class="font-weight-bolder text-white mb-0" id="date_time"></span>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

          <ul class="ms-md-auto pe-md-3 d-flex align-items-center navbar-nav justify-content-end">

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


            $tampilprofil = ("SELECT id, nama, username, password  FROM tb_user WHERE id = '$data_id'");
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
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Pemasukan Uang SPP Bulan Ini
                    </p>

                    <?php
                    error_reporting(0);


                    $sql = ("SELECT format(SUM(tb_cicilan_spp.bayar),0) as sppmasuk FROM tb_cicilan_spp WHERE MONTH(tb_cicilan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_spp.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $totalspp   = $row['sppmasuk'];

                    ?>



                      <?php

                      if ($totalspp == '') {
                        echo "
                  <h5 class='font-weight-bolder'> Rp. 0</h5>
                  ";
                      } else {

                        echo "

                  <h5 class='font-weight-bolder'>Rp. $totalspp</h5>
                  
                  ";
                      }

                      ?>




                    <?php

                    }
                    ?>

                    <!-- <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+55%</span>
                since yesterday
              </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Pemasukan Uang Seragam Bulan Ini
                    </p>


                    <?php
                    error_reporting(0);


                    // $sql = ("SELECT COUNT(*) as jml_transaksi FROM tb_transaksi WHERE tb_transaksi.tanggal = curdate()");

                    $sql = ("SELECT format(SUM(tb_cicilan_seragam.bayar),0) as seragammasuk FROM tb_cicilan_seragam WHERE MONTH(tb_cicilan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_seragam.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $totalseragam   = $row['seragammasuk'];

                    ?>



                      <?php

                      if ($totalseragam == '') {
                        echo "
                  <h5 class='font-weight-bolder'>Rp. 0</h5>
                  ";
                      } else {

                        echo "

                  <h5 class='font-weight-bolder'>Rp. $totalseragam</h5>
                  
                  ";
                      }

                      ?>




                    <?php

                    }
                    ?>

                    <!-- <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+3%</span>
                since last week
              </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>






      </div>


    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Pemasukan Uang Kegiatan Bulan Ini
                    </p>
                    <?php
                    error_reporting(0);


                    $sql = ("SELECT format(SUM(tb_cicilan_kegiatan.bayar),0) as kegiatanmasuk FROM tb_cicilan_kegiatan WHERE MONTH(tb_cicilan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_kegiatan.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $totalkegiatan   = $row['kegiatanmasuk'];

                    ?>



                      <?php

                      if ($totalkegiatan == '') {
                        echo "
                   <h5 class='font-weight-bolder'>Rp. 0</h5>
                   ";
                      } else {

                        echo "

                   <h5 class='font-weight-bolder'>Rp. $totalkegiatan</h5>
                   
                   ";
                      }

                      ?>




                    <?php

                    }
                    ?>
                    <!-- <p class="mb-0">
                 <span class="text-danger text-sm font-weight-bolder">-2%</span>
                 since last quarter
               </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Pemasukan Uang Gedung Bulan Ini
                    </p>
                    <?php
                    error_reporting(0);


                    $sql = ("SELECT format(SUM(tb_cicilan_gedung.bayar),0) as gedungmasuk FROM tb_cicilan_gedung WHERE MONTH(tb_cicilan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_gedung.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $totalgedung   = $row['gedungmasuk'];

                    ?>



                      <?php

                      if ($totalgedung == '') {
                        echo "
                   <h5 class='font-weight-bolder'>Rp. 0</h5>
                   ";
                      } else {

                        echo "

                   <h5 class='font-weight-bolder'>Rp. $totalgedung</h5>
                   
                   ";
                      }

                      ?>




                    <?php

                    }
                    ?>
                    <!-- <p class="mb-0">
                 <span class="text-danger text-sm font-weight-bolder">-2%</span>
                 since last quarter
               </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>







    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Total Pemasukan Bulan Ini
                    </p>
                    <?php
                    error_reporting(0);


                    $sql = ("SELECT format((SELECT SUM(tb_cicilan_spp.bayar) FROM tb_cicilan_spp WHERE MONTH(tb_cicilan_spp.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_spp.tanggal)=YEAR(curdate())) + (SELECT SUM(tb_cicilan_seragam.bayar) FROM tb_cicilan_seragam WHERE MONTH(tb_cicilan_seragam.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_seragam.tanggal)=YEAR(curdate())) +  (SELECT SUM(tb_cicilan_kegiatan.bayar) FROM tb_cicilan_kegiatan WHERE MONTH(tb_cicilan_kegiatan.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_kegiatan.tanggal)=YEAR(curdate())) + (SELECT SUM(tb_cicilan_gedung.bayar) FROM tb_cicilan_gedung WHERE MONTH(tb_cicilan_gedung.tanggal)=MONTH(curdate()) AND YEAR(tb_cicilan_gedung.tanggal)=YEAR(curdate())),0) as total");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $total   = $row['total'];

                    ?>



                      <?php

                      if ($total == '') {
                        echo "
                   <h5 class='font-weight-bolder'>Rp. 0</h5>
                   ";
                      } else {

                        echo "

                   <h5 class='font-weight-bolder'>Rp. $total</h5>
                   
                   ";
                      }

                      ?>




                    <?php

                    }
                    ?>

                  </div>
                </div>



                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <footer class="footer pt-3">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">


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
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("line-chart-gradient").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($data_tanggal) ?>,
        datasets: [{
          label: "Penghasilan",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: <?php echo json_encode($data_total) ?>,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#fbfbfb",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
  <script>
    var ctx1 = document.getElementById("line-chart-gradient2").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($order_bulan) ?>,
        datasets: [{
          label: "Jumlah Order",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: <?php echo json_encode($order_total) ?>,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#fbfbfb",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
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

  <script type="text/javascript" src="../assets/js/datetime.js"></script>
  <script type="text/javascript">
    window.onload = date_time('date_time');
  </script>
</body>

</html>