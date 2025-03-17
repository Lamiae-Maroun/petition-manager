<?php

include("../bd/connexion.php");

header('Content-Type: application/json');

try {
   
    $sql = "SELECT IDP, Titre, (SELECT COUNT(*) FROM signatures WHERE signatures.IDP = petitions.IDP) AS Signatures
            FROM petitions
            ORDER BY IDP DESC
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $petition = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($petition) {
        echo json_encode($petition);
    } else {
        echo json_encode(["IDP" => null]); 
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur lors de la récupération de la pétition."]);
}
?>
