<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
print_r($_POST) ;
if(isset($_POST['button-change-status'])) {
    $status = trim($_GET['status']);
    $id_order = trim($_GET['id_order']);
    $updateStatus = [
        'status' => $status
    ];
    update('orders', $updateStatus, ['id_order' => $id_order]);
    header('Location: /users/admin/Orders/orders.php' );
}
