<?php
require_once 'classes/model/item-model.php';
require_once 'classes/model/seller-model.php';
require_once 'classes/model/brand-model.php';
require_once 'classes/model/condition-model.php';
$itemModel = new ItemModel(connect($host, $db, $user, $password));
$sellerModel = new SellerModel(connect($host, $db, $user, $password));
$brandModel = new BrandModel(connect($host, $db, $user, $password));
$conditionModel = new ConditionModel(connect($host, $db, $user, $password));
?>
<br>
<h2>Add new item</h2><br>
<form action="form-handlers/item-form-handler.php" method="post">
    <label for="title">Item name<br> </label><input type="text" name="title" id="title"><br>
    <label for="color">Color<br></label><input type="text" name="color" id="color"><br><br>
    <label for="color">Item condition<br></label>
    <select name="condID" id="condID">
        <option value="">Select condition</option>
        <?php
        $conditions = $conditionModel->getAllConditions();
        foreach ($conditions as $condition) {
            echo "<option value='{$condition['id']}'>
                    {$condition['item_condition']}
                </option>";
        }
        ?>
    </select><br><br>
    <label for="item_desc">Item description<br></label><textarea type="text" name="item_desc"
        id="item_desc"></textarea><br><br>
    <label for="brand">Item brand<br></label>
    <select name="brandID" id="brandID">
        <option value="">Select brand</option>
        <?php
        $brands = $brandModel->getAllBrands();
        foreach ($brands as $brand) {
            echo "<option value='{$brand['id']}'>
                    {$brand['name']}
                </option>";
        }
        ?>
    </select><br>
    <p><a href="brand-new.php">or add new</a></p>
    <label for="seller">Seller<br></label>
    <select name="sellerID" id="sellerID">
        <option value="">Select seller</option>
        <?php
        $sellers = $sellerModel->getAllSellers();
        foreach ($sellers as $seller) {
            echo "<option value='{$seller['id']}'>
                    {$seller['username']}
                </option>";
        }
        ?>
    </select><br>
    <p><a href="seller-new.php">or add new</a></p>
    <label for="price">Price in SEK<br>
    </label><input type="number" id="price" name="price"><br>
    <p>Tax is added automatically (25%)</p>
    <input class="hidden" type="date" name='date_added' value="<?php echo date('Y-m-d'); ?>"><br>
    <button type="submit">Add item</button>
</form>