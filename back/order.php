<div class="ct">
    <h1 class="ct">訂單管理</h1>
</div>

<table class="all">
    <tr class="tt">
        <th>訂單編號</th>
        <th>金額</th>
        <th>會員帳號</th>
        <th>姓名</th>
        <th>下單時間</th>
        <th>操作</th>
    </tr>
    <?php
    $rows = $Order->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><a href="?do=detail&id=<?= $row['id']; ?>"><?= $row['no']; ?></a></td>
            <td class="pp"><?= $row['total']; ?></td>
            <td class="pp"><?= $row['acc']; ?></td>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= date("Y/m/d", strtotime($row['orderdate'])); ?></td>

            <td class="pp">
                <button onclick="del('orders',<?= $row['id']; ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <!-- <button onclick="location.href='index.php'">返回</button> -->

</div>