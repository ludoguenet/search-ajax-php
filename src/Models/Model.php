<?php

namespace Src\Models;

use Src\Database\MySQLDB;
use Src\Database\DatabaseConnectorInteface;


class Model
{
    protected $database;
    protected $name;

    public function __construct(DatabaseConnectorInteface $database)
    {
        $this->database = $database;
        if (!$this->name) {
            $parts = explode('\\', get_class($this));
            $fullClassName = strtolower(end($parts));
            $class_name = str_replace('model', '', $fullClassName) . 's';
            $this->name = $class_name;
        }
    }

    public function all()
    {
        $res = $this->database->getConnector()->query("SELECT * FROM {$this->name}")->fetchAll();
        return $res;
    }
}