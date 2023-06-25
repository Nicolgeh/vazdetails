<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/path.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/db.php';
//include $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/upload.php';

$isSubmit = false;
$errMsg = '';
$table = 'users';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $rep_pass = trim($_POST['repeat_password']);
    $phone = trim($_POST['phone']);
    $admin = 0;

    $searchEmail = ['email' => $email];

    if($firstname === '' || $lastname === '' || $email === '' || $pass === '' || $rep_pass = ''){
        $errMsg = 'Не все поля заполнены';
    }elseif(selectOne('users', $searchEmail) > 1){
        $errMsg = 'Такой Email уже есть';
    }elseif($_POST['password'] != $_POST['repeat_password']){
        $errMsg = 'Пароли не совпадают';
    }elseif(strlen($pass) < 6){
        $errMsg = 'Пароль должен быть длинее 6-ти символов';
    }else{
        
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $passHash,
            'phone' => $phone
        ];
        $id_user = insert($table, $post);
        $user = selectOne('users', ['id_user' => $id_user]);
        $defaultAva = [
            'id_user' => $user['id_user'],
            'name' => 'prewiew.png',
            'path' => $_SERVER['DOCUMENT_ROOT'] . '\assets\images\avatars'
        ];
        insert('usersAvatars', $defaultAva);
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['admin'] = $user['admin'];
        


             header('Location: /users/user/profile.php' );
        
        
    }


    $isSubmit = true;
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $selEmail = selectOne('users', ['email' => $email]);
    if(!empty($selEmail)){
        if($selEmail && password_verify($pass, $selEmail['password'])){
            $_SESSION['id_user'] = $selEmail['id_user'];
            $_SESSION['email'] = $selEmail['email'];
            $_SESSION['admin'] = $selEmail['admin'];
            if($_SESSION['admin']){
                header('Location: \users\admin\Orders\orders.php');
            }else{
                header('Location: /users/user/profile.php');
            }
        }else{
            $errMsg = 'Password doesnt exist';
        }
    }else{
        $errMsg = 'Login not found';
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-edit'])){
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $phone = trim($_POST['phone']);

    if($firstname === '' || $lastname === '' || $email === '' || $phone === ''){
        $errMsg = 'Не все поля заполнены';
    }else{
        $updatePost = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
        ];
        $updateWhere = [
            'id_user' =>  $_SESSION['id_user']
        ];

        update($table, $updatePost, $updateWhere);
        
        header('Location: /users/user/profile.php');
    }

}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-edit-admin'])){
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $phone = trim($_POST['phone']);
    $admin = trim($_POST['checkAdmin']);

    if($firstname === '' || $lastname === '' || $email === '' || $phone === ''){
        $errMsg = 'Не все поля заполнены';
    }else{
        $updatePost = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'admin' => $admin
        ];
        $updateWhere = [
            'id_user' =>  $_GET['id_user']
        ];

        update($table, $updatePost, $updateWhere);
        
        header('Location: /users/admin/users.php');
    }
}else{
    $email = '';
    $firstname = '';
    $lastname = '';
}


// if(isset($_POST['login'])){

//     if($_POST['password'] == $_POST['repeat_password'])
//     {
//         $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

//         //
//     }else{
//         echo "Your passwords doesn't matches";
//     }   
// }
