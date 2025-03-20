<!doctype html>
<html lang="en">
<head>
<title>product</title>
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
  
<div class="row">
 <center><h1>Add Product</h1></center>
 <div class="col-md-2"></div>
<div class="col-md-8 p-0 m-0">
  <form class="product_frm p-5 rounded">
    <div class="form-group mb-2">
        <label for="category">Product Category</label>
        <select name="category" id="category" class="form-control">
        <?php
            require("../php/db.php");
            $sql = $db->query("SELECT * FROM category");
            if($sql->num_rows !=0)
            {
                while( $data = $sql->fetch_assoc())
                {
                  echo '<option value='.$data['category_url'].'>'.$data['category_name'].'</option>';
                }
            }
        ?>
        </select>
    </div>
    <!--profile pic --->
    <div class="form-group mb-2">
      <label for="ppic">Product Pic</label>
      <input type="file" class="form-control" id="ppic" name="ppic">
    </div>
    <!--product name -->
    <div class="form-group mb-2">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <!--product amount -->
    <div class="form-group mb-2">
      <label for="pamount">Product Amount</label>
      <input type="number" class="form-control" id="pamount" name="pamount">
    </div>
    <!--product Quantity -->
    <div class="form-group mb-2">
      <label for="pqty">Product Quantity</label>
      <select name="pqty" id="pqty" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <!-- Product Description -->
    <div class="form-group mb-2">
      <label for="pdesc">Product Description</label>
      <textarea name="pdesc" id="pdesc" cols="30" rows="10"
      class="form-control">
        <ul>     
        <li>In The Box : Mobile Phone, Power Adapter, SIM Tray Ejector, USB Cable, Warranty Card</li>
        <li>Model Number : 23124RN87I </li>
        <li>Model Name : 13c 5G <li>
        <li>Color : Starlight Black </li>
        <li> Browse Type :Smartphones </li>
        <li> SIM Type : Dual Sim </li>
        <li>Hybrid Sim Slot : No</li> 
        <li> OTG Compatible : No </li>
        </ul>
        </textarea>
    </div>
    <center><button class="btn btn-outline-primary mt-2 mb-2">Add Product</button></center>
  </form>
</div>
<div class="col-md-2"></div>
</div>
</body>
</html>
<script>
  $(document).ready(function(){
    $(".product_frm").submit(function(e){
      e.preventDefault();
       $.ajax({
        type:"POST",
        url:"php/product.php",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        beforeSend:function()
        {

        },
        success:function(response)
        {
          alert(response);
        }
       })
    })
  })
</script>