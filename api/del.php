<?php
include_once "db.php";
$table = $_POST['table'];
$DB = new DB($table);
$DB->del($_POST['id']);
