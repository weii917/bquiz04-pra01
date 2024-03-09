<?php
$row = $Order->find($_GET['id']);
?>
<h2 class="ct" style="color:red">訂單編號<?= $row['no']; ?>的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">會員帳號</td>
        <td class="pp"><?= $row['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?= $row['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?= $row['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" value="<?= $row['addr']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" value="<?= $row['tel']; ?>"></td>
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
        $good = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?= $good['name']; ?></td>
            <td><?= $good['no']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $good['price']; ?></td>
            <td><?= $good['price'] * $qt; ?></td>

        </tr>

    <?php

    }
    ?>
</table>
<div class="all ct tt">
    總價:<?= $row['total']; ?>元
</div>
<div class="ct">

    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>