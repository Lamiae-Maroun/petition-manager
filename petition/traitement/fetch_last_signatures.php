<?php
require_once '../BD/signature.php';

if (!isset($_GET['idP']) || empty($_GET['idP'])) {
    echo json_encode(["error" => "IDP non spécifié"]);
    exit;
}

$idP = $_GET['idP']; // Récupération de l'IDP
$signatures = getLastFiveSignatures($idP);

if ($signatures === false) {
    echo json_encode(["error" => "Erreur lors de la récupération des signatures."]);
} else {
    echo json_encode($signatures);
}
?>
