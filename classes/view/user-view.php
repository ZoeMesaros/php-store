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
            echo "<button class='inline'><a href='user-details.php?id={$user['id']}'>Details</a></button>";
            echo "<button class='inline'><a href='user-edit.php?id={$user['id']}'>Edit</a></button>";
            echo "<form action='form-handlers/user-remove-form-handler.php' method='post'>
            <button class='inline' type='submit' value='{$user['id']}'>Delete</button>
            </form>";
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

    public function renderUserDetailForm($user)
    {
        echo "<h2>User details</h2>";
        echo "<form action='form-handlers/user-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "Hej";
        echo "<input type='hidden' value='{$user[0]['id']}' name='id'><br>";
        echo "<label for='{$user[0]['username']}'>Username<br></label><input type='text' value='{$user[0]['username']}' name='username' ><br>";
        echo "<label for='{$user[0]['first_name']}'>Name<br></label><input type='text' value='{$user[0]['first_name']}' name='first_name'><br><br>";
        echo "<label for='{$user[0]['last_name']}'>Surname<br></label><input type='text' value='{$user[0]['last_name']}' name='last_name'><br><br>";
        echo "<label for='{$user[0]['email']}'>E-mail<br></label><input type='text' value='{$user[0]['email']}' name='email'><br><br>";
        echo "<button type='submit'>Edit user</button>";
        echo "</form>";
    }

}