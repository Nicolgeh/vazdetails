<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
deleteRow('categories', ['id_category' => $_GET['id_category']]);
header('Location: \users\admin\categories.php');
?>