<?php
session_start();

require_once('./includes/log.php');
isloggedin();

$timezone = date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- inclure la nav bar php -->
        <?php
        $username = "utilisateur";
        
        include_once('./includes/_navbar.php');
        nav($username);
        ?>
        <div class="container-fluid page-body-wrapper">
            <!-- Inclure sidebar avec php -->
            <?php
            include_once('./includes/_sidebar.php');
            side($username);
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="d-xl-flex justify-content-between align-items-start">
                        <h2 class="text-dark font-weight-bold mb-2"> Dashboard </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content tab-transparent-content">
                                <div class="tab-pane fade show active" id="business-1" role="tabpanel"
                                    aria-labelledby="business-tab">
                                    <div class="row">
                                        <?php 
                                            include_once('./includes/bobine.php');
                                            card();
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-4">
                                                                <h4 class="card-title mb-0">Activitée récente</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
                                                            <div class="wrapper pb-5 border-bottom">
                                                                <div
                                                                    class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                                                    <p class="mb-0 text-dark">Profit Total</p>
                                                                    <span class="text-success"><i
                                                                            class="mdi mdi-equal"></i>0.00%</span>
                                                                </div>
                                                                <h3 class="mb-0 text-dark font-weight-bold">0.00€</h3>
                                                                <canvas id="total-profit"></canvas>
                                                            </div>
                                                            <div class="wrapper pt-5">
                                                                <div
                                                                    class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                                                    <p class="mb-0 text-dark">Dépenses</p>
                                                                    <span class="text-danger"><i
                                                                            class="mdi mdi-arrow-down"></i>800%</span>
                                                                </div>
                                                                <h3 class="mb-4 text-dark font-weight-bold">800.00€</h3>
                                                                <canvas id="total-expences"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
                                                            <div class="pl-0 pl-lg-4 ">
                                                                <div
                                                                    class="d-xl-flex justify-content-between align-items-center mb-2">
                                                                    <div
                                                                        class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                                                        <h3
                                                                            class="text-dark font-weight-bold mr-2 mb-0">
                                                                            Impressions vendues</h3>
                                                                        <h5 class="mb-0">( growth 0% )</h5>
                                                                    </div>
                                                                    <div class="d-lg-flex">
                                                                        <p class="mr-2 mb-0">Timezone:</p>
                                                                        <p class="text-dark font-weight-bold mb-0"> <?php echo $timezone ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="graph-custom-legend clearfix"
                                                                    id="device-sales-legend"></div>
                                                                <canvas id="device-sales"></canvas>
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
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <?php
                include_once('./includes/_footer.php');
                ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./assets/vendors/chart.js/Chart.min.js"></script>
    <script src="./assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>