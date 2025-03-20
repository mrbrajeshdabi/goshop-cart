<?php
session_start();
require("db.php");
$email = mysqli_real_escape_string($db,$_POST["email"]);
$password = mysqli_real_escape_string($db,$_POST["password"]);
//check all input empty
if(!empty($email) AND !empty($password))
{
  //check valid email
  if(filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    //check email from table
    $sql = $db->query("SELECT * FROM customer WHERE customerEmail='{$email}'");
    if($sql->num_rows != 0)
    {
       //check email and password or login customer
       $sql2 = $db->query("SELECT * FROM customer WHERE customerEmail='{$email}'
       AND customerPassword='{$password}'");
       if($sql2->num_rows != 0)
       {
         //create cookie
         //$time = time()+(60*60*24);
         //setcookie("_aut_ui_",$email,$time,"/")
         if($_SESSION['_aut_ui_']=$email)
         {
           echo "success";
         }
         else
         {
           echo "cookie not set";
         }
       }
       else
       {
         echo "wrong password";
       }
    }
    else
    {
      echo "email not found";
    }
  }
  else
  {
    echo "please filled valid email";
  }
}
else
{
  echo "please all input valid";
}

?>