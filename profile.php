<?php
session_start();
include("admin/inc/config.php");
$user_id = "";
if (isset($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
else if (isset($_SESSION['temp_user_id']))
    $user_id = $_SESSION['temp_user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update- Profile</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php include("include/header.php"); ?>


<div class="container my-5">
    <div class="shadow bg-white p-4 rounded">
        <h4 class="text-center py-2 text-white" style="background: linear-gradient(to right, #ffb200, #fd9800);">Profile</h4>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="update_profile.php" method="post">
            <div class="row">
                <!-- Personal Details -->
                <div class="col-md-4">
                    <div class="box-form-login">
                        <div class="register-title">Personal Details</div>
                        <?php
                        $query_user = "SELECT * FROM tbl_user WHERE id = '$user_id'";
                        $result_user = mysqli_query($con, $query_user);
                        while ($user_data = mysqli_fetch_assoc($result_user)) {
                        ?>
                            <div class="mb-2">
                                <label class="required">User Name</label>
                                <input type="text" name="UserName" class="form-control" value="<?= $user_data['full_name']; ?>" readonly>
                            </div>
                            <div class="mb-2">
                                <label class="required">Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?= $user_data['email']; ?>" readonly>
                            </div>
                            <div class="mb-2">
                                <label class="required">Password</label>
                                <input type="text" name="password" class="form-control" value="<?= $user_data['password']; ?>">
                            </div>
                            <div class="mb-2">
                                <label class="required">Mobile</label>
                                <input type="text" name="Mobile" class="form-control" value="<?= $user_data['phone']; ?>" readonly>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="col-md-4">
                    <div class="box-form-login">
                        <div class="register-title">Billing Address</div>
                        <?php
                        $query_billing = "SELECT * FROM tbl_billing_address WHERE user_id = '$user_id'";
                        $result_billing = mysqli_query($con, $query_billing);
                        while ($billing_data = mysqli_fetch_assoc($result_billing)) {
                        ?>
                            <div class="mb-2"><label class="required">Name</label><input type="text" name="b_name" class="form-control" value="<?= $billing_data['name']; ?>"></div>
                            <div class="mb-2"><label class="required">Mobile</label><input type="text" name="b_mobile" class="form-control" value="<?= $billing_data['phone_no']; ?>"></div>
                            <div class="mb-2"><label class="required">Address</label><input type="text" name="b_address" class="form-control" value="<?= $billing_data['street_address']; ?>"></div>
                            <div class="mb-2"><label class="required">Town</label><input type="text" name="b_town" class="form-control" value="<?= $billing_data['town']; ?>"></div>
                            <div class="mb-2"><label class="required">State</label><input type="text" name="b_state" class="form-control" value="<?= $billing_data['state']; ?>"></div>
                            <div class="mb-2"><label class="required">Pincode</label><input type="text" name="b_pincode" class="form-control" value="<?= $billing_data['pincode']; ?>"></div>
                            <div class="mb-2"><label>Landmark</label><input type="text" name="b_landmark" class="form-control" value="<?= $billing_data['landmark']; ?>"></div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="col-md-4">
                    <div class="box-form-login">
                        <div class="register-title">Shipping Address</div>
                        <?php
                        $query_shipping = "SELECT * FROM tbl_shipping_address WHERE user_id = '$user_id'";
                        $result_shipping = mysqli_query($con, $query_shipping);
                        while ($shipping_data = mysqli_fetch_assoc($result_shipping)) {
                        ?>
                            <div class="mb-2"><label class="required">Name</label><input type="text" name="s_name" class="form-control" value="<?= $shipping_data['name']; ?>"></div>
                            <div class="mb-2"><label class="required">Mobile</label><input type="text" name="s_mobile" class="form-control" value="<?= $shipping_data['phone_no']; ?>"></div>
                            <div class="mb-2"><label class="required">Address</label><input type="text" name="s_address" class="form-control" value="<?= $shipping_data['street_address']; ?>"></div>
                            <div class="mb-2"><label class="required">Town</label><input type="text" name="s_town" class="form-control" value="<?= $shipping_data['town']; ?>"></div>
                            <div class="mb-2"><label class="required">State</label><input type="text" name="s_state" class="form-control" value="<?= $shipping_data['state']; ?>"></div>
                            <div class="mb-2"><label class="required">Pincode</label><input type="text" name="s_pincode" class="form-control" value="<?= $shipping_data['pincode']; ?>"></div>
                            <div class="mb-2"><label>Landmark</label><input type="text" name="s_landmark" class="form-control" value="<?= $shipping_data['landmark']; ?>"></div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center mt-3">
                    <button type="submit" name="update_profile" class="btn btn-warning text-white fw-bold px-5 py-2" style="background: linear-gradient(to right, #ffb200, #fd9800); border: none;">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <?php include("include/footer.php"); ?>


    <script src="assets/js/app.js"></script>
</body>

</html>