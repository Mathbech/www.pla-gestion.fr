<!-- Début de la fonction nav -->
<?php
function nav($username, $id)
{
    ?>
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.php"><img src="./../assets/images/logo-dark.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="./../assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <!-- Minimiser la sidebar -->
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <!-- Fin du diminuer la sidebar -->

            <ul class="navbar-nav navbar-nav-right">
                <!-- Navigation sur le profil -->
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="./../uploads/photoprofil/profil<?php echo($id); ?>.png" alt="Photo de profil">
                            <!-- <i class="bi bi-person-circle"></i> -->
                        </div>
                        <!-- Indication du nom d'utilisateur -->
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">
                                <?php echo $username; ?>
                            </p>
                        </div>
                        <!-- Fin de l'indication du nom d'utilisateur -->
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                        aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                        <div class="p-3 text-center bg-primary">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="./../uploads/photoprofil/profil<?php echo($id); ?>.png" alt="Photo profil">
                            <!-- <i class="bi bi-person-circle"></i> -->
                            <h2>
                                <?php echo $username; ?>
                            </h2>

                        </div>
                        <!-- Menu déroulant des options de l'utilisateur -->
                        <div class="p-2">
                            <h5 class="dropdown-header text-uppercase pl-2 text-dark">Options d'utilisateur</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                                <span>Boite de réception</span>
                                <span class="p-0">
                                    <span class="badge badge-primary">3</span>
                                    <i class="mdi mdi-email-open-outline ml-1"></i>
                                </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="./settings.php">
                                <span>Profil</span>
                                <span class="p-0">
                                    <span class="badge badge-success">1</span>
                                    <i class="mdi mdi-account-outline ml-1"></i>
                                </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="./settings.php">
                                <span>Paramètres</span>
                                <i class="mdi mdi-settings"></i>
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="./includes/logout.php">
                                <span>Déconnexion</span>
                                <i class="mdi mdi-logout ml-1"></i>
                            </a>
                        </div>
                        <!-- Fin du menu déroulant -->
                    </div>
                </li>
                <!-- Fin de la navigation sur le profil -->
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <?php
}
?>
<!-- Fin de la fonction nav -->