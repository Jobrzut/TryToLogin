<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TryToLogin</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="login-box">
            <h1>Logowanie</h1>   

            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="textbox">
                <i>&#64;</i>
                <input id="user" type="text" placeholder="Użytkownik" name="username" value="">
            </div>    

            <div class="textbox">
                <i>&#9679;</i>
                <input id="pass" type="password" placeholder="Hasło" name="password" value="">
            </div>
            <a class="road" href="TryToRegister.php">Nie masz konta?</a>
            <input id="btn" class="btn" type="submit" name="submit" value="Zaloguj">
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
            $sql = "SELECT * FROM users = {$username}";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $hash = $row["password"];
                }
                if (password_verify($password, $hash)) {
                    header("Location: index.html");
                } else {
                    echo "Incorrect password!";
                }
            }

            }
        }

    mysqli_close($conn);
?>