<?php

require 'controller/item-controller.php';
require 'classes/view/item-view.php';
require 'classes/model/item-model.php';

$pdo = require 'partials/connect.php';

$itemModel = new ItemModel($pdo);
$itemView = new ItemView();
$itemController = new ItemController($itemModel, $itemView);

include 'partials/header.php';
include 'partials/nav.php';

$itemController->delete();

include 'partials/footer.php';