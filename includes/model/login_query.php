<?php

class LoginQuery{

    private $user;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->login($pdo);
   }

    public static function LoginWithPassword($username, $password,$pdo)
        {

            $q = $pdo->prepare('SELECT `userId`, `username`, `passHash` FROM `user` WHERE `username`=?');
            $q->execute([$username]);

            if (!empty($q->rowCount())) {
                $row = $q->fetch();
                if (password_verify($password, $row['passHash'])) {

                    $cookie = md5(mt_rand(0, 999999999999));
                    $cookieHash = password_hash($cookie, PASSWORD_BCRYPT);


                    $q = $pdo->prepare('UPDATE `user` SET `cookieHash` = :chash WHERE `user`.`userId`=:userId;');
                    $q->execute(['chash' => $cookieHash, 'userId' => $row['userId']]);

                    return array('status' => true, 'user-info' => $row, 'cookie' => $cookie);
                }
            }
            return array('status' => false, 'message' => 'failed to login, please try again!');
        }

        public static function LoginWithCookie($username, $cookie, $pdo)
        {

            $q = $pdo->prepare('SELECT `userId`, `username`, `cookieHash` FROM `user` WHERE `username`=?');
            $q->execute([$username]);

            if (!empty($q->rowCount())) {
                $row = $q->fetch();
                if (password_verify($cookie, $row['cookieHash'])) {
                    return array('status' => true, 'user-info' => $row, 'cookie' => $cookie);
                }
            }
            return array('status' => false, 'message' => 'failed to login, please try again!');
            //echo $username . ' ' . $password;
        }
   

    public function login($pdo)
    {
        if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = LoginQuery::LoginWithPassword($username, $password, $pdo);
            if ($login['status']) {
                $this->user = $login['user-info'];
                setcookie('username', $this->user['username'], time() + 60 * 30, '/');
                setcookie('code', $login['cookie'], time() + 60 * 30, '/');
            }
        } else {
            if (isset($_COOKIE['username']) && isset($_COOKIE['code'])) {
                $login = LoginQuery::LoginWithCookie($_COOKIE['username'], $_COOKIE['code'], $pdo);
                if ($login['status']) {
                    $this->user = $login['user-info'];
                    setcookie('username', $this->user['username'], time() + 60 * 30, '/');
                    setcookie('code', $login['cookie'], time() + 60 * 30, '/');
                }
            }
        }
    }

    public function getUser(){
        return $this->user;
    }
}
?>