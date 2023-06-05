<?php

class UserView
{

    public function renderAllUsersAsList(array $users): void
    {
        echo "<h3>Handle Users</h3>";
        echo "<button><a href='user-new.php'>Add new user</a></button>";
        echo "<br><br>";
        echo "<table id='users'>";
        echo "<th>ID</th>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Last name</th>";
        echo "<th>E-mail</th>";
        echo "<th></th>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['first_name']}</td>";
            echo "<td>{$user['last_name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>";
            echo "<button class='inline'><a href='user-details.php?id={$user['id']}'>Info</a></button>";
            echo "<button class='inline'><a href='user-edit.php?id={$user['id']}'>Edit</a></button>";
            echo "<button class='inline'><a href='user-delete.php?id={$user['id']}'>Delete</a></button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditUserForm($user)
    {
        echo "<h2>Edit user</h2>";
        echo "<form action='form-handlers/user-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<input type='hidden' value='{$user[0]['id']}' name='id'><br>";
        echo "<label for='{$user[0]['username']}'>Username<br></label><input type='text' value='{$user[0]['username']}' name='username' ><br>";
        echo "<label for='{$user[0]['first_name']}'>Name<br></label><input type='text' value='{$user[0]['first_name']}' name='first_name'><br><br>";
        echo "<label for='{$user[0]['last_name']}'>Surname<br></label><input type='text' value='{$user[0]['last_name']}' name='last_name'><br><br>";
        echo "<label for='{$user[0]['email']}'>E-mail<br></label><input type='text' value='{$user[0]['email']}' name='email'><br><br>";
        echo "<button type='submit'>Edit user</button>";
        echo "</form>";
    }

    public function renderDeleteUserForm($user)
    {
        echo "<h2>Remove user</h2>";
        echo "<p>Do you wish to remove {$user[0]['first_name']} {$user[0]['last_name']} ({$user[0]['username']}) with ID: {$user[0]['id']}?</p>";
        echo "<form action='form-handlers/user-remove-form-handler.php' method='post'>";
        echo "<input type='hidden' value='{$user[0]['id']}' name='id'><br>";
        echo "<button type='submit'>Delete User</button>";
        echo "</form>";
    }

    public function renderUserDetail($user)
    {
        echo "<h2>User details</h2>";
        echo "<p>id: {$user[0]['id']}</p>";
        echo "<p>Username: {$user[0]['username']}</p>";
        echo "<p>First Name: {$user[0]['first_name']}</p>";
        echo "<p>Surname: {$user[0]['last_name']}</p>";
        echo "<p>Email Adress: {$user[0]['email']}</p>";
        echo "<br>";
    }

    public function renderTotalSoldFor($user)
    {
        echo "<h2>Sell details</h2>";
        if ($user) {
            echo "<p>Total to user: {$user[0]['toUser']} SEK</p>";
        } else
            echo "<p>Total sold for: 0 SEK</p>";
    }


    public function renderUserItemsForSale($user)
    {
        if ($user) {
            echo "<p>Dresses for sale: {$user[0]['Dresses for sale']}</p>";
        } else
            echo "<p>Dresses for sale: 0</p>";
    }

    public function renderUserItemsSold($user)
    {
        if ($user) {
            echo "<p>Dresses sold: {$user[0]['Dresses sold']}</p>";
        } else
            echo "<p>Dresses sold: 0</p><br>";

    }

    public function renderUserAllitems($user)
    {
        echo "<br><p>All dresses, sold and not sold<p>";
        echo "<table id='users'>";
        echo "<th>Username</th>";
        echo "<th>Item</th>";
        echo "<th>Brand</th>";
        echo "<th>Color</th>";
        echo "<th>Total</th>";
        echo "<th>Total with tax</th>";
        echo "<th>Date added</th>";
        echo "<th>Date sold</th>";
        echo "<tr>";
        foreach ($user as $key => $value) {
            echo "<td>{$user[$key]['username']}</td>";
            echo "<td>{$user[$key]['title']}</td>";
            echo "<td>{$user[$key]['name']}</td>";
            echo "<td>{$user[$key]['color']}</td>";
            echo "<td>{$user[$key]['price']}</td>";
            echo "<td>{$user[$key]['TotalWithTax']}</td>";
            echo "<td>{$user[$key]['date_added']}</td>";
            echo "<td>{$user[$key]['date_sold']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}