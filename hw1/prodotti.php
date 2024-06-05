
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prodotti</title>
    <link rel="icon" type="image/png" href="image/images.png">
    <link rel="stylesheet" href="index.css">
    <script src="prodotti.js" defer></script>
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
    <br><br><br><br>
    <div class="black-box">
        <p>KFC Roma - C.C. Happio - Via Appia Nuova 448</p>
    </div>
    <br><br><br><br>
  
    <span> Home > </span>  <span class="grassetto">Il brand KFC</span>
    <div class="content">
        <br><br> <br><br> <br><br>
        <div class="product-grid">
        <?php
// Include il codice per la connessione al database
include 'auth.php';

// Connessione al database
$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Gestione dell'aggiunta al carrello
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_prodotto'])) {
    $nome_prodotto = $_POST['nome_prodotto'];
    $prezzo = $_POST['prezzo'];

    // Query per inserire il prodotto nel carrello
    $sql = "INSERT INTO carrello (nome_prodotto, prezzo) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $nome_prodotto, $prezzo);

    // Esegui la query
    if ($stmt->execute()) {
        // Prodotto aggiunto con successo
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    exit;
}

// Query per ottenere i prodotti
$sql = "SELECT nome_prodotto, immagine_prodotto, prezzo FROM prodotti";
$result = $conn->query($sql);

// Verifica risultati della query
if ($result === false) {
    echo "Errore nella query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // Ripeti finché ci sono righe nel risultato della query
        while($row = $result->fetch_assoc()) {
            // Stampare il prodotto e il form
            echo "<div class='product'>";
            echo "<h2>" . $row["nome_prodotto"] . "</h2>";
            echo "<img src='" . $row["immagine_prodotto"] . "' alt='" . $row["nome_prodotto"] . "'>";
            echo "<p>Prezzo: €" . $row["prezzo"] . "</p>";
            echo "<form method='post' class='product-form'>";
            echo "<input type='hidden' name='nome_prodotto' value='" . htmlspecialchars($row["nome_prodotto"]) . "'>";
            echo "<input type='hidden' name='prezzo' value='" . htmlspecialchars($row["prezzo"]) . "'>";
            echo "<button type='submit' class='order-button'>Ordina Ora</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "Nessun prodotto trovato.";
    }
}

$conn->close();
?>
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
