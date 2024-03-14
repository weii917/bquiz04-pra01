<?php
$row = $Order->find($_GET['id']);

?>
<h1 class="ct">訂單編號<?= $row['no']; ?>的詳細資料</h1>

<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><?= $row['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input style="background: #EFCA85;" type="text" name="name" value="<?= $row['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input style="background: #EFCA85;" type="text" name="email" value="<?= $row['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">地址</td>
        <td class="pp"><input style="background: #EFCA85;" type="text" name="addr" value="<?= $row['addr']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input style="background: #EFCA85;" type="text" name="tel" value="<?= $row['tel']; ?>"></td>
    </tr>
</table>
<table class="all">
    <tr class="tt">
        <th>編號</th>
        <th>商品名稱</th>
        <th>數量</th>

        <th>單價</th>
        <th>小計</th>

    </tr>
    <?php
    $total = 0;
    $cart = unserialize($row['cart']);
    foreach ($cart as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
        <tr class="pp">
            <td><?= $goods['no']; ?></td>
            <td><?= $goods['name']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>

        </tr>
    <?php
        $total += $goods['price'] * $qt;
    }
    ?>

</table>
<div class="ct tt all">總價<?= $total; ?>元</div>
<div class="ct">
    <input type="hidden" name="total" value="<?= $total; ?>">

    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>