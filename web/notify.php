<?php
require_once '../vendor/alipay/f2fpay/service/AlipayTradeService.php';
require_once '../config/params.php';

$arr = $_POST;
$alipayService = new AlipayTradeService($alipay);
$alipayService->writeLog(var_export($arr, true));
$result = $alipayService->check($arr);

if (!$result) {
    $alipayService->writeLog("false");
    echo 'fail';
} else {
    $out_trade_no = $arr['out_trade_no'];
    $db = new mysqli('localhost', 'root', 'root', 'vending');
    if($db->connect_errno) {
        $alipayService->writeLog("Database Error!");
        die("could not connect to the database:\n" . $db->connect_error);
    }
    $db->query("set names 'utf8';");
    if($arr['trade_status'] == 'WAIT_BUYER_PAY') {
        $sql = "UPDATE customer_purchase SET status = '1' WHERE cp_order = '" . $out_trade_no . "'";
        $res = $db->query($sql);
        if (!$res) {
            $alipayService->writeLog("Query Error!");
            die("sql error:\n" . $db->error);
        }
        $res->free();
    } else if($arr['trade_status'] == 'TRADE_SUCCESS') {
        $sql = "UPDATE customer_purchase SET status = '2' WHERE cp_order = '" . $out_trade_no . "'";
        $res = $db->query($sql);
        if (!$res) {
            $alipayService->writeLog("Query Error!");
            die("sql error:\n" . $db->error);
        }
        $res->free();
    }
    $db->close();
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