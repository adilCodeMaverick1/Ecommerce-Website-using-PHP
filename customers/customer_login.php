<?php
@session_start();

include("includes/connection.php");


?>

<div class="login-animation" id="loginAnimation">
    Please login to continue payment
</div>
<div>
    <form action="chekout.php" method="POST">
        <div class="form-outline mb-4">
            <input type="email" name="c_email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="c_pass" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
            <a href="customers/forgot_pass.php">Forgot password?</a>
        </div>

        <!-- Submit button -->
        <button type="submit" name="c_login" class="btn btn-primary btn-block mb-4">Log in</button>

        <a href="customers/customer_register.php">Sign up</a>
    </form>
</div>

<?php
// login script

// login script
if (isset($_POST['c_login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    $sel_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con, $sel_customer);
    $check_customer = mysqli_num_rows($run_customer);
    $get_ip = getIPAddress();
    $sel_cart = "SELECT * FROM caart WHERE ip_add='$get_ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_customer == 0) {
        echo "<script>alert('Password and email not correct! Try again')</script>";
    } else {
        $_SESSION['customer_email'] = $customer_email;

        if ($check_cart == 0) {
            echo "<script>window.open('customers/my_account.php','_self')</script>";
        } else {
            echo "<script>window.open('payment_options.php','_self')</script>";
           

        }
    }
}
?>


