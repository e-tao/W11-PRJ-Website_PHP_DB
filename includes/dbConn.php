<?php

class DbConn
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->setPDO();
    }

    private function DbConfig()
    {
        $host = '192.168.1.15';
        $db = 'w11_assignment';
        $char = 'utf8mb4';

        $user = 'ethan';
        $pwd = 'w8Q1Ji8I23s2r4YIsocemabAb5nEQo';

        $dsn = "mysql:host=$host; dbname=$db; charset=$char";

        $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
        $options[PDO::ATTR_EMULATE_PREPARES] = false;

        return array('dsn' => $dsn, 'user' => $user, 'password' => $pwd, 'options' => $options);
    }

    private function setPDO()
    {
        $dbConn = $this->DbConfig();

        try {
            $pdo = new PDO($dbConn['dsn'], $dbConn['user'], $dbConn['password'], $dbConn['options']);
        } catch (PDOException $pe) {
            throw new PDOException($pe->getMessage(), (int)$pe->getCode());
        }
        return $pdo;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
