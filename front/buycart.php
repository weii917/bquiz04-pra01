<?php
if (isset($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}

if (empty($_SESSION['cart'])) {
?>
    <h2>購物車無商品</h2>
<?php
}
?>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>

        <td>刪除</td>
    </tr>
    <?php
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
            <td>
                <img src="./icon/0415.jpg" onclick="delCart(<?= $id; ?>)">
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>

<script>
    function delCart(id) {
        $.post("./api/del_cart.php", {
            id
        }, () => {
            location.href = "?do=buycart";
        })
    }
</script>