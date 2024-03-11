<?php
if (!empty($_POST)) {
    $Bottom->save(['bottom' => $_POST['bottom'], 'id' => 1]);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td>頁尾版權區</td>
            <td><input type="text" name="bottom" value="<?= $Bottom->find(1)['bottom']; ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>