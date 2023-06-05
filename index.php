<?php

require 'classes/view/meta-data-view.php';

require 'classes/model/db.php';
require 'classes/model/meta-data-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$dataModel = new MetaDataModel($pdo);
$dataView = new MetaDataView();



include 'partials/header.php';
include 'partials/nav.php';

$dataView->renderTotForSale($dataModel->getTotForSale());
$dataView->renderTotSales($dataModel->getTotAmountOfSales());
$dataView->renderSalesData($dataModel->getSalesData());

include 'partials/footer.php';