<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4 class="footer-title">À propos</h4>
            <p class="footer-text">Plateforme de gestion de pétitions citoyennes</p>
        </div>
        
        <div class="footer-section">
            <h4 class="footer-title">Liens utiles</h4>
            <ul class="footer-links">
                <li><a href="#terms" class="footer-link">CGU</a></li>
                <li><a href="#privacy" class="footer-link">Confidentialité</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4 class="footer-title">Contact</h4>
            <a href="mailto:contact@petitions.com" class="footer-email">contact@petitions.com</a>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p class="footer-copyright">© 2025 Plateforme Pétitions. Tous droits réservés.</p>
    </div>
</footer>

<style>

.footer {
    background-color: #2c3e50;
    color: #ffffff;
    padding: 4rem 0 0;
    margin-top: auto;
}


.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 3rem;
}

/* Sections du footer */
.footer-section {
    margin-bottom: 2rem;
}

/* Titres des sections */
.footer-title {
    font-size: 1.25rem;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background-color: #3498db;
}

/* Éléments de texte */
.footer-text {
    line-height: 1.6;
    color: #ecf0f1;
    max-width: 300px;
}

/* Liens */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-link {
    color: #bdc3c7;
    text-decoration: none;
    display: block;
    padding: 0.5rem 0;
    transition: all 0.3s ease;
}

.footer-link:hover {
    color: #3498db;
    transform: translateX(5px);
}

/* Email de contact */
.footer-email {
    color: #3498db;
    text-decoration: none;
    transition: opacity 0.3s ease;
}

.footer-email:hover {
    opacity: 0.8;
}

/* Section inférieure */
.footer-bottom {
    background-color: rgba(0, 0, 0, 0.1);
    margin-top: 3rem;
    padding: 1.5rem 0;
    text-align: center;
}

.footer-copyright {
    margin: 0;
    font-size: 0.9rem;
    color: #bdc3c7;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .footer-title::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .footer-text {
        margin: 0 auto;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}
</style>