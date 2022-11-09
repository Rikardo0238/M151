<?php
    session_start();



    if ($_REQUEST["email"] == "" || $_REQUEST["password"] == "") {
        header("Location: /../signup.php");
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

        $sql = "SELECT email FROM benutzer";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row["email"] == $email) {
                    mysqli_close($conn);

                    $_SESSION["accountexists"] = true;

                    header("Location: /../signup.php");
                    exit;
                }
            }   
        }

        $_SESSION["accountexists"] = false;

        $sql = "INSERT INTO benutzer (email, passwort) VALUES ('$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);

            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            header("Location: /../profile.php");
            exit;
        } else {
            echo "Konto konnte nicht erstellet werden, bitte versuchen Sie es später erneut.";
        }

        mysqli_close($conn);
    }
