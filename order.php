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
//session_start();
$email = $_SESSION['_aut_ui_'];
$sql2 = $db->query("SELECT * FROM customer WHERE customerEmail='$email'");
$data2 = $sql2->fetch_assoc();
?>

<div class="row">
  <center><i class="fa fa-arrow-left fs-1 licon"></i><h1>Order Dettails</h1></center><hr>
  <div class="col-md-3"></div>
  <div class="col-md-6 animate__animated animate__zoomIn">
    <div class="d-flex justify-content-center align-items-center flex-column">
    <img src="http://localhost/project/GoShop/productpic/<?php echo $data['product_pic']; ?>" alt="" class="imgd">
    <span class="mt-1"><?php echo $data['product_name']?></span>
    <span class="mt-1">&#8377 <?php echo $data['product_amount']?></span>
    </div>
    <!--- table for product dettails --->
    <hr>
    <div class="d-flex justify-content-start align-items-start p-1 ms-5">
    <table class="table">
      <tr>
        <td><b>Customer Name</b></td>
        <td> :   <?php echo $data2['customerName']; ?></td>
      </tr>
      <tr>
        <td><b>Customer Email</b></td>
        <td> :<?php echo $data2['customerEmail']; ?></td>
      </tr>
      <tr>
        <td><b>Customer Number</b></td>
        <td> :   <?php echo $data2['customerPhone']; ?></td>
      </tr>
      <tr>
        <td><b>Customer Address</b></td>
        <td> :<?php echo $data2['customerAddress']; ?></td>
      </tr>
    </table>
    </div>
    <form class="orders_frm p-1">
    <div class="form-group">
      <label for="qty">Quantity</label>
      <select name="qty" id="qty" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
    <div class="form-group mb-2">
      <label for="pmethod">Payment Method</label>
      <select name="pmethod" id="pmethod" class="form-control">
      <option value="">Select Payment Mode</option>
        <option value="cod">COD (cash on delivery)</option>
        <option value="online">ONLINE</option>
      </select>
    </div>
    <?php
    if($_SESSION)
    {
        echo "<center><button class='btn btn-success mt-2 mb-2 obtn'>Order Now !</button></center>";
    }
    else
    {
      echo "<center><a href='login.php' class='nav-link'><button class='btn btn-danger'>Order Now !</button></a></center>";
    }

    ?>
    </form>
  </div>
  <div class="col-md-3"></div>
</div>
</body>
</html>
<script src="http://localhost/project/GoShop/js/pages.js"></script>
<script>
 $(document).ready(function(){
    $(".orders_frm").submit(function(e){
        e.preventDefault();
        if($("#pmethod").val() == "")
        {
            $(".obtn").addClass("btn btn-warning");
            $(".obtn").html("please select any one payment method");
            setTimeout(() => {
              $(".obtn").removeClass("btn btn-warning");
              $(".obtn").addClass("btn btn-success");
              $(".obtn").html("Order Now !");
            }, 3000);
        }
        else
        {
            if($("#pmethod").val() == "cod")
            {
                window.location.href="http://localhost/project/GoShop/php/orders.php?pid=<?php echo $data['id']?>&pqty="+$("#qty").val()+"&pmethod="+$("#pmethod").val();
            }
            else if($("#pmethod").val() == "online")
            {
              window.location.href="http://localhost/project/GoShop/pay.php?pid=<?php echo $data['id']?>&pqty="+$("#qty").val()+"&pmethod="+$("#pmethod").val();   
            }
            else
            {
              $(".obtn").addClass("btn btn-warning");
              $(".obtn").html("Chutiya he kya");
              setTimeout(() => {
                $(".obtn").removeClass("btn btn-warning");
                $(".obtn").addClass("btn btn-success");
                $(".obtn").html("Order Now !");
              }, 3000);
            }
        }
    })
 })   
</script>
<!-- 
const method = document.querySelector("#pmethod");
    method.onchange=function()
    {
        if(this.value == "")
        {
            alert("please select any one payment method");
        }
        else
        {
            if(this.value == 1)
            {
                window.location.href=
            }
            else
            {
                
            }
        }
            
}-->
