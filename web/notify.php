<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/web.php';
require_once '../vendor/alipay/f2fpay/service/AlipayTradeService.php';

$arr = $_POST;
$alipayService = new AlipayTradeService($alipay);
$alipayService->writeLog(var_export($arr, true));
$result = $alipayService->check($arr);

if (!$result) {
    $alipayService->writeLog("false");
    echo 'fail';
} else {
    $out_trade_no = $arr['out_trade_no'];
//    if($customerPurchase == null) {
//        $alipayService->writeLog("hehe");
//    }
    $alipayService->writeLog("haha");
//    $alipayService->writeLog($customerPurchase->cp_order);
//    if($arr['trade_status'] == 'WAIT_BUYER_PAY') {
//        $customerPurchase->status = 1;
//        $customerPurchase->save();
//    }
//    else if($arr['trade_status'] == 'TRADE_SUCCESS') {
//        $customerPurchase->status = 2;
//        $customerPurchase->save();
//    }
    echo 'success';
}