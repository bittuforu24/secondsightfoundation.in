<?php include("admin/inc/config.php");?>
<?php
$user_id = "";
if(isset($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
else if(isset($_SESSION['temp_user_id']))
    $user_id = $_SESSION['temp_user_id'];
    
if(isset($_POST['send_mail']))
{
    $to_mail = $_POST['email'];
    $query = "select password from tbl_user where email = '$to_mail'";
    $result = mysqli_query($con, $query);
    $row_count = mysqli_num_rows($result);
    if($row_count)
    {
        $info = mysqli_fetch_assoc($result);
        $password = $info['password'];
        $subject = "SSF Password";
        $message = "Your password is ".$password;
        // $from = " your mail Id";
        // $headers = "From: $from";
        if (mail($to_mail, $subject, $message)) {
            echo "<script>alert('Your password has been sent to your email id')</script>";
            echo "<script>location.reload();</script>";
        } else {
            echo "<script>alert('Failed to send password')</script>";
        }
    }
    else
    {
        echo "<script>alert('Please enter valid email id')</script>";   
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php");?>

<body class="page">


        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title" style="background-image: url(/assets/img/banner.webp); background-size: 100% 100%;">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    Forgot Password
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="#">Home</a><span class="delimiter"></span>Forgot Password
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="page-contact">
                            

                            <section class="section section-padding m-b-70">
                                <div class="section-container">
                                    <!-- Block Contact Info -->
                                    <div class="block block-contact-info">
                                        <div class="block-widget-wrap">
                                            
                                            <div class="info-title">
                                                <h2>Please enter your email address to receive a password</h2>
                                            </div>
                                            <div class="info-items">
                                                <div class="row">
                                                    <div class="col-md-12 sm-m-b-30">
                                                        <div class="info-item">
                                                            <div class="item-tilte">
                                                                <h2>Enter Your Email Id:</h2>
                                                            </div>
                                                            <div class="item-content">
                                                                 <form method="post" action=""> <!-- Replace 'send_otp.php' with your PHP handling script -->
                                                                    <!--<label for="email">Email:</label>-->
                                                                    <input type="email" id="email" name="email" required>
                                                                    <input type="submit" value="Reset Password" name="send_mail">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <?php include("include/footer.php");?>


</body>
</html>