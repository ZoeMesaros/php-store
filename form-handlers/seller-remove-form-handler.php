<?php

require '../classes/model/seller-model.php';
$sellerModel = new SellerModel(require '../partials/connect.php');

try {
    if (isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $sellerModel->removeSeller($id);
        header("Location: ../sellers.php");
    }
} catch (PDOException $ex) {
    if ($ex->getCode() === '23000') {
        header("Location: ../seller-err-msg.php");
    }
}
?>