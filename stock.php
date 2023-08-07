<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once(__DIR__ . '/includes/log.php');
isloggedin();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Retrait stock</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <?php
        include_once(__DIR__ . '/includes/_navbar.php');
        nav($username, $id);
        ?>
        <div class="container-fluid page-body-wrapper">
            <!-- Inclure sidebar avec php -->
            <?php
            include_once(__DIR__ . '/includes/_sidebar.php');
            side($username, $id);
            include_once(__DIR__ . '/includes/connect.php');
            // Récupération des données de la table "filament"
            $sql = "SELECT * FROM filament WHERE id_users = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $filaments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="row">
                <form method="post">
                    <div class="col-lg-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Modification du stock</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Catégorie </th>
                                            <th> Nombre </th>
                                            <th> Couleur </th>
                                            <th> Poids </th>
                                            <th> prix </th>
                                            <th> Date de l'ajout </th>
                                            <th> Select </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($filaments as $filament) {
                                        ?>
                                            <tr>
                                                <td><?php echo ($filament['categorie']); ?></td>
                                                <td><?php echo ($filament['nombre']); ?></td>
                                                <td><?php echo ($filament['couleur']); ?></td>
                                                <td><?php echo ($filament['poid']); ?> Kg</td>
                                                <td><?php echo ($filament['prix'] . ' €'); ?></td>
                                                <td><?php echo ($filament['date_ajout']); ?></td>
                                                <td>
                                                    <a class="btn btn-secondary" href="./change.php?id=<?= $filament['id']; ?>">Modifier Cet ajout</a>
                                                    <a class="btn btn-secondary" href="./retrait.php?id=<?= $filament['id']; ?>">Supprimer cet ajout</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <a class="btn btn-primary" href="./ajout.php">Ajouter du stock</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- inclure footer -->
        <?php
        include_once(__DIR__ . '/includes/_footer.php');
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