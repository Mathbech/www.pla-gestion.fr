<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once('./includes/log.php');
isloggedin();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
        <?php
        include_once('includes/_navbar.php');
        nav($username);
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php
            include_once('./includes/_sidebar.php');
            side($username);
            ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modifier votre profil</h4>
                    <p class="card-description">Modifier votre profil</p>
                    <form class="forms-sample" method="post" action="./includes/acount.php">
                        <!-- <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputEmail3">Modifier votre email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Modifier votre Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Modifier le mot de passe</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Modifier le mot de passe">
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleSelectGender">Gender</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Ajouter un photo de profil">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="mettre à jour">
                        <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include_once('./includes/_footer.php');
        footer();
        ?>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>