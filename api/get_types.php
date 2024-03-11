<?php
include_once "db.php";

$rows = $Type->all($_GET);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
<?php
}
?>