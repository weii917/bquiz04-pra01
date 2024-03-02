<?php
$good = $Goods->find($_GET['id']);
?>
<style>
    .item {
        width: 80%;
        display: flex;
        background-color: #f4c591;
        margin: 5px auto
    }

    .item .img {
        width: 60%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #999;
        padding: 5px;
        text-align: center;
    }

    .item .info {
        width: 67%;
        display: flex;
        flex-direction: column;
    }

    .info div {
        border: 1px solid #999;
        border-left: 0px;
        border-top: 0px;
        flex-grow: 1;
    }

    .info div:nth-child(1) {
        border-top: 1px solid #999;
    }
</style>
<h2 class="ct"><?= $good['name']; ?></h2>
<div class="item">
    <div class="img">
        <a href="?id=<?= $good['id']; ?>">
            <img src="./img/<?= $good['img']; ?>" style="width:100%;height:110px">
        </a>
    </div>
    <div class="info">
        <div>分類:<?= $Type->find($good['big'])['name']; ?> > <?= $Type->find($good['mid'])['name']; ?> </div>
        <div>編號:<?= $good['no']; ?></div>
        <div>
            價錢:<?= $good['price']; ?>
        </div>
        <div>詳細說明:<?= $good['intro']; ?></div>
        <div>庫存量：<?= $good['stock']; ?>...</div>
    </div>
</div>
<div class="tt ct">
    購買數量:
    <input type="number" value="1" id="qt" style="width:50px;">
    <img src="./icon/0402.jpg" onclick="buy()">
</div>
<script>
    function buy() {
        let id = <?= $_GET['id']; ?>;
        let qt = $("#qt").val();
        location.href = `?do=buycart&id=${id}&qt=${qt}`;
    }
</script>