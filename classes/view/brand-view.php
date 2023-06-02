<?php

class BrandView
{
    public function renderAllBrandsAsList(array $brands): void
    {
        echo "<h3>All brands</h3>";
        echo "<button><a href='brand-new.php'>Add new brand</a></button>";
        echo "<br><br>";
        echo "<table id='users'>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th></th>";
        foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td>{$brand['id']}</td>";
            echo "<td>{$brand['name']}</td>";
            echo "<td>";
            echo "<button class='inline'><a href='brand-edit.php?id={$brand['id']}'>Edit</a></button>";
            echo "<button class='inline'><a href='brand-delete.php?id={$brand['id']}'>Delete</a></button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditBrandForm($brand)
    {
        echo "<h2>Edit Brand</h2>";
        echo "<form action='form-handlers/brand-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<input type='hidden' value='{$brand[0]['id']}' name='id'><br>";
        echo "<label for='{$brand[0]['name']}'>Brand Name<br></label><input type='text' value='{$brand[0]['name']}' name='name' ><br>";
        echo "<button type='submit'>Edit brand</button>";
        echo "</form>";
    }

    public function renderDeleteBrandForm($brand)
    {
        echo "<h2>Remove brand</h2>";
        echo "<p>Do you wish to remove {$brand[0]['name']} with ID: {$brand[0]['id']}?</p>";
        echo "<form action='form-handlers/brand-remove-form-handler.php' method='post'>";
        echo "<input type='hidden' value='{$brand[0]['id']}' name='id'><br>";
        echo "<button type='submit'>Delete brand</button>";
        echo "</form>";
    }
}