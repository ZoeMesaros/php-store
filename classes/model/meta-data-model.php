<?php

require_once 'db.php';

class MetaDataModel extends DB
{

    protected $tableItems = "items";
    protected $tableUsers = "users";

    protected $tableBrands = "brands";

    public function getTotAmountOfSales()
    {
        $sql = "SELECT COUNT(*) AS TotSales FROM {$this->tableItems} AS i WHERE i.date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfUsers()
    {
        $sql = "SELECT COUNT(*) AS TotUsers FROM {$this->tableUsers}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfBrands()
    {
        $sql = "SELECT COUNT(*) AS TotBrands FROM {$this->tableBrands}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotForSale()
    {
        $sql = "SELECT COUNT(*) AS TotForSale FROM {$this->tableItems} AS i WHERE i.date_sold IS NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesData()
    {
        $sql = "SELECT SUM(items.price) AS TotBefTax, SUM(items.price * 1.25) AS TotAfTax,  SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS TotUser, SUM((items.price * 1.25)*(1 - 0.6)) AS TotCompany from {$this->tableItems} JOIN {$this->tableUsers} ON users.id = items.userID JOIN {$this->tableBrands} ON brands.id = items.brandID WHERE date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMostExpensiveSold()
    {
        $sql = "SELECT items.title, items.color, items.date_sold, items.price, users.username, brands.name, SUM(items.price * 1.25) AS TotalWithTax from items JOIN users ON users.id = items.userID JOIN brands ON brands.id = items.brandID WHERE date_sold IS NOT NULL ORDER BY items.price ASC LIMIT 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}