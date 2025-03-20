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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php

require("element/nav.php");

?>
<div class="row">
<div class="col-md-3 p-0 m-0"></div>
<div class="col-md-6 p-0 m-0">
    <form class="login_frm p-5 animate__animated animate__flipInY" autocomplete="off">
      <center><h3>Login Now</h3></center>
      <div class="form-group mb-2">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="form-group mb-2">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
     </div>
     <center><button class="btn btn-outline-primary lbtn mt-2">Login Now</button></center>
    </form>
  </div>
  <div class="col-md-3 p-0 m-0"></div>
</div>
</body>
</html>
<script>
  $(document).ready(function(){
    $(".login_frm").submit(function(e){
      e.preventDefault();
       $.ajax({
        type:"POST",
        url:"http://localhost/project/GoShop/php/login.php",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        beforeSend:function()
        {
          $(".lbtn").addClass("btn btn-outline-warning");
            $(".lbtn").html("Please Wait..");
            setTimeout(() => {
              $(".lbtn").removeClass("btn btn-outline-warning");
              $(".lbtn").addClass("btn btn-outline-primary");
              $(".lbtn").html("Login Now");
            }, 3000);
        },
        success:function(response)
        {
          if(response.trim() == "success")
          {
            location.href="http://localhost/project/GoShop/index"; 
          }
          else
          {
            $(".lbtn").addClass("btn btn-danger");
            $(".lbtn").html(response);
            setTimeout(() => {
              $(".lbtn").removeClass("btn btn-danger");
              $(".lbtn").addClass("btn btn-outline-primary");
              $(".lbtn").html("Login Now");
            }, 3000);
          }
        }
       })
    })
  })
</script>