<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT email, password, checked, id_user FROM user_info WHERE email = :email";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("email" => $_POST["email"]));
    $ligne = $resultat->fetch();
    if (($ligne["email"] == $_POST["email"]) && ($ligne["password"] == $_POST["password"])) {
        if (isset($_POST["condition"])) {
            setcookie("email", $_POST["email"], time() + (84600 * 30), "/");
            setcookie("password", $_POST["password"], time() + (84600 * 30), "/");
            setcookie("checked", 1, time() + (84600 * 30), "/");
        } else {
            setcookie("email", "", time() - (84600 * 30), "/");
            setcookie("password", "", time() - (84600 * 30), "/");
            setcookie("checked", "", time() - (84600 * 30), "/");
        }
        $_SESSION["user_id"] = $ligne["id_user"];
        header("Location: ../index.php");
    } else {
        if ($_POST["email"] != $ligne["email"] || $_POST["password"] != $ligne["password"]) {
            header("Location: ../login/login.php?verification=error");
        }
    }


    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
