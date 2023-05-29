<?php

require_once 'classes/db.php';

class ItemModel extends DB
{

    protected $table = "items";

    public function getAllItems()
    {
        return $this->getAll($this->table);
    }


    public function getAllItemsWithUsersAndBrands()
    {
        $sql = "SELECT users.username, brands.name, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice FROM `users` JOIN `items` ON users.id = items.userID JOIN `brands` ON brands.id = items.brandID";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    /*     public function addUser(string $username, string $email, string $img)
        {
            $sql = "INSERT INTO {$this->table} (username,email,img) VALUES (?,?,?)";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$username, $email, $img]);
        }

        public function editUser(string $username, string $email, string $img, int $id)
        {
            $sql = "UPDATE {$this->table} SET username = ?, email = ?, img = ? WHERE id = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$username, $email, $img, $id]);
        }

        public function removeUser(int $id)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$id]);
        } */
}