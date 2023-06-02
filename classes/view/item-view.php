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
        echo "<th>Price in SEK</th>";
        echo "<th>Price with VAT</th>";
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
            echo "<td>{$item['TotalTax']}</td>";
            echo "<td><button class='inline'><a href='item-sell.php?id={$item['id']}'>Sell This Item</a></button>";
            echo "<button class='inline'><a href='item-edit.php?id={$item['id']}'>Edit</a></button>";
            echo "<button class='inline'><a href='item-delete.php?id={$item['id']}'>Delete</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderAllISoldItemsWithUsersAndBrandsAsList(array $items): void
    {
        echo "<h3>Sold dresses</h3>";
        echo "<table id='users'>";
        echo "<th>Item</th>";
        echo "<th>Color</th>";
        echo "<th>Brand</th>";
        echo "<th>Sold by</th>";
        echo "<th>Date sold</th>";
        echo "<th>Price in SEK</th>";
        echo "<th>Price with VAT</th>";
        echo "<th>Total user</th>";
        echo "<th>Total company</th>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>{$item['title']}</td>";
            echo "<td>{$item['color']}</td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['username']}</td>";
            echo "<td>{$item['date_sold']}</td>";
            echo "<td>{$item['price']}</td>";
            echo "<td>{$item['TotalWithTax']}</td>";
            echo "<td>{$item['toUser']}</td>";
            echo "<td>{$item['toCompany']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditItemForm($item)
    {
        echo "<h2>Edit item</h2>";
        echo "<form action='form-handlers/item-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<input type='hidden' value='{$item[0]['id']}' name='id'><br>";
        echo "<label for='{$item[0]['title']}'>Brand Name<br></label><input type='text' value='{$item[0]['title']}' name='title' ><br>";
        echo "<label for='{$item[0]['color']}'>Color<br></label><input type='text' value='{$item[0]['color']}' name='color' ><br>";
        echo "<label for='{$item[0]['price']}'>Price<br></label><input type='text' value='{$item[0]['price']}' name='price' ><br>";
        echo "<button type='submit'>Edit item</button>";
        echo "</form>";
    }

    public function renderDeleteItemForm($item)
    {
        echo "<h2>Remove item</h2>";
        echo "<p>Do you wish to remove {$item[0]['title']} with ID: {$item[0]['id']}?</p>";
        echo "<form action='form-handlers/item-remove-form-handler.php' method='post'>";
        echo "<input type='hidden' value='{$item[0]['id']}' name='id'><br>";
        echo "<button type='submit'>Delete item</button>";
        echo "</form>";
    }

}
?>