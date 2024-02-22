<?php
$db =mysqli_connect("localhost","root","","myshop");

 
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

// creating script for cart

function cart(){
    global $db;
    if (isset($_GET['add_cart'])){
$ip_add = getIPAddress();
$p_id = $_GET ['add_cart'];
$check_pro ="select * from caart where ip_add='$ip_add'AND product_id='$p_id'";
$run_check= mysqli_query($db , $check_pro);
if (mysqli_num_rows($run_check)>0){
    echo "Product added";
}
else{
    $q ="insert into caart (product_id,ip_add) values ('$p_id','$ip_add')";
    $run_q=mysqli_query($db,$q);
    // java csript function to redirect again to index page and refreshes
    echo "<script>window.open('index.php','_self')</script>";   
}
    }
}
// getting how many items are in the cart
function items($db) {
    if (isset($_GET['add_cart'])) {
        $ip_add = getIPAddress();
        $get_items = "SELECT * FROM caart WHERE ip_add='$ip_add'";
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);
        return $count_items; // return the count_items value
    } else {
        $ip_add = getIPAddress();
        $get_items = "SELECT * FROM caart WHERE ip_add='$ip_add'";
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);
        return $count_items; // return the count_items value
    }
}
// getting the total price of items from cart
function total_price(){

   
    $ip_add =getIPAddress();
    global $db;
    $total =0;
    $sel_price="select * from caart where ip_add='$ip_add'";
    $run_price=mysqli_query($db,$sel_price);
    while ($record=mysqli_fetch_array($run_price)){
        $pro_id=$record['product_id'];
        $pro_price="select * from products where  product_id ='$pro_id'";
        $run_pro_price = mysqli_query($db,$pro_price);
       while ($p_price=mysqli_fetch_array($run_pro_price)){
        $product_price=array ($p_price['product_price']);
        $values =array_sum($product_price);
        $total += $values;


       }
    }
    echo $total;
}



// getting products from data base
function getPro(){

    if (!isset($_GET['cat'])){
        if (!isset($_GET['brand'])){
    global $db;
    $get_products = "select * from products order by rand() LIMIT 0,50000";
    $run_products = mysqli_query($db, $get_products);
    while ($row_products = mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['prduct_title'];
        $pro_desc = $row_products['product_price'];
        $pro_price = $row_products['product_description'];
        $pro_image = $row_products['product_img1'];

        echo "
        <div class='col-12 col-sm-8 col-md-6 col-lg-4'>
        <div class='card m-3'>
     
        <img src='admin_area/product_images/$pro_image'class='card-img-top' alt='Product Image'/>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <p class='card-price font-weight-bold'><b>$pro_price PKR</b></p>
                <a href='details.php?pro_id=$pro_id'>Details</a>
                <a href='index.php?add_cart=$pro_id' class='btn btn-outline-dark'>Buy Now</a>
            </div>
        </div>
    </div>";
    }    
}
    }
}


// on click catageries show releted catagory
function getCatPro(){

    if (isset($_GET['cat'])){
        $cat_id =$_GET['cat'];
       
    global $db;
    $get_cat_pro = "select * from products where catagory_id='$cat_id'";
    $run_cat_pro = mysqli_query($db, $get_cat_pro);
    $count=mysqli_num_rows($run_cat_pro);
    if($count==0){
        echo "<div class='alert alert-warning'role='alert'>
        No products found in this catagory
      </div>";
    }
    while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)){

        $pro_id = $row_cat_pro['product_id'];
        $pro_title =$row_cat_pro ['prduct_title'];
        $pro_desc =$row_cat_pro ['product_price'];
        $pro_price = $row_cat_pro['product_description'];
        $pro_image = $row_cat_pro['product_img1'];

        echo "
        <div class='col-12 col-sm-8 col-md-6 col-lg-4'>
        <div class='card m-3'>
     
        <img src='admin_area/product_images/$pro_image'class='card-img-top' alt='Product Image'/>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <p class='card-price font-weight-bold'><b>$pro_price PKR</b></p>
                <a href='details.php?pro_id=$pro_id'>Details</a>
                <a href='index.php?add_cart=$pro_id' class='btn btn-outline-dark'>Buy Now</a>
            </div>
        </div>
    </div>";
    }    
}
    
}


//getting catagaries from database
function getcat(){
global $db;
$get_catag ='select * from catagories';
$run_catag = mysqli_query($db, $get_catag);

while ($row_catag = mysqli_fetch_array($run_catag)) {
  $cat_id = $row_catag['cat_id'];
  $cat_title = $row_catag['cat_title'];
  echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
}
}


// onclick brands coming from data base
function getbrandPro(){
    global $db;
    if (isset($_GET['brand'])){
        $brand_id =$_GET['brand'];
    $get_brand_pro = "select * from products where brand_id='$brand_id'";
    $run_brand_pro = mysqli_query($db, $get_brand_pro);
    $count=mysqli_num_rows($run_brand_pro);
    if($count==0){
        echo "<div class='alert alert-warning'role='alert'>
        No products found in this brand
      </div>";
    }
    while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)){

        $pro_id = $row_brand_pro['product_id'];
        $pro_title =$row_brand_pro ['prduct_title'];
        $pro_desc =$row_brand_pro ['product_price'];
        $pro_price = $row_brand_pro['product_description'];
        $pro_image = $row_brand_pro['product_img1'];

        echo "
        <div class='col-12 col-sm-8 col-md-6 col-lg-4'>
        <div class='card m-3'>
     
        <img src='admin_area/product_images/$pro_image'class='card-img-top' alt='Product Image'/>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <p class='card-price font-weight-bold'><b>$pro_price PKR</b></p>
                <a href='details.php?pro_id=$pro_id'>Details</a>
                <a href='index.php?add_cart=$pro_id' class='btn btn-outline-dark'>Buy Now</a>
            </div>
        </div>
    </div>";
    }    
}
    
}







// getting brands from data base
function getbrands(){
global $db;
$get_brand ='select * from brand';
$run_brand = mysqli_query($db, $get_brand);

while ($row_brand = mysqli_fetch_array($run_brand)) {
  $brand_id = $row_brand['brand_id'];
  $brand_title = $row_brand['brand_title'];
  echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
}


}




?>