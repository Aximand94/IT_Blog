<?php
require($_SERVER['DOCUMENT_ROOT'] ."/app/database/db_connected.php");


// получение всех данных с одной бд

function selectAllOnTable($tableName, $parameter=[]){
    // query
    global $pdo;
    $sql = "SELECT * FROM $tableName";
    if(!empty($parameter)) {
        $i = 0;
        foreach($parameter as $key => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }

            if($i==0){
                $sql = $sql." WHERE  $key = $value";
            } else {
                $sql = $sql. " AND   $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->query($sql);
    $result = $query->fetchAll();
    return $result;
}

// получение параметра с бд по условию
function selectOneRow( $tableName,$rowName, $parameter=[]): array
{
    // query
    global $pdo;
    $sql = "SELECT id, $rowName FROM $tableName";
    if(!empty($parameter)){
        $i = 0;
        foreach($parameter as $key => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }

            if($i==0){
                $sql = $sql." WHERE  $key = $value";
            } else {
                $sql = $sql. " AND   $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->query($sql);
    $result = $query->fetchAll();
    return $result;
}

// вывестим одну строку
function selectOne($tableName, $parameter=[]){
    // query
    global $pdo;
    $sql = "SELECT * FROM $tableName";
    if(!empty($parameter)){
        $i = 0;
        foreach($parameter as $key => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }

            if($i==0){
                $sql = $sql." WHERE  $key = $value";
            } else {
                $sql = $sql. " AND   $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->query($sql);
    $result = $query->fetch();
    return $result;
}


// отладка запроса
function printQuery($text){
    echo "<pre>";
        print_r($text);
    echo "<pre>";
    exit();
}

// добавить новую строку в бд
function insertToTable($tableName, $parameters):bool{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach($parameters as $key => $values){
        if($i==0){
            $coll = $coll.$key;
            $mask = $mask."'"."$values"."'";
        } else {
            $coll = $coll.", $key";
            $mask = $mask.", '"."$values"."'";
        }

        $i++;
    }
    $sql = "INSERT INTO $tableName ($coll) VALUES ($mask)";
    //printQuery($sql);
    //exit();
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();
    if($result){
        return true;
    } else {
        return false;
    }

}

// изменение строк бд (доработать функцию)
function updateTable($tableName, $id, $parameters){
    global $pdo;
    $param = "";
    $i = 0;
    foreach($parameters as $key => $values){
        if($i==0){
            $param = $key."= '$values'";
        } else {
            $param .= ",$key='$values'";
        }

        $i++;
    }
    $sql = "UPDATE $tableName SET $param WHERE id = $id";
    //printQuery($sql);
    //exit();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

// удаляет запись с таблицы
function deleteInTable($tableName, $parameters){
    global $pdo;
    $i = 0;
    $param = "";
    foreach($parameters as $key => $values){
        if($i==0){
            $param .= "$key='$values'";
        } else {
            $param .= " AND $key='$values'";
        }

        $i++;
    }
    $sql = "DELETE FROM $tableName WHERE $param";
    //printQuery($sql);
    //exit();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

// выборка записей с автором
function selectPostFromUser($tableOne, $tableTwo){
    global $pdo;
    $sql = "SELECT * FROM $tableOne AS t1 JOIN $tableTwo AS t2 ON t1.id = (t2.id=1);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// топ-3 постов
function topPosts($table_name){
    global $pdo;
    $sql = "SELECT id,title,author,MAX(rating) AS top_rating FROM $table_name GROUP BY rating ORDER BY `top_rating` DESC LIMIT 3";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// поск по постам
function searchInPost($table_name, $strSearch){
    global $pdo;
    $sql = "SELECT * FROM `post` WHERE title OR post_content LIKE '%$strSearch%'";
    //printQuery($sql);
    //exit();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// выборка постов на однуцу
function postsOnOnePage($table_name, $offset, $page_limit){
    global $pdo;
    $sql = "SELECT * FROM post WHERE status=1 LIMIT $offset, $page_limit";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// общее кол-во опубликованных постов
function countPublishPost($table_name){
    global $pdo;
    $sql = "SELECT COUNT(*) FROM `post` WHERE status=1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}

// коментарии к посту
/*
function queryCommentForPost($table_one, $table_two,$post_id){
    global $pdo;
    $sql = "SELECT * FROM $table_one AS t1 JOIN $table_two AS t2 ON t1.id = t2.$post_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
*/