<?php
session_start();
include("admin/inc/config.php");

$user_id = "";
if (isset($_SESSION['user_id'])) 
    $user_id = $_SESSION['user_id'];
elseif (isset($_SESSION['temp_user_id']))
    $user_id = $_SESSION['temp_user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php"); ?>
<body>

        <div class="container my-5">
            <div class="shadow bg-white p-4 rounded">
                <h4 class="text-center py-2 text-white" style="background: linear-gradient(to right, #ffb200, #fd9800);">Login / Register</h4>
                <div class="text-center mb-4">
  <button class="btn btn-outline-warning me-2" id="showLogin">Login</button>
  <button class="btn btn-outline-warning" id="showRegister">Register</button>
</div>

<div class="row mt-4">
  <!-- Login Section -->
  <div class="col-md-6 mx-auto" id="loginBox">
    <div class="box-form-login">
      <div class="register-title">Login</div>
      <div id="error_message3" class="text-danger text-center mb-3"></div>
      <form id="login_ajax" method="post" class="login" action="">
        <div style="color: red; text-align: center; margin-top: 15px;">
          <p id="error_message3"></p>
        </div>
        <div class="mb-3">
          <label>Email Address<span class="required">*</span></label>
          <input type="text" class="form-control" name="username" id="login_email" required>
        </div>
        <div class="mb-3">
          <label for="password">Password<span class="required">*</span></label>
          <input type="password" class="form-control" name="password" id="login_password" required>
        </div>
        <div class="d-grid">
          <button onclick="user_login(); return false;" class="btn btn-warning text-white fw-bold" style="background: linear-gradient(to right, #ffb200, #fd9800);">Log In</button>
        </div>
        <div class="text-center mt-2">
          <a href="<?= $base_url; ?>forgot-password.php" class="text-muted text-decoration-none">Forgot your password?</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Register Section -->
  <div class="col-md-6 mx-auto" id="registerBox" style="display:none;">
    <div class="box-form-login">
      <div class="register-title">Register</div>
      <div style="color: red; text-align: center; margin-top: 15px;">
        <p id="error_message4"></p>
      </div>
      <form method="post" class="register">
        <div class="mb-3">
          <label>Full Name<span class="required">*</span></label>
          <input type="text" class="form-control" name="reg_user_name" id="reg_user_name" required>
        </div>
        <div class="mb-3">
          <label>Mobile Number<span class="required">*</span></label>
          <input type="tel" class="form-control" name="reg-mobile" id="reg_mobile" pattern="[0-9]{10}" required>
        </div>
        <div class="mb-3">
          <label>Email Address<span class="required">*</span></label>
          <input type="email" class="form-control" name="reg_email" id="reg_email" required>
        </div>
        <div class="mb-3">
          <label>Password<span class="required">*</span></label>
          <input type="password" class="form-control" name="reg_password" id="reg_password" required>
        </div>
        <div class="d-grid">
          <button onclick="user_reg(); return false;" class="btn btn-warning text-white fw-bold" style="background: linear-gradient(to right, #ffb200, #fd9800);">Register Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

            </div>
        </div>
 

    <?php include("include/footer.php"); ?>


<script>
  $(document).ready(function () {
    $('#showLogin').on('click', function () {
      $('#loginBox').show();
      $('#registerBox').hide();
    });

    $('#showRegister').on('click', function () {
      $('#registerBox').show();
      $('#loginBox').hide();
    });
  });
</script>

</body>
</html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    var base_url = "<?php echo $base_url; ?>";
    
    function pro_remove(cart_id)
    {
      $.ajax({
          type: "POST",
          dataType: "text",
          url: base_url + "ajax/product-remove.php",
          data: "action=cart&cart_id=" + cart_id,
          success: function(result) {
              // alert(result);
              location.reload();
          }
      });
    }

    function user_login()
    {
      // alert("result");
      var email_id = document.getElementById("login_email").value;
      var password = document.getElementById("login_password").value;
      
      if(email_id == "")
      {
        document.getElementById("error_message").innerHTML = "Please enter email id";
        return false;
      }
      if(password == "")
      {
        document.getElementById("error_message").innerHTML = "Please enter password";
        return false;
      }

      $.ajax({
          type: "POST",
          dataType: "text",
          url: base_url + "ajax/user-login.php",
          data: "email_id=" + email_id + "&password=" + password + "&action=login",
          success: function(result) {
              if(result <= 0)
                document.getElementById("error_message").innerHTML = "Invalid Email or Password";
              else {
              alert("Login successfully");
              window.location.href = base_url + "cart.php";
            }
          }
      });
    }

    function user_reg()
    {
        var reg_user_name = document.getElementById("reg_user_name").value;
        var reg_mobile = document.getElementById("reg_mobile").value;
        var reg_email = document.getElementById("reg_email").value;
        var reg_password = document.getElementById("reg_password").value;
        
        if(reg_user_name == "")
        {
            document.getElementById("error_message2").innerHTML = "Please enter user name";
            return false;
        }
        if(reg_mobile == "")
        {
            document.getElementById("error_message2").innerHTML = "Please enter contact number";
            return false;
        }
        else
        {
            if (!(/^\d{10}$/.test(reg_mobile))) 
            {
                document.getElementById("error_message2").innerHTML = "Please enter valid contact number";
                return false;
            } 
        }
        if(reg_email == "")
        {
            document.getElementById("error_message2").innerHTML = "Please enter email id";
            return false;
        }
        else
        {
            if(!(/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/.test(reg_email))) 
            {
        	   document.getElementById("error_message2").innerHTML = "Please enter valid email id";
                return false;
        	}
        }
        if(reg_password == "")
        {
            document.getElementById("error_message2").innerHTML = "Please enter password";
            return false;
        }
      
        $.ajax({
          type: "POST",
          dataType: "text",
          url: base_url + "ajax/user-login.php",
          data: "action=register&reg_user_name=" + reg_user_name + "&reg_mobile=" + reg_mobile + "&reg_email=" + reg_email + "&reg_password=" + reg_password,
          success: function(result) {
              if(result > 0)
                document.getElementById("error_message2").innerHTML = "User Already Exist";
              else  
              {
                alert("Your account has been created successfully"); 
                location.reload();           
              }
          }
        });
    }
  </script>