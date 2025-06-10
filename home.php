<!-- file eliminabile: home.php -->

<?php
session_start();

    if (!isset($_SESSION['username'])) {
        // Se l'utente non è loggato, reindirizza al login
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
    <html lang="it">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
            <title>LuigiBuscemi.MyProtein.it</title>
            <link rel="stylesheet" href="mhw1_3.css">
        </head>
        <body>
            <script src="mhw1.js" defer></script>

            <header>
            <!-- Header con logo, barra di ricerca, login e carrello -->
            <section class="header">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 433 55" fill="#003942" data-astro-cid-r6zccy7c="">
                    <path d="M56.6 0.5V54.6H34.9V36.9C34.9 34.7 35.5 32.6 36.7 30.7L56.6 0.5ZM0 0.5V54.6H21.7V36.9C21.7 34.7 21.1 32.6 19.9 30.7L0 0.5ZM153 33V45.9H160.9V33L172.8 12.3H163.9L157 25.2L150.1 12.3H141.3L153 33ZM197.8 12.3H183.9V45.8H191.8V33.8H197.8C205.2 33.8 209.8 29.9 209.8 23C209.8 16.6 205.7 12.3 197.8 12.3ZM191.8 27.5V19.1H196.3C199.2 19.1 201.1 20.4 201.1 23.3C201.1 25.8 199.6 27.5 196.3 27.5H191.8ZM220.8 45.9H228.7V32.6H232L240 45.8H249.2L240.3 31.5C245.1 30.3 247.8 27 247.8 22.1C247.8 15.8 243.3 12.3 235.7 12.3H220.8V45.9ZM228.7 26.9V19.3H234.9C237.6 19.3 239.1 20.7 239.1 23.1C239.1 25.4 237.7 26.9 234.9 26.9H228.7ZM275.3 46.4C285.8 46.4 292.8 39.6 292.8 29C292.8 18.5 285.8 11.7 275.3 11.7C264.8 11.7 257.8 18.5 257.8 29C257.8 39.6 264.8 46.4 275.3 46.4ZM275.3 39C270.2 39 266.5 35.3 266.5 29C266.5 22.8 270.1 19 275.3 19C280.5 19 284.1 22.8 284.1 29C284.1 35.4 280.5 39 275.3 39ZM310.2 45.9H318.2V19H328.4V12.3H300.1V19H310.3V45.9H310.2ZM364.3 45.9V38.9H347.5V32H362.3V25.5H347.5V19.2H363.9V12.3H339.6V45.8H364.3V45.9ZM387.7 12.3H379.8V45.8H387.7V12.3ZM411.1 45.9V25.4L424.1 45.8H433V12.3H425.2V33.3L412.2 12.3H403.3V45.8H411.1V45.9ZM121.4 12.3L110.3 32.9L99.2 12.2H90.3V45.7H98.1V25.4L106.9 41.8H113.9L122.7 25.5V45.9H130.5V12.3H121.4Z"></path>
                </svg>
            
                <div class="header-right">
                <div class="menu">
                
                <button class="hamburger" id="hamburger" onclick="toggleMenu()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960""><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </button>
                

                <!-- Menu mobile con sottocategorie -->
                <div class="mobile-menu" id="mobileMenu">
                    <div class="close-btn" onclick="toggleMenu()">✕</div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Proteine" class="title">Proteine</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('proteineSub')">></button>
                    </div>
                    
                    <!-- <a class="title" href="#" onclick="toggleSubmenu('proteineSub')">Proteine</a>  -->
                    <div class="submenu" id="proteineSub">
                        <a href="#">Whey Protein</a>
                        <a href="#">Proteine Isolate</a>
                        <a href="#">Proteine Vegane</a>
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Nutrizione" class="title">Nutrizione</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('nutrizioneSub')">></button>
                    </div>
                    <div class="submenu" id="nutrizioneSub">
                        <a href="#">BCAA</a>
                        <a href="#">EAA</a>
                        <a href="#">Omega 3</a>
                        <a href="#"><L-carnitina></a>
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Vitamine" class="title">Vitamine</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('vitamineSub')">></button>
                    </div>
                    <div class="submenu" id="vitamineSub">
                        <a href="#">Amminoacidi</a>
                        <a href="#">Pre-workout</a>
                        <a href="#">Post-workout</a>
                        <a href="#">Intra-workout</a>
                        <a href="#">Omega 3</a>
                        <a href="#">Creatina</a>
                        
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Activewear" class="title">Activewear</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('activewearSub')">></button>
                    </div>
                    <div class="submenu" id="activewearSub">
                        <a class="title" href="#">Uomo</a>
                        <a href="#">Giacche</a>
                        <a href="#">Felpe</a>
                        <a href="#">T-shirt</a>
                        <a href="#">Canotte</a>
                        <a href="#">Pantaloncini</a>
                        <a href="#">Tute</a>

                        <a class="title" href="#">Donna</a>
                        <a href="#">Giacche</a>
                        <a href="#">Felpe</a>
                        <a href="#">T-shirt</a>
                        <a href="#">Canotte</a>
                        <a href="#">Reggiseni sportivi</a>
                        <a href="#">Joggers</a>
                        <a href="#">Leggins</a>
                        <a href="#">Pantaloncini</a>
                        <a href="#">Tute</a>
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=SnackDrink" class="title">Snack & Drink</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('snack&drinkSub')">></button>
                    </div>
                    
                    <div class="submenu" id="snack&drinkSub">
                        <a class="title" href="#">Snack</a>
                        <a href="#">Barrette proteiche</a>
                        <a href="#">Cookies proteici</a>
                        <a href="#">Brownie proteici</a>

                        <a class="title" href="#">Drink</a>
                        <a href="#">Bevanda proteica</a>
                        <a href="#">Energy drink</a>

                        
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Alimentazione%20vegana" class="title">Alimentazione vegana</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('alimentazioneVeganaSub')">></button>
                    </div>
                    <div class="submenu" id="alimentazioneVeganaSub">
                        <a class="title" href="#">Snack vegani</a>
                        <a href="#">Barrette proteiche vegane</a>
                        <a href="#">Cookies proteici vegani</a>
                        <a href="#">Brownie proteici vegani</a>

                        <a class="title" href="#">Proteine vegane</a>
                        <a href="#">Proteine vegane</a>
                        <a href="#">Vegan Clear Protein</a>

                        
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Performance" class="title">Performance</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('performanceSub')">></button>
                    </div>
                    <div class="submenu" id="performanceSub">
                        <a class="title" href="#">Proteine</a>

                        <a class="title" href="#">Amminoacidi e Pre-Workout</a>

                        <a class="title" href="#">Recupero</a>

                        <a class="title" href="#">Linea Pro</a>

                        
                    </div>

                    <div class="menu-item">
                        <a href="categoria.html?categoria=Gestione%20del%20peso" class="title">Gestione del peso</a>
                        <button class="submenu-toggle" onclick="toggleSubmenu('GestioneDelPesoSub')">></button>
                    </div>
                    <div class="submenu" id="GestioneDelPesoSub">
                        <a class="title" href="#">Definisci il tuo obbiettivo</a>

                        <a class="title" href="#">Perdita di peso</a>

                        <a class="title" href="#">Aumento del peso</a>
                        

                        
                    </div>

                    <!-- Puoi aggiungere altre sezioni e sottocategorie così -->
                </div>
                
                
                </div>   


                <div class="search-block">
                    <svg class ="search" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.4404 20.56L18.0604 16.18C18.0604 16.18 17.6304 16.68 17.3904 16.92C17.1504 17.16 16.6204 17.61 16.6204 17.61L21.0104 22L22.4504 20.56H22.4404ZM10.5604 4.03C7.20043 4.03 4.47043 6.76 4.47043 10.12C4.47043 13.48 7.20043 16.21 10.5604 16.21C13.9204 16.21 16.6504 13.49 16.6504 10.12C16.6504 6.75 13.9304 4.03 10.5604 4.03ZM10.5604 2C15.0404 2 18.6804 5.64 18.6804 10.12C18.6804 14.6 15.0404 18.24 10.5604 18.24C6.08043 18.24 2.44043 14.6 2.44043 10.12C2.44043 5.64 6.07043 2 10.5604 2Z" fill="currentColor"></path>
                    </svg>
                    <input type="text" class="search-bar" placeholder="Search">
                </div>
                
                <div class="dropmenu">
                    <button>
                        <svg class="login" xmlns="http://www.w3.org/2000/svg"  data-astro-cid-r6zccy7c="" aria-hidden="true">
                            <path d="M12 2C11.0111 2 10.0444 2.29324 9.22215 2.84265C8.3999 3.39206 7.75904 4.17295 7.3806 5.08658C7.00216 6.00021 6.90315 7.00555 7.09607 7.97545C7.289 8.94536 7.7652 9.83627 8.46447 10.5355C9.16373 11.2348 10.0546 11.711 11.0245 11.9039C11.9945 12.0969 12.9998 11.9978 13.9134 11.6194C14.827 11.241 15.6079 10.6001 16.1573 9.77785C16.7068 8.95561 17 7.98891 17 7C17 5.67392 16.4732 4.40215 15.5355 3.46447C14.5979 2.52678 13.3261 2 12 2ZM12 10C11.4067 10 10.8266 9.82405 10.3333 9.49441C9.83994 9.16476 9.45542 8.69623 9.22836 8.14805C9.0013 7.59987 8.94189 6.99667 9.05764 6.41473C9.1734 5.83279 9.45912 5.29824 9.87868 4.87868C10.2982 4.45912 10.8328 4.1734 11.4147 4.05764C11.9967 3.94189 12.5999 4.0013 13.1481 4.22836C13.6962 4.45542 14.1648 4.83994 14.4944 5.33329C14.8241 5.82664 15 6.40666 15 7C15 7.79565 14.6839 8.55871 14.1213 9.12132C13.5587 9.68393 12.7956 10 12 10ZM21 21V20C21 18.1435 20.2625 16.363 18.9497 15.0503C17.637 13.7375 15.8565 13 14 13H10C8.14348 13 6.36301 13.7375 5.05025 15.0503C3.7375 16.363 3 18.1435 3 20V21H5V20C5 18.6739 5.52678 17.4021 6.46447 16.4645C7.40215 15.5268 8.67392 15 10 15H14C15.3261 15 16.5979 15.5268 17.5355 16.4645C18.4732 17.4021 19 18.6739 19 20V21H21Z" ></path>
                        </svg>
                    </button>
                    <div class="login-content">
                        <div class="auth-section">
                            <h1>Benvenuto, <?php echo htmlspecialchars($username); ?>!</h1>
                            <a href="logout.php" class="login-btn">Logout</a>
                            
                        </div>
                        <a href="#">Il mio conto</a>
                        <a href="#">Lista dei desideri</a>
                        <a href="#">I tuoi ordini</a>
                    </div>
                </div>
                
                <button>
                    <svg class ="cart" xmlns="http://www.w3.org/2000/svg" data-astro-cid-r6zccy7c="" aria-hidden="true">
                        <path d="M6.57413 10H17.3932L13.37 4.18336L15.0022 3L19.8439 10H21C21.5523 10 22 10.4477 22 11C22 11.5523 21.5523 12 21 12L17.5279 19.8123C17.2069 20.5345 16.4906 21 15.7003 21H8.29975C7.50937 21 6.79313 20.5345 6.47212 19.8123L3 12C2.44772 12 2 11.5523 2 11C2 10.4477 2.44772 10 3 10H4.11632L9 3L10.6275 4.19017L6.57413 10ZM5.19 12L8.3 19H15.6963L18.81 12H5.19Z"></path>
                    </svg>
                </button>
                     
            </div>
        </section>

       <!-- Navbar con categorie prodotti -->
        <nav class="navbar">
            <div class="nav-menu">
                <a href="categoria.html?categoria=Proteine">Proteine</a>
                <a href="categoria.html?categoria=Nutrizione">Nutrizione</a>
                <a href="categoria.html?categoria=Activewear">Activewear</a>
                <a href="categoria.html?categoria=SnackDrink">Snack & Drink</a>
                <a href="categoria.html?categoria=Alimentazione%20vegana">Alimentazione Vegana</a>
                <a href="categoria.html?categoria=Performance">Performance</a>
                <a href="categoria.html?categoria=Gestione%20del%20peso">Gestione del Peso</a> 
            </div>   
        </nav> 

        
        <!-- Dropdown dinamico -->
        <div id="dropdown-menu">
            <div id="dropdown-content"></div>
        </div>



    </header>
    
    <div class="image-conteiner">
        <img id= 'slider-image' src="immagini/start/start_images.jpg" alt="img_presentazione" class="custom-image" data-index= "0">
        <button class="arrow-btn left">&#10094;</button>
        <button class="arrow-btn right">&#10095;</button>
    </div>
    <div class="consigliati">
        <h1>Consigliati per te!</h1>
    </div>
    <section class="products">
        <div class="product">
            <img src="immagini/proteine/impact_whey_protein.jpg" alt="IMPACT WHEY PROTEIN">
            <h2>IMPACT WHEY PROTEIN</h2>
            <p class="price" data-eur="24.99">€24.99</p>
            <a class="acquista" href="login.html">Acquista</a>
            <!-- <button>Acquista</button> -->
        </div>
        <div class="product">
            <img src="immagini/proteine/impact_whey_isolate.jpg" alt="IMPACT WHEY ISOLATE">
            <h2>IMPACT WHEY ISOLATE</h2>
            <p class="price" data-eur="29.99">€29.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/proteine/vegan_protein.jpg" alt="VEGAN PROTEIN">
            <h2>VEGAN PROTEIN</h2>
            <p class="price" data-eur="26.99">€26.99</p>
            <a class="acquista" href="login.html">Acquista</a>        
        </div>
        <div class="product">
            <img src="immagini/integrazione/creatina.jpg" alt="CREATINA MONOIDRATO">
            <h2>CREATINA MONOIDRATO</h2>
            <p class="price" data-eur="19.99">€19.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/integrazione/multivitaminico.jpg" alt="MULTIVITAMINICO">
            <h2>MULTIVITAMINICO Whey</h2>
            <p class="price" data-eur="15.99">€15.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/integrazione/omega3.jpg" alt="OMEGA-3">
            <h2>OMEGA-3</h2>
            <p class="price" data-eur="9.99">€9.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
         <div class="product">
            <img src="immagini/active-wear/t-shirt_men.jpg" alt="T-SHIRT SPORTIVA">
            <h2>T-SHIRT SPORTIVA</h2>
            <p class="price" data-eur="23.99">€23.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
         <div class="product">
            <img src="immagini/active-wear/canotta_men.jpg" alt="CANOTTA SPORTIVA MEN">
            <h2>CANOTTA SPORTIVA MEN</h2>
            <p class="price" data-eur="19.99">€19.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>

        <div class="bundle">
            <img src="immagini/start/bandle1.jpg" alt="Immagine 1">
            <img src="immagini/start/bandle2.jpg" alt="Immagine 2">
            <img src="immagini/start/bandle3.jpg" alt="Immagine 3">
        </div>


        <div class="product">
            <img src="immagini/active-wear/shorts_men.jpg" alt="PANTALONCINI SPORTIVI">
            <h2>PANTALONCINI SPORTIVI</h2>
            <p class="price" data-eur="29.99">€29.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/snak/protein_bar.jpg" alt="BARRETTA PROTEICA">
            <h2>BARRETTA PROTEICA</h2>
            <p class="price" data-eur="16.99">€16.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/snak/protein_brownie.jpg" alt="BROWNIE PROTEICO">
            <h2>BROWNIE PROTEICO</h2>
            <p class="price" data-eur="16.99">€16.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/snak/protein_cookie.jpg" alt="COOKIE PROTEICO">
            <h2>COOKIE PROTEICO</h2>
            <p class="price" data-eur="28.99">€28.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/performance/pre_wo.jpg" alt="MISCELA PRE-WORKOUT">
            <h2>MISCELA PRE-WORKOUT</h2>
            <p class="price" data-eur="20.99">€20.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/performance/bcaa.jpg" alt="BCAA ESSENZIALI">
            <h2>BCAA ESSENZIALI</h2>
            <p class="price" data-eur="9.99">€9.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>
        <div class="product">
            <img src="immagini/performance/energy_gel.jpg" alt="ENERGY GEL">
            <h2>ENERGY GEL</h2>
            <p class="price" data-eur="22.99">€22.99</p>
            <a class="acquista" href="login.html">Acquista</a>
        </div>

    </section>
    
    <div class="image-conteiner">
                <img id= 'slider-image' src="immagini/start/start_images.jpg" alt="img_presentazione" class="custom-image" data-index= "0">
                <button class="arrow-btn left">&#10094;</button>
                <button class="arrow-btn right">&#10095;</button>
    </div>

    <div class="imgbox">
            <img src="immagini/start/footer1.jpg" alt="Immagine 1">
            <img src="immagini/start/footer2.jpg" alt="Immagine 2">
            <img src="immagini/start/footer3.jpg" alt="Immagine 3">
            <img src="immagini/start/footer4.jpg" alt="Immagine 4">
        </div>

    <section class="api-section">
        <h2>Ultime notizie sul Fitness</h2>
        <div id="news-list" class="news-list">
            <p>Caricamento notizie…</p>
        </div>
    </section>

    <div class="convert-area">
        <label for="currency">Scegli valuta:</label>
        <select id="currency">
            <option value="USD">USD</option>
            <option value="GBP">GBP</option>
            <option value="JPY">JPY</option>
            <option value="CHF">CHF</option>
            <option value="EUR">EUR</option>
        </select>
        <button id="convert-btn">Converti</button>
    </div>
    
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Chi Siamo</h3>
                <p>MyProtein è il leader nella vendita di integratori sportivi di alta qualità.</p>
            </div>
            <div class="footer-section">
                <h3>Link Utili</h3>
                <ul>
                    <li><a href="#">Termini e Condizioni</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Spedizioni e Resi</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contatti</h3>
                <p>Email: --------</p>
                <p>Telefono: --------</p>
            </div>
            <div class="footer-section">
                <h3>Seguici</h3>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram">Ig: --------</i>
                </div>
            </div>
        </div>
        <p class="footer-bottom">&copy; 2025 MyProtein Luigi Buscemi - Tutti i diritti riservati.</p>
    </footer>

</body>
</html>