<?php

require 'classes/view/home-view.php';

require 'classes/model/db.php';
require 'classes/model/home-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$homeModel = new HomeModel($pdo);
$homeView = new HomeView();



include 'partials/header.php';
include 'partials/nav.php';

$homeView->renderTotForSale($homeModel->getTotForSale());
$homeView->renderTotSales($homeModel->getTotAmountOfSales());
$homeView->renderTotUsers($homeModel->getTotAmountOfUsers());
$homeView->renderTotBrands($homeModel->getTotAmountOfBrands());
$homeView->renderMostExp($homeModel->getMostExpensiveSold());
$homeView->renderSalesData($homeModel->getSalesData());

include 'partials/footer.php';