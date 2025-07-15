<?php 
include("../admin/inc/config.php");

$action = $_POST['action'];
if($action == "cart")
{
	$cart_id = $_POST['cart_id'];
	$query_del = "delete from tbl_cart where id = '$cart_id'";
	mysqli_query($con, $query_del);
}

if($action == "wish")
{
	$wish_id = $_POST['wish_id'];
	$query_del = "delete from tbl_wishlist where id = '$wish_id'";
	mysqli_query($con, $query_del);
}
// echo $cart_id;
?>