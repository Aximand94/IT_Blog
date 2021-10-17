<?php
$host = "localhost";
$db_name = "test_site";
$db_admin = "root";
$db_pass = "";
$db_charset = "utf8";
$db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try
{
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=$db_charset", $db_admin, $db_pass,$db_options);
} catch(PDOException $e)
{
    echo "Ошибка подключения: ".$e->getMessage()."<br>";
}
