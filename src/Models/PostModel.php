<?php

namespace Src\Models;


class PostModel extends Model
{
    public function search(string $query)
    {
        $parts = explode(' ', $query);
        $sql = "SELECT * FROM {$this->name}";
        $i = 0;
        foreach ($parts as $word) {
            if (strlen($word) > 3) {
                $word = strtolower($word);
                if ($i == 0) {
                    $sql .= " WHERE content LIKE '%{$word}%'";
                } else {
                    $sql .= " OR content LIKE '%{$word}%'";
                }
                $i++;
            }
        }
        $req = $this->database->getConnector()->query($sql)->fetchAll();
        return $req;
    }
}