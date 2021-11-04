<?php session_start();
    include("path.php");
    include_once("app/control/topics.php");

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['search'])){
    $strSearch = trim($_GET['strSearch']);
    $resultSearch = searchInPost('post',$strSearch);
}
if(isset($_GET['topic_id'])){
    $id = $_GET['topic_id'];
    $postForTopic = selectAllOnTable('post', ['topic_id'=>$id]);
}else{
    $id='';
}

?>
<!doctype html>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/app/include/header.php";?>
<!-- Main -->
<div class="container">
    <div class="content row">
        <div class="sidebar col-md-3 col-12">
            <!-- window user -->
            <?php if(isset($_SESSION['user'])){
                include($_SERVER['DOCUMENT_ROOT'] ."/app/include/user_side/authoriz_user_side.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT'] ."/app/include/user_side/user_side.php");
            }?>
            <!-- Aside -->
            <?php include($_SERVER['DOCUMENT_ROOT'] ."/app/include/sidebar.php");?>
        </div>
        <!-- Main -->
        <div class="main-content col-md-9 col-12">
            <h2 class="last-publication">Последние публикации</h2>
            <div class="blog-post row">
                <div class="post-img col-12 col-md-4">
                    <img src="img/preview_img.jpg" class="img-thumbnail" alt="post-img" >
                </div>
                <div class="post-text col-12 col-md-8">
                    <h3><a href="single.php">Рандомная статья из мира IT</a></h3>
                    <i class="">Тематика</i>
                    <i class="post-author">Автор</i>
                    <i class="post-date">Дата публикации</i>
                    <p class="preview-tex">
                        Если вам приходилось хотя бы однажды размещать в верстке текст, набранный неумело,
                        без знания особенностей работы с ним средствами программ макетирования, то вопрос “есть ли у набора правила?” покажется вам лишним.
                        Или, наоборот, вам случалось набирать текст, утомляя глаза и пальцы, а потом видеть недовольные лица верстальщиков…
                        Каким же требованиям должен подчиняться компьютерный набор, чтобы обеспечить эффективную подготовку публикации?
                        Основных принципов можно выделить три: совместимость, простота и структурированность.</p>
                </div>
            </div>
        <!-- Выводи посты по категориям -->
        <?php if(isset($_GET['topic_id'])):?>
            <?php foreach($postForTopic as $row_topic):?>
                <?php if($row_topic['status']==1):?>
                    <div class="blog-post row">
                        <div class="post-img col-12 col-md-4">
                            <img src="files/img/post/<?=$row_topic['title_img'];?>" class="img-thumbnail" alt="post-img" >
                        </div>
                        <div class="post-text col-12 col-md-8">
                            <h3><a href="single_post.php?id=<?=$row_topic['id']?>"><?=mb_substr($row_topic['title'],0,100)."...";?></a></h3>
                            <i class="topic">Тема</i>
                            <i class="post-author">Автор: <?=$row_topic['author'];?></i>
                            <i class="post-date">Дата публикации: <?=$row_topic['create_dtime'];?></i>
                            <p class="preview-tex"><?=mb_substr($row_topic['post_content'],0,400)."...";?></p>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        <!-- Вводим посты из поиска -->
        <?php else:?>
            <?php foreach($resultSearch as $rowSearch):?>
                <?php if($rowSearch['status']==1):?>
                <div class="blog-post row">
                    <div class="post-img col-12 col-md-4">
                        <img src="files/img/post/<?=$rowSearch['title_img'];?>" class="img-thumbnail" alt="post-img" >
                    </div>
                    <div class="post-text col-12 col-md-8">
                        <h3><a href="single_post.php?id=<?=$$rowSearch['id']?>"><?=mb_substr($rowSearch['title'],0,100)."...";?></a></h3>
                        <i class="topic">Тема</i>
                        <i class="post-author">Автор: <?=$rowSearch['author'];?></i>
                        <i class="post-date">Дата публикации: <?=$rowSearch['create_dtime'];?></i>
                        <p class="preview-tex"><?=mb_substr($rowSearch['post_content'],0,400)."...";?></p>
                    </div>
                </div>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>
        </div>
    </div>
</div>
<!-- Footer  -->
<?php include $_SERVER['DOCUMENT_ROOT'] ."/app/include/footer.php";?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->
</body>
</html>