<?php
require_once "connexion.php";


function getAllPetitions() {
    global $pdo;
    $sql = "SELECT * FROM Petition ORDER BY DatePublic DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getPetitionById($idp) {
    global $pdo;
    $sql = "SELECT * FROM Petition WHERE IDP = :idp";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idp' => $idp]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function ajouterPetition($titre, $description, $dateFinP, $porteurP, $email) {
    
    global $pdo;

    $sql = "INSERT INTO Petition (Titre, Description, DateFinP, PorteurP, Email)
            VALUES (:titre, :description, :dateFinP, :porteurP, :email)";
    
    $stmt = $pdo->prepare($sql);
    
    
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':dateFinP', $dateFinP);
    $stmt->bindParam(':porteurP', $porteurP);
    $stmt->bindParam(':email', $email);

   
    return $stmt->execute();
}



function getMostSignedPetition() {
    global $pdo;

   
    $sql = "SELECT p.Titre, COUNT(s.IDS) AS Signatures
            FROM Petition p
            LEFT JOIN Signature s ON p.IDP = s.IDP
            GROUP BY p.IDP
            ORDER BY Signatures DESC
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getLatestPetitionSince($lastId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM Petition WHERE IDP > ? ORDER BY IDP DESC LIMIT 1");
    $stmt->execute([$lastId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
