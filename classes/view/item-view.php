<?php

class ItemView
{

    public function renderAllItemsWithUsersAndBrandsAsList(array $items): void
    {
        echo "<h3>Dresses for sale</h3>";
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
        echo "<th></th>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>{$item['id']}</td>";
            echo "<td>{$item['title']}</td>";
            echo "<td>{$item['color']}</td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['username']}</td>";
            echo "<td>{$item['date_added']}</td>";
            echo "<td>{$item['price']}</td>";
            echo "<td><button class='inline'><a href='item-sell.php?id={$item['id']}'>Sell This Item</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderAllISoldItemsWithUsersAndBrandsAsList(array $items): void
    {
        echo "<h3>Sold dresses</h3>";
        echo "<table id='users'>";
        echo "<th>ID</th>";
        echo "<th>Username</th>";
        echo "<th>Item</th>";
        echo "<th>Brand</th>";
        echo "<th>Color</th>";
        echo "<th>Date sold</th>";
        echo "<th>Price</th>";
        echo "<th>Total Price</th>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>{$item['id']}</td>";
            echo "<td>{$item['username']}</td>";
            echo "<td>{$item['title']}</td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['color']}</td>";
            echo "<td>{$item['date_sold']}</td>";
            echo "<td>{$item['price']}</td>";
            echo "<td>{$item['totPrice']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderItemSellForm($item)
    {
        echo "<table id='users'>";
        echo "<h2>Sell item</h2>";
        echo "<th>Username</th>";
        echo "<th>Item</th>";
        echo "<th>Brand</th>";
        echo "<th>Color</th>";
        echo "<th>Price</th>";
        echo "<tr>";
        echo "<td>{$item[0]['username']}</td>";
        echo "<td>{$item[0]['title']}</td>";
        echo "<td>{$item[0]['name']}</td>";
        echo "<td>{$item[0]['color']}</td>";
        echo "<td>{$item[0]['price']}</td>";
        echo "</tr>";
        echo "</table>";
        echo "<form action='form-handlers/item-sell-form-handler.php' method='post'>";
        echo "<label for='{$item[0]['totPrice']}'>Total Price<br></label><input type='text' name='totPrice' ><br>";
        echo "<label for='{$item[0]['date_sold']}'>Date<br></label><input type='date' name='date_sold' value=" ?>
        <?php echo date('Y-m-d'); ?>
        <?php echo "<br>";
        echo "<br>";
        echo "<button type='submit'>Confirm</button>";
        echo "</form>";
    }


}
?>