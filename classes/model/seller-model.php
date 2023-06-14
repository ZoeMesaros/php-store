<?php

require_once 'db.php';

class SellerModel extends DB
{

    protected $table = "sellers";

    public function getAllSellers()
    {
        return $this->getAll($this->table);
    }

    public function getAllSellersOrderByFirstname()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY first_name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSeller(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function addSeller(string $username, string $firstname, string $lastname, string $email, string $phone)
    {
        $sql = "INSERT INTO {$this->table} (username,first_name, last_name, email, phone) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email, $phone]);
    }

    public function editSeller(string $username, string $firstname, string $lastname, string $email, string $phone, int $id)
    {
        $sql = "UPDATE {$this->table} SET username = ?, first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email, $phone, $id]);
    }

    public function removeSeller(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
    }

    public function getSellerItemsForSale(int $id)
    {
        $sql = "SELECT s.username, s.id, COUNT(s.id) AS 'Dresses for sale' FROM {$this->table} AS s JOIN items AS i ON s.id = i.sellerID WHERE s.id LIKE ? AND i.date_sold IS NULL GROUP BY s.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getSellerItemsSold(int $id)
    {
        $sql = "SELECT s.username, s.id, COUNT(s.id) AS 'Dresses sold' FROM {$this->table} AS s JOIN items AS i ON s.id = i.sellerID WHERE s.id LIKE ? AND i.date_sold IS NOT NULL GROUP BY s.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getSellerAllItems(int $id)
    {
        $sql = "SELECT items.title, items.color, items.price, items.date_added, items.date_sold, SUM(items.price * 1.25) AS TotalWithTax, sellers.username, sellers.first_name, sellers.last_name, brands.name FROM `items` JOIN `sellers` ON sellers.id = items.sellerID JOIN `brands` ON brands.id = items.brandID WHERE sellers.id = ? GROUP BY items.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getSellerSoldFor(int $id)
    {
        $sql = "SELECT s.username, s.id, SUM((i.price * 1.25)*(1 - 0.4)) AS toSeller FROM {$this->table} AS s JOIN items AS i ON s.id = i.sellerID WHERE s.id LIKE ? AND i.date_sold IS NOT NULL GROUP BY i.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }
}