<?php
    require_once './model/login_query.php';
    require_once 'dbConn.php';
    
    $connect = new DbConn();
    $pdo = $connect->getPDO();

    // if (isset($_POST['remember'])) {
    //     $remember = true;
    // }

    $login = new LoginQuery();
    $login->login($pdo);

    $userInfo = $login->getUser();
    if (isset($userInfo)) {
        header("Location: ../index.php?p=home");
    }
?>