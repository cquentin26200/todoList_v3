<?php session_start(); ?>
<?php $title = "Accueil" ?>
<?php include_once "includes/header.php" ?>
<?php

try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todolist_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM note WHERE user_id = :user_id AND id_file = :id_file";
    $resultat = $base->prepare($sql);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
<main class="home">
    <?php include_once "function/aside.php" ?>
    <?php include_once "includes/menu.php" ?>
    <div>
        <h1>your note</h1>
        <div class="grid">
            <?php while ($ligne = $resultat->fetch()) {
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
<script src="js/script.js"></script>
</body>

</html>