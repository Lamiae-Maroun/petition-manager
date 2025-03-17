<?php
require_once "../BD/Signature.php";  


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idp'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pays'])) {

    $idp = $_POST['idp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pays = $_POST['pays'];

    
    if (ajouterSignature($idp, $nom, $prenom, $email, $pays)) {
        
        header("Location: ../traitement/listepetition.php");
        exit(); 
    } else {
        
        echo "Erreur lors de l'ajout de la signature.";
    }
} else {
    
    header("Location: ../traitement/listepetition.php");
    exit();
}
?>
