<?php

namespace Src\Models;

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
        $res = $this->database->getConnector()->query("SELECT * FROM {$this->name} ORDER BY id DESC")->fetchAll();
        return $res;
    }

    public function find(int $id)
    {
        $req = $this->database->getConnector()->prepare("SELECT * FROM {$this->name} WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    public function update(int $id, array $params)
    {
        $fields = [];

        foreach ($params as $value => $key) {
            $fields[] = "$value = :$value";
        }

        $fields = implode(', ', $fields);
        $params['id'] = $id;

        $req = $this->database->getConnector()->prepare("UPDATE {$this->name} SET {$fields} WHERE id = :id");
        $req->execute($params);
        return true;
    }

    public function create(array $params)
    {
        $fields = [];
        $values = [];

        foreach ($params as $key => $value) {
            $fields[] = $key;
            $values[] = ":$key";
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        $req = $this->database->getConnector()->prepare("INSERT INTO {$this->name}({$fields}) VALUES({$values})");
        $req->execute($params);
        return true;
    }

    public function delete(int $id)
    {
        $req = $this->database->getConnector()->prepare("DELETE FROM {$this->name} WHERE id = ?");
        $req->execute([$id]);
        return true;
    }
}
