<?php
require("db.php");
session_start();
$pid = mysqli_real_escape_string($db,$_GET['pid']);
$pqty= mysqli_real_escape_string($db,$_GET['pqty']);
$pmethod =mysqli_real_escape_string($db, $_GET['pmethod']);
$payment_status = "";

if(isset($_GET['pmethod']) == "cod")
{
    $payment_status="pending";
}
else if(isset($_GET['pmethod']) == "online")
{
    $payment_status="completed";
}
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
////////////////////////////////////////////
//check table from database
$chktable = $db->query("SELECT * FROM orders");
if($chktable)
{
    $store = $db->query("INSERT INTO orders(product_pic,product_name,product_amount,product_qty,p_total_amount,customerName,customerEmail,customerPhone,customerAddress,payment_method,payment_status)VALUES('{$product_pic}','{$product_name}','{$product_amount}','{$product_qty}','{$product_total_amount}','{$cname}','{$cemail}','{$cphone}','{$caddress}','{$pmethod}','{$payment_status}')");
    if($store)
    {
        header("Location:../myorder.php");
    }
    else
    {
        echo "error";
    }
}
else
{
    $createtable = $db->query("CREATE TABLE orders(
        id INT(255) NOT NULL AUTO_INCREMENT,
        product_pic VARCHAR(255),
        product_name VARCHAR(255),
        product_amount VARCHAR(255),
        product_qty VARCHAR(255),
        p_total_amount VARCHAR(255),
        customerName VARCHAR(255),
        customerEmail VARCHAR(255),
        customerPhone VARCHAR(255),
        customerAddress VARCHAR(255),
        payment_method VARCHAR(255),
        payment_status VARCHAR(255),
        order_status  VARCHAR(255) DEFAULT 'pending',
        PRIMARY KEY(id)
        )");   
        
    if($createtable)
    {
        $store = $db->query("INSERT INTO orders(product_pic,product_name,product_amount,product_qty,p_total_amount,customerName,customerEmail,customerPhone,customerAddress,payment_method,payment_status)VALUES('{$product_pic}','{$product_name}','{$product_amount}','{$product_qty}','{$product_total_amount}','{$cname}','{$cemail}','{$cphone}','{$caddress}','{$pmethod}','{$payment_status}')");
        if($store)
        {
            header("Location:../myorder.php");
        }
        else
        {
            echo "error";
        }
    }
       
}


?>