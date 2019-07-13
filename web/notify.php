<?php
require_once '../vendor/alipay/f2fpay/service/AlipayTradeService.php';
require_once '../config/params.php';

$arr = $_POST;
$alipayService = new \AlipayTradeService($alipay);
$alipayService->writeLog(var_export($arr, true));
$result = $alipayService->check($arr);
$alipayService->writeLog("hehe");

if(!$result) {
//    $out_trade_no = $_POST['out_trade_no'];
//    $trade_status = $_POST['trade_status'];
    //$alipayService->writeLog($arr);
    $alipayService->writeLog("false");
    echo 'fail';
}
else {

    $alipayService->writeLog($arr['trade_status']);
    $customerPurchase = \app\models\CustomerPurchase::findOne(['cp_order' => $arr['out_trade_no']]);
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