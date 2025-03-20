<?php
require("db.php");
$fname = mysqli_real_escape_string($db,$_POST["fname"]);
$email = mysqli_real_escape_string($db,$_POST["email"]);
$phone = mysqli_real_escape_string($db,$_POST["phone"]);
$gender = mysqli_real_escape_string($db,$_POST["gender"]);
$address = mysqli_real_escape_string($db,$_POST["address"]);
$password = mysqli_real_escape_string($db,$_POST["password"]);
if(!empty($fname) and !empty($email) and !empty($phone) and !empty($password)
and !empty($gender) and !empty($address))
{
  //illegal character email check
  if(filter_var($email,FILTER_SANITIZE_EMAIL))
  {
    //check valid email
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
       //check table from database
       $chktable = $db->query("SELECT * FROM customer");
       if($chktable)
       {
         $store = $db->query("INSERT INTO
             customer(customerName,customerEmail,customerPhone,customerGender,customerAddress,customerPassword)VALUES('{$fname}','{$email}','{$phone}','{$gender}','{$address}','{$password}')");
         if($store)
          {
            echo "Signup SuccessFully";
          }
        else
          {
            echo "data not store from table";
          }
       }
       else
       {
         //createtable
         $createtable = $db->query("CREATE TABLE customer(
           id INT(255) NOT NULL AUTO_INCREMENT,
           customerName VARCHAR(255),
           customerEmail VARCHAR(255),
           customerPhone VARCHAR(255),
           customerGender VARCHAR(255),
           customerAddress VARCHAR(255),
           customerPassword VARCHAR(255),
           customerStatus VARCHAR(255) DEFAULT '0',
           PRIMARY KEY(id)
           )");
           if($createtable)
           {
             $store = $db->query("INSERT INTO
             customer(customerName,customerEmail,customerPhone,customerGender,customerAddress,customerPassword)VALUES('{$fname}','{$email}','{$phone}','{$gender}','{$address}','{$password}')");
             if($store)
             {
               echo "success";
             }
             else
             {
               echo "data not store from table";
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
      echo "please valid email";
    }
  }
  else
  {
    echo "please filled valid charecter";
  }
  
}
else
{
  echo "please filled all input";
}

?>