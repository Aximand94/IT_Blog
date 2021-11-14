<?php
if(session_id() == '') {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
//var_dump($_POST);
$table_name = 'comment';

if($_SERVER['REQUEST_METHOD'] && isset($_POST['add_comment'])){
    $user_id = $_SESSION['user']['id'];
    $post_id = $_POST['post_id'];
    $comment = trim($_POST['comment']);

    if($comment==''){
        echo "Введите коментарий";
    }else{
        $parameter = [
            'comment'=>$comment,
            'post_id'=>$post_id,
            'user_id'=>$user_id
        ];

        $result = insertToTable($table_name, $parameter);
        header("Location: single_post.php?id=$post_id");
    }
}