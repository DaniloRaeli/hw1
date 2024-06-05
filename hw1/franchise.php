<?php
require_once 'auth.php';

// Inizializza l'array degli errori
$errors = [];

// Se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione dei campi
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);
    $regione = trim($_POST["regione"]);
    $settore = trim($_POST["settore"]);
    $allow = isset($_POST["allow"]) && $_POST["allow"];

    // Validazione del nome
    if (empty($name)) {
        $errors[] = "Inserisci il tuo nome.";
    }

    // Validazione del cognome
    if (empty($surname)) {
        $errors[] = "Inserisci il tuo cognome.";
    }

    // Validazione dell'email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Inserisci un'email valida.";
    } elseif (checkEmailExists($email)) {
        $errors[] = "L'email è già utilizzata.";
    }

    // Validazione del telefono
    if (empty($telefono)) {
        $errors[] = "Inserisci il tuo numero di telefono.";
    }

    // Validazione della regione
    if (empty($regione)) {
        $errors[] = "Inserisci la tua regione.";
    }

    // Validazione del settore
    if (empty($settore)) {
        $errors[] = "Inserisci il tuo settore.";
    }

    // Accetta l'informativa per il trattamento dei dati personali
    if (!$allow) {
        $errors[] = "Devi dichiarare di aver preso visione dell'informativa per il trattamento dei dati personali.";
    }

    // Se non ci sono errori, registra l'utente
    if (empty($errors)) {
        if (registerFranchise($name, $surname, $email, $telefono, $regione, $settore)) {
            // Reindirizza l'utente dopo la registrazione
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Si è verificato un errore durante la registrazione. Riprova più tardi.";
        }
    }
}

function checkEmailExists($email) {
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $email = mysqli_real_escape_string($conn, $email);
    $query = "SELECT * FROM franchise WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return mysqli_num_rows($result) > 0;
}

function registerFranchise($name, $surname, $email, $telefono, $regione, $settore) {
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $name = mysqli_real_escape_string($conn, $name);
    $surname = mysqli_real_escape_string($conn, $surname);
    $email = mysqli_real_escape_string($conn, $email);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $regione = mysqli_real_escape_string($conn, $regione);
    $settore = mysqli_real_escape_string($conn, $settore);

    $query = "INSERT INTO franchise (name, surname, email, telefono, regione, settore) VALUES ('$name', '$surname', '$email', '$telefono', '$regione', '$settore')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diventa Franchise</title>
    <link rel="icon" type="image/png" href="image/images.png">
    <link rel="stylesheet" href="index.css">
    <script src="franchise.js" defer></script>
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
    <img id="fr" src="image/KFC_franchisee_3840x1066_b27507de39.jpeg">
    <div class="text-overlay">DIVENTA FRANCHISEE</div>
</div>
<div class="box_franchise">
        <div class="mini_box1">
            <h1>DIVENTA FRANCHISEE<br>
             PARTNER DI KFC</h1>
            <p>Dall'arrivo in Italia nel 2014, KFC ha adottato una strategia di sviluppo ambiziosa che ha accompagnato la crescita del brand.<br><br>

Unisciti a noi per scrivere insieme il futuro della ristorazione veloce italiana.<br><br>

KFC Italia ricerca nuovi franchisee partner per portare l'irresistibile Pollo fritto del Colonnello Sanders sempre più vicino ai consumatori italiani. Entrare nel mondo KFC significa far parte di una realtà con oltre 26.000 ristoranti nel mondo, sfruttando l'immenso know-how maturato in oltre 75 anni nella ristorazione veloce e nel franchising.<br><br>

Scopri di più su KFC nell’area stampa .</p>
<button id="scrollToForm" class="button_franchise">Candidati</button>
        </div>
        <div class="image_cont_fr">
        <img src="image/icon_frinchisee_0205b13195.svg" alt="Immagine" class="image_franchise">
    </div>
    </div>
    <div class="row_of_boxes">
    <div class="box_with_image">
        <img src="image/Microsoft_Teams_image_b9d48c99c5.webp" alt="Immagine 1">
    </div>
    <div class="box_with_image">
        <img src="image/In_Line_5414b81d6c.webp" alt="Immagine 2">
    </div>
    <div class="box_with_image">
        <img src="image/Drive_7591d5fc00.webp" alt="Immagine 3">
    </div>
</div>
<main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Invia la tua candidatura</h1>
            <br>
            <br>
            <form name='franchisee' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                        <input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        <div><img src="./assets/close.svg"/><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        <div><img src="./assets/close.svg"/><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="telefono">
                    <label for='telefono'>Telefono</label>
                    <input type='text' name='telefono' <?php if(isset($_POST["telefono"])){echo "value=".$_POST["telefono"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Devi inserire il numero di telefono</span></div>
                </div>
                <div class="regione">
                    <label for='regione'>Regione</label>
                    <input type='text' name='regione' <?php if(isset($_POST["regione"])){echo "value=".$_POST["regione"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Devi inserire la regione</span></div>
                </div>
                <div class="settore">
                    <label for='settore'>Settore</label>
                    <input type='text' name='settore' <?php if(isset($_POST["settore"])){echo "value=".$_POST["settore"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Devi inserire un settore</span></div>
                </div>
                
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Accetto i termini e condizioni.</label>
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