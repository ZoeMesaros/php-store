<?php

require 'controller/item-controller.php';
require 'classes/view/item-view.php';
require 'classes/model/item-model.php';

$pdo = require 'partials/connect.php';

$itemModel = new ItemModel($pdo);
$itemview = new ItemView();
$itemController = new ItemController($itemModel, $itemview);

include 'partials/header.php';
include 'partials/nav.php';

$itemController->sellItem();

include 'partials/footer.php';