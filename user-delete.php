<?php

require 'controller/user-controller.php';
require 'classes/view/user-view.php';
require 'classes/model/user-model.php';

$pdo = require 'partials/connect.php';

$userModel = new UserModel($pdo);
$userView = new UserView();
$userController = new UserController($userModel, $userView);

include 'partials/header.php';
include 'partials/nav.php';

$userController->delete();

include 'partials/footer.php';