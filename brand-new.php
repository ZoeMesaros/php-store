<?php

require 'classes/view/brand-view.php';
require 'classes/model/brand-model.php';

$pdo = require 'partials/connect.php';

$brandModel = new BrandModel($pdo);
$brandView = new BrandView();

include 'partials/header.php';
include 'partials/nav.php';

$brandView->renderAddNewBrandForm($brandModel->getAllBrands());

include 'partials/footer.php';