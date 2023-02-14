<?php 
include 'connection.php';
session_start();
$msg= "";
$loginmsg= "";
if(isset($_POST['btn-register'])){

    
    $username = $_POST['user-name'];
    $email = $_POST['user-email'];
    $password = $_POST['user-password'];
    $contact = $_POST['user-contact'];
    $address = $_POST['user-address'];
    $hash=password_hash($password,PASSWORD_DEFAULT);

    $emcheckquery = "select * from `user` where `user_email` = '$email'";
    $emcheckresult = mysqli_query($conn, $emcheckquery);
    $emailcount = mysqli_num_rows($emcheckresult);

    if($emailcount == 0){
    $regquery = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`, `user_contact`, `user_address`) VALUES ('$username','$email','$hash','$contact','$address')"; 
    $result = mysqli_query($conn, $regquery);
    $msg = "Register Successfuly";
    }else{
        $msg = "Email Already Exist";
    }
}

if(isset($_POST['btn-login'])){
    
    $email = $_POST['user-emaill'];
    $password = $_POST['user-passwordl'];

    $regquery = "Select * from `user` where `user_email` = '$email' "; 
    $result = mysqli_query($conn, $regquery);
    $rowcheck = mysqli_num_rows($result);

    if ($rowcheck > 0){
        $rowl = mysqli_fetch_assoc($result);
        if(password_verify($password, $rowl['user_password'])){
        
            $_SESSION['username'] = $rowl['user_name'];
            $_SESSION['userid'] = $rowl['user_id'];
            header('location:index.php');
            
        }else{
            $loginmsg = "Invalid password";
        }
    }
   else{
        $loginmsg = "Invalid Credentials";
    }
}
include 'header.php';
?>


        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area" data-bg-color="#F1FAEE">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="page-header-content">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                </ol>
                                <h2 class="page-header-title">My Account </h2>
                            </div>
                        </div>
                        <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                            <h5 class="showing-pagination-results">Login / Register</h5>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Login Wrapper ==-->
            <section class="login-register-area section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 login-register-border">
                            <div class="login-register-content">
                                <div class="login-register-title mb-30">
                                    <h2>Login</h2>
                                    <p>Welcome back! Please enter your username and password to login. </p>
                                </div>
                                <div class="login-register-style login-register-pr">
                                    <form method="post">
                                        <div class="login-register-input">
                                            <input type="text" name="user-emaill" placeholder="email address">
                                            
                                        </div>
                                        <div class="login-register-input">
                                            <input type="password" name="user-passwordl" placeholder="Password">
                                            <div class="forgot">
                                                <a href="#">Forgot?</a>
                                            </div>
                                        </div>
                                        <div class="remember-me-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                        </div>
                                        <div class="btn-register">
                                        <button type="submit" class="btn-register-now" name="btn-login">Login</button>
                                        <?php echo $loginmsg; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="login-register-content login-register-pl">
                                <div class="login-register-title mb-30">
                                    <h2>Register</h2>
                                    <p>Create new account today to reap the benefits of a personalized shopping experience. </p>
                                </div>
                                <div class="login-register-style">
                                    <form method="post">
                                        <div class="login-register-input">
                                            <input type="text" name="user-name" placeholder="Username" required>
                                        </div>
                                        <div class="login-register-input">
                                            <input type="email" name="user-email" placeholder="E-mail address" required>
                                        </div>
                                        <div class="login-register-input">
                                            <input type="password" name="user-password" placeholder="Password">
                                        </div>
                                        <div class="login-register-input">
                                            <input type="text" name="user-contact" placeholder="XXXX XXXX XXX">
                                        </div>
                                        <div class="login-register-input">
                                            <input type="text" name="user-address" placeholder="United State">
                                        </div>
                                        <div class="login-register-paragraph">
                                            <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy.</a></p>
                                        </div>
                                        <div class="btn-register">
                                            <button type="submit" class="btn-register-now" name="btn-register">Register</button> 
                                            <?php echo $msg; ?>
                                        </div>
                                    </form>
                                    <div class="register-benefits">
                                        <h3>Sign up today and you will be able to :</h3>
                                        <p>The Loke Buyer Protection has you covered from click to delivery. Sign up <br>or sign in and you will be able to:</p>
                                        <ul>
                                            <li><i class="fa fa-check-circle-o"></i> Speed your way through checkout</li>
                                            <li><i class="fa fa-check-circle-o"></i> Track your orders easily</li>
                                            <li><i class="fa fa-check-circle-o"></i> Keep a record of all your purchases</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Login Wrapper ==-->

            <!--== Start News Letter Area Wrapper ==-->
            <section class="news-letter-area section-bottom-space">
                <div class="container">
                    <div class="newsletter-content-wrap" style="background:url('assets/images/blog/newsletter.jpg')">
                        <div class="newsletter-content">
                            <h2 class="title">Connect with us | merier</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="newsletter-form">
                                <form>
                                    <input type="email" class="form-control" placeholder="Email address">
                                    <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End News Letter Area Wrapper ==-->

        </main>

        <?php include 'footer.php';
?>