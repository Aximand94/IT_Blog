<?php ?>
<div class='user-side'>
    <form action='app/control/users.php' method='POST'>
        <h3>Авторизация</h3>
        <label>Введите логин:</label>
        <input type='text' class='form-control' name='user_login'>
        <label>Введите пароль:</label>
        <input type='password' class='form-control' name='user_password'>
        <input type='submit' class='btn btn-primary' value='Войти' name='authorization-submit'>
    </form>
    <span class='modal-registration'>Нет учётной записи?<a href='registration.php'> Зарегистрируйтесь</a></span>
    <span class='modal-registration'><a href='recovery/recovery.php'>Забыли пароль?</a></span>
</div>
