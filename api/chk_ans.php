<?php
include_once "db.php";
echo ($_SESSION['ans'] == $_POST['ans']) ? 1 : 0;
