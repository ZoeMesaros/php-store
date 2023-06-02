<?php

require '../classes/model/user-model.php';
$userModel = new UserModel(require '../partials/connect.php');

try {
    if (isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $userModel->removeUser($id);

        header("Location: ../users.php");
    }
} catch (PDOException $ex) {
    if ($ex->getCode() === '23000') {
        echo "User information is being used elsewhere. Delete connected data first.";
        echo "<br><br>";
        echo "<button><a href='../users.php'>Go Back<a></button>";
    }
}
?>