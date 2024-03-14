<?php
if (isset($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

if (!isset($_SESSION['mem'])) {
    to("?do=login");
}

echo "<h2 class='ct'>{$_SESSION['mem']}的購物車中</h2>";
if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車中尚無商品</h2>";
}

?>

<table class="all">
    <tr class="tt">
        <th>編號</th>
        <th>商品名稱</th>
        <th>數量</th>
        <th>庫存量</th>
        <th>單價</th>
        <th>小計</th>
        <th>操作</th>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
        <tr class="pp">
            <td><?= $goods['no']; ?></td>
            <td><?= $goods['name']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $goods['stock']; ?></td>
            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>
            <td>
                <button>
                    <img src="./icon/0415.jpg" onclick="delCart(<?= $goods['id']; ?>)">
                </button>
            </td>
        </tr>
    <?php
    }
    ?>

</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="location='index.php'">
    <img src="./icon/0412.jpg" onclick="location='?do=checkout'">
</div>

<script>
    function delCart(id) {
        $.post("./api/del_cart.php", {
            id
        }, () => {
            location.href = '?do=buycart';
        })
    }
</script>