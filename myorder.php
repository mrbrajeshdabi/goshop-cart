<!doctype html>
<html lang="en">
<head>
<title>Shoper</title>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bs">
<?php require("element/nav.php"); require("php/db.php");
if($_SESSION)
{
  $email = $_SESSION['_aut_ui_'];
  $sql = $db->query("SELECT * FROM orders WHERE customerEmail='$email'");
}

?>

<div class="row">
  <center><i class="fa fa-arrow-left fs-1 licon"></i><h1 class="mt-3">My Orders</h1></center><hr>
  <div class="col-md-3"></div>
  <div class="col-md-6 p-0 m-0">
    <?php
    if($_SESSION)
    {
      if($sql->num_rows != 0)
    {
      while($data=$sql->fetch_assoc())
    {
        if($data['payment_status'] == "completed" or $data['order_status'] == "completed" )
        {
            echo '
            <h3 class="text-success ms-3">Complete Order</h3>
            <div class="d-flex justify-content-center align-items-center flex-column mb-5">
            <img src="productpic/'.$data['product_pic'].'" alt="" class="myimgd">
            <span class="mt-1">'.$data['product_name'].'</span>
            <span class="mt-1">&#8377 '.$data['product_amount'].'</span>
            <span class="mt-1 text-success"><b>Payment Status</b>:'.$data['payment_status'].'</span>
            <span class="mt-1 text-success"><b>Order Status</b>:'.$data['order_status'].'</span>
            </div>
            
            ';
        }
        else
        {
            echo '
            <h3 class="text-danger ms-3">Pending Order</h3>
            <div class="d-flex justify-content-center align-items-center flex-column mb-5">
            <img src="productpic/'.$data['product_pic'].'" alt="" class="myimgd">
            <span class="mt-1">'.$data['product_name'].'</span>
            <span class="mt-1">&#8377 '.$data['p_total_amount'].'</span>
            <span class="mt-1 text-danger">Payment Status:'.$data['payment_status'].'</span>
            <span class="mt-1 text-danger">Order Status:'.$data['order_status'].'</span>
            </div>
            
            ';
        }
    }
    }
    else
    {
        echo '
        
        <center><h1 class="text-center alert alert-danger mt-5">No Order Availlable</h1></center>
        
        ';
    }
    }
    else
    {
      echo '
        
      <center><h1 class="text-center alert alert-danger mt-5">Please Login Now</h1></center>
      
      ';
    }
    
    ?>
    
  </div>
  <div class="col-md-3"></div>
</div>
<script src="http://localhost/project/GoShop/js/pages.js"></script>
</body>
</html>

