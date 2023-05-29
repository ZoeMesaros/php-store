<?php

require 'classes/users/user-view.php';
require 'classes/users/user-model.php';

$pdo = require 'partials/connect.php';

$userModel = new UserModel($pdo);
$userView = new UserView();

// ==============================================
// Skapa vy nedan

include 'partials/header.php';
include 'partials/nav.php';

$userView->renderAllUsersAsList($userModel->getAllUsers());


include 'partials/footer.php';