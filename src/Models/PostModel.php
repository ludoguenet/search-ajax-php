<?php

namespace Src\Models;


class PostModel extends Model
{
    public function search(string $query)
    {
        $req = $this->database->getConnector()->query("SELECT * FROM {$this->name} WHERE content LIKE '%{$query}%'")->fetchAll();
        return $req;
    }
}