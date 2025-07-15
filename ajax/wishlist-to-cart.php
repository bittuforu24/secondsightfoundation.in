<?php
include("../admin/inc/config.php");

$wishlist_id = $_POST['wishlist_id'];

// $query = "insert into tbl_cart (user_id, p_id, p_name, p_color, p_size, p_price, p_image, p_quantity) select user_id, p_id, p_name, p_color, p_size, p_price, p_image, p_quantity from tbl_wishlist where id = '$wishlist_id'";

$query = "insert into tbl_cart (user_id, p_id, p_name, p_color, p_size, p_price, p_actual_price, p_gst, p_image, p_quantity, no_of_item, weight, unit, sku) select user_id, p_id, p_name, p_color, p_size, p_price, p_actual_price, p_gst, p_image, p_quantity, no_of_item, weight, unit, sku from tbl_wishlist where id = '$wishlist_id'";

$result = mysqli_query($con, $query);

if($result > 0)
{
	$query_update = "delete from tbl_wishlist where id = '$wishlist_id'";
	mysqli_query($con, $query_update);
	echo "Product Added Successfully";
}
?>