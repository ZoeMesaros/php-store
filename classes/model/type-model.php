<?php

require_once 'db.php';

class TypeModel extends DB
{

    protected $table = "types";

    public function getAllTypes()
    {
        return $this->getAll($this->table);
    }
}