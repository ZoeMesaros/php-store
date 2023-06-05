<?php

require 'classes/view/item-view.php';

require 'classes/model/db.php';
require 'classes/model/item-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$itemModel = new ItemModel($pdo);
$itemView = new ItemView();



include 'partials/header.php';
include 'partials/nav.php';

$itemView->renderTotSales($itemModel->getTotAmountOfSales());
$itemView->renderTotForSale($itemModel->getTotForSale());

include 'partials/footer.php';