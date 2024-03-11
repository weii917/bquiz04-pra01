<?php
$type = $_GET['type'] ?? 0;
$nav = '';
$goods = null;
if ($type == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $t = $Goods->find($type);
    
}
