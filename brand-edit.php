<?php

require 'controller/brand-controller.php';
require 'classes/view/brand-view.php';
require 'classes/model/brand-model.php';

$pdo = require 'partials/connect.php';

$brandModel = new BrandModel($pdo);
$brandView = new BrandView();
$brandController = new BrandController($brandModel, $brandView);

include 'partials/header.php';
include 'partials/nav.php';

$brandController->edit();

include 'partials/footer.php';