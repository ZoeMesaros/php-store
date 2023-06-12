<?php

require_once 'db.php';

class HomeModel extends DB
{

    protected $tItems = "items";
    protected $tUsers = "users";
    protected $tBrands = "brands";

    public function getTotAmountOfSales()
    {
        $sql = "SELECT COUNT(*) AS TotSales FROM {$this->tItems} AS i WHERE i.date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfUsers()
    {
        $sql = "SELECT COUNT(*) AS TotUsers FROM {$this->tUsers}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfBrands()
    {
        $sql = "SELECT COUNT(*) AS TotBrands FROM {$this->tBrands}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotForSale()
    {
        $sql = "SELECT COUNT(*) AS TotForSale FROM {$this->tItems} AS i WHERE i.date_sold IS NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesData()
    {
        $sql = "SELECT SUM(items.price) AS TotBefTax, SUM(items.price * 1.25) AS TotAfTax,  SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS TotUser, SUM((items.price * 1.25)*(1 - 0.6)) AS TotCompany from {$this->tItems} JOIN {$this->tUsers} ON users.id = items.userID JOIN {$this->tBrands} ON brands.id = items.brandID WHERE date_sold IS NOT NULL ORDER BY date_added";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMostExpensiveSold()
    {
        $sql = "SELECT items.title, items.color, items.date_sold, items.price, users.username, brands.name, SUM(items.price * 1.25) AS TotalWithTax from {$this->tItems} JOIN {$this->tUsers} ON users.id = items.userID JOIN {$this->tBrands} ON brands.id = items.brandID WHERE date_sold IS NOT NULL ORDER BY items.price ASC LIMIT 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}