<nav>
    <ul>
        <li class="new"><i class="fa-solid fa-plus"></i><a href="#">add new<i class="fa-regular fas fa-angle-down"></i></a>
            <ul class="none">
                <li class="file"><a href="#"><i class="fa-regular fa-file"></i>file</a></li>
                <li><a href="../../todoList_v3/newNote.php?<?= isset($_GET["page"]) ? "page=" . $_GET["page"] : "" ?>&name=<?= isset($_GET["name"]) ? $_GET["name"] : "" ?>"><i class="fa-regular fa-note-sticky"></i>note</a></li>
                <li><a href="#"><i class="fa-regular fa-folder"></i>folder</a></li>
            </ul>
        </li>
        <li class="otherLink">
            <ul>
                <li><a href="#" class="folder"><svg width="20" class="svg-icon" id="iq-main-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" style="stroke-dasharray: 78, 98; stroke-dashoffset: 0;"></path>
                        </svg>folder<i class="fa-solid fa-angle-right"></i></a>
                    <ul class="newFile none">
                        <?php $sql2 = "SELECT * FROM file";
                        $resultat2 = $base->prepare($sql2);
                        $resultat2->execute();
                        while ($ligne = $resultat2->fetch()) {
                            if (isset($_SESSION["connect"]) && isset($_GET["page"])) {
                                $resultat->execute(array("user_id" => $_SESSION["connect"], "id_file" => $_GET["page"]));
                            } else {
                                $resultat->execute(array("user_id" => $_SESSION["connect"], "id_file" => $_SESSION["home"]));
                            }
                        ?>
                            <li><a href="../../todoList_v3/index.php?page=<?= $ligne["id_file"] ?>&name=<?= $ligne["title"] ?>"><?= $ligne["title"] ?></a></li>
                        <?php  } ?>
                    </ul>
                </li>
                <li><a href="../../todoList_v3/modification/bin.php"><svg width="20" class="svg-icon" id="iq-main-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" style="stroke-dasharray: 80, 100; stroke-dashoffset: 0;"></path>
                        </svg>bin</a></li>
                <li><a href="../../todoList_v3/index.php">home</a></li>
            </ul>
        </li>
    </ul>
</nav>