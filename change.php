<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once(__DIR__ . '/includes/log.php');
isloggedin();
require('./includes/connect.php');
// var_dump($_GET);
if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (isset($_POST)) {
        $r = $conn->prepare("SELECT categorie, couleur, nombre, poid FROM `filament` WHERE `id` = :ident");
        //Préparation des valeurs
        $r->bindValue(':ident', $_GET['id']);
        //exécution de la requête
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
    }
    $idfil = $_GET['id'];
}else{
    header('Location: stock.php');
}


if (!empty($_POST['nb_bobine']) && !empty($_POST['poids'])) {
    // Mise ne variable des données reçut en POST
    $idf = $_POST['id'];
    $nb_bobine = $_POST['nb_bobine'];
    $poids = $_POST['poids'];
    //Fin de la mise en varriable


    //Insérer une ligne dans la table de données
    $q = $conn->prepare("UPDATE filament SET nombre = ':nb_bobine', poid = ':poid' WHERE id = :id");
    $q->bindValue(':nb_bobine', $nb_bobine);
    $q->bindValue(':poid', $poids);
    $q->bindValue(':id', $idf);

    $result = $q->execute();
    var_dump($_POST);

    if ($result) {
        header('Location: stock.php');
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajout stock</title>
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
    <?php
    if (isset($_POST)) {
    ?>
        <div class="container-scroller">
            <?php
            var_dump($data);
            // Inclure la navbar avec php
            include_once('./includes/_navbar.php');
            nav($username, $id);
            ?>
            <div class="container-fluid page-body-wrapper">
                <!-- Inclure sidebar avec php -->
                <?php
                include_once('./includes/_sidebar.php');
                side($username, $id);
                ?>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modification de stock</h4>
                            <form class="forms-sample" method="post" action="./change.php">
                            <div class="form-group row">
                                    <label for="categorie" class="col-sm-3 col-form-label">Catégorie bobine</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="categorie" id="categorie" value="<?php echo($data['categorie']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="couleur" class="col-sm-3 col-form-label">Couleur</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="couleur" id="couleur" value="<?php echo($data['couleur']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre_bobine" class="col-sm-3 col-form-label">Nombre de bobine</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nb_bobine" class="qte" id="nombre_bobine" value="<?php echo($data['nombre']); ?>" placeholder="Nombre de bobine">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="poids" class="col-sm-3 col-form-label">Poids des bobines</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="poids" class="poids" id="poids" value="<?php echo($data['poid']); ?>" placeholder="Poids">
                                        <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <?php
            include_once('./includes/_footer.php');
            footer();
            ?>
            <!-- partial -->
            <!-- main-panel ends -->
            <!-- page-body-wrapper ends -->
        </div>
    <?php
    }
    ?>


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