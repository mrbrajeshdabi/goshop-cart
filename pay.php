<?php
require("php/db.php");
session_start();
$pid = mysqli_real_escape_string($db,$_GET['pid']);
$pqty= mysqli_real_escape_string($db,$_GET['pqty']);
$pmethod = mysqli_real_escape_string($db,$_GET['pmethod']);

//fetch product 
$sql = $db->query("SELECT * FROM product WHERE id = '$pid'");
$pdata = $sql->fetch_assoc();
$product_name = $pdata['product_name'];
$product_pic = $pdata['product_pic'];
$product_amount = $pdata['product_amount'];
$product_qty = $pqty;
$product_total_amount = $product_amount * $product_qty;

//fetch user data
$email = $_SESSION['_aut_ui_'];
$sql2 = $db->query("SELECT * FROM customer WHERE customerEmail= '$email'");
$cdata = $sql2->fetch_assoc();
$cname = $cdata['customerName'];
$cemail = $_SESSION['_aut_ui_'];
$caddress =$cdata['customerAddress'];
$cphone = $cdata['customerPhone'];
require("src/Instamojo.php");
$api = new Instamojo\Instamojo('89588eb4a890f89448dea03b9fe20f3d', '40e13fdca979ecd933a861f6acda2a32', 'https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $product_total_amount,
        "send_email" => true,
        "email" => $email,
        "buyer_name" =>$cname, 
        "redirect_url" => "http://localhost/project/LCS/php/orders.php?pid".$pid."&pqty=".$pqty."&pmethod=".$pmethod
        ));
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>