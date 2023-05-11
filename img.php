<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once('./includes/log.php');
isloggedin();


var_dump($_POST);

// Vérifie si le formulaire a été soumis et qu'un fichier a été uploadé
if(isset($_POST['submit']) && isset($_FILES['image'])) {
    
    // Vérifie si l'extension du fichier est bien .png
    $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if(strtolower($file_extension) != 'png') {
        echo "Le fichier doit être au format PNG.";
        exit();
    }
    
    // Récupère l'ID de l'utilisateur et crée un nouveau nom de fichier avec le préfixe "profil_" et l'ID
    $user_id = $id; // Remplacer par l'ID de l'utilisateur
    $new_file_name = 'profil_' . $user_id . ".png";
    echo "Le nouveau nom de fichier est : " . $new_file_name;
    
    // Déplace le fichier uploadé dans le dossier de destination avec le nouveau nom de fichier
    move_uploaded_file($_FILES['image']['tmp_name'], '/var/www/html/www.pla-gestion.fr/uploads/photoprofil/' . $new_file_name);

    if (!move_uploaded_file($_FILES['image']['tmp_name'], '/var/www/html/upload/' . $new_file_name)) {
        echo "\n Erreur lors de l'enregistrement du fichier : " . $_FILES['image']['error'];
        exit();
    }else{
        echo "L'image a été uploadée avec succès.";
        exit();
    }
}
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
    <?php if (isset($_POST)) { ?>
        <div class="container-scroller">
            <?php
            include_once('includes/_navbar.php');
            // nav($username);
            ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <?php
                include_once('./includes/_sidebar.php');
                // side($username);
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier votre profil</h4>
                        <p class="card-description">Modifier votre profil</p>
                        <form class="forms-sample" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="image">
                                <!-- <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Ajouter un photo de profil">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div> -->
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="submit" value="submit">
                        </form>
                        </div>
                    </div>
                </div>

    <?php
        include_once('./includes/_footer.php');
        footer();
    }
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