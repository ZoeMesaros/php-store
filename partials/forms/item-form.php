<?php
require_once 'classes/model/item-model.php';
require_once 'classes/model/user-model.php';
require_once 'classes/model/brand-model.php';
$itemModel = new ItemModel(connect($host, $db, $user, $password));
$userModel = new UserModel(connect($host, $db, $user, $password));
$brandModel = new BrandModel(connect($host, $db, $user, $password));
?>
<br>
<h2>Add new item</h2>
<form action="form-handlers/item-form-handler.php" method="post">
    <label for="title">Item name<br> </label><input type="text" name="title" id="title"><br>
    <label for="color">Color<br></label><input type="text" name="color" id="color"><br><br>
    <select name="brandID" id="brandID">
        <option value="">Select an existing brand</option>
        <?php
        $brands = $brandModel->getAllBrands();
        foreach ($brands as $brand) {
            echo "<option value='{$brand['id']}'>
                    {$brand['name']}
                </option>";
        }
        ?>
    </select><br>
    <p>or add new</p>
    <label for='brandID'>Brand name<br></label><input type='text' name='brandID' id='brandID'><br><br>
    <select name="userID" id="userID">
        <option value="">Select a user</option>
        <?php
        $users = $userModel->getAllUsers();
        foreach ($users as $user) {
            echo "<option value='{$user['id']}'>
                    {$user['username']}
                </option>";
        }
        ?>
    </select><br>
    <p><a href="user-new.php">Add new user here</a></p>
    <label for="price">Price<br></label><input type="text" name="price" id="price"><br><br>
    <input class="hidden" type="date" name='date_sold' value="<?php echo date('Y-m-d'); ?>"><br><br>
    <button type="submit">Add item</button>
</form>