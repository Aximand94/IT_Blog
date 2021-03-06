
<?php session_start();
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
<div class="container">
    <h2>Создать пользователя</h2>
    <form action="../app/control/users.php" method="POST">
        <label>Введите логин:</label>
        <input type="text"     class="form-control" name="user_login">
        <label>Введите имя:</label>
        <input type="text"     class="form-control" name="user_name">
        <label>Введите пароль:</label>
        <input type="password" class="form-control" name="user_password">
        <label>Повторите пароль:</label>
        <input type="password" class="form-control" name="confirm_password">
        <label>Введите email:</label>
        <input type="email"    class="form-control" name="user_email">
        <label>Тип учётной записи:</label>
        <select class="form-select" name="user_status">
            <option selected>Выберете уровень привелегий</option>
            <option value="admin">Admin</option>
            <option value="moderator">Moderator</option>
            <option value="user">User</option>
        </select>
        <input type="reset" class="btn btn-secondary">
        <input type="submit" class="btn btn-primary" name="create_user" value="Создать">
    </form>
</div>
<!-- Footer -->
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
