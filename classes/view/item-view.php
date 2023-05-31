<?php

class ItemView
{

    public function renderAllItemsWithUsersAndBrandsAsList(array $items): void
    {
        echo "<h3>Dresses</h3>";
        echo "<button><a href='item-new.php'>Add new item</a></button>";
        echo "<br><br>";
        echo "<table id='users'>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Color</th>";
        echo "<th>Brand</th>";
        echo "<th>Sold By</th>";
        echo "<th>Date added</th>";
        echo "<th>Price</th>";
        echo "<th>Mark as sold</th>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>{$item['id']}</td>";
            echo "<td>{$item['title']}</td>";
            echo "<td>{$item['color']}</td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['username']}</td>";
            echo "<td>{$item['date_added']}</td>";
            echo "<td>{$item['price']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}