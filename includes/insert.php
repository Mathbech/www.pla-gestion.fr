<?php
require('./connect.php');

$categorie = $_POST['type'];
$nb_bobine = $_POST['nb_bobine'];
$poids = $_POST['poids'];
$color = $_POST['color'];
$price = $_POST['price'];

var_dump($_POST);

$q = $conn->prepare("INSERT INTO filament (categorie, nombre, couleur, poid, prix) VALUES (:cate, :nb_bobine, :poids, :color, :price)");
$q->bindValue('cate', $categorie);
$q->bindValue('nb_bobine', $nb_bobine);
$q->bindValue('poids', $poids);
$q->bindValue('color', $color);
$q->bindValue('price', $price);

$result = $q->execute();

if ($result) {
    header('location: ../ajout.php');
}

?>