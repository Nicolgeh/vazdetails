<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
if(isset($_POST['button-create-item'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $car = trim($_POST['checkCar']);
    $type = trim($_POST['ckeckCategory']);
    $PodType = trim($_POST['checkPodCategory']);
if($_POST['name'] === '' || $_POST['description'] === ''|| $_POST['price'] === ''|| $_POST['checkCar'] === ''|| $_POST['checkCategory'] === ''|| $_POST['CheckPodCategory'] === ''){
    $errMsg = 'Не все поля заполнены';
}else{
    $newItem = [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'car' => $car,
        'type' => $type,
        'podtype' => $PodType
    ];
    insert('items', $newItem);
    header('Location: /users/admin/Items/items.php' );
}

}

?>