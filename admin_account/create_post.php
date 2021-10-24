<?php session_start();
include($_SERVER['DOCUMENT_ROOT'].'\app\control\topics.php');
include_once($_SERVER['DOCUMENT_ROOT']."\app\control\post.php");
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/app/include/header.php" ?>
<div class="container">

    <div class="create-post">
        <h2>Добавить запись</h2>
        <div class="errorMessage">
            <?php include $_SERVER['DOCUMENT_ROOT']."/app/help/info.php";?>
        </div>
        <form action="../app/control/post.php" method="POST" enctype="multipart/form-data">
            <label>Заголовок записи:</label>
            <input type="text" class="form-control" name="post_title" placeholter="Заголовок поста">
            <label>Текст записи</label>
            <textarea id="editor" class="form-control" name="post_content"></textarea>
            <label>Добавить изображение:</label>
            <input type="file" class="form-control" name="title_img">
            <label>Тема записи:</label>
            <select class="form-select" name="post_topic">
                <option selected>Выбирите тему записи</option>
                <?php foreach($queryTopics as $row):?>
                    <option value="<?=$row['topic_id']?>"><?=$row['topic_name'];?></option>
                <?php endforeach; ?>
            </select>
            <input type="checkbox" class="form-check-input" name="status"><label>Опубликовать</label><br>
            <input type="reset" class="btn btn-secondary">
            <input type="submit" class="btn btn-primary" name="create_post" value="Добавить пост">
        </form>
    </div>

</div>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."/app/include/footer.php";?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->
<script src="../ckeditor5/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector("#editor"))
        .cache(error=>{
            console.error(error)
        });
</script>
</body>
</html>
