<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once('./includes/log.php');
isloggedin();


require_once('./includes/connect.php');
if (isset($_POST)) {
    $q = $conn->prepare("SELECT mail, psw FROM `users` WHERE `loggin` = :loggin");
    //Préparation des valeurs
    $q->bindValue(':loggin', $username);
    //exécution de la requête
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $passwordhash = $data['psw'];
}


if (isset($_POST['email'])) {
    if (isset($_POST['apassword'])) {
        $apassword = $_POST['apassword'];
        $err = "";
        $valid = "";
        if (password_verify($apassword, $passwordhash)) {
            // if($apassword === $passwordhash) {
            if ($_POST['email'] === $data['mail']) {
                if (isset($_POST['password']) && isset($_POST['cpassword'])) {
                    // var_dump($_POST);
                    $mail = $_POST['email'];
                    $pass = $_POST['password'];
                    $cpassword = $_POST['cpassword'];

                    if ($pass == $cpassword) {
                        $password = password_hash($pass, PASSWORD_DEFAULT);
                        // var_dump($password);
                        $r = $conn->prepare("UPDATE users SET psw = :pswd WHERE id = :id");
                        // $r->bindValue(':email', $mail);
                        $r->bindValue(':pswd', $password);
                        $r->bindValue(':id', $id);
                        $result = $r->execute();

                        if ($result) {
                            $valid = 'Mot de passe modifié avec succès';
                        } else {
                            $err = 'Une erreur est survenue';
                        }
                    } else {
                        $err = 'Les mots de passes ne correspondent pas!';
                    }
                } else {
                    $err = 'Merci de remplir les champs de mot de passe';
                }
            } else {

                $mail2 = $_POST['email'];
                $r2 = $conn->prepare("UPDATE users SET mail = :email WHERE id = :id");
                $r2->bindValue(':email', $mail2);
                $r2->bindValue(':id', $id);
                $result2 = $r2->execute();

                if ($result2) {
                    $valid = 'Email modifié avec succès';
                }
            }
        } else {
            $err = 'L\'ancien mot de passe saisie n\'est pas correct';
        }
    } else {
        $err = 'Merci de saisir votre ancien mot de passe';
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
            nav($username, $id);
            ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <?php
                include_once('./includes/_sidebar.php');
                side($username, $id);
                ?>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier votre profil</h4>
                        <p class="card-description">Modifier votre profil</p>
                        <form class="forms-sample" method="post" action="./settings.php">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Modifier votre email</label>
                                <input type="email" name="email" value="<?php echo ($data['mail']); ?>" class="form-control" id="exampleInputEmail3" placeholder="Modifier votre Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Entrez votre mot de passe</label>
                                <input type="password" name="apassword" class="form-control" id="exampleInputPassword4" placeholder="Entrez votre mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Modifier le mot de passe</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Modifier le mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Confirmez le mot de passe</label>
                                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword4" placeholder="Confirmez le mot de passe">
                            </div>
                            <p class="text-danger">
                                <?php if (isset($err))
                                    echo ($err) ?>
                            </p>
                            <p class="text-success">
                                <?php if (isset($valid))
                                    echo ($valid) ?>
                            </p>
                            <input type="submit" class="btn btn-primary mr-2" value="mettre à jour">
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