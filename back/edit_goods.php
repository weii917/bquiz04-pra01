<h2 class="ct">修改商品</h2>
<?php
$goods = $Goods->find($_GET['id']);
?>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號 </td>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?= $goods['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?= $goods['price']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?= $goods['spec']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?= $goods['stock']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" value="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea style="width:80%;height:150px" name="intro" value=""><?= $goods['intro']; ?></textarea></td>
        </tr>


    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $goods['id']; ?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>
<script>
    getTypes('big', 0)
    $("#big").on("change", function() {
        getTypes('mid', $("#big").val())
    })

    function getTypes(type, big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            switch (type) {
                case 'big':
                    $("#big").html(types);
                    $("#big").val(<?= $goods['big']; ?>)
                    getTypes('mid', $("#big").val())
                    break;
                case 'mid':
                    $("#mid").html(types);
                    $("#mid").val(<?= $goods['mid']; ?>)
                    break;
            }
        })
    }
</script>