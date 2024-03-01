<?php
include_once "db.php";

if (!isset($_POST['id'])) {
    $_POST['regdate'] = date("Y-m-d");
    $Mem->save($_POST);
} else {
    $Mem->save($_POST);
    to("../back.php?do=mem");
}

// 前台會員註冊不存在id新增註冊日期
// if (!isset($_POST['id'])) {
//     $_POST['regdate'] = date("Y-m-d");
//     // dd($_POST);
// }
// 後臺會員編輯存在id會經由db.php判斷後為更新資料庫
// 將POST來的送回資料庫新增或更新
// $Mem->save($_POST);
// 如果存在id要倒回後台的會員管理
// if (isset($_POST['id'])) {
//     to("../back.php?do=mem");
// dd($_POST);
// }
