<?php

require_once 'db.php';

class HomeModel extends DB
{

    protected $table = "items";
    protected $table2 = "sellers";
    protected $table3 = "brands";

    public function getTotAmountOfSales()
    {
        $sql = "SELECT COUNT(*) AS TotSales FROM {$this->table} AS i WHERE i.date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfSellers()
    {
        $sql = "SELECT COUNT(*) AS TotSellers FROM {$this->table2}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfBrands()
    {
        $sql = "SELECT COUNT(*) AS TotBrands FROM {$this->table3}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotForSale()
    {
        $sql = "SELECT COUNT(*) AS TotForSale FROM {$this->table} AS i WHERE i.date_sold IS NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesData()
    {
        $sql = "SELECT SUM(items.price) AS TotBefTax, SUM(items.price * 1.25) AS TotAfTax,  SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS TotSeller, SUM((items.price * 1.25)*(1 - 0.6)) AS TotCompany from {$this->table} JOIN {$this->table2} ON sellers.id = items.sellerID JOIN {$this->table3} ON brands.id = items.brandID WHERE date_sold IS NOT NULL ORDER BY date_added";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMostExpensiveSold()
    {
        $sql = "SELECT items.title, items.color, items.date_added, items.date_sold, items.price, sellers.username, brands.name, SUM(items.price * 1.25) AS TotalWithTax, SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS toSeller, SUM((items.price * 1.25)*(1 - 0.6)) AS toCompany from {$this->table} JOIN sellers ON sellers.id = items.sellerID JOIN {$this->table3} ON brands.id = items.brandID WHERE date_sold IS NOT NULL GROUP BY items.id ORDER BY items.price DESC LIMIT 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}