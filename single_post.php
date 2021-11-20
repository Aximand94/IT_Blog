<?php session_start();
        //ob_start();
      include_once("app/control/post.php");
      include_once("app/control/comments.php");
      $post = selectOne('post', ['id'=>$_GET['id']]);
      $comments = selectAllOnTable('comment',['post_id'=>$post['id']]);
      //printQuery($comments);
      //exit();
?>
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
                <h2><?=$post['title'];?></h2>
                <i class="">Тематика</i>
                <i class="post-author"><?=$post['author'];?></i>
                <i class="post-date"><?=$post['create_dtime'];?></i>
                <div class="row col-12">
                    <img src="files/img/post/<?=$post['title_img'];?>" class="post-img img-fluid" alt="post img">
                </div>
                <div class="row post-text col-12">
                    <?=$post['post_content'];?>
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
