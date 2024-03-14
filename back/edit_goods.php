<h1 class="ct">修改商品</h1>
<?php
$row = $Goods->find($_GET['id']);
?>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp"><select name="big" id="big"></select></td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><select name="mid" id="mid"></select></td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?= $row['no']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?= $row['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?= $row['price']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?= $row['spec']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?= $row['stock']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" value=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea type="text" name="intro" style="width:80%;height:150px"><?= $row['intro']; ?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="submit" value="編輯">
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
        $.get("./api/get_list.php", {
            big_id
        }, (types) => {
            switch (type) {
                case 'big':
                    $("#big").html(types);
                    $("#big").val(<?= $row['big']; ?>);
                    getTypes('mid', $("#big").val())
                    break;
                case 'mid':
                    $("#mid").html(types);
                    $("#mid").val(<?= $row['mid']; ?>);

                    break;
            }
        })
    }
</script>