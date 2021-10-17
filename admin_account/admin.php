<?php //session_start();
include($_SERVER['DOCUMENT_ROOT'].'\app\control\topics.php');
include($_SERVER['DOCUMENT_ROOT'].'\app\control\post.php');
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
<?php include $_SERVER['DOCUMENT_ROOT'] ."/app/include/header.php" ?>
<div class="container admin_page">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="create_post.php">Добавить пост</a>
        </div>
        <div class="col">
            <a class="btn btn-primary" href="create_user.php">Создать пользователя</a>
        </div>
        <div class="col">
            <a class="btn btn-primary" href="create_topic.php">Создать категорию</a>
        </div>



    </div>
    <div class="row" style="text-align: center"><h1>Просмотр</h1></div>
    <div class="row">
        <div class="d-flex align-items-start">
            <div class="col col-md-3 col-12">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Посты</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Пользователи</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Категории</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Коментарии</button>
                </div>
            </div>
            <div class="col col-md-9 col-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2>Управление записями</h2>

                    <table class="table table-hover">
                        <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>Id пользователя</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>Дата и время публикации</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                            <tr>
                                <td>0</td>
                                <td>2</td>
                                <td>Рандомная статья из мира IT</td>
                                <td>Одмин</td>
                                <td>1088 год от рождества Христова</td>
                                <td><button class="btn btn-danger">Удалить<button class="btn btn-primary">Редактировать</button></td>
                            </tr>
                            <?php foreach($queryAllPost as $post):?>
                            <tr>
                                <th><?=$post['id']?></th>
                                <th><?=$post['id_user']?></th>
                                <th><?=$post['title']?></th>
                                <th><?=$post['author']?></th>
                                <th><?=$post['create_dtime']?></th>
                                <td><a class="btn btn-danger" href="edit_post.php?delete_id=<?=$post['id']?>">Удалить</a>
                                    <a class="btn btn-primary" href="edit_post.php?id=<?=$post['id']?>">Редактировать</a>
                                    <a class="btn btn-secondary" href="#">Перейти к записи</a>
                                    <?php if($post['status']):?>
                                        <a class="btn btn-primary" href="">В черновик</a>
                                        <?php else:?>
                                        <a class="btn btn-primary" href="">Опубликовать</a>
                                        <?php endif;?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h2>Управление пользователями</h2>
                    <table class="table table-hover">
                        <thead class="table-primary">
                        <th>Id</th>
                        <th>Логин</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Управление</th>
                        </thead>
                        <tbody class="table-light">
                        <td>1</td>
                        <td>2</td>
                        <td>Admin</td>
                        <td>admin123@mail.ru</td>
                        <td>admin</td>
                        <td><button class="btn btn-danger">Удалить<button class="btn btn-primary">Редактировать</button></td>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <h2>Управление категориями</h2>
                    <table class="table table-hover">
                        <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        <tr>
                            <td>0</td>
                            <td>Новости</td>
                            <td>Новости из мира IT</td>
                            <td><button class="btn btn-danger">Удалить<button class="btn btn-primary">Редактировать</button></td>
                        </tr>
                        <?php foreach($queryTopics as $row){
                            echo "<tr>";
                            echo "<td>{$row['topic_id']}</td>";
                            echo "<td>{$row['topic_name']}</td>";
                            echo "<td>{$row['topic_description']}</td>";
                            echo "<td><a href='edit_topic.php?delete_id={$row['topic_id']}' class='btn btn-danger'>Удалить</a><a href='edit_topic.php?id={$row['topic_id']}' class='btn btn-primary'>Редактировать</a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <h2>Управление коментариями</h2>
                    <table class="table table-hover">
                        <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>ID поста</th>
                            <th>Коментарий</th>
                            <th>Автор</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Тут текст коментария</td>
                            <td>Hanuman</td>
                            <td><button class="btn btn-danger">Удалить<button class="btn btn-primary">Редактировать</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
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
</body>
</html>
