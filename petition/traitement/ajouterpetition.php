<?php
require_once '../BD/petition.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $titre = $_POST['titre'];
    $description = $_POST['description'];
  
    $dateFinP = $_POST['dateFinP'];
    $porteurP = $_POST['porteurP'];
    $email = $_POST['email'];

 
    if (ajouterPetition($titre, $description,$dateFinP, $porteurP, $email)) {
      
    touch(__FILE__); 
    header('Location: listepetition.php');
    exit();
    }
}
include "../IHM/ajouterPetition.php";
?>

