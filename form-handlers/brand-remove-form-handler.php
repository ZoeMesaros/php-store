<?php

require '../classes/model/brand-model.php';
$brandModel = new BrandModel(require '../partials/connect.php');

try {
    if (isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $brandModel->removeBrand($id);

        header("Location: ../brands.php");
    }
} catch (PDOException $ex) {
    if ($ex->getCode() === '23000') {
        echo "Brand information is being used elsewhere.";
        echo "<br><br>";
        echo "<button><a href='../brands.php'>Go Back<a></button>";
    }
}
?>