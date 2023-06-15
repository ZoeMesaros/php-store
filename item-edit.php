<?php

require 'controller/item-controller.php';
require 'classes/view/item-view.php';
require 'classes/model/item-model.php';
require 'classes/model/condition-model.php';
require 'classes/model/type-model.php';

$pdo = require 'partials/connect.php';

$typeModel = new TypeModel($pdo);
$conditionModel = new ConditionModel($pdo);
$itemModel = new ItemModel($pdo);
$itemView = new ItemView();
$itemController = new ItemController($itemModel, $itemView, $conditionModel, $typeModel);

include 'partials/header.php';
include 'partials/nav.php';

$itemController->edit();

include 'partials/footer.php';