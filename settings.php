<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

require_once('./includes/log.php');
isloggedin();


require_once('./includes/connect.php');
if (isset($_POST)) {
    $q = $conn->prepare("SELECT mail FROM `users` WHERE `loggin` = :loggin");
    //Préparation des valeurs
    $q->bindValue(':loggin', $username);
    //exécution de la requête
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
}


if (isset($_POST['email'])) {
    if ($_POST['email'] === $data['mail']) {
        if (isset($_POST['password']) && $_POST['cpassword']) {
            $err = "";
            $valid = "";
            // var_dump($_POST);
            $mail = $_POST['email'];
            $pass = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if ($pass == $cpassword) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // var_dump($password);
                $r = $conn->prepare("UPDATE users SET psw = :pswd WHERE id = :id");
                // $r->bindValue(':email', $mail);
                $r->bindValue(':pswd', $password);
                $r->bindValue(':id', $id);
                $result = $r->execute();

                if ($result) {
                    $valid = 'Mot de passe modifié avec succès';
                }

            } else {
                $err = 'Les mots de passes ne correspondent pas!';
            }
        } else {
            $err = 'Merci de remplir les champs de mot de passe';
        }
    } else {
        $mail = $_POST['email'];
        $r1 = $conn->prepare("UPDATE users SET email = :email WHERE id = :id");
        $r1->bindValue(':email', $mail);
        $r1->bindValue(':id', $id);
        $result1 = $r->execute();

        if ($result1) {
            $valid = 'Email modifié avec succès';
        }
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
                        <form class="forms-sample" method="post" action="./settings.php">
                            <!-- <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div> -->
                            <div class="form-group">
                                <label for="exampleInputEmail3">Modifier votre email</label>
                                <input type="email" name="email" value="<?php echo ($data['mail']); ?>" class="form-control"
                                    id="exampleInputEmail3" placeholder="Modifier votre Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Modifier le mot de passe</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Modifier le mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Confirmez le mot de passe</label>
                                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword4"
                                    placeholder="Confirmez le mot de passe">
                            </div>
                            <!-- <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Ajouter un photo de profil">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div> -->
                            <input type="submit" class="btn btn-primary mr-2" value="mettre à jour">
                        </form>
                        <p>
                            <?php if (!isset($err))
                                echo ($err) ?>
                            </p>
                            <p>
                            <?php if (!isset($valid))
                                echo ($valid) ?>
                            </p>
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