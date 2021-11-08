<div class="user-side">
    <img src="img/avatar.jpg" id='user_avatar' class='img-thumbnail' alt='user avatar'>
    <p>Приветствую вас <i><?=$_SESSION['user']['name']?></i></p>
    <?php if($_SESSION['user']['user_status']=='admin'):?>
    <p>У вас учётная запись администратора.</p>
        <a href="admin_account/admin.php">Панель администрирования</a>
    <?php else:?>
    <p>У вас обычная учётная запись.</p>
        <a href="user_account/user_cab.php">Личный кабинет</a>
    <?php endif;?>
    <a href="app/control/users.php?logout">Выйти</a>
</div>

