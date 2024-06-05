<?php

include 'auth.php';

$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

$order_success = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rimuovi'])) {
    $id = $_POST['id'];
  
    $sql = "DELETE FROM carrello WHERE id = $id";
   
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<p>Errore durante la rimozione del prodotto: " . $conn->error . "</p>";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invia_ordine'])) {
   
    $sql = "SELECT SUM(prezzo) as totale FROM carrello";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totale = $row['totale'];

    if ($totale > 0) {
    
        $sql = "INSERT INTO ordini (costo, id_users) VALUES ($totale, " . ($user_id ? $user_id : "NULL") . ")";
        if ($conn->query($sql) === TRUE) {
          
            $sql = "DELETE FROM carrello";
            $conn->query($sql);
            $order_success = true; 
        } else {
            echo "Errore durante l'invio dell'ordine: " . $conn->error;
        }
    } else {
        echo "Il carrello è vuoto!";
    }
}


$sql = "SELECT * FROM carrello";
$result = $conn->query($sql);


$total = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $total += $row['prezzo'];
    }
  
    $result->data_seek(0);
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/images.png">
    <title>Carrello</title>
    <link rel="stylesheet" href="carrello.css">
    <script src="franchise.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Il tuo carrello</h1>
        <?php if ($order_success): ?>
            <p class="success-message">ORDINE INVIATO CON SUCCESSO!</p>
        <?php endif; ?>
        <?php if ($result->num_rows > 0): ?>
            <ul class="cart-list" id="cart-list">
                <?php while($row = $result->fetch_assoc()): ?>
                    <li class="cart-item" data-price="<?php echo $row['prezzo']; ?>" data-id="<?php echo $row['id']; ?>">
                        <span class="product-name"><strong><?php echo $row['nome_prodotto']; ?></strong></span>
                        <span class="product-price">Prezzo: €<span><?php echo $row['prezzo']; ?></span></span>
                        <form action="carrello.php" method="post" class="remove-form">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="rimuovi" class="remove-button">Rimuovi</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="total">
                <strong>Totale: €<span id="total-price"><?php echo $total; ?></span></strong>
            </div>
            <form action="carrello.php" method="post">
                <button type="submit" name="invia_ordine" class="btn">Invia Ordine</button>
            </form>
        <?php else: ?>
            <p>Il tuo carrello è vuoto.</p>
        <?php endif; ?>
    </div>
</body>
</html>
