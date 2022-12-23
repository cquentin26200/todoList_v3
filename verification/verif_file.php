<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO file (title, id_user, id_file) VALUES (:title, :id_user, :id_file)";
    $resultat = $base->prepare($sql);
    $uniq = uniqid();
    $resultat->execute(array("title" => $_POST["name"], "id_user" => $_SESSION["connect"], "id_file" => $uniq));
    header("Location: ../../todoList_v3/index.php?page=$uniq");
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
