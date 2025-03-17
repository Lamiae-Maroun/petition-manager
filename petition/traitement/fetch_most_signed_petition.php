<?php
// Inclure le fichier de gestion de la base de données
require_once '../BD/petition.php';

// Récupérer la pétition la plus signée
$petition = getMostSignedPetition();

// Si une pétition est trouvée, retourner les données
if ($petition) {
    echo json_encode($petition); // Retourner en format JSON
} else {
    echo json_encode(["message" => "Aucune pétition trouvée."]);
}
?>
