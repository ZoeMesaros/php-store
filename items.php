<?php

require 'classes/view/item-view.php';
require 'classes/model/item-model.php';

$pdo = require 'partials/connect.php';

$itemModel = new ItemModel($pdo);
$itemView = new ItemView();

include 'partials/header.php';
include 'partials/nav.php';

$itemView->renderAllItemsWithSellersAndBrandsAsList($itemModel->getAllItemsWithSellersAndBrandsAndTax());

include 'partials/footer.php';