<?php
require("db.php");
$pcategory = mysqli_real_escape_string($db,$_POST["category"]);
$pname = mysqli_real_escape_string($db,$_POST["pname"]);
$pamount = mysqli_real_escape_string($db,$_POST["pamount"]);
$pqty = mysqli_real_escape_string($db,$_POST["pqty"]);
$pdesc = mysqli_real_escape_string($db,$_POST["pdesc"]);
$p_total_amount = $pamount * $pqty;
//product pic $_Files accept
$ppic = $_FILES["ppic"];
$location = $ppic["tmp_name"];
$picname = $ppic["name"];
//check all input filled
if(!empty($pname) and !empty($pamount) and !empty($pqty) and !empty($pdesc) and !empty($ppic) and !empty($pcategory))
{
  //check table from database
  $checktable = $db->query("SELECT * FROM product");
  if($checktable)
  {
    if(file_exists("../../productpic".$picname))
      {
        echo "file allready exit";  
      }
    else
      {
        if(move_uploaded_file($location,"../../productpic/".$picname))
        {
          $store = $db->query("INSERT INTO product(product_category,product_pic,product_name,product_amount,product_qty,p_total_amount,product_desc) VALUES('{$pcategory}','{$picname}','{$pname}','{$pamount}','{$pqty}','{$p_total_amount}','{$pdesc}')");
          if($store)
          {
            echo "Product Add Successfully";
          }
          else
          {
            echo "product not store from product table";
          }
          }
          else
          {
            echo "file not upload";
           }
      }
  }
  else
  {
     $createtable = $db->query("CREATE TABLE product(
       id INT(255) NOT NULL AUTO_INCREMENT,
       product_category VARCHAR(255),
       product_pic VARCHAR(255),
       product_name VARCHAR(255),
       product_amount VARCHAR(255),
       product_qty VARCHAR(255),
       p_total_amount VARCHAR(255),
       product_desc VARCHAR(255),
       PRIMARY KEY(id)
       )");
       if($createtable)
       {
          if(file_exists("../../productpic".$picname))
          {
            echo "file allready exit";
          }
          else
          {
            if(move_uploaded_file($location,"../../productpic/".$picname))
            {
               $store = $db->query("INSERT INTO product(product_category,product_pic,product_name,product_amount,product_qty,p_total_amount,product_desc) VALUES('{$pcategory}','{$picname}','{$pname}','{$pamount}','{$pqty}','{$p_total_amount}','{$pdesc}')");
               if($store)
               {
                 echo "Product Add Successfully";
               }
               else
               {
                 echo "product not store from product table";
               }
            }
            else
            {
              echo "file not upload";
            }
          }
       }
       else
       {
         echo "table not created";
       }
  }
}
else
{
  echo "please filled all input";
}


?>