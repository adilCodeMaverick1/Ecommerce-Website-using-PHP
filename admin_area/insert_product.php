<?php
include ("includes/connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>insert_product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    tr{
        border: 1px solid gray;
    
    }
    td{
        padding: 10px;
    }
</style>  
</head>

  <body>

  <form action="insert_product.php" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center ">
    <table>
        <tr>
            <td><h2>Insert products</h2></td>
        </tr>
        <tr>
            <td><input type="text" name="product_title" class="form-control" placeholder="product title" ></td>
    </tr>
    <tr>
            <td>
                <!-- catagoriez -->
                <select name="product_cat" class="form-control-lg" >
<option >Select a catagory</option>
<?php   
      $get_catag ='select * from catagories';
$run_catag = mysqli_query($con, $get_catag);

while ($row_catag = mysqli_fetch_array($run_catag)) {
$cat_id = $row_catag['cat_id'];
$cat_title = $row_catag['cat_title'];
echo "<option value='$cat_id'>$cat_title</option>";
}
          ?>
            </select>
        </td>
    </tr>
    <tr>
        <!-- brands -->
            <td>
            <select name="product_brand"  class="form-control-lg">
<option >Select a brand</option>
<?php   
      $get_brand ='select * from brand';
      $run_brand = mysqli_query($con, $get_brand);
      
      while ($row_brand = mysqli_fetch_array($run_brand)) {
        $brand_id = $row_brand['brand_id'];
        $brand_title = $row_brand['brand_title'];
        echo "  <option value='$brand_id'>$brand_title</option>";
        
      }
    
          ?>
            </select>
            </td>
    </tr>
    <tr>
            <td><input type="file" name="product_img1" class="input-group-text "></td>
    </tr>
    <tr>
            <td><input type="file" name="product_img2"class="input-group-text"></td>
    </tr>
    <tr>
            <td><input type="file" name="product_img3"class="input-group-text"></td>
    </tr>
    <tr>
            <td><input type="text" name="product_price"class="form-control" placeholder="product price"></td>
    </tr>
    <tr>
            <td><input type="text" name="product_desc"class="form-control" placeholder="description" ></td>
    </tr>
    <tr>
            <td><input type="text" name="product_keywords"class="form-control " placeholder=" Keywords" ></td>
    </tr>
    <tr>
            <td><input type="submit" name="insert_product" class="btn btn-outline-primary" value="Insert Product "></td>
    </tr>

    </table>
   
</form>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<?php

if (isset($_POST['insert_product'])){


  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];
  $status='on';
  // images
  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];
  // img temprary name
  $temp_img1 = $_FILES['product_img1']['tmp_name'];
  $temp_img2 = $_FILES['product_img2']['tmp_name'];
  $temp_img3 = $_FILES['product_img3']['tmp_name'];
  
  
  if ($product_title == '' OR $product_cat == '' OR $product_brand == '' OR $product_price == '' OR $product_desc == '' OR $product_keywords == '' OR $product_img1 == '') {
    echo "<script>alert('Please input values for all fields!');</script>";
    exit();
 
 }
 else {
  move_uploaded_file($temp_img1, "product_images/$product_img1");
  move_uploaded_file($temp_img2, "product_images/$product_img2");
  move_uploaded_file($temp_img3, "product_images/$product_img3");
  



  $insert_product = "INSERT INTO products ( catagory_id , brand_id, date,prduct_title,product_img1, product_img2,product_img3,product_price,product_description,product_status) 
VALUES ( '$product_cat', '$product_brand',NOW(), '$product_title',  '$product_img1', '$product_img2', '$product_img3','$product_price', '$product_description','$status')";
  

  $run_products=mysqli_query($con,$insert_product);

  if ($run_products) {

    echo" <script>alert('inserted succesfully!'); </script>";
    
  }
      }


}


?>

