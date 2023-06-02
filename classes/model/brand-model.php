<?php

require_once 'db.php';

class BrandModel extends DB
{

    protected $table = "brands";

    public function getAllBrands()
    {
        return $this->getAll($this->table);
    }

    public function getBrand(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function addBrand(string $name)
    {
        $sql = "INSERT INTO {$this->table} (name) VALUES (?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name]);
    }

    public function editBrand(string $name, int $id)
    {
        $sql = "UPDATE {$this->table} SET name = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name, $id]);
    }

    public function removeBrand(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
    }

}