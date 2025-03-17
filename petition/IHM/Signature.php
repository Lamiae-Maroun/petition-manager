<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signer la Pétition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php include("navbar.php") ?>

    <div class="container">
        <h1>Signer la Pétition : <?= htmlspecialchars($petition['Titre']) ?></h1>
        
        <form action="../traitement/ajouterSignature.php" method="POST">
            <input type="hidden" name="idp" value="<?= htmlspecialchars($idp) ?>">
            
            <div class="form-group">
                <label>Titre :</label>
                <input type="text" name="titre" value="<?= htmlspecialchars($petition['Titre']) ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" required>
            </div>
            
            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" required>
            </div>
            
            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Pays :</label>
                <input type="text" name="pays" required>
            </div>
            
            <button type="submit"><i class="fas fa-signature"></i> Confirmer la signature</button>
        </form>

        <div id="last-signatures">
            <h3><i class="fas fa-history"></i> Dernières signatures</h3>
            <div class="loading">Chargement en cours...</div>
        </div>
    </div>

    <?php include("footer.php") ?>

    <script>
    function fetchLastSignatures() {
        var idP = <?= json_encode($idp); ?>;
        var container = document.getElementById('last-signatures');

        container.querySelector('.loading').style.display = 'block';

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../traitement/fetch_last_signatures.php?idP=" + idP, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                container.querySelector('.loading').style.display = 'none';

                if (xhr.status == 200) {
                    try {
                        var data = JSON.parse(xhr.responseText);
                        var html = '<ul>';

                        if (data.length > 0 && !data.error) {
                            data.forEach(function(signature) {
                                html += `
                                <li>
                                    <div>
                                        <strong>${signature.Prenom} ${signature.Nom}</strong>
                                        <span class="text-muted">${signature.Pays}</span>
                                    </div>
                                    <small>${signature.Date} ${signature.Heure}</small>
                                </li>`;
                            });
                        } else {
                            html += '<li class="text-muted">Aucune signature récente</li>';
                        }

                        html += '</ul>';
                        container.innerHTML = html;
                    } catch (e) {
                        container.innerHTML = '<div class="error">Erreur d\'affichage des données</div>';
                    }
                } else {
                    container.innerHTML = '<div class="error">Erreur de connexion</div>';
                }
            }
        };
        xhr.send();
    }


    fetchLastSignatures();
    
    setInterval(fetchLastSignatures, 10000);
    </script>
</body>



<style>
     
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 80px 0px 0px;
            color: #2c3e50;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: 2px solid #3498db;
        }

      
        .form-group {
            margin-bottom: 1.5rem;
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 1rem;
            align-items: center;
        }

        label {
            font-weight: 500;
            color: #4a5568;
        }

        input {
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        input[readonly] {
            background: #f8f9fb;
            cursor: not-allowed;
        }

        button[type="submit"] {
            background: #3498db;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
            margin-top: 1rem;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        /* Dernières signatures */
        #last-signatures {
            margin-top: 2.5rem;
            padding: 1.5rem;
            background: #f8f9fb;
            border-radius: 8px;
        }

        #last-signatures h3 {
            color: #2c3e50;
            margin-bottom: 1.2rem;
            font-size: 1.4rem;
        }

        #last-signatures ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #last-signatures li {
            padding: 12px 15px;
            margin: 8px 0;
            background: white;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .form-group {
                grid-template-columns: 1fr;
            }

            label {
                margin-bottom: 0.5rem;
            }
        }

        .loading {
            position: relative;
            color: #a0aec0;
        }

        .loading::after {
            content: "";
            display: inline-block;
            margin-left: 10px;
            width: 16px;
            height: 16px;
            border: 2px solid #e2e8f0;
            border-top-color: #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

</html>