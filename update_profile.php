<?php
session_start();


include("admin/inc/config.php");


if (isset($_POST['update_profile'])) {

    $user_id = $_SESSION['user_id'];


    $full_name = mysqli_real_escape_string($con, $_POST['UserName']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $phone = mysqli_real_escape_string($con, $_POST['Mobile']);
    $b_name = mysqli_real_escape_string($con, $_POST['b_name']);
    $b_mobile = mysqli_real_escape_string($con, $_POST['b_mobile']);
    $b_address = mysqli_real_escape_string($con, $_POST['b_address']);
    $b_town = mysqli_real_escape_string($con, $_POST['b_town']);
    $b_state = mysqli_real_escape_string($con, $_POST['b_state']);
    $b_pincode = mysqli_real_escape_string($con, $_POST['b_pincode']);
    $b_landmark = mysqli_real_escape_string($con, $_POST['b_landmark']);
    $s_name = mysqli_real_escape_string($con, $_POST['s_name']);
    $s_mobile = mysqli_real_escape_string($con, $_POST['s_mobile']);
    $s_address = mysqli_real_escape_string($con, $_POST['s_address']);
    $s_town = mysqli_real_escape_string($con, $_POST['s_town']);
    $s_state = mysqli_real_escape_string($con, $_POST['s_state']);
    $s_pincode = mysqli_real_escape_string($con, $_POST['s_pincode']);
    $s_landmark = mysqli_real_escape_string($con, $_POST['s_landmark']);


    $update_user_query = "UPDATE tbl_user SET full_name = '$full_name', password = '$password', phone = '$phone' WHERE id = '$user_id'";
    mysqli_query($con, $update_user_query);


    $update_billing_query = "UPDATE tbl_billing_address SET name = '$b_name', phone_no = '$b_mobile', street_address = '$b_address', town = '$b_town', state = '$b_state', pincode = '$b_pincode', landmark = '$b_landmark' WHERE user_id = '$user_id'";
    mysqli_query($con, $update_billing_query);


    $update_shipping_query = "UPDATE tbl_shipping_address SET name = '$s_name', phone_no = '$s_mobile', street_address = '$s_address', town = '$s_town', state = '$s_state', pincode = '$s_pincode', landmark = '$s_landmark' WHERE user_id = '$user_id'";
    mysqli_query($con, $update_shipping_query);
    $_SESSION['success_msg'] = "Profile updated successfully.";
    echo '<script>alert("Profile updated successfully.");</script>';


    echo '<script>setTimeout(function(){ window.location.href = "profile.php"; });</script>';
    exit();
    exit();
} else {

    header("Location: profile.php");
    exit();
}
