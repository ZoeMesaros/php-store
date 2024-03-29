<?php

require '../classes/model/item-model.php';
$itemModel = new ItemModel(require '../partials/connect.php');

if (isset($_POST['title'], $_POST['color'], $_POST['item_desc'], $_POST['price'], $_POST['id'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $color = filter_var($_POST['color'], FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_var($_POST['item_desc'], FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $itemModel->editItem($title, $color, $desc, $price, $id);

    header("Location: ../items.php");
}