<?php
session_start();
include ("includes/connection.php");
include ("functions/functions.php")
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waali Collection</title>
   <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
<!-- Navigation --><header class="section-header">


 <!-- container //  -->
</nav> <!-- header-top-light.// -->

<section class="header-main border-bottom bg-white">
	<div class="container-fluid">
       <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
           <div class="col-md-2">
               <!-- <img  class="d-none d-md-flex" src="logo" width="100"> -->
               <h5>WAALI Collection</h5>
           </div>
           <div class="col-md-8">
        <div class="d-flex form-inputs">
        <form method="get" action="results.php" enctype="multipart/form-data">
        <input class="form-control-lg mb-4" type="text" placeholder="Search any product..." name="user_query">
        <button type="submit"  name="search" value="search" class="bx bx-search btn btn-outline-dark" ><i  ></i></button>
        </form>
        </div>
           </div>
           
           <div class="col-md-2">
            <?php cart()
          
            ?>
               <div class="d-flex d-none d-md-flex flex-row align-items-center">
                   <a href="cart.php"><span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span></a>
                   <div class="d-flex flex-column ms-2">
    <span class="qty"><?php echo items($db); ?> Product</span> 
    <span class="fw-bold"> Rs <?php echo total_price();?></span>
  
</div>
<span class="m-2">
<!-- if not login show login if login show logout -->

<?php
if (!isset($_SESSION['customer_email'])){


 echo"<a href='checkout.php'>Login</a>";
}
else{
   echo"<a href='logout.php'>Logout</a>";
}
?>
</span>
               </div>           
           </div>
       </div>
	</div> 
</section>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none d-md-flex" href="#">Categories</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all_products.php">All products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_account.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_register.php">Sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact us</a>

        </li>

        
      </ul>
    </div>
  </div>
</nav>
</header>
  <!-- NAvbar -->

<!-- side bar -->
</div>
<section id="sidebar">
    <div>
      <!--catagories -->
        <h6 class="p-1 border-bottom">Catagories</h6>
       
        <ul>

        <?php getcat()
        ?>
        </ul>
    </div>
    <div>
      <!--brands -->
        <h6 class="p-1 border-bottom">Brands</h6>
       
        <ul>
          <?php getbrands();
          ?>    
        </ul>
    </div>
</section>
<section id="products">
    <div class="container">
        <div class="row">
            <?php 
            // for use session use command session_start(); on top
       if (!isset($_SESSION['customer_email'])){
        include ("customers/customer_login.php");
       }
       else{
        include ("payment_options.php");
       }
       
            ?>
        </div>
    </div>
</section>

              







    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
