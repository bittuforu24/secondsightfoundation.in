<?php
include("../admin/inc/config.php");

$cart_id = $_POST['cart_id'];
$action = $_POST['action'];
if($action == "add")
	$query_add_qty = "update tbl_cart set no_of_item = no_of_item + 1 where id = '$cart_id'";
if($action == "sub")
	$query_add_qty = "update tbl_cart set no_of_item = no_of_item - 1 where id = '$cart_id'";
if($action == "update_qty")
{
	$new_qty = $_POST['new_qty'];
	$arr = explode("_",$cart_id);
	$cart_id = $arr[1];
	$query_add_qty = "update tbl_cart set no_of_item = '$new_qty' where id = '$cart_id'";
}
mysqli_query($con, $query_add_qty);
// echo $cart_id;
?>