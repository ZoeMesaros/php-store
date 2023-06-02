<?php

require_once 'db.php';

class ItemModel extends DB
{

    protected $table = "items";

    public function getAllItems()
    {
        return $this->getAll($this->table);
    }

    public function getItem(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getItemWithBrandAndUsername(int $id)
    {
        $sql = "SELECT items.id, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice, brands.name, users.username FROM `items` JOIN `brands` ON brands.id = items.brandID JOIN `users` ON users.id = items.userID WHERE items.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getAllItemsWithUsersAndBrands()
    {
        $sql = "SELECT users.username, brands.name, items.id, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice FROM `users` JOIN `items` ON users.id = items.userID JOIN `brands` ON brands.id = items.brandID WHERE date_sold IS NULL ORDER BY date_added";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSoldItemsWithUsersAndBrands()
    {
        $sql = "SELECT users.username, brands.name, items.id, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice, items.date_sold FROM `users` JOIN `items` ON users.id = items.userID JOIN `brands` ON brands.id = items.brandID WHERE date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem(string $title, string $color, int $brandid, int $userid, int $price, string $dateadded)
    {
        $sql = "INSERT INTO {$this->table} (title,color,brandID,userID,price,date_added) VALUES (?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$title, $color, $brandid, $userid, $price, $dateadded]);
    }

    public function removeItem(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
    }

    public function editItem(string $title, string $color, int $price, int $id)
    {
        $sql = "UPDATE {$this->table} SET title = ?, color = ?, price = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$title, $color, $price, $id]);
    }

}