<?php

/* @var $qrcode */
/* @var $response */
/* @var $qrPayRequestBuilder */
?>

<div style="text-align: center; vertical-align: middle">
    <?php echo '<img src="'. $qrcode .'"/>'?>
    <br />
    <?php print_r($response) ?>
</div>

<?php
set_time_limit(0);
$config = Yii::$app->params['alipay'];
$qrPay = new \AlipayTradeService($config);
$result = null;
$count = 0;
$sleepTime = 2;
//轮询支付结果
do {
    $result = $qrPay->queryTradeResult($qrPayRequestBuilder);
    if($result->getTradeStatus() == 'SUCCESS') {
        break;
    }
    $count++;
    sleep($sleepTime);
}while($count < 60);
//支付成功
if($result->getTradeStatus() == 'SUCCESS') {
    header("location:index.php");
}
//支付失败或超时，取消订单
else {
    $qrPay->cancel($qrPayRequestBuilder);
}