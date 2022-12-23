<?php
session_start();
$title = "Bin";
include_once "../includes/header.php";
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM bin WHERE user_id = :user_id";
    $resultat2 = $base->prepare($sql2);
    $resultat2->execute(array("user_id" => $_SESSION["connect"]));

    $sql = "SELECT * FROM note WHERE user_id = :user_id AND id_file = :id_file";
    $resultat = $base->prepare($sql);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
<main class="bin">
    <?php include_once "../function/aside.php"; ?>
    <?php include_once "../includes/menu.php"; ?>
    <div>
        <h1>bin</h1>
        <div class="grid">
            <?php
            while ($ligne = $resultat2->fetch()) {
                switch ($ligne["priority"]) {
                    case "very low":
                        echo asideColor("#8ac3a3", $ligne["icon"], $ligne["title"], $ligne["description"], str_replace("-", " ", $ligne["date"]), $ligne["id_note"]);
                        break;
                    case "low":
                        echo asideColor("#87baf5", $ligne["icon"], $ligne["title"], $ligne["description"], str_replace("-", " ", $ligne["date"]), $ligne["id_note"]);
                        break;
                    case "medium":
                        echo asideColor("#f0864a", $ligne["icon"], $ligne["title"], $ligne["description"], str_replace("-", " ", $ligne["date"]), $ligne["id_note"]);
                        break;
                    case "high":
                        echo asideColor("#f674ad", $ligne["icon"], $ligne["title"], $ligne["description"], str_replace("-", " ", $ligne["date"]), $ligne["id_note"]);
                        break;
                    case "very high":
                        echo asideColor("#aa87f5", $ligne["icon"], $ligne["title"], $ligne["description"], str_replace("-", " ", $ligne["date"]), $ligne["id_note"]);
                        break;
                    default:
                }
            } ?>
        </div>
    </div>
</main>
<div class="viewShow"></div>
<script src="../js/script.js"></script>

<body>

    </html>

    <?php $resultat->closeCursor(); ?>