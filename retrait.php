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
        include_once('./includes/_navbar.php');
        nav($username, $id);
        ?>
        <div class="container-fluid page-body-wrapper">
            <!-- Inclure sidebar avec php -->
            <?php
            include_once('./includes/_sidebar.php');
            side($username, $id);

            include_once('./includes/connect.php');
            if (isset($_POST['delete'])) {
                $delete_ids = $_POST['delete'];
                foreach ($delete_ids as $delete_id) {
                    $sql = "DELETE FROM filament WHERE id_users = $id AND id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(array(':id' => $delete_id));
                }
            }

            // Récupération des données de la table "filament"
            $sql = "SELECT * FROM filament WHERE id_users = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            ?>
            <div class="row">
                <form method="post">
                    <div class="col-lg-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Retrait de stock</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Catégorie </th>
                                            <th> Nombre </th>
                                            <th> Couleur </th>
                                            <th> Prix </th>
                                            <th> Date de l'ajout </th>
                                            <th> Select </th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    // Affichage des données dans un tableau HTML
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo ($i); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($row['categorie']); ?>
                                                </td>
                                                <td>
                                                    <p>
                                                        <?php echo ($row['nombre']); ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php echo ($row['couleur']); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($row['prix'] . ' €'); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($row['date_ajout']); ?>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="delete[]"
                                                        value="<?php echo $row['id']; ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </table>
                                <input type="submit" value="retirer" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- inclure footer -->
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