<?php session_start();
$title = "New note";
include_once "../includes/header.php";
$_SESSION["idIcon"] = uniqid();

try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todoList_v3', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM note WHERE id_note = :id_note";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("id_note" => $_POST["edit"]));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$ligne = $resultat->fetch();
?>

<main class="edit">
    <div class="flex header-main">
        <div class="flex newNote">
            <h1>edit your note</h1>
            <a href="../index.php"><i class="fa-solid fa-angles-left"></i>back</a>
        </div>
        <div class="moreInfo">
            <span><i class="fa-regular fa-envelope"></i></span>
            <span><i class="fa-regular fa-bell"></i></span>
        </div>
    </div>
    <div class="flex">
        <div class="primaryInfo">
            <form action="../verification/verif_edit.php" method="post">
                <input type="hidden" name="edit" value="<?= $_POST["edit"] ?>">
                <input type="hidden" name="color" class="asideHidden">
                <div class="form-control">
                    <h2>title</h2>
                    <label for="title"></label>
                    <input type="text" name="title" id="title" value="<?= $ligne["title"] ?>">
                </div>
                <div class="form-control">
                    <h2>description</h2>
                    <textarea name="description" class="description" cols="30" rows="10"><?= $ligne["description"] ?></textarea>
                </div>
                <div class="form-control">
                    <h2>reminder date</h2>
                    <label for="date"></label>
                    <input type="date" name="date" id="date" value="<?= $ligne["date"] ?>">
                </div>
                <div class="icons form-control">
                    <h2>icon</h2>
                    <?php include_once "../data/newNoteData.php" ?>
                    <?php foreach ($icons as $el) { ?>
                        <i class="<?= $el ?> <?= $el == $ligne["icon"] ? "iconSelected" : "" ?>"></i>
                    <?php } ?>
                </div>
                <div class="form-control">
                    <h2>priority</h2>
                    <label for="priotiry"></label>
                    <select name="priority" id="priority">
                        <option value="default">-- default --</option>
                        <?php foreach ($priority["level"] as $el) { ?>
                            <option value="<?= $el ?>" <?= $el == $ligne["priority"] ? "selected" : "" ?>><?= $el ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="option form-control">
                    <div class="groupReset">
                        <input type="reset" value="reset" class="reset">
                        <i class="fa-solid fa-forward"></i>
                    </div>
                    <div class="groupSave">
                        <input class="save" type="submit" value="change">
                        <i class="fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
                <input type="hidden" name="icon" class="changeIconAside" value="fa-regular fas fa-calendar-minus">
            </form>
        </div>
        <?php include_once "../includes/aside.php" ?>
    </div>
    <div class="flex policy">
        <div class="flex">
            <p>privacy policy</p>
            <p>terms of use</p>
        </div>
        <div class="flex">
            <p>2022@</p>
            <p class="notePlus">NotePlus.</p>
        </div>
    </div>
</main>
<script src="../js/script.js"></script>
</body>

</html>
<?php $resultat->closeCursor(); ?>