<?php

require_once 'db.php';

class BrandModel extends DB
{

    protected $table = "brands";

    public function getAllBrands()
    {
        return $this->getAll($this->table);
    }

    public function addBrand(string $name)
    {
        $sql = "INSERT INTO {$this->table} (name) VALUES (?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name]);
    }

}