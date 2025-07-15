<?php
session_start();
include("../admin/inc/config.php");

$count = 0;
$action = $_POST['action'];
if($action == "login")
{
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];

	$query_login = "select * from tbl_user where email='$email_id' and password='$password' and status='Active'";
	$result_login = mysqli_query($con, $query_login);
	$count = mysqli_num_rows($result_login);
	if($count > 0)
	{
		$row = mysqli_fetch_assoc($result_login);
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['email_id'] = $row['email'];
		$_SESSION['user_name'] = $row['full_name'];
		$_SESSION['phone'] = $row['phone'];	

		if(isset($_SESSION['temp_user_id']))
		{
			$temp_user_id = $_SESSION['temp_user_id'];
			$_SESSION['temp_user_id'] = "";
			$user_id = $_SESSION['user_id'];
			$query_update = "update tbl_cart set user_id = '$user_id' where user_id = '$temp_user_id'";
			$result_update = mysqli_query($con, $query_update);
		}
	}
}

if($action == "register")
{
	$user_name = $_POST['reg_user_name'];
	$email_id = $_POST['reg_email'];
	$mobile = $_POST['reg_mobile'];
	$password = $_POST['reg_password'];

	$query_check = "select id from tbl_user where email='$email_id'";
	$result_check = mysqli_query($con, $query_check);
	$count = mysqli_num_rows($result_check);
	if($count <= 0)
	{
		$query_reg = "insert into tbl_user(full_name, email, phone, password, status) values('$user_name', '$email_id', '$mobile', '$password', 'Active')";
	  	$result = mysqli_query($con, $query_reg);	  	
	  	if($result > 0)
	  	{
	  		$user_id = mysqli_insert_id($con);
	  		$_SESSION['user_id'] = $user_id;
		  	$_SESSION['email_id'] = $email_id;
		  	// $_SESSION['user_name'] = $user_name;
		  	// $_SESSION['phone'] = $mobile;
		  	if(isset($_SESSION['temp_user_id']))
			{
				$temp_user_id = $_SESSION['temp_user_id'];
				$_SESSION['temp_user_id'] = "";
				$user_id = $_SESSION['user_id'];
				$query_update = "update tbl_cart set user_id = '$user_id' where user_id = '$temp_user_id'";
				$result_update = mysqli_query($con, $query_update);
			}
		}
	}
}

error_reporting();
echo $count;
?>