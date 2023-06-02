<?php

require '../classes/model/brand-model.php';
$brandModel = new BrandModel(require '../partials/connect.php');

if (isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $brandModel->addBrand($name);

    header("Location: ../brands.php");
}