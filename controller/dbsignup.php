<?php
    session_start();

    if ($_REQUEST["email"] == "" || $_REQUEST["password"] == "") {
        header("Location: /../signup.php");
    } else {
        $email = $_REQUEST["email"];
        $password = hash("ripemd160", $_REQUEST["password"]);

        $servername = "http://myadmin.rikardostoilov.bplaced.net/";
        $dbusername = "rikardostoilov";
        $dbpassword = "1234";
        $dbname = "rikardostoilov";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Verbindung konnte nicht hergestellet werden, bitte versuchen Sie es später erneut.");
        }

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
?>