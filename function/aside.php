<?php
function asideColor($color, $icon, $title, $description, $date, $id)
{
    return <<<HTML
    <div class="aside $color">
    <div class="container">
        <div class="header-aside">
            <i class="changeIcon $icon" style="color: $color; border-color: $color"></i>
            <i class="activeMenuBurger fa-solid fa-ellipsis"></i>
            <nav>
            <div class="menuBurger none">
                <a href="#" class="view"><i class="fa-regular fa-eye"></i>view</a>
                <form action="./verification/verif_delete.php" method="post" >
                    <input type="submit" class="delete" value="delete">
                    <input type="hidden" name="delete" value="$id">
                </form>
                <form action="./modification/edit.php" method="post">
                    <input type="submit" value="edit" class="edit">
                    <input type="hidden" name="edit" value="$id">
                </form>
            </div>
            </nav>
        </div>
        <h3 class="titleAside">$title</h3>
        <p class="paragraphAside">$description</p>
    </div>
    <div class="userDate">
        <div class="flex">
            <p><i class="fa-solid fa-user"></i>only me</p>
            <p><i class="fa-solid fa-calendar-days"></i>$date</p>
        </div>
        <span class="after" style="background-color: $color"></span>
    </div>
    </div>
    HTML;
}
