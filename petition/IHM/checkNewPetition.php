<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "Petition";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$query = $pdo->query("SELECT MAX(date_creation) AS DatePublic FROM petition");
$lastPetitionDate = $query->fetch(PDO::FETCH_ASSOC)['last_date'];

$lastCheck = $_SESSION['last_check'] ?? 0;

if (strtotime($lastPetitionDate) > $lastCheck) {
    $_SESSION['last_check'] = time(); 
    echo "new";
} else {
    echo "";
}

$pdo = null;
?>