<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM note WHERE id_note = :id_note";
    $resultat2 = $base->prepare($sql2);
    $resultat2->execute(array("id_note" => $_POST["delete"]));
    $ligne = $resultat2->fetch();

    $sql3 = "INSERT INTO bin (id_note, title, description, date, priority, icon, user_id) VALUES (:id_note, :title, :description, :date, :priority, :icon, :user_id)";
    $resultat3 = $base->prepare($sql3);
    $resultat3->execute(array("id_note" => $ligne["id_note"], "title" => $ligne["title"], "description" => $ligne["description"], "date" => date("Y-m-d"), "priority" => $ligne["priority"], "icon" => $ligne["icon"], "user_id" => $ligne["user_id"]));

    $sql = "DELETE FROM note WHERE id_note =  :id_note";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("id_note" => $_POST["delete"]));
    header("Location: ../index.php");
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
