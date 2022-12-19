<?php $title = "New note" ?>
<?php include_once "includes/header.php" ?>

<main class="newNote">
    <div class="flex header-main">
        <div class="flex newNote">
            <h1>new note</h1>
            <a href="index.php"><i class="fa-solid fa-angles-left"></i>back</a>
        </div>
        <div class="moreInfo">
            <span><i class="fa-regular fa-envelope"></i></span>
            <span><i class="fa-regular fa-bell"></i></span>
        </div>
    </div>
    <div class="flex">
        <div class="primaryInfo">
            <form action="verification/verif_newNote.php" method="post">
                <div class="form-control">
                    <h2>title</h2>
                    <label for="title"></label>
                    <input type="text" name="title" id="title" placeholder="Example Note">
                </div>
                <div class="form-control">
                    <h2>description</h2>
                    <textarea name="description" class="description" cols="30" rows="10" placeholder="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime perferendis nostrum culpa ex perspiciatis provident, illum nemo harum qui animi commodi, magni eum. Optio, soluta perspiciatis et deserunt praesentium ullam!"></textarea>
                </div>
                <div class="form-control">
                    <h2>reminder date</h2>
                    <label for="date"></label>
                    <input type="date" name="date" id="date" value="2022-01-01">
                </div>
                <div class="icons form-control">
                    <h2>icon</h2>
                    <?php include_once "data/newNoteData.php" ?>
                    <?php foreach ($icons as $el) { ?>
                        <i class="<?= $el ?>"></i>
                    <?php } ?>
                </div>
                <div class="form-control">
                    <h2>priority</h2>
                    <label for="priotiry"></label>
                    <select name="priority" id="priority">
                        <option value="default" selected>-- default --</option>
                        <?php $count = 0 ?>
                        <?php foreach ($priority["level"] as $el) { ?>
                            <option class="<?= $count++ ?>" value="<?= $el ?>"><?= $el ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="option form-control">
                    <div class="groupReset">
                        <input type="reset" value="reset" class="reset">
                        <i class="fa-solid fa-forward"></i>
                    </div>
                    <div class="groupSave">
                        <input class="save" type="submit" value="add">
                        <i class="fa-solid fa-cloud-arrow-down"></i>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once "includes/aside.php" ?>
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
<script src="js/script.js"></script>
</body>

</html>