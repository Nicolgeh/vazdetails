<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
deleteRow('users', ['id_user' => $_GET['id_user']]);
header('Location: \users\admin\users.php');
?>