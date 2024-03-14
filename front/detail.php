<style>
    .item {
        display: flex;

        background: #F4C591;
    }

    .item .img {
        width: 60%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item .info {
        width: 67%;
        display: flex;
        flex-direction: column;
    }

    .info div {
        border: 1px solid #999;
        flex-grow: 1;
    }
</style>

<?php
$good = $Goods->find($_GET['id']);
?>
<div class="h2 ct"><?= $good['name']; ?></div>
<div class="item">
    <div class="img">

        <img src="./img/<?= $good['img']; ?>" style="width:100%;height:110px">

    </div>
    <div class="info">
        <div class="tt ct">
            分類:<?= $Type->find($good['big'])['name']; ?> ><?= $Type->find($good['mid'])['name']; ?>
        </div>
        <div>編號:<?= $good['no']; ?>

        </div>
        <div>價錢:<?= $good['price']; ?>

        </div>
        <div>庫存量:<?= $good['stock']; ?></div>
        <div>詳細說明:<?= $good['intro']; ?></div>
    </div>
</div>
<div class="ct tt">
    購買數量 <input type="number" value="1" id="qt" style='width:30px'>
    <img src="./icon/0402.jpg" onclick="buy()">
</div>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>
<script>
    function buy() {
        let id = <?= $_GET['id']; ?>;
        let qt = $("#qt").val();
        location.href = `?do=buycart&id=${id}&qt=${qt}`;
    }
</script>