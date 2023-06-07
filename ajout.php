<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once(__DIR__.'/includes/log.php');
isloggedin();


if(!empty($_POST['type']) && !empty($_POST['nb_bobine']) && !empty($_POST['poids']) && !empty($_POST['color']) && !empty($_POST['price'])){
    require('./includes/connect.php');
    // Mise ne variable des données reçut en POST
    $categorie = $_POST['type'];
    $nb_bobine = $_POST['nb_bobine'];
    $poids = $_POST['poids'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    //Fin de la mise en varriable


    //Insérer une ligne dans la table de données
    $q = $conn->prepare("INSERT INTO filament (categorie, nombre, couleur, poid, prix, id_users) VALUES (:cate, :nb_bobine, :color, :poids, :price, :id)");
    $q->bindValue('cate', $categorie);
    $q->bindValue('nb_bobine', $nb_bobine);
    $q->bindValue('poids', $poids);
    $q->bindValue('color', $color);
    $q->bindValue('price', $price);
    $q->bindValue('id', $id);
        
    $result = $q->execute();

    if($result){
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
    if(isset($_POST)){
        ?>
    <div class="container-scroller">
        <?php
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
                        <h4 class="card-title">Ajout de stock</h4>
                        <p class="card-description"> Veuillez remplir le formulaire pour ajouter du stock </p>
                        <form class="forms-sample" method="post" action="./ajout.php">
                            <div class="form-group row">
                                <label for="type_de_filament" class="col-sm-3 col-form-label">Type de filament</label>
                                <div class="col-sm-9">
                                    <select name="type" class="typeFilament" id="type_de_filament">
                                        <option value="">Sélectionnez le type de filament</option>
                                        <option value="PLA">PLA</option>
                                        <option value="PETG">PETG</option>
                                        <option value="ABS">ABS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre_bobine" class="col-sm-3 col-form-label">Nombre de bobine</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nb_bobine" class="qte" id="nombre_bobine" placeholder="Nombre de bobine">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="poids" class="col-sm-3 col-form-label">Poids de la bobine</label>
                                <div class="col-sm-9">
                                    <input type="text" name="poids" class="poids" id="poids" placeholder="Poids">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="couleur_filament" class="col-sm-3 col-form-label">couleur</label>
                                <div class="col-sm-9">
                                    <input type="text" name="color" class="couleur" id="couleur_filament" placeholder="couleur">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prix" class="col-sm-3 col-form-label">prix payé</label>
                                <div class="col-sm-9">
                                    <input type="text" name="price" class="form-control" id="prix" placeholder="prix payé">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">ajouter</button>
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