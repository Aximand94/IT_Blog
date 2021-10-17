<?php
include($_SERVER['DOCUMENT_ROOT'] .'/app/database/db_connected.php');
$id = $_GET['id'];
$message = "";

$sql = "DELETE FROM topics WHERE topic_id=$id";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
if($result){
    $message = "Успешно удалено!";
} else {
    $message = "Ошибка удаления!";
}

header("Location: ".$_SERVER['DOCUMENT_ROOT'] ."/admin_account/admin.php");
