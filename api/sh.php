<?php
include_once "db.php";
$Goods->save($_POST);
// 傳來id跟sh更新回資料庫
// UPDATE `goods` SET `id`='1',`sh`='0' WHERE `id`='1';