<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todolist_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO note (user_id, id_note, title, description, priority, date, icon) VALUES (:user_id, :id_note, :title, :description, :priority, :date, :icon)";
    $resultat = $base->prepare($sql);
    if (isset($_SESSION["connect"]) && !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["priority"]) && $_POST["date"]) {
        $resultat->execute(array("user_id" => $_SESSION["connect"], "id_note" => $_SESSION["idIcon"], "title" => $_POST["title"], "description" => $_POST["description"], "priority" => $_POST["priority"], "date" => $_POST["date"], "icon" => $_POST["icon"]));
        header("Location: ../index.php");
    }
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
