<h1 class="ct">填寫資料</h1>
<?php
$row = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<form action="./api/order.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
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
            <td class="tt ct">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?= $row['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?= $row['tel']; ?>"></td>
        </tr>


    </table>
    <table class="all">
        <tr class="tt">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>庫存量</td>
            <td>單價</td>
            <td>小計</td>

        </tr>
        <?php
        $sum = 0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $good = $Goods->find($id)
        ?>
            <tr>
                <td><?= $good['no']; ?></td>
                <td><?= $good['name']; ?></td>
                <td><?= $qt; ?></td>
                <td><?= $good['price']; ?></td>
                <td><?= $good['stock']; ?></td>
                <td><?= $good['price'] * $qt; ?></td>

            </tr>
        <?php
            $sum += $good['price'] * $qt;
        }
        ?>
    </table>
    <div class="all">總價:<?= $sum; ?>元</div>
    <div class="ct">
        <input type="hidden" name="total" value=<?= $sum; ?>>
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
</form>