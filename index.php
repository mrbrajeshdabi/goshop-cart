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
<body>
<?php require("element/nav.php");

$sql = $db->query("SELECT * FROM category");
if($sql->num_rows !=0)
{
    while($data=$sql->fetch_assoc())
    {
      $cat_url = $data['category_url'];
        echo '<div class="row mt-3">
        <center><h1>'.$data['category_name'].'</h1></center>';
        $sql2 = $db->query("SELECT * FROM product WHERE product_category='$cat_url'");
        if($sql2->num_rows !=0)
        {
          while($data2 = $sql2->fetch_assoc())
          {
            echo '<div class="col-md-4 top mt-2 animate__animated animate__backInDown homes">
                  <div class="d-flex justify-content-center">
                    <img src="http://localhost/project/GoShop/productpic/'.$data2['product_pic'].'" alt="" class="myimgd mt-2">
                  </div>
                  <div class="d-flex justify-content-center align-items-center">
                  <p class="me-4 mt-4">'.$data2['product_name'].'</p>
                    <p class="ms-4 mt-4">₹'.$data2['product_amount'].'</p>
                  </div>
                  <center><a href="http://localhost/project/GoShop/product/'.$data2['id'].'"><button class="btn btn-outline-primary mt-1 mb-3">View Order</button></a></center>
            </div>';
          }
        }
        '</div>';
    }       
}
?>

</body>
</html>