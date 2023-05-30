<?php

class UserView
{

    public function renderAllUsersAsList(array $users): void
    {
        echo "<h3>Handle Users</h3>";
        echo "<table id='users'>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Last name</th>";
        echo "<th>E-mail</th>";
        echo "<th></th>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['first_name']}</td>";
            echo "<td>{$user['last_name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo
                "<td>
            <a href='user-edit.php?id={$user['id']}'>Edit</a>
            <a href=>Delete</a>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditUserForm($user)
    {
        echo "<h2>Edit user {$user[0]['id']}</h2>";
        echo "<form action='form-handlers/user-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<label for='{$user[0]['id']}'>id<br></label><input type='text' value='{$user[0]['id']}' name='id'><br>";
        echo "<label for='{$user[0]['username']}'>Username<br></label><input type='text' value='{$user[0]['username']}' name='username' ><br>";
        echo "<label for='{$user[0]['first_name']}'>Name<br></label><input type='text' value='{$user[0]['first_name']}' name='first_name'><br><br>";
        echo "<label for='{$user[0]['last_name']}'>Surname<br></label><input type='text' value='{$user[0]['last_name']}' name='last_name'><br><br>";
        echo "<label for='{$user[0]['email']}'>E-mail<br></label><input type='text' value='{$user[0]['email']}' name='email'><br><br>";
        echo "<button type='submit'>Edit user</button>";
        echo "</form>";
    }
}