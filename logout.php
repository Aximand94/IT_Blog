<?php
session_start();

unset($_SESSION['user']);

header("Location: ".$_SERVER['DOCUMENT_ROOT']."index.php");