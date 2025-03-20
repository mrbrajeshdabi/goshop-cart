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
<link rel="stylesheet" href="http://localhost/project/GoShop/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bs">
<?php require("element/nav.php"); 
$pid = $_GET['id'];
$sql = $db->query("SELECT * FROM product WHERE id='$pid'");
if($sql->num_rows !=0)
{
    $data= $sql->fetch_assoc();
}
else
{
  echo mysqli_error;
}

?>

<div class="row">
  <center><i class="fa fa-arrow-left fs-1 licon"></i><h1>Product Dettails</h1></center><hr>
  <div class="col-md-3"></div>
  <div class="col-md-6 animate__animated animate__zoomIn">
    <div class="d-flex justify-content-center align-items-center">
    <img src="http://localhost/project/GoShop/productpic/<?php echo $data['product_pic']; ?>" alt="" class="imgd">
    </div>
    <!--- table for product dettails --->
    <hr>
    <div class="d-flex justify-content-start align-items-start p-1 ms-5">
    <table class="table">
      <tr>
        <td><b>Product Availlale</b></td>
        <td> :   <?php  if($data['product_qty'] !=0){echo "<span class='text-success'>Yes</span>";}else{echo "<span class='text-danger'>no</span>";}; ?></td>
      </tr>
      <tr>
        <td><b>Product Name</b></td>
        <td> :   <?php echo $data['product_name']; ?></td>
      </tr>
      <tr>
        <td><b>Product Amount</b></td>
        <td> :₹<?php echo $data['product_amount']; ?></td>
      </tr>
      <tr>
        <td><b>Product Description</b></td>
        <td> :<li class="list-group-item"><?php echo $data['product_desc']; ?></li></td>
      </tr>
    </table>
    </div>
    <?php
    //session_start();
    if($_SESSION)
    {
        echo "<center><a href='http://localhost/project/GoShop/order/".$data['id']."' class='nav-link'><button class='btn btn-success'>Buy Now !</button></a></center>";
    }
    else
    {
      echo "<center><a href='http://localhost/project/GoShop/login' class='nav-link'><button class='btn btn-danger'>Buy Now !</button></a></center>";
    }

    ?>
  </div>
  <div class="col-md-3"></div>
</div>
<script src="http://localhost/project/GoShop/js/pages.js"></script>
</body>
</html>