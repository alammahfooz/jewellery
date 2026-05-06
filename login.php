<?php  include('layout/header.php'); 

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = time();
    echo $_POST['submit'];
    echo '1111';

     $customer_access =  "INSERT INTO `customer` (email, password, date) VALUE ('$email', '$password', '$date')";
    mysqli_query($conn, $customer_access); 
    header("Location: thank-you.php?msg_id=5");
    
    exit(); 
}


?>

    <div class="section-seperator bg_light-1">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>



    <!-- rts register area start -->
    <div class="rts-register-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-wrapper-1">
                        <div class="logo-area mb--0">
                            <img class="mb--10" src="assets/images/logo/fav.html" alt="logo">
                        </div>
                        <h3 class="title">Login Into Your Account</h3>
                        <form action="#" method="POST" enctype="multipart/form-data" class="registration-form">
                            <div class="input-wrapper">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="password">Password*</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            <button type="submit" name="submit" class="rts-btn btn-primary">Login Account</button>
                            <div class="another-way-to-registration">
                                <div class="registradion-top-text">
                                    <span>Or Register With</span>
                                </div>
                                <div class="login-with-brand">
                                    <a href="#" class="single">
                                        <img src="assets/images/form/google.html" alt="login">
                                    </a>
                                    <a href="#" class="single">
                                        <img src="assets/images/form/facebook.html" alt="login">
                                    </a>
                                </div>
                                <p>Already Have Account? <a href="#">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts register area end -->



 <?php  include('layout/footer.php'); ?>