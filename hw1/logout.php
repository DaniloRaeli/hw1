<?php
session_start();

// Elimina tutte le variabili di sessione
$_SESSION = array();

// Se è impostato un cookie di sessione, eliminalo
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Distruggi la sessione
session_destroy();

// Reindirizza alla pagina di login
header('Location: index.php');
exit;
?>
