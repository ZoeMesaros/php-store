<?php

class MetaDataView
{

    public function renderTotForSale($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Total for sale</th>";
        echo "<td>{$data[0]['TotForSale']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotSales($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Total sold</th>";
        echo "<td>{$data[0]['TotSales']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotUsers($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Total users</th>";
        echo "<td>{$data[0]['TotUsers']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotBrands($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Total brands</th>";
        echo "<td>{$data[0]['TotBrands']}</td>";
        echo "</tr>";
        echo "</table><br><br>";
    }

    public function renderSalesData($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Total</th>";
        echo "<td>{$data[0]['TotBefTax']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total with VAT</th>";
        echo "<td>{$data[0]['TotAfTax']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total to users</th>";
        echo "<td>{$data[0]['TotUser']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total to company</th>";
        echo "<td>{$data[0]['TotCompany']} SEK</td>";
        echo "</tr>";
        echo "</table>";
    }

}
?>