<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TryToRegister</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="login-box">
            <h1>Rejestracja</h1>   

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="textbox">
                    <i>&#64;</i>
                    <input id="user" type="text" placeholder="Użytkownik" name="username" value="">
                </div>    

                <div class="textbox">
                    <i>&#9679;</i>
                    <input id="pass" type="password" placeholder="Hasło" name="password" value="">
                </div>
                <a class="road" href="TryToLogin.php">Wróć do logowania</a>
                <input id="btn" class="btn" type="submit" name="submit" value="Zarejestruj">
            </div> 
        </form>   
    </body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username)) {
            echo "Zapomniałeś o nazwie użytkownika!";
        } elseif (empty($password)) {
            echo "Zapomniałeś o haśle!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password)
                    VALUES ('$username', '$hash')";
            try {
                mysqli_query($conn, $sql);
                echo "Zostałeś zarejestrowany!";
            } 
            catch (mysqli_sql_exception) {
                echo "Ta nazwa użytkownika jest zajęta";
            }
        }

    }
    mysqli_close($conn);
?>