<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: index.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT * FROM users WHERE username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                // Imposto una sessione dell'utente
                $_SESSION["_agora_username"] = $entry['username'];
                $_SESSION["_agora_user_id"] = $entry['id'];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>




<html>
<head>
    <link rel="icon" type="image/png" href="image/kfc.png">
    <link rel='stylesheet' href='login_mio.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php
    if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
    <form name='login' method='post' action='login_mio.php'>
        <div class="username">
            <label for='username'>Username</label>
            <input type='text' name='username' <?php if (isset($_POST["username"])) {echo "value=\"".$_POST["username"]."\"";} ?>>
        </div>
        <div class="password">
            <label for='password'>Password</label>
            <input type='password' name='password' <?php if (isset($_POST["password"])) {echo "value=\"".$_POST["password"]."\"";} ?>>
        </div>
        <div class="submit-container">
            <div class="login-btn">
                <input type='submit' value="ACCEDI">
            </div>
        </div>
    </form>
    <div class="signup"><h4>Non hai un account?</h4></div>
    <div class="signup-btn-container"><a class="signup-btn" href="signup_mio.php">Non hai un account? Registrati</a></div>
</div>
</body>
</html>
