<?php

require_once 'db.php';

class UserModel extends DB
{

    protected $table = "users";

    public function getAllUsers()
    {
        return $this->getAll($this->table);
    }

    public function getAllUsersOrderByFirstname()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY first_name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function addUser(string $username, string $firstname, string $lastname, string $email)
    {
        $sql = "INSERT INTO {$this->table} (username,first_name, last_name, email) VALUES (?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email]);
    }

    public function editUser(string $username, string $firstname, string $lastname, string $email, int $id)
    {
        $sql = "UPDATE {$this->table} SET username = ?, first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email, $id]);
    }

    public function removeUser(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
    }

    public function getUserItemsForSale(int $id)
    {
        $sql = "SELECT u.username, u.id, COUNT(u.id) AS 'Dresses for sale' FROM {$this->table} AS u JOIN items AS i ON u.id = i.userID WHERE u.id LIKE ? AND i.date_sold IS NULL GROUP BY u.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getUserItemsSold(int $id)
    {
        $sql = "SELECT u.username, u.id, COUNT(u.id) AS 'Dresses sold' FROM {$this->table} AS u JOIN items AS i ON u.id = i.userID WHERE u.id LIKE ? AND i.date_sold IS NOT NULL GROUP BY u.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getUserAllItems(int $id)
    {
        $sql = "SELECT items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice, users.username, users.first_name, users.last_name, brands.name FROM `items` JOIN `users` ON users.id = items.userID JOIN `brands` ON brands.id = items.brandID WHERE users.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }
}