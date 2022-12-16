<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT email FROM user_info";
    $resultat2 = $base->prepare($sql2);
    $resultat2->execute();
    $sql = "INSERT INTO user_info (user_id, firstName, lastName, password, email, checked) VALUES (:user_id, :firstName, :lastName, :password, :email, :checked)";
    $resultat = $base->prepare($sql);
    
    $firstName_error = "false";
    $lastName_error = "false";
    $email_error = "false";
    $password_error = "false";
    $passwordConfirmed_error = "false";
    $checked_error = "false";

    if (empty($_POST["firstName"])) {
        $firstName_error = "true";
    }
    if (empty($_POST["lastName"])) {
        $lastName_error = "true";
    }
    if (empty($_POST["email"])) {
        $email_error = "true";
    }
    if (empty($_POST["password"])) {
        $password_error = "true";
    }
    if (empty($_POST["passwordConfirmed"])) {
        $passwordConfirmed_error = "true";
    }
    if (!isset($_POST["condition"])) {
        $checked_error = "true";
    }

    header("Location: ../login/register.php?" . ($firstName_error == "true" ? "&firstNameError=error" : "") . ($lastName_error == "true" ? "&lastNameError=error" : "") . ($email_error == "true" ? "&emailError=error" : "") . ($password_error == "true" ? "&passwordError=error" : "") . ($passwordConfirmed_error == "true" ? "&passwordConfirmedError=error" : "") . ($checked_error == "true" ? "&checkedError=error" : ""));


    if (isset($_POST["condition"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["passwordConfirmed"])) {
        while ($ligne = $resultat2->fetch()) {
            if ($_POST["password"] != $_POST["passwordConfirmed"]) {
                header("Location: ../login/register.php?confirmedPassword=error");
            }

            if ($ligne["email"] == $_POST["email"]) {
                header("Location: ../login/register.php?email_used=error");
            }

            if (($ligne["email"] != $_POST["email"]) && $_POST["password"] != $_POST["passwordConfirmed"]) {
                $resultat->execute(array("user_id" => uniqid(), "firstName" => htmlentities($_POST["firstName"]), "lastName" => htmlentities($_POST["lastName"]), "password" => htmlentities($_POST["password"]), "email" => htmlentities($_POST["email"]), "checked" => true));
                header("Location: ../login/login.php");
            }
        }
    }

    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
