<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <th class="tt ct">姓名</th>
        <th class="tt ct">會員帳號</th>
        <th class="tt ct">註冊日期</th>
        <th class="tt ct">管理</th>
    </tr>
    <?php
    $rows = $Mem->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp ct"><?= $row['name']; ?></td>
            <td class="pp ct"><?= $row['acc']; ?></td>
            <td class="pp ct"><?= $row['regdate']; ?></td>
            <td class="pp ct">
                <!--使用js來跳轉頁面至修改功能,並帶上資料id-->
                <button onclick="location.href='?do=edit_mem&id=<?= $row['id']; ?>'">修改</button>
                <button onclick="del('mem',<?= $row['id']; ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>