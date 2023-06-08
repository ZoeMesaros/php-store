<?php

class BrandView
{
    public function renderAllBrandsAsList(array $brands): void
    {
        echo "<h3 class='pageTitle'>All brands</h3>";
        echo "<button class='addButton'><a href='brand-new.php'>Add new brand</a></button>";
        echo "<br><br>";
        echo "<table class='brandsTable'>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th></th>";
        foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td>{$brand['id']}</td>";
            echo "<td>{$brand['name']}</td>";
            echo "<td>";
            echo "<button class='btnEdit'><a href='brand-edit.php?id={$brand['id']}'>Edit</a></button>";
            echo "<button class='btnDel'><a href='brand-delete.php?id={$brand['id']}'>Delete</a></button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function renderEditBrandForm($brand)
    {
        echo "<h2>Edit Brand</h2>";
        echo "<form class='centerForm' action='form-handlers/brand-edit-form-handler.php' method='post'>";
        echo "<br>";
        echo "<input type='hidden' value='{$brand[0]['id']}' name='id'><br>";
        echo "<label for='{$brand[0]['name']}'>Brand Name<br></label><input type='text' value='{$brand[0]['name']}' name='name' ><br><br>";
        echo "<button type='submit'>Edit brand</button>";
        echo "</form>";
    }

    public function renderDeleteBrandForm($brand)
    {
        echo "<h2 >Remove brand</h2>";
        echo "<p>Do you wish to remove {$brand[0]['name']}?</p>";
        echo "<form class='centerForm' action='form-handlers/brand-remove-form-handler.php' method='post'>";
        echo "<input type='hidden' value='{$brand[0]['id']}' name='id'><br>";
        echo "<button type='submit'>Delete brand</button>";
        echo "</form>";
    }
}