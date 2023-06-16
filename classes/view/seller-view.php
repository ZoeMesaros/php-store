<?php

class SellerView
{

    public function renderAllSellersAsList(array $sellers): void
    {
        echo "<h3 class='pageTitle'>Handle Sellers</h3>";
        echo "<button class='addButton'><a href='seller-new.php'>Add new seller</a></button>";
        echo "<br><br>";
        echo "<table class='center'>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Last name</th>";
        echo "<th>E-mail</th>";
        echo "<th>Phone</th>";
        echo "<th></th>";
        foreach ($sellers as $seller) {
            echo "<tr>";
            echo "<td>{$seller['username']}</td>";
            echo "<td>{$seller['first_name']}</td>";
            echo "<td>{$seller['last_name']}</td>";
            echo "<td>{$seller['email']}</td>";
            echo "<td>{$seller['phone']}</td>";
            echo "<td>";
            echo "<button class='btnGreen'><a href='seller-details.php?id={$seller['id']}'>Info</a></button>";
            echo "<button class='btnEdit'><a href='seller-edit.php?id={$seller['id']}'>Edit</a></button>";
            echo "<button class='btnDel'><a href='seller-delete.php?id={$seller['id']}'>Delete</a></button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditSellerForm($seller)
    {
        echo "<h2>Edit seller</h2>";
        echo "<form class='centerForm' action='form-handlers/seller-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<input type='hidden' value='{$seller[0]['id']}' name='id'><br>";
        echo "<label for='{$seller[0]['username']}'>Username<br></label><input type='text' value='{$seller[0]['username']}' name='username' ><br>";
        echo "<label for='{$seller[0]['first_name']}'>Name<br></label><input type='text' value='{$seller[0]['first_name']}' name='first_name'><br><br>";
        echo "<label for='{$seller[0]['last_name']}'>Surname<br></label><input type='text' value='{$seller[0]['last_name']}' name='last_name'><br><br>";
        echo "<label for='{$seller[0]['email']}'>E-mail<br></label><input type='text' value='{$seller[0]['email']}' name='email'><br><br>";
        echo "<label for='{$seller[0]['phone']}'>Phone number<br></label><input type='text' value='{$seller[0]['phone']}' name='phone'><br><br>";
        echo "<button type='submit'>Edit seller</button>";
        echo "</form>";
    }

    public function renderDeleteSellerForm($seller)
    {
        echo "<h2>Remove seller</h2>";
        echo "<p>Do you wish to remove {$seller[0]['first_name']} {$seller[0]['last_name']} ({$seller[0]['username']})?</p>";
        echo "<form class='centerForm' action='form-handlers/seller-remove-form-handler.php' method='post'>";
        echo "<input type='hidden' value='{$seller[0]['id']}' name='id'><br>";
        echo "<button type='submit'>Delete Seller</button>";
        echo "</form>";
    }

    public function renderSellerDetail($seller)
    {
        echo "<h2>Seller details</h2>";
        echo "<p>id: {$seller[0]['id']}</p>";
        echo "<p>Username: {$seller[0]['username']}</p>";
        echo "<p>Name: {$seller[0]['first_name']}</p>";
        echo "<p>Surname: {$seller[0]['last_name']}</p>";
        echo "<p>Email: {$seller[0]['email']}</p>";
        echo "<p>Phone: {$seller[0]['phone']}</p>";
        echo "<br>";
    }

    public function renderTotalSoldFor($seller)
    {
        echo "<h2>Sale details</h2>";
        if ($seller) {
            echo "<p>Total to seller: {$seller[0]['toSeller']} SEK</p>";
        } else
            echo "<p>Total sold for: 0 SEK</p>";
    }


    public function renderSellerItemsForSale($seller)
    {
        if ($seller) {
            echo "<p>Dresses for sale: {$seller[0]['Dresses for sale']}</p>";
        } else
            echo "<p>Dresses for sale: 0</p>";
    }

    public function renderSellerItemsSold($seller)
    {
        if ($seller) {
            echo "<p>Dresses sold: {$seller[0]['Dresses sold']}</p>";
        } else
            echo "<p>Dresses sold: 0</p><br>";

    }

    public function renderSellerAllitems($seller)
    {
        echo "<br><p>All dresses, sold and not sold<p>";
        echo "<table class='center'>";
        echo "<th>Username</th>";
        echo "<th>Item</th>";
        echo "<th>Brand</th>";
        echo "<th>Color</th>";
        echo "<th>Total</th>";
        echo "<th>Total with tax</th>";
        echo "<th>Date added</th>";
        echo "<th>Date sold</th>";
        echo "<tr>";
        foreach ($seller as $key => $value) {
            echo "<td>{$seller[$key]['username']}</td>";
            echo "<td>{$seller[$key]['title']}</td>";
            echo "<td>{$seller[$key]['name']}</td>";
            echo "<td>{$seller[$key]['color']}</td>";
            echo "<td>{$seller[$key]['price']}</td>";
            echo "<td>{$seller[$key]['TotalWithTax']}</td>";
            echo "<td>{$seller[$key]['date_added']}</td>";
            echo "<td>{$seller[$key]['date_sold']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderAddNewSeller($seller)
    {
        echo "<h2>Add new seller</h2>
      <form action='form-handlers/seller-form-handler.php' method='post'>
          <label for='username'>Username<br> </label><input type='text' name='username' id='username' required><br>
          <label for='first_name'>Name<br></label><input type='text' name='first_name' id='first_name' required><br><br>
          <label for='last_name'>Lastname<br></label><input type='text' name='last_name' id='last_name' required><br><br>
          <label for='email'>E-mail<br></label><input type='email' name='email' id='email' required><br><br>
          <label for='phone'>Phone number<br></label><input type='text' name='phone' id='phone' required><br><br>
          <button type='submit'>Add seller</button>
      </form>";
    }

}