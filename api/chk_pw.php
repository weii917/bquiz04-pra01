<?php
include_once "db.php";

$table = $_POST['table'];
unset($_POST['table']);
$Db = new DB($table);
$res = $Db->count($_POST);

if ($res) {
    echo $res;
    $_SESSION[$table] = $_POST['acc'];
} else {
    echo $res;
}
