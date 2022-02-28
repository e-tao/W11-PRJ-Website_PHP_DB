<?php

class UserQuery{
    public static function AddUser($username, $password, $pdo)
    {
        $q = $pdo->prepare('SELECT `userId` FROM `user` WHERE `username`=:username');
        $q->execute(["username" => $username]);
        if (!empty($q->rowCount())) {
            return false;
        } else {
        $passHass = password_hash($password, PASSWORD_BCRYPT);
        $q = $pdo->prepare('INSERT INTO  `user` (`username`, `passHash`) VALUES (?, ?);');
        $q->execute([$username, $passHass]);
        return true;
        }
    }     
}