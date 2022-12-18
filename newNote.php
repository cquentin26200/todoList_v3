<?php $title = "new note" ?>
<?php include_once "includes/header.php" ?>

<main class="newNote">
    <div class="flex">
        <div class="flex">
            <h1>new note</h1>
            <a href="index.php"><i class="fa-solid fa-angles-left"></i>back</a>
        </div>
        <div>
            <span><i class="fa-regular fa-envelope"></i></span>
            <span><i class="fa-regular fa-bell"></i></span>
        </div>
    </div>
    <form action="verification/verif_newNote.php" method="post">
        <h2>title</h2>
        <div>
            <label for="title"></label>
            <input type="text" name="title" id="title" placeholder="Example Note">
        </div>
        <h2>description</h2>
        <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime perferendis nostrum culpa ex perspiciatis provident, illum nemo harum qui animi commodi, magni eum. Optio, soluta perspiciatis et deserunt praesentium ullam!</p>
        <h2>reminder date</h2>
        <div>
            <label for="date"></label>
            <input type="date" name="date" id="date" value="2021-01-01">
        </div>
        <h2>icon</h2>
        <?php include_once "data/newNoteData.php" ?>
        <div class="icons">
            <?php foreach ($icons as $el) { ?>
                <i class="<?= $el ?>"></i>
            <?php } ?>
        </div>
        <h2>priority</h2>
        <div>
            <label for="priotiry"></label>
            <select name="priority" id="priority">
                <?php foreach ($priority as $el) { ?>
                    <option value="<?= $el ?>"><?= $el ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button><i class="fa-solid fa-forward"></i>reset</button>
            <button><i class="fa-solid fa-cloud-arrow-down"></i>save</button>
        </div>
    </form>
</main>