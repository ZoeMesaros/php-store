<?php

class HomeView
{

    public function renderTotForSale($data)
    {
        echo "<h2>Store statistics</h2><br>";
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Items for sale</th>";
        echo "<td>{$data[0]['TotForSale']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotSales($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Items sold</th>";
        echo "<td>{$data[0]['TotSales']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotSellers($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Sellers</th>";
        echo "<td>{$data[0]['TotSellers']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotBrands($data)
    {
        echo "<table class='tablemeta'>";
        echo "<tr>";
        echo "<th>Brands</th>";
        echo "<td>{$data[0]['TotBrands']}</td>";
        echo "</tr>";
        echo "</table><br><br>";
    }

    public function renderSalesData($data)
    {
        echo "<table class='tablemeta'>";
        echo "<h2>Economy</h2>";
        echo "<tr>";
        echo "<th>Total</th>";
        echo "<td>{$data[0]['TotBefTax']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total with VAT</th>";
        echo "<td>{$data[0]['TotAfTax']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<tr>";
        echo "<th>Total VAT</th>";
        echo "<td>{$data[0]['TotTax']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total to sellers</th>";
        echo "<td>{$data[0]['TotSeller']} SEK</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total to company</th>";
        echo "<td>{$data[0]['TotCompany']} SEK</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderMostExp($data)
    {
        echo "<table class='tablemeta'>";

        echo "<h2>Most expensive item sold</h2>";
        echo "<th>Item</th>";
        echo "<th>Brand</th>";
        echo "<th>By seller</th>";
        echo "<th>Date</th>";
        echo "<th>Total with tax</th>";
        echo "<tr>";
        echo "<td>{$data[0]['title']}</td>";
        echo "<td>{$data[0]['name']}</td>";
        echo "<td>{$data[0]['username']}</td>";
        echo "<td>{$data[0]['date_sold']}</td>";
        echo "<td>{$data[0]['TotalWithTax']}</td>";
        echo "</tr>";
        echo "</table><br><br>";
    }

}
?>