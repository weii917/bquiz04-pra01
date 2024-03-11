<?php
$type = $_GET['type'] ?? 0;
$nav = '';
$goods = null;
if ($type == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $t = $Type->find($type);
    if ($t['big_id'] == 0) {
        $nav = $t['name'];
        $goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
    } else {
        $b = $Type->find($t['big_id']);
        $nav = $b['name'] . ">" . $t['name'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
    }
}
?>
<h1><?= $nav; ?></h1>

<style>

</style>

<?php
foreach ($goods as $good) {
?>

    <div class="item">
        <div class="img" style="width:33%">
            <a href="?do=detail&id=<?= $good['id']; ?>">
                <img src="./img/<?= $good['img']; ?>" style="width:100%;height:150px">
            </a>
        </div>
        <div class="info" style="width:67%">
            <div><?= $good['name']; ?></div>
            <div>價錢:<?= $good['price']; ?>
                <img src="./icon/0402.jpg" style="float:right" onclick="location.href='?do=buycart&id=<?= $good['id']; ?>&qt=1'">
            </div>
            <div>規格:<?= $good['spec']; ?></div>
            <div>簡介:<?= mb_substr($good['name'], 0, 25); ?>...</div>
        </div>
    </div>
<?php
}
?>