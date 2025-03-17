<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Liste des pétitions avec mise à jour dynamique.">
    <title>Liste des Pétitions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="container">
        <h1>Liste des Pétitions</h1>
        <div id="most-signed-petition">
            <strong>Pétition la plus signée :</strong>
            <p id="petition-content">Chargement...</p>
        </div>
        <table>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de Publication</th>
                <th>Date de Fin</th>
                <th>Porteur</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($petitions)): ?>
                <?php foreach ($petitions as $petition): ?>
                    <tr>
                        <td><?= htmlspecialchars($petition['Titre']) ?></td>
                        <td><?= htmlspecialchars($petition['Description']) ?></td>
                        <td><?= htmlspecialchars($petition['DatePublic']) ?></td>
                        <td><?= htmlspecialchars($petition['DateFinP']) ?></td>
                        <td><?= htmlspecialchars($petition['PorteurP']) ?></td>
                        <td><?= htmlspecialchars($petition['Email']) ?></td>
                        <td><a href="../traitement/signature.php?id=<?= htmlspecialchars($petition['IDP']) ?>">Signer</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucune pétition trouvée.</td>
                </tr>
            <?php endif; ?>
        </table>
        <a class="ajt" href="../traitement/ajouterpetition.php">Ajouter une nouvelle pétition</a>
    </div>
    <?php include("footer.php"); ?>

    <script>
     function fetchMostSignedPetition() {
    var xhttp = new XMLHttpRequest(); 
   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
            
            var data = JSON.parse(this.responseText);

            if (data.Titre) {
                document.getElementById("petition-content").innerHTML = 
                    `Titre: ${data.Titre} - Nombre de signatures: ${data.Signatures}`;
            } else {
                document.getElementById("petition-content").textContent = "Aucune pétition trouvée.";
            }
        } else if (this.readyState == 4) {
          
            console.error("Erreur lors de la récupération des données.");
        }
    };

    xhttp.open("GET", "../traitement/fetch_most_signed_petition.php", true);
    xhttp.send();
}
fetchMostSignedPetition();
setInterval(fetchMostSignedPetition, 10000);

    </script>
</body>
</html>







<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .container {
        width: 85%;
        margin: 20px auto;
        margin-top: 60px;
        background: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        flex-wrap: wrap;
    }

    h1 {
        color: #007acc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007acc;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .ajt {
        text-decoration: none;
        color: #007acc;
        background-color: white;
        padding: 10px 15px;
        border-radius: 5px;
        border: #007acc solid 2px;
        display: inline-block;
        margin: 20px 0;
        box-shadow: 1px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .ajt:hover {
        background-color: #007acc;
        color: white;
    }

    #most-signed-petition {
        background: #e3f2fd;
        padding: 15px;
        margin: 20px auto;
        width: 60%;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    #new-petition-notification{
        background:rgb(254, 255, 255);
        padding: 6px;
        margin: 20px auto;
        width: 90%;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    #most-signed-petition strong{
        color: #005f99;
    }
    span{
        color: black;
    }
    #new-petition-notification {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #27ae60;
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
    display: none;
    opacity: 1;
    transition: opacity 0.5s ease;
    z-index: 1000;
}

#new-petition-notification strong {
    display: block;
    margin-bottom: 5px;
    font-size: 1.1em;
}
</style>