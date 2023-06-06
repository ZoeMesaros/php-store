<?php

class MetaDataView
{
    public function renderTotSales($data)
    {
        echo "<table class='center'>";
        echo "<th>Dresses sold</th>";
        echo "<tr>";
        echo "<td>{$data[0]['TotSales']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderTotForSale($data)
    {
        echo "<table class='center'>";
        echo "<th>Dresses for sale</th>";
        echo "<tr>";
        echo "<td>{$data[0]['TotForSale']}</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function renderSalesData($data)
    {
        echo "<table class='center'>";
        echo "<th>Total</th>";
        echo "<th>Total with VAT</th>";
        echo "<th>Total users</th>";
        echo "<th>Total company</th>";
        echo "<tr>";
        echo "<td>{$data[0]['TotBefTax']}</td>";
        echo "<td>{$data[0]['TotAfTax']}</td>";
        echo "<td>{$data[0]['TotUser']}</td>";
        echo "<td>{$data[0]['TotCompany']}</td>";
        echo "</tr>";

        echo "</table>";
    }

}
?>