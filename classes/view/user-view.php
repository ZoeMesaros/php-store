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
        echo "<h2>Remove user {$user[0]['id']}?</h2>";
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
        echo "<p>Dresses sold</p>";
        echo "<p>Total sold for</p>";
        echo "<p>All dresses</p>";
        echo "<table>";
        echo "</table>";
    }


    public function renderUserItemsForSale($user)
    {
        if ($user) {
            echo "<p>Amount of dresses for sale: {$user[0]['Dresses for sale']}</p>";
        } else
            echo "<p>Amount of dresses for sale: 0</p>";
    }

    public function renderUserItemsSold($user)
    {
        if ($user) {
            echo "<p>Number of dresses sold: {$user[0]['Dresses sold']}</p>";
        } else
            echo "<p>Number of dresses sold: 0</p>";

    }
}