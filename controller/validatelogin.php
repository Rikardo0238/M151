<?php
    session_start();

    if ($_REQUEST["email"] == "" || $_REQUEST["password"] == "") {
        header("Location: /../login.php");
        exit;
    } else {
        $email = htmlspecialchars($_REQUEST["email"]);
        $password = hash("ripemd160", htmlspecialchars($_REQUEST["password"]));

        $servername = "localhost";
        $dbusername = "rikardostoilov";
        $dbpassword = "1234";
        $dbname = "rikardostoilov";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Verbindung konnte nicht hergestellet werden, bitte versuchen Sie es später erneut.");
        }

        $sql = "SELECT email, passwort FROM benutzer";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row["email"] == $email && $row["passwort"] == $password) {
                    mysqli_close($conn);

                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                    $_SESSION["falselogin"] = false;

                    header("Location: /../login.php");
                    exit;
                }
            }

            $_SESSION["falselogin"] = true;
            header("Location: /../login.php");
            exit;
        } else {
            echo "Die Datenbank ist leer, sie müssen zuerst ein Konto erstellen.";
        }

        mysqli_close($conn);
    }
