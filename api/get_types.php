<?php
include_once "db.php";
$rows = $Type->all(['big_id' => $_GET['big_id']]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
<?php
}
?>