<?php
    //variables de connection
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $dbname = 'gestion_pla';
    //fin des variables de connection

    //connexion a la bdd
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli($host, $username, $password, $dbname);
    mysqli_set_charset($mysqli, 'utf8mb4');
    // affichage d'un message de réussite si connecté
    printf("Success... %s\n", mysqli_get_host_info($mysqli));
    //fin de la connection à la bdd
?>