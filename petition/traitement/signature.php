<?php
require_once "../BD/petition.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de pétition non valide !");
}

$idp = $_GET['id'];
$petition = getPetitionById($idp);

if (!$petition) {
    die("Pétition introuvable !");
}


include "../IHM/Signature.php";
?>
