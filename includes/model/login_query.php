<?php

class LoginQuery{

    private $user;
    private $loginResults = array();

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
            $remember = $_POST['remember'];
            echo $username.' '.$password.' '.$remember;
            $login = LoginQuery::LoginWithPassword($username, $password, $pdo);
            $period = $remember? time() + 60 * 60 * 24 * 1: 0;
            if ($login['status']) {
                $this->user = $login['user-info'];
                setcookie('username', $this->user['username'], $period, '/', null);
                setcookie('code', $login['cookie'], $period, '/', null);

                // 
            }
        } else {
            if (isset($_COOKIE['username']) && isset($_COOKIE['code'])) {
                $remember = $_POST['remember'];
                $login = LoginQuery::LoginWithCookie($_COOKIE['username'], $_COOKIE['code'], $pdo);
                $period = $remember? time() + 60 * 60 * 24 * 1: 0;
                if ($login['status']) {
                    $this->user = $login['user-info'];
                    setcookie('username', $this->user['username'], $period, '/', null);
                    setcookie('code', $login['cookie'], $period, '/', null);
                }
            }
        }
    }

    public function getUser(){
        return $this->user;
    }
}
?>