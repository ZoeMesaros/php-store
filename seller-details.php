<?php

require 'controller/seller-controller.php';
require 'classes/view/seller-view.php';
require 'classes/model/seller-model.php';

$pdo = require 'partials/connect.php';

$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();
$sellerController = new SellerController($sellerModel, $sellerView);

include 'partials/header.php';
include 'partials/nav.php';

$sellerController->details();
$sellerController->dressSoldFor();
$sellerController->dressForSale();
$sellerController->dressSold();
$sellerController->dressAll();


include 'partials/footer.php';