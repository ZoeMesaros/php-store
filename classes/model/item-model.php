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
        $sql = "SELECT i.*, c.item_condition, t.type FROM {$this->table} AS i JOIN conditions AS c ON c.id = i.condID JOIN types AS t ON t.id = i.typeID WHERE i.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getItemWithBrandAndUsername(int $id)
    {
        $sql = "SELECT items.id, items.title, items.color, items.price, items.date_added, items.date_sold, items.totPrice, brands.name, sellers.username FROM {$this->table} JOIN `brands` ON brands.id = items.brandID JOIN `sellers` ON sellers.id = items.sellerID WHERE items.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getAllItemsWithSellersAndBrandsAndTax()
    {
        $sql = "SELECT items.id, items.title, items.color, items.item_desc, items.date_added, items.price, sellers.username, brands.name, conditions.item_condition, types.type, SUM(items.price *  1.25) AS TotalWithTax, SUM((items.price * 1.25) - (items.price)) AS TotTax from {$this->table} JOIN sellers ON sellers.id = items.sellerID JOIN brands ON brands.id = items.brandID JOIN conditions ON conditions.id = items.condID JOIN types ON types.id = items.typeID WHERE date_sold IS NULL GROUP BY items.id ORDER BY date_added";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSoldItemsWithTax()
    {
        $sql = "SELECT items.title, items.color, items.date_added, items.date_sold, items.price, sellers.username, brands.name, conditions.item_condition, types.type, SUM(items.price * 1.25) AS TotalWithTax, SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS toSeller, SUM((items.price * 1.25)*(1 - 0.6)) AS toCompany from {$this->table} JOIN sellers ON sellers.id = items.sellerID JOIN brands ON brands.id = items.brandID JOIN conditions ON conditions.id = items.condID JOIN types ON types.id = items.typeID WHERE date_sold IS NOT NULL GROUP BY items.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addItem(string $title, string $color, int $typeid, int $condid, string $desc, int $brandid, int $sellerid, int $price, string $dateadded)
    {
        $sql = "INSERT INTO {$this->table} (title,color,typeID,condID,item_desc,brandID,sellerID,price,date_added) VALUES (?,?,?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$title, $color, $typeid, $condid, $desc, $brandid, $sellerid, $price, $dateadded]);
    }

    public function removeItem(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
    }

    public function editItem(string $title, string $color, int $typeid, int $condid, string $desc, int $price, int $id)
    {
        $sql = "UPDATE {$this->table} SET title = ?, color = ?, typeID = ?, condID = ?, item_desc = ?, price = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$title, $color, $typeid, $condid, $desc, $price, $id]);
    }

    public function sellItem(string $datesold, int $id)
    {
        $sql = "UPDATE {$this->table} SET date_sold = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$datesold, $id]);
    }

    public function getTotAmountOfSales()
    {
        $sql = "SELECT COUNT(*) AS TotSales FROM {$this->table} AS i WHERE i.date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotForSale()
    {
        $sql = "SELECT COUNT(*) AS TotForSale FROM items AS i WHERE i.date_sold IS NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}