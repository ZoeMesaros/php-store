<?php

require_once 'db.php';

class ItemModel extends DB
{

    protected $table = "items";

    public function getAllItems()
    {
        return $this->getAll($this->table);
    }


    public function getAllItemsWithUsersAndBrands()
    {
        $sql = "SELECT users.username, brands.name, items.id, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice FROM `users` JOIN `items` ON users.id = items.userID JOIN `brands` ON brands.id = items.brandID";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem(string $title, string $color, int $brandid, int $userid, float $price, string $dateadded)
    {
        $sql = "INSERT INTO {$this->table} (title,color,brandID,userID,price,date_added) VALUES (?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$title, $color, $brandid, $userid, $price, $dateadded]);
    }

}