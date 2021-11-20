<?php
if(session_id() == '') {
    session_start();
}
//ob_start();
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
//var_dump($_POST);
$table_name = 'comment';
$all_comments = selectAllOnTable($table_name);

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add_comment'])){
    $user_id = $_SESSION['user']['id'];
    $post_id = $_POST['post_id'];
    $comment = trim($_POST['comment']);
    $user_name = $_SESSION['user']['name'];

    if($comment==''){
        echo "Введите коментарий";
    }else{
        $parameter = [
            'comment'=>$comment,
            'post_id'=>$post_id,
            'user_name'=>$user_name,
            'user_id'=>$user_id
        ];

        insertToTable($table_name, $parameter);
        header("Location: ../../single_post.php?id=$post_id");
    }
}

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $result_del = deleteInTable('comment',['id'=>$id]);
    header("Location: ../../admin_account/admin.php");
}

//ob_end_clean();