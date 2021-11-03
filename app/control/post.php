<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/app/db_function/db_query_function.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/path.php");
// ошибки
$errorMessage = [];
// информирование
$infoMessage = [];

$table_name = 'post';
$queryAllPost = selectAllOnTable('post');
$queryAdmin = selectPostFromUser('post', 'users');



// создать пост
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['create_post'])){
    //printQuery($_POST);
    //exit();

    if($_FILES && $_FILES['title_img']['error'] == UPLOAD_ERR_OK){
        //проверка типа файла
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($_FILES['title_img']['tmp_name']);
        $file_type_result = in_array($detectedType, $allowedTypes);

        // если не img, то ошибка. иначе продолжаем загрузку
        if(!$file_type_result){
            $errorMessage[] = "Файл не является изображением!";

        } else {
            $file_name = time() . '_' . $_FILES['title_img']['name'];
            $dir_upload_path = FILE_PATH . "\\files\img\post\\" . $file_name;
            $file_upload_result = move_uploaded_file($_FILES['title_img']['tmp_name'], $dir_upload_path);
            $file_path = $file_name;
        }
    }


    $title = trim($_POST['post_title']);
    $topic = $_POST['post_topic'];
    $status = isset($_POST['status']) ? 1 : 0;
    $content = $_POST['post_content'];
    $user_id = '1';
    $author = 'admin';


    if($title=='' || $topic=='' || $content==''){
        $errorMessage[] = "Заголовок, тема и тело поста не могут быть пустыми!";
        //print_r($errorMessage);

    } elseif(mb_strLen($title)<2){
        $errorMessage[] = "Заголовок должен быть минимум 2 символа в длину!";

    } elseif(selectOne($table_name,["title"=>$title])>0){
        $errorMessage[] = "Пост с таким названием уже есть!";

    } else {

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
            if($result){
                $infoMessage[] = "Пост создан!";
            } else {
                $infoMessage[] = "Ошибка создания поста";
            }


    }
    header("Location: ../../admin_account/create_post.php");
}





// редактировать пост
// получаем данные с бд
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    $post = selectOne('post', ["id"=>$_GET['id']]);
    $id = $post['id'];
    $title = $post["title"];
    $content = $post["post_content"];
    $status = $post['status'];
    //$topic_id = $post['topic_id'];
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['edit_post'])){

    //printQuery($_POST);
    //exit();

    if($_FILES && $_FILES['title_img']['error'] == UPLOAD_ERR_OK){
        //проверка типа файла
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($_FILES['title_img']['tmp_name']);
        $file_type_result = in_array($detectedType, $allowedTypes);

        // если не img, то ошибка. иначе продолжаем загрузку
        if(!$file_type_result){
            $errorMessage[] = "Файл не является изображением!";


        } else {
            $file_name = time() . '_' . $_FILES['title_img']['name'];
            $dir_upload_path = FILE_PATH . "\\files\img\post\\" . $file_name;
            $file_upload_result = move_uploaded_file($_FILES['title_img']['tmp_name'], $dir_upload_path);
            $file_path = $file_name;
        }
    }

    $id= $_POST['id'];
    $title = trim($_POST['title']);
    $topic = $_POST['post_topic'];
    $status = isset($_POST['status']) ? 1 : 0;
    $content = $_POST['post_content'];
    //$user_id = '1';
    //$author = 'admin';


    if($title=='' || $content==''){
        $errorMessage[] = "Заголовок  и тело поста не могут быть пустыми!";
        //print_r($errorMessage);

    } elseif(mb_strLen($title)<2){
        $errorMessage[] = "Заголовок должен быть минимум 2 символа в длину!";

    }  else {
        $post_parameter = [
            'title'=>$title,
            'title_img'=>$file_path,
            'post_content'=>$content,
            'topic_id'=>$topic,
            'status'=>$status
        ];
        $result = updateTable($table_name, $id, $post_parameter);
        header("Location: ../../admin_account/admin.php");
    }

}

// публикация и черновик
if($_SERVER['REQUEST_METHOD']==="GET" && isset($_GET['pub_id'])){
    $status = $_GET['publish'];
    $id = $_GET['pub_id'];
    $result = updateTable($table_name, $id, ['status'=>$status]);
    header("Location: ../../admin_account/admin.php");
    exit();
}

// удалить пост
if($_SERVER['REQUEST_METHOD']==="GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $result_del = deleteInTable($table_name, ['id'=>$id]);
    header("Location: {$_SERVER['DOCUMENT_ROOT']}/admin_account/admin.php");
}

