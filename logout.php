<?php 
session_start();
include 'path.php';

unset($_SESSION['id_user']);
unset($_SESSION['email']);
unset($_SESSION['admin']);

header('Location: /');
?>