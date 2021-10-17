<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
include("path.php");
$message = '';
$table_name = 'post';
$queryAllPost = selectAllOnTable('post');
$queryAdmin = selectPostFromUser('post', 'users');


// создать пост
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['create_post'])){
    $title = trim($_POST['post_title']);
    $topic = $_POST['post_topic'];
    $status = isset($_POST['status']) ? 1 : 0;
    $content = $_POST['post_content'];
    $user_id = '1';
    $author = 'admin';


    if($title=='' || $topic=='' || $content==''){
        $message = "Заголовок, тема и тело поста не могут быть пустыми!";
    } elseif(mb_strLen($title)<2){
        $message = "Заголовок должен быть минимум 2 символа в длину!";
    } else {
        if(selectOne($table_name,["title"=>$title])>0){
            echo $errorMessage = "Пост с таким названием уже есть!";

        } else {
            if($_FILES && $_FILES['title_img']['error'] == UPLOAD_ERR_OK){

                $dir_upload_path = "C:/xampp/htdocs/test_site/files/post_img/".$_FILES['title_img']['name'];
                move_uploaded_file($_FILES['title_img']['tmp_name'] ,$dir_upload_path);
                $file_path = $dir_upload_path;

                $post_parameter = [
                    'id_user'=>$user_id,
                    'title'=>$title,
                    'title_img'=>$file_path,
                    'post_content'=>$content,
                    'topic_id'=>$topic,
                    'author'=>$author,
                    'status'=>$status
                ];
                $result = insertToTable($table_name, $post_parameter);
                //header("Location: ../../admin_account/admin.php");
                if($result){
                    echo "Пост создан!";
                } else {
                    echo "Ошибка";
                }
            } else {
                echo $message = "Не удалось загрузить изображение!";

            }
        }
    }
}

// редактировать пост


// удалить пост
if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id'])){
    $id = $_GET['delete_id'];
    $result = deleteInTable('post', ['id'=>$id]);
    header("Location: {$_SERVER['DOCUMENT_ROOT']}/admin_account/admin.php");
}