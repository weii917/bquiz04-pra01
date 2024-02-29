<?php
$row = $Order->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?= $row['no']; ?>的詳細資料</span></h2>

<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
            <?= $row['acc']; ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?= $row['name']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><?= $row['tel']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><?= $row['addr']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?= $row['email']; ?></td>
    </tr>
</table>
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $cart = unserialize($row['cart']);
    foreach ($cart as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?= $goods['name']; ?></td>
            <td><?= $goods['no']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>
        </tr>

    <?php

    }
    ?>
</table>
<div class="all ct tt">總價:<?= $row['total']; ?>元</div>
<div class="ct">
    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>
</form>