<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mondo KFC</title>
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
    <img id="fr" src="image/KFC_brand_3840x1066_cbd20c5216.jpeg">
    <div class="text-overlay">IL BRAND KFC</div>
</div>
<br/>
<span> Home > </span>  <span class="grassetto">Il brand KFC</span>
<div class="centrato-grande">I VALORI DI KFC</div>
<div class="container_box">
        <div class="box_c">
            <img src="image/icon_responsabilita_6728a2ac0b.svg" alt="Icona 1">
            <h2>RESPONSABILITÀ</h2>
            <p>Noi di KFC Italia ci impegniamo attivamente nella lotta contro lo spreco alimentare attraverso il nostro progetto Harvest Program. In collaborazione con la Fondazione Banco Alimentare, recuperiamo e doniamo le eccedenze alimentari dei nostri ristoranti dal 2017. La nostra determinazione per contrastare tale spreco, si traduce in un impegno concreto per aiutare la comunità e promuovere uno stile di vita sostenibile. KFC è stata la prima azienda della ristorazione veloce in Italia ad intraprendere un’iniziativa di recupero e donazione dei prodotti non venduti durante l’arco della giornata.</p>
        </div>
        <div class="box_c">
            <img src="image/icon_qualita_952213e327.svg" alt="Icona 2">
            <h2>QUALITÀ</h2>
            <p>La bontà del nostro Pollo deriva dalla cura con cui selezioniamo le materie prime e dalle rigide procedure di preparazione nei nostri ristoranti. Effettuiamo controlli costanti in ogni fase della lavorazione e tracciamo l'intera filiera, dall'allevamento, ai fornitori e dipendenti, fino alla degustazione in tutti i KFC. Per noi la sicurezza alimentare è un principio fondamentale su cui lavoriamo costantemente attraverso procedure molto restrittive e analisi periodiche condotte da laboratori accreditati in tutte le fasi del processo produttivo.</p>
        </div>
    </div>
    <div id="third-box" class="box">
        <img src="image/icon_originalita_75f470f0af.svg" alt="Icona 3">
        <h2>ORIGINALITÀ</h2>
        <p>Grazie alla nostra ricetta segreta Original Recipe, alle nostre spezie uniche e al tipo di lavorazione e preparazione del Pollo, siamo diventati un’icona dell’originalità culinaria. Da oltre 80 anni, il nostro Pollo fritto rimane inimitabile e inconfondibile, offrendo un'esperienza di gusto autentica e indimenticabile per i nostri clienti. Perché il nostro Pollo viene riconosciuto in tutto il mondo? Perché la qualità e la fragranza del nostro Pollo dipendono dal fatto che viene preparato al momento, ogni giorno, nelle cucine dei nostri ristoranti dai cuochi KFC.</p>
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
