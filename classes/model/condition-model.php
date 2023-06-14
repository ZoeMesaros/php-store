<?php

require_once 'db.php';

class ConditionModel extends DB
{

    protected $table = "conditions";

    public function getAllConditions()
    {
        return $this->getAll($this->table);
    }
}