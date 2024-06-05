<?php
require_once 'auth.php';

// Inizializza l'array degli errori
$errors = [];

// Se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione dei campi
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $allow = isset($_POST["allow"]) && $_POST["allow"];

    // Validazione del nome
    if (empty($name)) {
        $errors[] = "Inserisci il tuo nome.";
    }

    // Validazione del cognome
    if (empty($surname)) {
        $errors[] = "Inserisci il tuo cognome.";
    }

    // Validazione del nome utente
    if (empty($username)) {
        $errors[] = "Inserisci il nome utente.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
        $errors[] = "Il nome utente non è valido.";
    } elseif (checkUsernameExists($username)) {
        $errors[] = "Il nome utente è già utilizzato.";
    }

    // Validazione dell'email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Inserisci un'email valida.";
    } elseif (checkEmailExists($email)) {
        $errors[] = "L'email è già utilizzata.";
    }

    // Validazione della password
    if (strlen($password) < 8) {
        $errors[] = "La password deve contenere almeno 8 caratteri.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Le password non corrispondono.";
    }

    // Accetta i termini e le condizioni
    if (!$allow) {
        $errors[] = "Devi accettare i termini e le condizioni.";
    }

    // Se non ci sono errori, registra l'utente
    if (empty($errors)) {
        // Crittografa la password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        if (registerUser($username, $hashedPassword, $name, $surname, $email)) {
            // Reindirizza l'utente dopo la registrazione
            header("Location: login_mio.php");
            exit;
        } else {
            $errors[] = "Si è verificato un errore durante la registrazione. Riprova più tardi.";
        }
    }
}

function checkUsernameExists($username) {
    // Implementazione della verifica dell'esistenza del nome utente nel database
}

function checkEmailExists($email) {
    // Implementazione della verifica dell'esistenza dell'email nel database
}

function registerUser($username, $password, $name, $surname, $email) {
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $username = mysqli_real_escape_string($conn, $username);
    $name = mysqli_real_escape_string($conn, $name);
    $surname = mysqli_real_escape_string($conn, $surname);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    // Query di inserimento con password hashata
    $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}
?>

 <html>
    <head>
        <link rel='stylesheet' href='signup_mio.css'>
        <script src='signup_mio.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="image/kfc.png">
        <meta charset="utf-8">

        <title>Iscriviti</title>
    </head>
    <body>
 <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Iscriviti gratuitamente per ricevere offerte esclusive</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
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
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                    <div><img src="./assets/close.svg"/><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Accetto i termini e condizioni d'uso.</label>
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
            <div class="signup">Hai un account? <a href="login.php">Accedi</a>
        </section>
        </main>
    </body>
</html>