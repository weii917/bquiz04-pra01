<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $_POST['regdate'] = date("Y-m-d");
    $Mem->save($_POST);
} else {
    $Mem->save($_POST);
    to("../back.php?do=mem");
}
