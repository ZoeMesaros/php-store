<?php
require_once 'classes/model/seller-model.php';
$sellerModel = new SellerModel(connect($host, $db, $user, $password));
?>
<br>
<h2>Add new seller</h2>
<form action="form-handlers/seller-form-handler.php" method="post">
    <label for="username">Username<br> </label><input type="text" name="username" id="username" required><br>
    <label for="first_name">Name<br></label><input type="text" name="first_name" id="first_name" required><br><br>
    <label for="last_name">Lastname<br></label><input type="text" name="last_name" id="last_name" required><br><br>
    <label for="email">E-mail<br></label><input type="email" name="email" id="email" required><br><br>
    <label for="phone">Phone number<br></label><input type="text" name="phone" id="phone" required><br><br>
    <button type="submit">Add seller</button>
</form>