
<?php
require_once "../BD/petition.php";

// Récupérer la liste des pétitions
$petitions = getAllPetitions();

// Inclure la page d'affichage
include "../IHM/ListePetition.php";
?>
