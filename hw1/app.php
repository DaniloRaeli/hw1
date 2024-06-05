<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP KFC</title>
    <link rel="icon" type="image/png" href="image/images.png">
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
    <link href="https://static.openfoodfacts.org/data/delta/{mhw2.js}" rel="style">
    <link href="https://www.kfc.it/fonts/National2CondensedBold.woff2" rel="style">
</head>
<body>
<header>
        <div id="flex-container">
            <nav>
                <a href="mondokfc.php">Il mondo KFC</a>
                <a href="lavorare.php">Lavora con noi</a>
                <a href="franchise.php">Diventa franchisee</a>
                <a href="logout.php">Logout</a>
            </nav>
            <div id="auth-links">
        <a id="login" href="login_mio.php">Login</a>
        <a href="signup_mio.php" >Registrati</a>
          </div>
            </div>
        </div>
        <div class="flex-item">
            <img id="logo" src="image/kfc.png" alt="Logo">
            <div id="nav2">
                <a  href="prodotti.php" class="nav-link" onclick="toggleDropdownProdotti()"><strong data-action="dropdown_prodotti">I prodotti</strong></a>
               
                <a href="prodotti.php" class="nav-link" onclick="toggleDropdownNovita()"><strong data-action="dropdown_novita">Le novità</strong></a>
               
                <a href="carrello.php" class="nav-link"><strong>Carrello</strong></a>
                <a href="app.php" class="nav-link"><strong>App KFC</strong></a>
            </div>
            <img id="icon" src="image/omino.png" alt="Icon">
            <div id="f">
                <a><strong>Benvenuto <?php echo  $username; ?>, inizia ad ordinare </strong></a>
                <div>
                    <a href="prodotti.php">ORDINA ORA</a>
                </div>
            </div>
        </div>
    </header>
    <div>
    <img id="fr" src="image/KFC_app_3840x1066_68334b0d1d.jpeg">
    <div class="text-overlay">APP KFC</div>
</div>
<br>
<span> Home > </span>  <span class="grassetto">APP KFC</span>
<br/>
<br></br>
<div class="box_franchise">
        <div class="mini_box1">
            <h1>ORDINA DALL’APP, SALTA LA <br>
            FILA E GODITI I COUPON!</h1>
            <p>Lasciati stupire dal nostro Pollo e gustalo dove, come e… con chi <br>vuoi! Grazie all’app ufficiale KFC puoi ordinare il meglio delle nostre <br>ricette in pochi click, in modo comodo, veloce e conveniente! Nella <br>sezione “Prodotti” puoi scoprire tutti i dettagli delle specialità che <br>ami, tra le “News” ti informi su tutte le novità di KFC e, infine, tra i <br>“Coupon” puoi trovare le offerte più gustose, da cogliere al volo. <br>Cosa aspetti? Scaricala subito!</p>
        </div>
        <div class="image_cont_fr">
        <img src="image/icon_app_5e2c12ebbc.svg" alt="Immagine" class="image_franchise">
    </div>
    </div>
    <br><br><br>
    <div class="centrato-grande">I VANTAGGI DELL'APP</div>
    <br>
    <div class="large_red_box">
        <img src="image/KFC_App_ebf82ce31c.png" alt="Immagine Centrata" class="centered_image">
    </div>
    <body>
    <br>
    <br><br>
    <br>
    <div class="container_random_xyz">
        <div class="box_random_abc" id="box_random_1">
            <img src="image/icon_esplora_6a15eb26d2.svg" alt="Immagine 1">
            <h2>ESPLORA</h2>
            <p>Scarica l’app da Play Store o da App Store ed effettua la registrazione. Accedere come utente registrato ti permette di ordinare tramite l’app e ritirare il tuo delizioso Pollo fritto nel ristorante più vicino. Inoltre, hai accesso a <strong>Coupon digitali esclusivi</strong></p>
        </div>
        <div class="box_random_abc" id="box_random_2">
            <img src="image/icon_ordina_baca88d0d8.svg" alt="Immagine 2">
            <h2>ORDINA</h2>
            <p>Esplora le funzioni dell’app: <strong>il servizio Clicca&amp;Ritira</strong>, la sezione “Prodotti” per scoprire la qualità di ingredienti e materie prime, la sezione “Coupon”, le “Novità” per essere sempre aggiornato sulle nostre ultime offerte e il “Trova Ristorante” per individuare il KFC più vicino a te.</p>
        </div>
        <div class="box_random_abc" id="box_random_3">
            <img src="image/icon_scarica_addbde342b.svg" alt="Immagine 3">
            <h2>SCARICA</h2>
            <p>Ordina con Clicca&amp;Ritira: accedi all’app come utente registrato e clicca su “Ordina”, scegli il ristorante e seleziona la modalità di ritiro; aggiungi al carrello i tuoi prodotti e <strong>paga in app, così salti la coda!</strong></p>
        </div>
    </div>
        <div class="nav_footer2">
        <div id="Testo_footer2">SCOPRI L’APP KFC E APPROFITTA
            <br>DELLE OFFERTE ESCLUSIVE
        </div>
        <div id="image_f2"></div>
        <div id="bottom_f2"><a href="app.php">SCOPRI DI PIÙ</a></div>
    </div>
</body>
</html>