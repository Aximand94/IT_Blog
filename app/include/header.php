<?php
echo <<<END
<!-- Header -->
<header class="container-fluid">
    <div class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand" href="index.php">My site</a>
        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Блог</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Новости</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Админка</a></li>
                </ul>
            <form class="d-flex" method="get" action="#">
                <input type="search" class="form-control me-2" placeholder="Введите запрос...">
                <input type="submit" class="btn btn-primary" value="Найти">
            </form>
        </nav>
    </div>
</header>

END;


/*
 <!-- Header -->
<header class="container-fluid">
    <div class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand" href="index.php">My site</a>
        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Блог</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Новости</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Админка</a></li>
                </ul>
            <form class="d-flex" method="get" action="#">
                <input type="search" class="form-control me-2" placeholder="Введите запрос...">
                <input type="submit" class="btn btn-primary" value="Найти">
            </form>
        </nav>
    </div>
</header>
 */