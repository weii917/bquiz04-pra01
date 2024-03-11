<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>

<table class="all ct">
    <tr class="tt">
        <th>帳號</th>
        <th>密碼</th>
        <th>管理</th>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $row) {

    ?>
        <tr class="pp">

            <td><?= $row['acc']; ?></td>
            <td><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
            <td>
                <?php
                if ($row['acc'] == 'admin') {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">修改</button>
                    <button onclick="del('admin',<?= $row['id']; ?>)">刪除</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php

    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>