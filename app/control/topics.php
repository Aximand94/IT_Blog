<?php
if(session_id() == '') {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
$table_name = "topics";
$id = "";
$topic_name = "";
$topic_description = "";

// получаем все категории
$queryTopics = selectAllOnTable('topics');
// получаем названия категорий
$queryTopicsName = selectOneRow($table_name, 'topic_name');

// создать категорию
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['create_topic'])){
    $topic_name = trim($_POST['topic_name']);
    $topic_description = trim($_POST['topic_description']);

    if($topic_description == "" || $topic_name == ""){
        $errorMessage = "Заполните все поля";
        header("Location: ../admin_account/create_topic.php");
    } elseif(mb_strlen($topic_name, "UTF8") < 2){
        echo $errorMessage = "Название категории должно содержать не мение 2 символов";
    } else {

        if(selectOne($table_name,["topic_name"=>$topic_name])>0){
            echo $errorMessage = "Категория с таким названием уже есть!";
        } else {
            $topic_param = [
                "topic_name"=>$topic_name,
                "topic_description"=>$topic_description
            ];
            $result = insertToTable($table_name,$topic_param);
            header("Location: ../../admin_account/admin.php");
        }

    }
} else {
    $topic_name = "";
    $topic_description = "";
}


// изменить категорию

if($_SERVER['REQUEST_METHOD']==="GET" && isset($_GET['id'])){
    $topic = selectOne($table_name, ['id'=>$_GET['id']]);
    $id = $topic['id'];
    $topic_name = $topic['topic_name'];
    $topic_description = $topic['topic_description'];
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['edit_topic'])){
    $topic_name = trim($_POST['topic_name']);
    $topic_description = trim($_POST['topic_description']);
    $id = $_POST['id'];

    if($topic_description == "" || $topic_name == ""){
        $errorMessage = "Заполните все поля";
        header("Location: ../admin_account/create_topic.php");
    } elseif(mb_strlen($topic_name, "UTF8") < 2){
        echo $errorMessage = "Название категории должно содержать не мение 2 символов";
    } else {

        $topic_param = [
            "topic_name"=>$topic_name,
            "topic_description"=>$topic_description
        ];

        $result = updateTable('topics', $id, $topic_param);
        header("Location: ../../admin_account/admin.php");
        }
}


// удалить категорию
if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $result = deleteInTable($table_name, ['id'=>$id]);
    header("Location: ../../admin_account/admin.php");
}

