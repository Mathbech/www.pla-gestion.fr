<?php
session_start();
$id = $_SESSION['id'];
require('./connect.php');
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

if ($result) {
    //Si il a exécuter la condition précédente alors renvoyer à la page d'ajout
    header('location: ../ajout.php');
}

?>