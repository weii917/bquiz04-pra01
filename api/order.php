<?php
include_once "db.php";

$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['no'] = date("Ymd") . rand(100000, 999999);

$Order->save($_POST);
unset($_SESSION['cart']);
?>
<script>
    alert("訂購成功")
    location.href = '../index.php';
</script>