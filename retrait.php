<?php
session_start();
$idu = $_SESSION['id'];

require_once(__DIR__.'/includes/log.php');
isloggedin();

include_once(__DIR__.'/includes/connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `filament` WHERE `id`=:id;";

    $query = $conn->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    header('Location: ./stock.php');
}