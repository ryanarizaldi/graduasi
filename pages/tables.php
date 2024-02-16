<?php
include "../actions/cons.php";
session_start();
if (isset($_SESSION['stsLogin'])) {
  if (!$_SESSION['stsLogin']) {
    header("location:login.php?logout=2");
  }
} else {
  header("location:login.php?logout=2");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Graduasi KUR</title>
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
  <!-- Nucleo Icons -->
  <!-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../assets/css/sweetalert2.min.css" rel="stylesheet" />
  <link href="../assets/css/datatables.min.css" rel="stylesheet" />
  <link href="../assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="../assets/css/buttons.bootstrap5.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <!-- <link id="pagestyle" href="../assets/css/flatpicker.min.css" rel="stylesheet" /> -->
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
        <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo" /> -->
        <span class="ms-1 font-weight-bold center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SIGRA</span> <br>
        <span class="ms-1 font-weight-bold">Sistem Informasi Graduasi KUR</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" href="../pages/tables.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="../assets/img/grads.svg" alt="" width="20px" height="20px">
            </div>
            <span class="nav-link-text ms-1">Graduasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/logs.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="../assets/img/grads.svg" alt="" width="20px" height="20px">
            </div>
            <span class="nav-link-text ms-1">Log Messages</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
              Tables
            </li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tables</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">

            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../actions/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
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
              <h6>Laporan Graduasi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="p-0">
                <div class="container-fluid">
                  <!-- <form action="<?= $_SERVER['SERVER_NAME'] . "/graduasi/actions/reportGraduasiAction.php" ?>" method="post"> -->
                  <form action="../actions/reportGraduasiAction.php" method="post">
                    <div class="row">
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Laporan </label>
                            <select class="form-control" id="jnsLap" name="jnsLap">
                              <option value="1">Nominatif</option>
                              <option value="2">Rekap</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-month-input" class="form-control-label">Periode Awal</label>
                          <input class="form-control" type="month" id="pAwal" name="pAwal" value="2023-01">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-month-input" class="form-control-label">Periode Akhir</label>
                          <input class="form-control" type="month" id="pAkhir" name="pAkhir" value="2023-02">
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Bulan Awal</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="01">January</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="">Mei</option>
                              <option value="">Juni</option>
                              <option value="">July</option>
                              <option value="">Agustus</option>
                              <option value="">September</option>
                              <option value="">Oktober</option>
                              <option value="">November</option>
                              <option value="">Desember</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Tahun</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                            </select>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-5"></div>
                      <div class="col-md-2">
                        <div class="">
                          <a class="btn btn-primary" id="inqReportGrad" onclick="inqReport()">Submit</a>
                        </div>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4" id="tblNominatif" hidden>
            <div class="card-header pb-0">
              <h6>Table Nominatif Graduasi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="row">
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-4"></div>
                <div class="col-2">
                  <div class="ml-auto">
                    <!-- <a class="btn btn-success" id="exportNomi" onclick="exportTableToExcel('exportedTableNomi')">export to excel</a> -->
                  </div>
                </div>
              </div>

              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="exportedTableNomi">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">
                        No
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                        Nomor Rekening
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Nama Debitur
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        NIK
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        CIF
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Tanggal Akad
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Skema
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Nama Skema
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Skema Graduasi
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        No Rek. Lama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Tanggal Akad Rek. Lama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                        Skema Rek. Lama
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <!-- <tr>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                    </tr> -->

                  </tbody>

                </table>

              </div>
            </div>
          </div>
          <div class="card mb-4" id="tblRekap" hidden>
            <div class="card-header pb-0">
              <h6>Rekap Graduasi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="row">
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-4"></div>
                <div class="col-2">
                  <!-- <div class="ml-auto">
                    <a class="btn btn-success" id="exportNomi" onclick="exportTableToExcel('exportedTableRekap')">export to excel</a>
                  </div> -->
                </div>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="exportedTableRekap">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-sm font-weight-bolder">
                        Periode
                      </th>
                      <th class="text-uppercase text-sm font-weight-bolder ps-2">
                        KUR Super Mikro &#8680; Mikro
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        KUR Super Mikro &#8680; Kecil
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        KUR Super Mikro &#8680; Komersil
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        KUR Mikro &#8680; Kecil
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        KUR Mikro &#8680; Komersil
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        KUR Kecil &#8680; Komersil
                      </th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">
                        Total
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbodyRekap">
                    <!-- <tr>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>01010101</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                      <td class="align-middle text-center">
                        <span>Nama</span>
                      </td>
                    </tr> -->

                  </tbody>

                </table>
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
                , made <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Digital Development</a>

              </div>
            </div>

          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/popper.min.js"></script> -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/datatables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
  <script src="../assets/js/buttons.bootstrap5.min.js"></script>
  <script src="../assets/js/act/report.js"></script>
  <!-- <script src="../assets/js/act/export.js"></script> -->
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/core/sweetalert2.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!-- <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> -->
  <!-- <script type="text/javascript">
    $(document).ready(function() {
      // $('#example').DataTable();
      $('#exportedTableNomi').DataTable({
        dom: 'Blfrtip',
        pageLength: 50,
        dom: 'Bfrtip',
        buttons: [
          // 'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          // 'pdfHtml5'
        ]
      });
    });
  </script> -->
  <script>
    // new DataTable('#exportedTableNomi');
    // new DataTable('#exportedTableRekap');

    // $('#exportedTableNomi').DataTable({
    //   buttons: [
    //     'copy', 'excel', 'pdf'
    //   ]
    // });

    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>
  <!-- Github buttons -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <!-- <script src="../assets/js/plugins/flatpicker.min.js"></script> -->
</body>

</html>