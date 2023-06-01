<?php

require 'classes/view/user-view.php';
require 'classes/model/user-model.php';

$pdo = require 'partials/connect.php';

$userModel = new UserModel($pdo);
$userView = new UserView();

include 'partials/header.php';
include 'partials/nav.php';


include 'partials/forms/user-form.php';
include 'partials/footer.php';