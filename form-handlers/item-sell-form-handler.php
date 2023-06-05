<?php

require '../classes/model/item-model.php';
$itemModel = new ItemModel(require '../partials/connect.php');

if (isset($_POST['id'], $_POST['date_sold'])) {
    $datesold = filter_var($_POST['date_sold'], FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $itemModel->sellItem($datesold, $id);

    header("Location: ../items.php");
}