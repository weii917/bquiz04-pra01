<?php
$row = $Order->find($_GET['id']);
?>
<h2 class="ct">
    訂單編號<?= $row['no']; ?>
</h2>

<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
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
        <th>商品名稱</th>
        <th>編號</th>
        <th>數量</th>
        <th>單價</th>
        <th>小計</th>

    </tr>
    <?php
    $cart = unserialize($row['cart']);
    foreach ($cart as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?= $goods['no']; ?></td>
            <td><?= $goods['name']; ?></td>
            <td><?= $qt; ?></td>

            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>

        </tr>
    <?php

    }
    ?>
</table>
<div class="all tt ct">總共<?= $row['total']; ?>元</div>

<div class="ct">

    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>