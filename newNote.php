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
                        <option value="default" default>-- default --</option>
                        <?php foreach ($priority as $el) { ?>
                            <option value="<?= $el ?>"><?= $el ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="option">
                    <button><i class="fa-solid fa-forward"></i>reset</button>
                    <button class="save"><i class="fa-solid fa-cloud-arrow-down"></i>save</button>
                </div>
            </form>
        </div>
        <aside>
            <div>
                <div class="header-aside">
                    <i class="activeMenuBurger fa-regular fas fa-calendar-minus"></i>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <nav>
                    <ul class="menuBurger none">
                        <li><a href="#">view</a></li>
                        <li><a href="#">delete</a></li>
                    </ul>
                </nav>
                <h3 class="titleAside">example note</h3>
                <p class="paragraphAside">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?</p>
            </div>
        </aside>
    </div>
</main>
<script src="js/script.js"></script>
</body>

</html>