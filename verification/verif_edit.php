<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE note set title = :title, description = :description, date = :date WHERE id_note = :id_note";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("title" => $_POST["title"], "description" => $_POST["description"], "date" => $_POST["date"], "id_note" => $_POST["edit"]));
    header("Location: ../index.php");
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
