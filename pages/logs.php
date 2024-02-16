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
    <title>Log Messages</title>
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
                <span class="ms-1 font-weight-bold center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SIGARUK</span> <br>
                <span class="ms-1 font-weight-bold">Sistem Informasi Graduasi KUR</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0" />
        <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/tables.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <img src="../assets/img/grads.svg" alt="" width="20px" height="20px">
                        </div>
                        <span class="nav-link-text ms-1">Graduasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../pages/logs.php">
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
                            Log Messages
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Log Messages</h6>
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
                            <h6>Log Messages</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-0">
                                <div class="container-fluid">
                                    <form action="../actions/logsAction.php" method="post">
                                        <div class="row">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-month-input" class="form-control-label">Periode Awal</label>
                                                    <input class="form-control" type="date" id="pAwal" name="pAwal">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-month-input" class="form-control-label">Periode Akhir</label>
                                                    <input class="form-control" type="date" id="pAkhir" name="pAkhir">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-2">
                                                <div class="">
                                                    <a class="btn btn-primary" id="inqReportGrad" onclick="inqLogs()">Submit</a>
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
                    <!-- <div class="card mb-4" id="tblLogs" hidden> -->
                    <div class="card mb-4" id="tblLogs" hidden>
                        <div class="card-header pb-0">
                            <h6>Table Log Messages</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-3"></div>
                                <div class="col-4"></div>
                                <div class="col-2">
                                </div>
                            </div>

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="exportedTableNomi">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-xs font-weight-bolder">
                                                No
                                            </th>
                                            <th class="text-uppercase text-xs font-weight-bolder">
                                                Timestamp
                                            </th>
                                            <th class="text-uppercase text-xs font-weight-bolder">
                                                Messages
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <br><br><br> -->
            <footer class="footer pt-3 ">
                <div class="container-fluid fixed-bottom">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4 ml-auto">
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
    <script src="../assets/js/act/reportLog.js"></script>
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