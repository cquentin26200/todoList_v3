<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todolist_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO note (user_id, id_note, title, description, priority, date) VALUES (:user_id, :id_note, :title, :description, :priority, :date)";
    $resultat = $base->prepare($sql);
    if (isset($_SESSION["user_id"]) && !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["priority"]) && $_POST["date"]) {
        $resultat->execute(array("user_id" => $_SESSION["user_id"], "id_note" => uniqid(), "title" => $_POST["title"], "description" => $_POST["description"], "priority" => $_POST["priority"], "date" => $_POST["date"]));
    }
    $resultat->closeCursor(); 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
