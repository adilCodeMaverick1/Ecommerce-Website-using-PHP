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
<div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h4>Shopping cart</h4>
                        <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div>
                    </div>
                    </div>
    <form action="cart.php" method="post" enctype="multipart/form-data">
    <?php
$ip_add =getIPAddress();

$total =0;
$sel_price="select * from caart where ip_add='$ip_add'";
$run_price=mysqli_query($db,$sel_price);
if (mysqli_num_rows($run_price) == 0) {
  echo "<div class='alert alert-danger'role='alert'>
            Your cart is empty please continue shopping 
            </div>
            <a href='index.php'><div class='btn btn-outline-primary'>Continue Shopping</div></a>";

}else{
  while ($record=mysqli_fetch_array($run_price)){
    $pro_id=$record['product_id'];
    $pro_price="select * from products where  product_id ='$pro_id'";
    $run_pro_price = mysqli_query($con,$pro_price);
   while ($p_price=mysqli_fetch_array($run_pro_price)){
    $product_price=array ($p_price['product_price']);
    $product_title =$p_price ['prduct_title']; 
    $product_image = $p_price ['product_img1'];
    $only_price = $p_price ['product_price'];
    $values =array_sum($product_price);
    $total += $values;
   
 


}




?>


    <div class="container-fluid">
        <div class="row">
        <div class="container-fluid mt-5 mb-5">
   
         
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="admin_area/product_images/<?php echo $product_image;?>" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo $product_title;?></span>
                            <div class="d-flex flex-row product-desc">
                                <div class="size mr-1"><span class="text-grey">Description</span><span class="font-weight-bold">&nbsp;M</span></div>
                               
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center qty">
                          
                            <input type="text" name="qty" value="1" size="3"/>
                          </div>
<?php
// if (isset ($_POST['update'])){
// $qty=($_POST['qty']);
// $insert_qty="update caart set qty";
// $run_qty=mysqli_query($con,$insert_qty);
// $total=$total*$qty;

// }
// if (isset($_POST['update'])){
//   $qty = $_POST['qty'];
//   $pro_id = $record['product_id'];
//   $update_qty = "UPDATE caart SET qty = '$qty' WHERE product_id = '$pro_id'";
//   $run_qty = mysqli_query($con, $update_qty);
//   if ($run_qty){
//       $total = $total * $qty;
//   }
// }
if (isset($_POST['update'])){
  $qty = $_POST['qty'];
  $pro_id = $record['product_id'];
  $update_qty = "UPDATE caart SET qty = '$qty'";
  $run_qty = mysqli_query($con, $update_qty);
  if ($run_qty){
      $total = $total * intval($qty);
 
  }
}



?>
                        <div>
                        
                        
                            <h5 class="text-grey"><?php echo $only_price;?></h5>
                        </div>
                        <div class="d-flex align-items-center"> <input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"><img src="images/trash (1).svg" alt=""> </div>
                    </div>
                    
                    
                    </div>
                  
                </div>
            </div>
        </div>
        </div>
     
    </div>
    
 
    <?php    }}?>
    <hr id="thread1">
    <div class="row">
  <div class="col-8"><b>Total</b></div>
  <div class="col-4"> <B> <?php echo $total; ?></B></div>
  
  <div class="row">
    <div class="col p-5">
<input type="submit" name="update" value="Update cart" class="btn btn-primary">
    </div>
    <div class="col p-5">
    <!-- <input type="submit" name="continue" value="Continue" class="btn btn-primary"> -->
    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>
    <div class="col p-5">
    <!-- <a href='index.php'><div class='btn btn-primary'>Continue Shopping</div></a> -->
    <h6 class="">100% Safe Chekouts by Checkout.com</h6>

    </div>
  </div>
</div>
</div>
   
    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
    <p style="color: red; margin:top 5px;">Note:Must Click update cart  before  check out</p>
      </div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                      <a href="chekout.php"><button class="btn btn-warning btn-block btn-SM ml-2 pay-button" type="button">PROCEED TO CHECKOUT</button></a>
                    </div>
    </form>
    <?php
    // for deleting the product from cart
   
 function updatecart(){
  global $con;
    if (isset ($_POST['update'])){
        foreach ($_POST['remove'] as $remove_id){
          $delete_products ="delete from caart where product_id='$remove_id'";
          $run_delete =mysqli_query($con,$delete_products);
          if ($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
    }
    if (isset($_POST['continue'])){
echo "<script>window.open('index.php','_self')</script>";
    }
  }
echo @$up_cart=updatecart()
    ?>
</section>

              







    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
