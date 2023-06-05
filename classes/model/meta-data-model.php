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

    public function getTotForSale()
    {
        $sql = "SELECT COUNT(*) AS TotForSale FROM {$this->tableItems} AS i WHERE i.date_sold IS NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesData()
    {
        $sql = "SELECT SUM(items.price) AS TotBefTax, SUM(items.price * 1.25) AS TotAfTax, SUM((items.price * 1.25)*(1 - 0.4)) AS TotUser, SUM((items.price * 1.25)*(1 - 0.6)) AS TotCompany from {$this->tableItems} JOIN {$this->tableUsers} ON users.id = items.userID JOIN {$this->tableBrands} ON brands.id = items.brandID WHERE date_sold IS NOT NULL";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



}