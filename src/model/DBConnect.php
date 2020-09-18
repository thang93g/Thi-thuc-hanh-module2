<?php
namespace Prd\model;
use PDO;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=productmanage;charset=utf8";
        $this->username = "root";
        $this->password = "Buoica1as";
    }

    public function connect()
    {
        $connect = NULL;
        $connect = new PDO($this->dsn,$this->username,$this->password);
        return $connect;
    }
}