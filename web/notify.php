<?php
require_once '../vendor/alipay/f2fpay/service/AlipayTradeService.php';
require_once '../config/params.php';

$arr = $_POST;
$alipayService = new \AlipayTradeService($alipay);
$alipayService->writeLog(var_export($_POST, true));
$result = $alipayService->check($arr);

if($result) {
    $out_trade_no = $_POST['out_trade_no'];
    $trade_status = $_POST['trade_status'];
    $alipayService->writeLog($arr);
    echo 'success';
}
else {
    echo 'fail';
}