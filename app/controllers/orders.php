<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
if(isset($_POST['button-buy'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $price = trim(selectOne('items', ['id_item' => $_GET['id_item']])['price']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $id_item = trim($_GET['id_item']);
if($_POST['firstname'] === '' || $_POST['lastname'] === ''|| $_POST['email'] === ''|| $_POST['phone'] === ''|| $_POST['address'] === ''){
    $errMsg = 'Не все поля заполнены';
}else{
    $newOrder = [
        'id_user' => $_SESSION['id_user'],
        'position' => $_GET['id_item'],
        'price' => $price,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'status' => 1
    ];
    insert('orders', $newOrder);
    header('Location: /' );
}
}
