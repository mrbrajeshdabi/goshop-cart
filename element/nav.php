<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/project/GoShop/index"><i class="fa fa-shopping-cart fs-1 text-dark ms-2 animate__animated animate__bounceInLeft"></i></a>
  <button class="navbar-toggler" data-bs-toggle="collapse"
  data-bs-target="#mynav" type="button">=</button>
  <div class="navbar-collapse collapse" id="mynav">
    <ul class="navbar-nav">
    <li class="nav-item ms-2"><a href="http://localhost/project/GoShop/index" class="nav-link">HOME</a></li>
    <?php
        require("php/db.php");
        session_start();
       if($_SESSION)
       {
        $email  = $_SESSION['_aut_ui_'];
        //fetch customer data
        $sql2= $db->query("SELECT * FROM customer WHERE customerEmail='$email'");
        $data2 = $sql2->fetch_assoc();
       }

        //fetch category data
        $sql = $db->query("SELECT * FROM category");
        if($sql->num_rows !=0)
        {
            while($data=$sql->fetch_assoc())
            {
                echo '<li class="nav-item ms-2"><a href="http://localhost/project/GoShop/category/'.$data['category_url'].'" class="nav-link">'.$data['category_name'].'</a></li>';
            }
        }
        if($_SESSION)
        {
          echo '
          
          <li class="nav-item ms-2"><a href="http://localhost/project/GoShop/myorder" class="nav-link animate__animated animate__backInRight" data-bs-toggle="tooltip" data-bs-placement="left" title="MY ORDER"><i class="fa fa-cart-arrow-down fs-4 text-success myorder" aria-hidden="true"></i></a></li>
          <li class="nav-item ms-2"><a href="http://localhost/project/GoShop/logout" class="nav-link animate__animated animate__backInRight"><i class="fa fa-circle-o-notch fs-4 text-success logout" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="LOGOUT"></i></a></li>
          
          ';
        }
        else
        {
          echo '
          
          <li class="nav-item ms-2"><a href="http://localhost/project/GoShop/signup" class="nav-link">Register</a></li>
          <li class="nav-item ms-2"><a href="http://localhost/project/GoShop/login" class="nav-link">Login</a></li>
          
          ';
        }
    ?>
     <?php

        if($_SESSION)
        {
          echo ' <li class="nav-link text-danger">WELCOME <b>'.strtoupper($data2['customerName']).'</b></li>';
        }
     ?>
  </ul>
  </div>
</nav>
<script>
  $(document).ready(function(){
    $(".myorder").mouseover(function(){
      
    })
  })
</script>