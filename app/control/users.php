<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");

$isUserSubmit = false;
$table_name = "users";



// регистрация
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['register-submit'])){
    // передаём данные из формы
    $login = trim($_POST['user_login']);
    $user_name = trim($_POST['user_name']);
    $pass = trim($_POST['user_password']);
    $confirm_pass = trim($_POST['confirm_password']);
    $email = trim($_POST['user_email']);
    $age = trim($_POST['user_age']);

    if($login=="" || $user_name=="" || $email=="" || ($pass || $confirm_pass)==""){
        echo $errorRegMessage = "Вы заполнили не все поля!";
    }
    elseif(mb_strlen($login, "UTF8") < 3 || (mb_strlen($pass, "UTF8")<8 && mb_strlen($confirm_pass, "UTF8")< 8)){
        echo $errorRegMessage = "Логин либо пароль слишком короткие(длина логина не менее 3 символов, длина пароля не менее 8)";
    }
    elseif($pass !== $confirm_pass) {
        echo $errorRegMessage = "Пароли не совпадают!";
    } else {
        if (selectOne($table_name, ["login" => $login]) > 0) {
            echo $errorRegMessage = "Такой пользователь уже есть в системе!";

        } else {
            $password = password_hash(trim($_POST['user_password']), PASSWORD_DEFAULT);

            $user_parameter = [
                "name" => $user_name,
                "age" => $age,
                "login" => $login,
                "email" => $email,
                "user_password" => $password
            ];
            //$isUserSubmit = true;
            $result = insertToTable($table_name, $user_parameter);


            if ($result) {
                $_SESSION['user'] = $user_name;
                header("Location: ".$_SERVER['DOCUMENT_ROOT']."/single_1.php");
            } else {
                echo "Ошибка! Не удалость создать нового пользователя!";
            }
        }
    }
}


// авторизация
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['authorization-submit'])){
    $login = trim($_POST['user_login']);
    $pass = trim($_POST['user_password']);

    if($login == '' || $pass == ''){
        $errorRegMessage = "Вы заполнили не все поля!";
    } else {
        $result = selectOne($table_name, ["login"=>$login]);

        if($result && password_verify($pass, $result['user_password'])){
            // авторизация прошла
            $_SESSION['user'] = $result['name'];
            header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
        } else {
            echo "Логин либо пароль не верны!";
        }

    }
}






