<?php

require '../classes/model/seller-model.php';
$sellerModel = new SellerModel(require '../partials/connect.php');

if (isset($_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $firstname = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sellerModel->addSeller($username, $firstname, $lastname, $email, $phone);

    header("Location: ../sellers.php");
}