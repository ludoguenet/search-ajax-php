<?php

namespace Src;

use Src\Auth\DatabaseAuth;
use Src\Database\MySQLDB;

class App
{
    private static $app_instance;
    private $mysql_instance;

    public static function getApp()
    {
        if (!self::$app_instance) {
            self::$app_instance = new App();
        }
        return self::$app_instance;
    }

    public function getMySQLFactory()
    {
        if (!$this->mysql_instance) {
            $MySQL = new MySQLDB('mynewproject');
            $this->mysql_instance = $MySQL;
        }
        return $this->mysql_instance;
    }

    public function getAuth()
    {
        return new DatabaseAuth($this->getMySQLFactory());
    }
}
