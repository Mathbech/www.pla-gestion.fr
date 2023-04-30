<?php
session_start();
require('./includes/connect.php');
if (!empty($_POST['loggin']) && !empty($_POST['password'])) {
    $username = $_POST['loggin'];
    $password = $_POST['password'];

    //var_dump($username);
    //var_dump($password);
    //Préparation requête pour récupérer les id de l'utilisateur
    $q = $conn->prepare("SELECT id, psw, active FROM `users` WHERE `loggin` = :loggin");
    //Préparation des valeurs
    $q->bindValue('loggin', $username);
    //exécution de la requête
    $q->execute();
    $result = $q->fetch(PDO::FETCH_ASSOC);

    // var_dump($result['id']);

    $err = "";
    //Si résultat obtenu continuer
    if ($result) {
        $id = $result['id'];
        $active = $result['active'];
        $passwordhash = $result['psw'];
        //Vérification du mot de passe
        if (password_verify($password, $passwordhash)) {
            //vérification du compte (actif ou non)
            if ($active == true) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                // echo "Connexion réussie ";
                header('location: ./dashboard.php');
            } else {
                $err = 'Votre compte à été désactivé';
            }
        } else {
            $err = 'Identifiant invalides ou innexistant';
        }
    } else {
        $err = 'Identifiant invalides ou innexistant';
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
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
    <?php 
    if(isset($_POST)){
        ?>
    <div class="container-scroller">
    <?php
        include_once('./includes/_navbar.php');
        navd('Non connecté');
        ?>
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="./assets/images/logo-dark.svg">
                            </div>
                            <h4>Bonjour, on est parti !</h4>
                            <h6 class="font-weight-light">Connecte toi pour continuer.</h6>
                            <form class="pt-3" method="post" action="./index.php">
                                <div class="form-group">
                                    <input type="text" name="loggin" class="form-control form-control-lg" id="username" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                <p class="text-danger"><?php if (isset($err)) echo ($err); ?></p>
                                <p class="text-success"><?php if (isset($valid)) echo ($valid); ?></p>
                                </div>
                                <div class="mt-3">
                                    <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Se connecter">
                                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="dashboard.php">SIGN IN</a> -->
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <!-- <div class="form-check">
                                        <label class="form-check-label text-muted"><input type="checkbox" class="form-check-input"> Se souvenir de moi </label>
                                    </div> -->
                                    <!-- <a href="#" class="auth-link text-black">Mot de passe oublié?</a> -->
                                </div>
                                <div class="text-center mt-4 font-weight-light"> 
                                    Tu n'as pas de compte? <a href="register.php" class="text-primary">Créé le!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <?php
        include_once('./includes/_footer.php');
        footer();
        ?>
    </div>

    <?php
    }
        
    ?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>