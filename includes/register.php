<?php
require_once './model/user_query.php';
require_once 'dbConn.php';

$connect = new DbConn();
$pdo = $connect->getPDO();

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $createUserResponse = UserQuery::AddUser($username, $password, $pdo);
        if ($createUserResponse){
             return header("Location: ../index.php?p=success");
        } else{
            return header("Location: ../index.php?p=fail");
        }
    } 
?>