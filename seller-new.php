<?php

require 'classes/view/seller-view.php';
require 'classes/model/seller-model.php';

$pdo = require 'partials/connect.php';

$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

include 'partials/header.php';
include 'partials/nav.php';


include 'partials/forms/seller-form.php';
include 'partials/footer.php';