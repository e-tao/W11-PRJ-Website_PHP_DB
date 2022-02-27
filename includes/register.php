<?php
require_once './model/user_query.php';
require_once 'dbConn.php';

$connect = new DbConn();
$pdo = $connect->getPDO();

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //var_dump($config);
        $createUserResponse = User::AddUser($username, $password, $pdo);
        //var_dump($createUserResponse);
        if ($createUserResponse){
             return header("Location: ../index.php?p=success");
        } else{
            return header("Location: ../index.php?p=fail");
        }
    } 
?>