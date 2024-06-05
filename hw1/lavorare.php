<?php
require_once 'auth.php';

// Inizializza l'array degli errori
$errors = [];

// Se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione dei campi
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $data_n = trim($_POST["data_n"]);
    $domicilio = trim($_POST["domicilio"]);
    $provincia = trim($_POST["provincia"]);
    $telefono = trim($_POST["telefono"]);
    $cittadinanza = trim($_POST["cittadinanza"]);
    $ruolo = trim($_POST["ruolo"]);
    $allow = isset($_POST["allow"]) && $_POST["allow"];

    // Validazione del nome
    if (empty($name)) {
        $errors[] = "Inserisci il tuo nome.";
    }

    // Validazione del cognome
    if (empty($surname)) {
        $errors[] = "Inserisci il tuo cognome.";
    }

    // Validazione della data di nascita
    if (empty($data_n)) {
        $errors[] = "Inserisci la tua data di nascita.";
    }

    // Validazione del domicilio
    if (empty($domicilio)) {
        $errors[] = "Inserisci il tuo domicilio.";
    }

    // Validazione della provincia
    if (empty($provincia)) {
        $errors[] = "Inserisci la tua provincia.";
    }

    // Validazione del telefono
    if (empty($telefono)) {
        $errors[] = "Inserisci il tuo numero di telefono.";
    }

    // Validazione della cittadinanza
    if (empty($cittadinanza)) {
        $errors[] = "Inserisci la tua cittadinanza.";
    }

    // Validazione del ruolo
    if (empty($ruolo)) {
        $errors[] = "Seleziona un ruolo.";
    }

    // Accetta l'informativa per il trattamento dei dati personali
    if (!$allow) {
        $errors[] = "Devi dichiarare di aver preso visione dell'informativa per il trattamento dei dati personali.";
    }

    // Se non ci sono errori, registra l'utente
    if (empty($errors)) {
        if (registerCandidate($name, $surname, $data_n, $domicilio, $provincia, $telefono, $cittadinanza, $ruolo)) {
            // Reindirizza l'utente dopo la registrazione
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Si è verificato un errore durante la registrazione. Riprova più tardi.";
        }
    }
}

function registerCandidate($name, $surname, $data_n, $domicilio, $provincia, $telefono, $cittadinanza, $ruolo) {
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $name = mysqli_real_escape_string($conn, $name);
    $surname = mysqli_real_escape_string($conn, $surname);
    $data_n = mysqli_real_escape_string($conn, $data_n);
    $domicilio = mysqli_real_escape_string($conn, $domicilio);
    $provincia = mysqli_real_escape_string($conn, $provincia);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $cittadinanza = mysqli_real_escape_string($conn, $cittadinanza);
    $ruolo = mysqli_real_escape_string($conn, $ruolo);

    $query = "INSERT INTO candidatura (name, surname, data_n, domicilio, provincia, telefono, cittadinanza, ruolo) VALUES ('$name', '$surname', '$data_n', '$domicilio', '$provincia', '$telefono', '$cittadinanza', '$ruolo')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lavora con noi</title>
    <link rel="icon" type="image/png" href="image/images.png">
    <link rel="stylesheet" href="index.css">
    <script src="lavorare.js" defer></script>
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
    <img id="fr" src="image/kfc_lavoraredakfc_3840x1066_402799c6ff.jpeg">
    <div class="text-overlay">LAVORARE DA KFC</div>
</div>
<br/>
<span> Home > </span>  <span class="grassetto">Lavorare da KFC</span>
<div class="centrato-grande">I NOSTRI VALORI</div>
<div class="container_box2">
        <div class="box_c">
            <img src="image/icon_determinazione_82f1644672.svg" alt="Icona 1">
            <h2>DETERMINAZIONE</h2>
            <p>Perseguiamo tutti i nostri obiettivi, anche quelli più ambiziosi, con coraggio e decisione e concentriamo tutte le nostre energie per realizzarli. TENACIA, IMPEGNO costante e MIGLIORAMENTO CONTINUO sono le caratteristiche che ci rendono capaci di realizzare cose incredibili/ imprese straordinarie.</p>
        </div>
        <div class="box_c">
            <img src="image/icon_generosita_727944470d.svg" alt="Icona 2">
            <h2>GENEROSITÀ</h2>
            <p>LIn KFC abbiamo un GRANDE CUORE. Condividiamo tutto con gli altri, senza aspettarci nulla in cambio. Condividiamo idee, informazioni, tempo, risorse, opportunità e anche i successi… perché vogliamo che tutto ciò che circonda le nostre vite sia migliore.</p>
        </div>
        <div class="box_c">
            <img src="image/icon_autenticita_4e76615992.svg" alt="Icona 3">
            <h2>AUTENTICITÀ</h2>
            <p>Giorno dopo giorno, ci impegniamo a migliorare affinché ciascuna delle nostre azioni diventi il riflesso della nostra genuinità. Non abbiamo necessità di copiare dagli altri perché siamo originali e irripetibili… e lo sono anche tutte le persone che fanno parte del nostro mondo. SIAMO LA RICETTA DI KFC, Per questo lasciamo il segno!</p>
        </div>
        <div class="box_c">
            <img src="image/icon_ottimismo_8771af312d.svg" alt="Icona 4">
            <h2>OTTIMISMO</h2>
            <p>Il nostro atteggiamento positivo nei confronti della vita, ci porta ad affrontarla sempre con il sorriso sulle labbra. Con l’allegria che ci contraddistingue trasformiamo le sfide in nuove opportunità da cogliere al volo. Il motto di KFC è “SÍ, SI PUÓ”</p>
        </div>
    </div>
    <img id="stripes" src="image/3-stripes.svg" alt="3">
    <br><br><br><br><br><br><br><br>
    <div class="centrato-grande">I RUOLI IN KFC</div>
    <div class="container2">
        <div class="box2" data-box="1">
            <img src="image/059_Italy_Milan_Exterior_3_a5ec978c7a.jpeg" alt="Immagine 1">
            <p>Il Restaurant Manager di KFC guida con successo la gestione di uno dei nostri ristoranti, aderendo agli standard di qualità del marchio. Obiettivo: massimizzare i risultati finanziari e garantire la sicurezza e la salute del team.</p>
        </div>
        <div class="box2" data-box="2">
            <img src="image/060_Italy_Milan_Exterior_1_8f1a99e502.jpeg" alt="Immagine 2">
            <p>Il Team Leader di KFC garantisce il regolare svolgimento delle operazioni quotidiane. Dinamico e motivato, guida il suo team nel rispetto degli standard e delle procedure aziendali per assicurare la massima soddisfazione dei clienti.</p>
        </div>
        <div class="box2" data-box="3">
            <img src="image/Microsoft_Teams_image_2f9bfc0d3d.jpeg" alt="Immagine 3">
            <p>Il Team Member prepara i prodotti di vendita seguendo le norme HACCP, li confeziona, elabora gli ordini e serve il cliente garantendo velocità, precisione e cortesia. In ogni fase, rispetta le procedure operative KFC e mantiene l’ambiente riassortito, pulito e sicuro.</p>
        </div>
    </div>
    <main>
    <section class="main_left">
    </section>
    <section class="main_right">
        <div class="centrato-grande">CANDIDATURA SPONTANEA</div>
        <form name='franchisee' method='post' enctype="multipart/form-data" autocomplete="off">
            <div class="names">
                <div class="name">
                    <label for='name'>Nome</label>
                    <input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                    <div><img src="./assets/close.svg"/><span>Devi inserire il tuo nome</span></div>
                </div>
                <div class="surname">
                    <label for='surname'>Cognome</label>
                    <input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                    <div><img src="./assets/close.svg"/><span>Devi inserire il tuo cognome</span></div>
                </div>
            </div>
            <div class="birthdate">
                <label for='data_n'>Data di Nascita</label>
                <input type='date' name='data_n' <?php if(isset($_POST["data_n"])){echo "value=".$_POST["data_n"];} ?>>
                <div><img src="./assets/close.svg"/><span>Devi inserire la tua data di nascita</span></div>
            </div>
            <div class="domicilio">
                <label for='domicilio'>Domicilio</label>
                <input type='text' name='domicilio' <?php if(isset($_POST["domicilio"])){echo "value=".$_POST["domicilio"];} ?>>
                <div><img src="./assets/close.svg"/><span>Devi inserire il tuo domicilio</span></div>
            </div>
            <div class="provincia">
                <label for='provincia'>Provincia</label>
                <input type='text' name='provincia' <?php if(isset($_POST["provincia"])){echo "value=".$_POST["provincia"];} ?>>
                <div><img src="./assets/close.svg"/><span>Devi inserire la tua provincia</span></div>
            </div>
            <div class="telefono">
                <label for='telefono'>Telefono</label>
                <input type='text' name='telefono' <?php if(isset($_POST["telefono"])){echo "value=".$_POST["telefono"];} ?>>
                <div><img src="./assets/close.svg"/><span>Devi inserire il tuo numero di telefono</span></div>
            </div>
            <div class="cittadinanza">
                <label for='cittadinanza'>Cittadinanza</label>
                <input type='text' name='cittadinanza' <?php if(isset($_POST["cittadinanza"])){echo "value=".$_POST["cittadinanza"];} ?>>
                <div><img src="./assets/close.svg"/><span>Devi inserire la tua cittadinanza</span></div>
            </div>
            <div class="ruolo">
                <label for='ruolo'>Ruolo</label>
                <select name='ruolo' required>
                    <option value="">Seleziona un ruolo</option>
                    <option value="Team Member" <?php if(isset($_POST["ruolo"]) && $_POST["ruolo"] == "Team Member"){echo "selected";} ?>>Team Member</option>
                    <option value="Team Leader" <?php if(isset($_POST["ruolo"]) && $_POST["ruolo"] == "Team Leader"){echo "selected";} ?>>Team Leader</option>
                    <option value="Store Manager" <?php if(isset($_POST["ruolo"]) && $_POST["ruolo"] == "Store Manager"){echo "selected";} ?>>Store Manager</option>
                </select>
                <div><img src="./assets/close.svg"/><span>Devi selezionare un ruolo</span></div>
            </div>
            <div class="allow">
                <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                <label for='allow'>Dichiaro di aver preso visione dell'informativa per il trattamento dei dati personali*.</label>
            </div>
        <?php if(isset($error)) {
            foreach($error as $err) {
                echo "<div class='errorj'><img src='./assets/close.svg'/><span>".$err."</span></div>";
            }
        } ?>
        <div class="submit">
            <input type='submit' value="Registrati" id="submit">
        </div>
    </form>
</section>
        </main>
        <div class="nav_footer2">
        <div id="Testo_footer2">SCOPRI L’APP KFC E APPROFITTA
            <br>DELLE OFFERTE ESCLUSIVE
        </div>
        <div id="image_f2"></div>
        <div id="bottom_f2"><a href="app.php">SCOPRI DI PIÙ</a></div>
    </div>
</body>
</html>