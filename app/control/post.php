<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
include("../../path.php");
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
            // изображение
            if($_FILES && $_FILES['title_img']['error'] == UPLOAD_ERR_OK){

                //проверка типа файла
                $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
                $detectedType = exif_imagetype($_FILES['title_img']['tmp_name']);
                $file_type_result = in_array($detectedType, $allowedTypes);

                // если не img, то ошибка. иначе продолжаем загрузку
                if(!$file_type_result){
                    echo $message = "Файл не является изображением!";
                } else {
                    $file_name = time().'_'.$_FILES['title_img']['name'];
                    $dir_upload_path = FILE_PATH."\\files\img\post\\".$file_name;
                    $file_upload_result = move_uploaded_file($_FILES['title_img']['tmp_name'] ,$dir_upload_path);
                    $file_path = $file_name;

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