<?php ?>
<!-- Header -->
<header class="container-fluid">
    <div class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand" href="index.php">My site</a>
        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_account/admin.php">Админка</a></li>
                </ul>

            <!-- search -->
            <form class="d-flex" id="search" method="GET" action="search_page.php">
                <input type="search" class="form-control me-2" name="strSearch" placeholder="Введите запрос...">
                <input type="submit" name="search" class="btn btn-primary" value="Найти">
            </form>
        </nav>
    </div>
</header>
