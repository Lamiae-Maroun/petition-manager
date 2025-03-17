<?php
require_once "connexion.php";


function addSignature($idp, $nom, $prenom, $pays, $email) {
    global $pdo;
    $sql = "INSERT INTO Signature (IDP, Nom, Prenom, Pays, Date, Heure, Email) 
            VALUES (:idp, :nom, :prenom, :pays, CURDATE(), CURTIME(), :email)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':idp' => $idp,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pays' => $pays,
        ':email' => $email
    ]);
}

function ajouterSignature($idp, $nom, $prenom, $email, $pays) {
    global $pdo;  
    
    
    $sql = "INSERT INTO Signature (IDP, Nom, Prenom, Email, Pays, Date, Heure) 
            VALUES (:idp, :nom, :prenom, :email, :pays, NOW(), NOW())";
    
    
    $stmt = $pdo->prepare($sql);
    
   
    $stmt->bindParam(':idp', $idp);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pays', $pays);
    
   
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getLastFiveSignatures($idP) {
    global $pdo; 

    try {
      
        $stmt = $pdo->prepare("SELECT Nom, Prenom, Date, Heure,Pays FROM signature WHERE idP = :idP ORDER BY Date DESC, Heure DESC LIMIT 5");
        $stmt->execute(['idP' => $idP]); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}

?>
