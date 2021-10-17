<?php session_start()?>
<!doctype html>
<html lang="ru RU">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My site</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/app/include/header.php";?>
<!-- main -->
<div class="container">
    <div class="content row">
        <div class="sidebar col-md-3 col-12">
            <!-- window user -->
            <?php if(isset($_SESSION['user'])){
                include($_SERVER['DOCUMENT_ROOT']."/app/include/user_side/authoriz_user_side.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT']."/app/include/user_side/user_side.php");
            }?>

            <!-- Aside -->
            <?php include($_SERVER['DOCUMENT_ROOT']."/app/include/sidebar.php");?>
        </div>
            <!-- Main -->
        <div class="user-kab col-md-9 col-12">
            <div class="user-content">
                <h2>Кабинет пользователя</h2>
                <p>Приветcтвую вас, <i><?= $_SESSION['user'];?></i>!</p>
                <br>
                <p>Тут различная тнформация о пользователе.</p>
                <p>Если хотите выйти нажмите <a href="#">сюда</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."/app/include/footer.php" ?>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->
</body>
</html>
