<?php
include_once "db.php";
$_POST['no'] = date("Ymd") . rand(100000, 99999);
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);

$Order->save($_POST);
unset($_SESSION['cart']);
?>
<script>
    alert("訂購完成");
    location.href = "../index.php";
</script>