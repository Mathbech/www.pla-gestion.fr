<?php
session_start();
$id = $_SESSION['id'];
require('./connect.php');

$categorie = $_POST['type'];
$nb_bobine = $_POST['nb_bobine'];
$poids = $_POST['poids'];
$color = $_POST['color'];
$price = $_POST['price'];

var_dump($_POST);

$q = $conn->prepare("INSERT INTO filament (categorie, nombre, couleur, poid, prix, id_users) VALUES (:cate, :nb_bobine, :color, :poids, :price, :id)");
$q->bindValue('cate', $categorie);
$q->bindValue('nb_bobine', $nb_bobine);
$q->bindValue('poids', $poids);
$q->bindValue('color', $color);
$q->bindValue('price', $price);
$q->bindValue('id', $id);

$result = $q->execute();

if ($result) {
    header('location: ../ajout.php');
}

?>