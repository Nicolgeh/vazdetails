<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
deleteRow('items', ['id_item' => $_GET['id_item']]);
header('Location: \users\admin\Items\items.php');
?>