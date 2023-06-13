<?php

require 'classes/view/seller-view.php';
require 'classes/model/seller-model.php';

$pdo = require 'partials/connect.php';

$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

include 'partials/header.php';
include 'partials/nav.php';

$sellerView->renderAllSellersAsList($sellerModel->getAllSellersOrderByFirstname());

include 'partials/footer.php';