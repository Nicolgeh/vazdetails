<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
if(isset($_POST['button-create-categorie'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $type = trim($_POST['checkCategorie']);
if($_POST['name'] === '' || $_POST['description'] === ''){
    $errMsg = 'Не все поля заполнены';
}else{
    $newCategorie = [
        'name' => $name,
        'description' => $description,
        'type' => $type
    ];
    insert('categories', $newCategorie);
    header('Location: /users/admin/Categories/categories.php' );
}
}
if(isset($_POST['button-edit-categorie'])) {

}
?>