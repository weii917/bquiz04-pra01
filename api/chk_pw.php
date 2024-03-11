<?php
include_once "db.php";
$table = $_POST['table'];
$DB = new DB($table);
unset($_POST['table']);
$res = $DB->count($_POST);
if ($res) {
    $_SESSION[$table] = $_POST['acc'];
    echo $res;
} else {
    echo $res;
}
