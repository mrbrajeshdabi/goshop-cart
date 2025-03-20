<!doctype html>
<html lang="en">
<head>
        <title>Dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
  <?php
    require("../php/db.php");
    $sql = $db->query("SELECT * FROM customer");
    $sql2 = $db->query("SELECT * FROM product");
    $pending = $db->query("SELECT * FROM orders WHERE order_status='pending'");
    $completed = $db->query("SELECT * FROM orders WHERE order_status='completed'");

  ?>
  
  <div class="row">

  <center><h1>Dashboard</h1></center>

  <div class="col-md-6 border l p-5 m-0 bg-info mo">
    <center><h4>Total Customer</h4></center>
    <p class="fs-1 text-center"><?php  echo mysqli_num_rows($sql);?></p>
  </div>
  <div class="col-md-6 border r p-5 m-0 bg-warning  mo">
    <center><h4>Total Product</h4></center>
    <p class="fs-1 text-center"><?php  echo mysqli_num_rows($sql2);?></p>
  </div>
</div>
<div class="row">
  <div class="col-md-6 border t p-5 m-0 bg-success mo"> 
    <center><h4>Total pending Order</h4></center>
    <p class="fs-1 text-center"><?php  echo mysqli_num_rows($pending);?></p>
  </div>
  <div class="col-md-6 border b p-5 m-0 bg-danger mo">
    <center><h4>Total completed Order </h4><p class="fs-1 text-center"><?php  echo mysqli_num_rows($completed);?></p></center>
  </div>
</div>
  
<script src="../../js/pages.js"></script> 
</body>
</html>