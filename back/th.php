<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>

<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>

        <tr class="tt">
            <td><?= $big['name']; ?></td>
            <td class="ct">
                <button onclick="edit(this,<?= $big['id']; ?>)">修改</button>
                <button onclick="del('type',<?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr class="pp ct">
                <td><?= $mid['name']; ?></td>
                <td>
                    <button onclick="edit(this,<?= $mid['id']; ?>)">修改</button>
                    <button onclick="del('type',<?= $mid['id']; ?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>

<script>
    getTypes(0)

    function edit(dom, id) {
        name = prompt("請輸入您要修改的分類名稱", `${$(dom).parent().prev().text()}`);
        $.post("./api/save_type.php", {
            name,
            id
        }, () => {
            $(dom).parent().prev().text(name);
        })
    }

    function getTypes(big_id) {
        $.get("./api/get_list.php", {
            big_id
        }, (types) => {
            $("#bigs").html(types);
        })
    }

    function addType(table) {
        let name;
        let bigi_id;
        switch (table) {
            case "big":
                name = $("#big").val();
                big_id = 0;
                break;
            case "mid":
                name = $("#mid").val();
                big_id = $("#bigs").val();
                break;
        }
        $.post("./api/save_type.php", {
            name,
            big_id
        }, () => {
            location.reload();
        })
    }
</script>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr class="tt">
        <th>編號</th>
        <th>商品名稱</th>
        <th>庫存量</th>
        <th>狀態</th>
        <th>操作</th>
    </tr>
    <?php
    $goods = $Goods->all();
    foreach ($goods as $good) {

    ?>

        <tr class="pp">
            <td><?= $good['no']; ?></td>
            <td><?= $good['name']; ?></td>
            <td><?= $good['stock']; ?></td>
            <td><?= ($good['sh'] == 1) ? '販售中' : '已下架'; ?></td>
            <td style="width:120px">
                <button onclick="location.href='?do=edit_goods&id=<?= $good['id']; ?>'">修改</button>
                <button onclick="del('goods',<?= $good['id']; ?>)">刪除</button>
                <button onclick="sh(1,<?= $good['id']; ?>)">上架</button>
                <button onclick="sh(0,<?= $good['id']; ?>)">下架</button>
            </td>
        </tr>
    <?php

    }
    ?>
</table>
<script>
    function sh(sh, id) {
        $.post("./api/sh.php", {
            sh,
            id
        }, () => {
            location.reload();
        })
    }
</script>