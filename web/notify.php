<?php
require_once '../vendor/alipay/f2fpay/service/AlipayTradeService.php';
require_once '../config/params.php';

$arr = $_POST;
$alipayService = new \AlipayTradeService($alipay);
$alipayService->writeLog(var_export($_POST, true));
$result = $alipayService->check($arr);

if($result) {
//    $out_trade_no = $_POST['out_trade_no'];
//    $trade_status = $_POST['trade_status'];
    $alipayService->writeLog($arr);
    $alipayService->writeLog($_POST['out_trade_no']);
    $alipayService->writeLog($_POST['trade_status']);
    $customerPurchase = \app\models\CustomerPurchase::findOne(['cp_order' => $_POST['out_trade_no']]);
    if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
        $customerPurchase->status = 1;
        $customerPurchase->save();
    }
    else if($_POST['trade_status'] == 'TRADE_SUCCESS') {
        $customerPurchase->status = 2;
        $customerPurchase->save();
    }
    echo 'success';
}
else {
    echo 'fail';
}