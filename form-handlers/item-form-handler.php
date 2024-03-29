<?php

require '../classes/model/item-model.php';
$itemModel = new ItemModel(require '../partials/connect.php');

if (isset($_POST['title'], $_POST['color'], $_POST['item_desc'], $_POST['brandID'], $_POST['sellerID'], $_POST['price'], $_POST['date_added'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $color = filter_var($_POST['color'], FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_var($_POST['item_desc'], FILTER_SANITIZE_SPECIAL_CHARS);
    $brandid = filter_var($_POST['brandID'], FILTER_SANITIZE_NUMBER_INT);
    $sellerid = filter_var($_POST['sellerID'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $dateadded = filter_var($_POST['date_added'], FILTER_SANITIZE_SPECIAL_CHARS);
    $itemModel->addItem($title, $color, $desc, $brandid, $sellerid, $price, $dateadded);

    header("Location: ../items.php");
}