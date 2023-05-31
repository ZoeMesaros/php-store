<?php

require '../classes/model/user-model.php';
$userModel = new UserModel(require '../partials/connect.php');

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $userModel->removeUser($id);

    header("Location: ../users.php");
}
?>