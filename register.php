<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription</title>
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
    session_start();
    if(isset($_SESSION['err'])){
        $bug = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    if(isset($_SESSION['valid'])){
        $val = $_SESSION['valid'];
        unset($_SESSION['valid']);
    }
    if(isset($_POST)){
        ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="./assets/images/logo-dark.svg">
                            </div>
                            <h4>Tu es nouveau?</h4>
                            <h6 class="font-weight-light">inscrit toi, c'est gratuit et rapide. En quelques étapes c'est
                                fait</h6>
                            <form class="pt-3" method="post" action="./register.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="username" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="cpassword" id="exampleInputPassword2" placeholder=" Confirmer le Mot de passe">
                                </div>
                                <div class="mb-4">
                                    <p class="text-danger"><?php if (isset($bug)) echo ($bug); ?></p>
                                    <p class="text-success"><?php if (isset($val)) echo ($val); ?></p>

                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> J'accepte les termes et les conditions </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="./dashboard.php">S'INSCRIRE</a> -->
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="S'inscrire">
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Tu as déjà un compte? <a href="index.php" class="text-primary">connecte toi!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <?php
    }
    $err = "";
    $valid = "";
    require('./includes/connect.php');

    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($pass == $cpassword) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ " , $email)){

            var_dump($username);
            var_dump($password);
            var_dump($email);

            $q = $conn->prepare("INSERT INTO users (loggin, mail, psw, active) VALUES (:username, :mail, :psw, :active)");
            $q->bindValue(':username', $username);
            $q->bindValue(':mail', $email);
            $q->bindValue(':psw', $password);
            $q->bindValue('active', true);
            $result = $q->execute();


            if ($result) {
                $valid = 'inscription réussie';
                header('Location: ./index.php');
            }
        }else{
            $err = 'L\'adresse mail n\'est pas valide';
        }
        }else{
            $err = 'Les mots de passes ne correspondent pas!';
        }
    }

    $_SESSION['err'] = $err;
    $_SESSION['valid'] = $valid;

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
</body>

</html>