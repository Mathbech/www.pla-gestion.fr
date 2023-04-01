<?php
    //variables de connection
    $username = 'web';
    $password = 'adV]GmI3fE[rvOXZ';
    $host = 'localhost';
    $dbname = 'gestion_pla';
    // //fin des variables de connection

    try{
        //Connexion a la base de donnée.
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo"Connecté a la base de donnée";

    }catch(PDOException $e){
        //afficher une erreur de connection a la base de donnée.
        echo "Erreur de connexion à la base de donnée: " . $e->getMessage();
    }

?>