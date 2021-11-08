<?php
if(session_id() == '') {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");

$table_name = "users";
$usersList = selectAllOnTable($table_name);

// регистрация
if($_SERVER['REQUEST_METHOD']=="POST" && (isset($_POST['registration']) || isset($_POST['create_user']))){
    // передаём данные из формы
    $login = trim($_POST['user_login']);
    $user_name = trim($_POST['user_name']);
    $pass = trim($_POST['user_password']);
    $confirm_pass = trim($_POST['confirm_password']);
    $email = trim($_POST['user_email']);
    $status = isset($_POST['create_user']) ? $_POST['user_status']: "user";

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
                "login" => $login,
                "email" => $email,
                "user_password" => $password,
                "user_status"=>$status
            ];
            $result = insertToTable($table_name, $user_parameter);
            if($result){
                $user_res = selectOne($table_name, ['login'=>$login]);
                if(!isset($_SESSION['user'])){
                    $_SESSION['user']=[
                        'id'=>$user_res['id'],
                        'name'=>$user_res['name'],
                        'user_status'=> $user_res['user_status']
                    ];
                }
                header("Location: ../../index.php");
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
            $_SESSION['user']=[
                'id'=>$result['id'],
                'name'=>$result['name'],
                'user_status'=>$result['user_status']
            ];
            header("Location: ../../index.php");
        } else {
            echo "Логин либо пароль не верны!";
        }

    }
}
// выход из аккаунта
if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['logout'])){
    unset($_SESSION['user']);
    session_destroy();
    header("Location: ../../index.php");
}

// редактировать данные пользователя через админку
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['user_id'])){
    $user = selectOne($table_name, ['id'=>$_GET['user_id']]);
    $id = $user['id'];
    $login = $user['login'];
    $name = $user['name'];
    $email = $user['email'];
    $status = $user['user_status'];
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['edit_user'])){
    //printQuery($_POST);
    //exit();
    // передаём данные из формы
    $id = $_POST['user_id'];
    $login = trim($_POST['login']);
    $user_name = trim($_POST['name']);
    $pass = trim($_POST['user_password']);
    $confirm_pass = trim($_POST['confirm_password']);
    $email = trim($_POST['email']);
    $user_status = $_POST['user_status'];

    if($login=="" || $user_name=="" || $email=="" || ($pass || $confirm_pass)==""){
        echo $errorRegMessage = "Вы заполнили не все поля!";
    }
    elseif(mb_strlen($login, "UTF8") < 3 || (mb_strlen($pass, "UTF8")<8 && mb_strlen($confirm_pass, "UTF8")< 8)){
        echo $errorRegMessage = "Логин либо пароль слишком короткие(длина логина не менее 3 символов, длина пароля не менее 8)";
    }
    elseif($pass !== $confirm_pass) {
        echo $errorRegMessage = "Пароли не совпадают!";
    } else {

        $password = password_hash(trim($_POST['user_password']), PASSWORD_DEFAULT);
        $user_parameter = [
            "name" => $user_name,
            "login" => $login,
            "email" => $email,
            "user_password" => $password,
            'user_status'=>$user_status
        ];
        $result = updateTable($table_name, $id, $user_parameter);
        header("Location: ../../admin_account/admin.php");
    }
}

// удаление пользователя через админку
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['delete_id'])){
   $user = selectOne($table_name, ['id'=>$_GET['delete_id']]);
   $id = $user['id'];
   $deleteResult = deleteInTable($table_name, ['id'=>$id]);
   header("Location: ../../admin_account/admin.php");
}




