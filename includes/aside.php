<aside class="<?= $_SESSION["idIcon"] ?>">
    <div class="container">
        <div class="header-aside">
            <i id="changeIcon" class="fa-regular fas fa-calendar-minus"></i>
            <i class="activeMenuBurger fa-solid fa-ellipsis"></i>
            <nav>
                <ul class="menuBurger none">
                    <li><a href="#"><i class="fa-regular fa-eye"></i>view</a></li>
                    <li><a href="#"><i class="fa-regular fas fa-trash"></i>delete</a></li>
                </ul>
            </nav>
        </div>
        <h3 class="titleAside">example note</h3>
        <p class="paragraphAside">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?</p>
    </div>
    <div class="userDate">
        <div class="flex">
            <p><i class="fa-solid fa-user"></i>only me</p>
            <p><i class="fa-solid fa-calendar-days"></i><?= isset($ligne["date"]) ? str_replace("-", " ", $ligne["date"]) : str_replace("-", " ", date("Y-m-d")) ?></p>
        </div>
        <span class="after"></span>
    </div>
</aside>