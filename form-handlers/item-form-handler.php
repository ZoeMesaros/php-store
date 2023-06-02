<?php

require '../classes/model/item-model.php';
$itemModel = new ItemModel(require '../partials/connect.php');

if (isset($_POST['title'], $_POST['color'], $_POST['brandID'], $_POST['userID'], $_POST['price'] /* , $_POST['date_added'] */)) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $color = filter_var($_POST['color'], FILTER_SANITIZE_SPECIAL_CHARS);
    $brandid = filter_var($_POST['brandID'], FILTER_SANITIZE_NUMBER_INT);
    $userid = filter_var($_POST['userID'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    /* $dateadded = filter_var($_POST['date_added'], FILTER_SANITIZE_SPECIAL_CHARS); */
    $itemModel->addItem($title, $color, $brandid, $userid, $price /* , $dateadded */);

    header("Location: ../items.php");
}