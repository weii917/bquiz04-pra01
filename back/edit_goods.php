<h2 class="ct">修改商品</h2>
<?php
$goods = $Goods->find($_GET['id']);
?>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品編號</th>
            <td class="pp"><?= $goods['no']; ?></td>
        </tr>
        <tr>
            <th class="tt ct">商品名稱</th>
            <td class="pp"><input type="text" name="name" value="<?= $goods['name']; ?>"></td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp"><input type="text" name="price" value="<?= $goods['price']; ?>"></td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp"><input type="text" name="spec" value="<?= $goods['spec']; ?>"></td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp"><input type="text" name="stock" value="<?= $goods['stock']; ?>"></td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp"><input type="file" name="img" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp"><textarea name="intro" style="width:80%;height:150px;"><?= $goods['intro']; ?></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $goods['id']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>
<script>
    getTypes('big', 0)

    // 編輯的畫面會鎖定選擇你要修改的那個選項，所以讓select帶有value
    $("#big").on("change", function() {
        getTypes('mid', $("#big").val())
    })
    // good資料表裡的big是存在type大分類的id，good資料表裡的mid是存在type中分類的id
    // 選項的value存的是大或中分類在type資料表的id
    function getTypes(type, big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            switch (type) {
                case 'big':
                    $("#big").html(types)
                    $("#big").val(<?= $goods['big']; ?>)
                    getTypes('mid', $("#big").val())
                case 'mid':
                    $("#mid").html(types)
                    $("#mid").val(<?= $goods['mid']; ?>)
            }
        })
    }
</script>