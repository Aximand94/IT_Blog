<?php
echo "
            <div class='user-side'>
                <img src='img/avatar.jpg' id='user_avatar' class='img-thumbnail' alt='user avatar'>
                <p>Приветствую вас <i><i>{$_SESSION['user']}</i></p>
                <a href='".$_SERVER['DOCUMENT_ROOT']."/user_account/user_cab.php'>Личный кабинет</a>
                <a href='logout.php'>Выйти</a>
            </div>";


/*
echo  <<<END
            <div class='user-side'>
                <img src='img/avatar.jpg' id='user_avatar' class='img-thumbnail' alt='user avatar'>
                <p>Приветствую вас <i><i>{$_SESSION['user']}</i></p>
                <a href='user_cab.php'>Личный кабинет</a>
                <a href='logout.php'>Выйти</a>
            </div>
END;
*/
