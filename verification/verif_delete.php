<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM note WHERE id_note =  :id_note";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("id_note" => $_POST["delete"]));
    header("Location: ../index.php");
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
