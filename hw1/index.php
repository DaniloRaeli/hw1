<?php
session_start();


if (isset($_SESSION["_agora_username"])) {
    $username = $_SESSION["_agora_username"];
    $user_id = $_SESSION["_agora_user_id"];
   
} else {
  
    $username = "Ospite";
    $user_id = "N/D";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KFC</title>
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
    <br/>
    <br/>
    <div>
    <a href="prodotti.php"><img id="HOME_ICON" src="image/KFC_Promo_Calcio_Website_3840x1866_c2a626196e.webp" alt="Home" onmouseover="changeImage()" onmouseout="resetImage()"></a>
       <img id="stripes" src="image/3-stripes.svg" alt="3">
       <div id="c">
        <div class="art"></div>
        <div class="Testo">
        </br>ORDINA 
    </br>
    DALL’APP E 
</br>
SCOPRI I 
</br>
COUPON 
</br>
ESCLUSIVI!
</br>
<div class="Testo1">
</br>Scegli la modalità d’ordine che preferisci, aggiungi al
</br>carrello i tuoi prodotti preferiti, paga in App e salta la 
</br>fila in cassa!
 </div>
 <div class="Bottom">
    <a href="app.php">Scopri di più</a>
 </div>
 </div>
 </div>
 </div>
<div class="g">
    <img id="Burger" src="image/COLONEL_aa5cb3329f.webp" alt="Home">
    <p id="Testo2">Prodotti</p>
    <p id="Testo3">
    </br>SCOPRI IL 
    </br>NUOVO 
    </br>COLONEL’S 
    </br>BURGER
    </p>
    <p id="Testo4"></br>Preparato rigorosamente con le <strong>11 erbe e spezie della </strong>
    </br><strong> ricetta originale.</strong>
    </br>Il miglior burger di Pollo, garantisce il colonnello!
    </p>
    <p id="Bottom2">
        <a href="prodotti.php">Scopri di più</a>
    </p>
</div>
<div class="t"></div>
    <img id="Bucket" src="image/img_bucket_per2_719f7fe32e.webp" alt="Buck">
<h2 id="Testo6">
    Mangiato in compagnia, il Pollo ha ancora più gusto! È 
    <br>disponibile in 4 irresistibili varianti, provale tutte!
</h2>
<p id="Bottom3">
   <a href="prodotti.php"> Scopri di più</a>
</p>
<div class="p">
    <h1 id="Testo7">La qualità KFC</h1>
    <h1 id="Testo8">
        <br>Tre
        <br>RICETTE
        <br>PER TUTTI I
        <br>GUSTO
    </h1>
    <h2 id="Testo9">Per dare al nostro Pollo <strong>inimitabile sapore KFC.</strong></h2>
    <h3 id="Bottom4"><a href="prodotti.php">Scopri le ricette</a></h3>
</div>
<div class="n">
    <div  id="flex-item1"><a href="lavorare.php">Lavora con noi</a></div>
    <div   id="flex-item2"><a href="franchise.php">Diventa franchisee</a></div>
</div>
    <div class="nav_footer">
        <div id="Testo_footer">SCOPRI L’APP KFC E APPROFITTA
            <br>DELLE OFFERTE ESCLUSIVE
        </div>
        <div id="image_f"></div>
        <div id="bottom_f"><a href="app.php">SCOPRI DI PIÙ</a></div>
    </div>
</body>
</html>