<?php

include 'partials/header.php';

echo "<div class='errMsg'><h4>Action cannot be done.<br><br>User information is being used elsewhere.</h4>";
echo "<br>";
echo "<button class='errBtn'><a href='./users.php'>Go Back<a></button></div>";

include 'partials/footer.php';