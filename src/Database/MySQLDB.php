<?php

namespace Src\Database;

use PDO;
use Src\Database\DatabaseConnectorInteface;

class MySQLDB implements DatabaseConnectorInteface
{
    private $dbname;
    private $hostname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($dbname, $hostname = 'localhost', $username = 'root', $password = 'root')
    {
        $this->dbname = $dbname;
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnector()
    {
        if (!$this->pdo) {
            $dsn = "mysql:dbname={$this->dbname};host={$this->hostname}";
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
            $pdo = new PDO($dsn, "{$this->username}", "{$this->password}", $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
}