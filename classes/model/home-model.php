<?php

require_once 'db.php';

class HomeModel extends DB
{

    protected $tItems = "items";
    protected $tSellers = "sellers";
    protected $tBrands = "brands";

    public function getTotAmountOfSales()
    {
        $sql = "SELECT COUNT(*) AS TotSales FROM {$this->tItems} AS i WHERE i.date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotAmountOfSellers()
    {
        $sql = "SELECT COUNT(*) AS TotSellers FROM {$this->tSellers}";
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
        $sql = "SELECT SUM(items.price) AS TotBefTax, SUM(items.price * 1.25) AS TotAfTax,  SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS TotSeller, SUM((items.price * 1.25)*(1 - 0.6)) AS TotCompany from {$this->tItems} JOIN {$this->tSellers} ON sellers.id = items.sellerID JOIN {$this->tBrands} ON brands.id = items.brandID WHERE date_sold IS NOT NULL ORDER BY date_added";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMostExpensiveSold()
    {
        $sql = "SELECT items.title, items.color, items.date_added, items.date_sold, items.price, sellers.username, brands.name, SUM(items.price * 1.25) AS TotalWithTax, SUM((items.price * 1.25) - (items.price)) AS TotTax, SUM((items.price * 1.25)*(1 - 0.4)) AS toSeller, SUM((items.price * 1.25)*(1 - 0.6)) AS toCompany from items JOIN sellers ON sellers.id = items.sellerID JOIN brands ON brands.id = items.brandID WHERE date_sold IS NOT NULL GROUP BY items.id ORDER BY items.price DESC LIMIT 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}