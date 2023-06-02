<?php

require '../classes/model/brand-model.php';
$brandModel = new BrandModel(require '../partials/connect.php');

if (isset($_POST['name'], $_POST['id'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $brandModel->editBrand($name, $id);

    header("Location: ../brands.php");
}