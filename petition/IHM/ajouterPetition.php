<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Pétition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="form-container">
        <h1>Ajouter une Pétition</h1>
        <form action="../traitement/ajouterpetition.php" method="POST" id="petitionForm">
            <div class="form-grid">
                <div class="dv">
                   
                    <div class="form-field-group">
                        <label class="form-label" for="titre">Titre</label>
                        <div class="input-container">
                            <input type="text" name="titre" id="titre" class="form-input" required>
                            <i class="fas fa-heading input-icon"></i>
                        </div>
                    </div>

                    <div class="form-field-group">
                        <label class="form-label" for="porteurP">Porteur</label>
                        <div class="input-container">
                            <input type="text" name="porteurP" id="porteurP" class="form-input" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>
                </div>
                
                <div class="dv">
               

                    <div class="form-field-group">
                        <label class="form-label" for="dateFinP">Date fin</label>
                        <div class="input-container">
                            <input type="date" name="dateFinP" id="dateFinP" class="form-input" required>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="form-field-group">
                <label class="form-label" for="email">Email</label>
                <div class="input-container">
                    <input type="email" name="email" id="email" class="form-input" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>

            <div class="form-field-group">
                <label class="form-label" for="description">Description</label>
                <div class="input-container">
                    <textarea name="description" id="description" class="form-input form-textarea" required></textarea>
                    <i class="fas fa-align-left input-icon" style="top: 20px;"></i>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i>
                Publier la pétition
            </button>
        </form>
    </div>
    <?php include("footer.php") ?>
</body>



<style>
    body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 80px 0px 0px;
            color: #2c3e50;
        }
   
    .form-container {
        max-width: 700px;
        margin: 2rem auto;
      
        padding: 2rem;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    h1 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: 2px solid #3498db;
        }
   
    .form-field-group {
        margin-bottom: 1.8rem;
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #2d3748;
        font-size: 0.95rem;
    }

    .input-container {
        position: relative;
        margin-bottom: 1.2rem;
        
    }

    .form-input {
        width: 95%;
        padding: 12px 14px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #f8fafc;
    }

    .form-input:focus {
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        background: #fff;
        outline: none;
    }

    
    .form-textarea {
        min-height: 120px;
        resize: vertical;
        line-height: 1.5;
    }

    
.dv{
    display: flex;
    justify-content: center;
    gap: 50px;
}
   
    .submit-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        width: 100%;
        padding: 14px;
        background: #4299e1;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.05rem;
        font-weight: 500;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(66, 153, 225, 0.25);
    }

  
    .input-icon {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #a0aec0;
    }
</style>