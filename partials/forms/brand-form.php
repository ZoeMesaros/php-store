<?php
require_once 'classes/model/brand-model.php';
$brandModel = new BrandModel(connect($host, $db, $user, $password));
?>
<br>
<h2>Add new brand</h2>
<form action="form-handlers/brand-form-handler.php" method="post">
    <label for="name">Brand name<br> </label><input type="text" name="name" id="name"><br><br>
    <button type="submit">Add new</button>
</form>