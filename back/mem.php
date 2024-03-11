<h1 class="ct">會員管理</h1>

<table class="all ct">
    <tr class="tt">
        <th>姓名</th>
        <th>會員帳號</th>
        <th>註冊日期</th>
        <th>操作</th>
    </tr>
    <?php
    $rows = $Mem->all();
    foreach ($rows as $row) {

    ?>
        <tr class="pp">

            <td><?= $row['name']; ?></td>
            <td><?= $row['acc']; ?></td>
            <td><?= $row['regdate']; ?></td>
            <td>

                <button onclick="location.href='?do=edit_mem&id=<?= $row['id']; ?>'">修改</button>
                <button onclick="del('mem',<?= $row['id']; ?>)">刪除</button>

            </td>
        </tr>
    <?php

    }
    ?>
</table>
<!-- <div class="ct"><button onclick="location.href='index.php'">返回</button></div> -->