<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="nav-logo">Petitions</a>
        <ul class="nav-links">
            <li><a href="../traitement/listepetition.php">Accueil</a></li>
            <li><a href="../traitement/ajouterpetition.php">Ajouter Petition</a></li>
        </ul>
    </div>
</nav>


<style>

.navbar {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 1rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    flex-wrap: wrap;
}


.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
}


.nav-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    text-decoration: none;
    transition: color 0.3s ease;
}

.nav-logo:hover {
    color: #3498db;
}


.nav-links {
    display: flex;
    gap: 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links a {
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #3498db;
}

/* Animation soulignement au survol */
.nav-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: #3498db;
    transition: width 0.3s ease;
}

.nav-links a:hover::after {
    width: 100%;
}


/* Responsive Design */
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }


    .nav-container {
        padding: 0 1rem;
    }
}

/* État actif */
.nav-links a.active {
    color: #3498db;
    font-weight: 600;
}

.nav-links a.active::after {
    width: 100%;
}
/* Navbar */
.navbar {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 1rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    flex-wrap: wrap;
}

/* Conteneur principal */
.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
}

/* Liens */
.nav-links {
    display: flex;
    gap: 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links a {
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #3498db;
}


</style>


