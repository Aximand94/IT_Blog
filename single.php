<?php session_start();?>
<!DOCTYPE html>
<html lang="ru RU">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My site</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] ."/app/include/header.php";?>
<div class="container">
    <div class="content row">
        <div class="sidebar col-md-3 col-12">
            <!--  user side -->
            <?php if(isset($_SESSION['user'])){
                include($_SERVER['DOCUMENT_ROOT'] ."/app/include/user_side/authoriz_user_side.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT'] ."/app/include/user_side/user_side.php");
            }?>

            <!--     Aside    -->
            <?php include($_SERVER['DOCUMENT_ROOT'] ."/app/include/sidebar.php");?>
        </div>
            <!--     Main     -->
        <div class="main-content col-md-9 col-12">
            <div class="post">
                <h2>Чиним Wi-Fi 5 ГГц на Raspberry Pi 4</h2>
                <i class="">Тематика</i>
                <i class="post-author">Автор</i>
                <i class="post-date">Дата публикации</i>
                <div class="row post-img">
                    <img src="img/post_img.jpg" class="img" alt="post img">
                </div>
                <div class="post-text">
                    <p>Уже как несколько месяцев у меня есть идея настроить распределённое хранилище для дома, чтобы можно было закачивать туда все файлы и шарить между устройствами.
                        С этой задачей, конечно, хорошо справляются облака, я активно использую и Яндекс.Диск, и Google Drive, и даже DropBox остался.
                        Но некоторые вещи всё-таки не хотелось бы шарить в облака, да и скорость работы с ними страдает.
                        Вряд ли получится туда скачать фильм в 4K-качестве и потом смотреть его на Apple TV.
                        Поэтому я решил прикупить Rasberry Pi 4 model B на 8 GB RAM + жёсткий диск на 2 TB.
                        Я боялся, что он не будет работать, так как у него нет внешнего питания, но сразу скажу, что опасения оказались напрасными.
                        Диск работает и даже имеет хорошую скорость на 150 Mb. В итоге данный сетап выглядит довольно простенько, но работает.</p>
                    <img src="img/img_for_post/image-45.png" class="img-fluid rounded mx-auto d-block" alt="hdd">
                    <p>Однако в процессе настройки я столкнулся с проблемой. У модели Raspberry Pi 4 есть возможность работы Wi-Fi на частоте 5 ГГц (жалко, что нет Wi-Fi 6, но это не страшно).
                        Проблема в том, что Raspberry Pi блокирует возможность использования частоты 5 ГГц в некоторых странах.
                        Например, в России данная частота заблокирована, что довольно странно.</p>
                    <p>Давайте это фиксить.</p>
                </div>
                <?php include($_SERVER['DOCUMENT_ROOT'] ."/app/include/comments.php");?>
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
