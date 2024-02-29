<?php
include_once "db.php";
//1. 把所有big_id =0的撈出來是大分類，每一個option的value帶有大分類的id，
//用來選擇該大分類時讓中分類的big_id可以存入大分類的id，從big_id的id會知道此中分類是哪一個大分類底下的
//2. 當新增商品時選完大分類會觸發選擇中分類，傳來big_id=大分類的id，撈出來是此大分類的所有中分類，每一個option的value帶有中分類的id，
$types = $Type->all($_GET);
foreach ($types as $type) {
    echo "<option value='{$type['id']}'>{$type['name']}</option>";
}
