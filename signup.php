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
<body>
 <?php

require("element/nav.php");

?>  
<div class="row">
  <div class="col-md-3 p-0 m-0"></div>
  <div class="col-md-6 p-0 m-0">
     <div class="leftbox"></div>
    <form class="signup_frm p-3 animate__animated animate__flipInY text-dark" autocomplete="off">
      <center><h3>Register Now</h3></center>
      <div class="form-group ">
      <label for="email"> Name</label>
        <input type="text"  id="fname" name="fname"class="form-control">
      </div>
      <div class="form-group">
       <label for="email"> Email</label>
        <input type="email"  name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
      <label for="email"> Mobile Number</label>
        <input type="number"  id="phone" name="phone" class="form-control">
      </div>
      <div class="form-group">
      <label for="email">Gender</label>
        <select name="gender" id="gender" class="form-control">
          <option value="male" class="text-dark">Male</option>
          <option value="female" class="text-dark">Female</option>
          <option value="other" class="text-dark">Other</option>
        </select>
      </div>
      <div class="form-group">
      <label for="email">Address</label>
        <textarea name="address" id="address" cols="2" rows="3" class="form-control"></textarea>
      </div>
      <div class="form-group">
      <label for="email"> Password</label>
        <input type="password"  id="password" name="password" class="form-control">
     </div>
     <center><button class="btn btn-outline-primary sbtn mt-2 mb-3">Sign In Now</button></center>
    </form>
  </div>
  <div class="col-md-3 p-0 m-0"></div>
</div>
</body>
</html>
<script>
  $(document).ready(function(){
    $(".signup_frm").submit(function(e){
      e.preventDefault();
       $.ajax({
        type:"POST",
        url:"http://localhost/project/GoShop/php/signup.php",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        beforeSend:function()
        {
            $(".sbtn").addClass("btn btn-warning");
            $(".sbtn").html("Please Wait..");
            setTimeout(() => {
              $(".sbtn").removeClass("btn btn-warning");
              $(".sbtn").addClass("btn btn-outline-primary");
              $(".sbtn").html("Sign In Now");
            }, 3000);
        },
        success:function(response)
        {
          if(response.trim() == "success")
          {
            $(".sbtn").html("Signup SuccessFully");
            setTimeout(() => {
              $(".sbtn").html("Sign In Now");
              window.location.href="http://localhost/project/LCS/login/";
            }, 3000);
          }
          else
          {
            $(".sbtn").addClass("btn btn-danger");
            $(".sbtn").html(response);
            setTimeout(() => {
              $(".sbtn").removeClass("btn btn-danger");
              $(".sbtn").addClass("btn btn-outline-primary");
              $(".sbtn").html("Sign In Now");
            }, 3000);
          }
        }
       })
    })
  })
</script>