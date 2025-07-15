<?php
include("admin/inc/config.php");
session_start();
$user_id = "";
if (isset($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
else if (isset($_SESSION['temp_user_id']))
    $user_id = $_SESSION['temp_user_id'];
?>


<?php
include('include/header.php');
?>

<style>
    /* Cart Page Styles */
    .cart-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 40px 0;
    }

    .cart-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .cart-header h1 {
        color: #333;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .cart-header p {
        color: #666;
        font-size: 1.1rem;
    }

    .cart-table {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 30px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        padding: 20px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        background-color: #fafafa;
        border-radius: 10px;
        padding: 20px;
        margin: 0 -20px;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item-img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .cart-item-details {
        flex: 1;
    }

    .cart-item-title {
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }

    .cart-item-description {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .cart-item-price {
        color: #fdc134;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 15px 0;
    }

    .quantity-btn {
        width: 35px;
        height: 35px;
        border: 2px solid #fdc134;
        background: white;
        color: #fdc134;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .quantity-btn:hover {
        background: #fdc134;
        color: white;
    }

    .quantity-input {
        width: 60px;
        text-align: center;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 8px;
        font-weight: bold;
    }

    .remove-btn {
        background: #dc3545;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .remove-btn:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    .cart-summary {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 30px;
        position: sticky;
        top: 20px;
    }

    .cart-summary h3 {
        color: #333;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #fdc134;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .summary-row.final {
        font-size: 1.3rem;
        font-weight: bold;
        color: #333;
        border-top: 2px solid #f0f0f0;
        padding-top: 15px;
        margin-top: 15px;
    }

    .btn-cart {
        background: linear-gradient(135deg, #fdc134, #fcb813);
        color: #000 !important;
        border: none;
        padding: 15px 30px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease;
        width: 100%;
        margin-bottom: 10px;
    }

    .btn-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(253, 193, 52, 0.3);
        opacity: 0.9;
    }

    .btn-cart.secondary {
        background: transparent;
        border: 2px solid #fdc134;
        color: #fdc134;
    }

    .btn-cart.secondary:hover {
        background: #fdc134;
        color: #000;
    }

    .empty-cart {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-cart i {
        font-size: 4rem;
        color: #fdc134;
        margin-bottom: 20px;
    }

    .empty-cart h3 {
        color: #333;
        margin-bottom: 15px;
    }

    .empty-cart p {
        color: #666;
        margin-bottom: 30px;
    }

    .coupon-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .coupon-input {
        display: flex;
        gap: 10px;
    }

    .coupon-input input {
        flex: 1;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
    }

    .coupon-input button {
        background: #fdc134;
        color: #000;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .cart-container {
            padding: 20px 0;
        }

        .cart-header h1 {
            font-size: 2rem;
        }

        .cart-table,
        .cart-summary {
            padding: 20px;
        }

        .cart-item {
            flex-direction: column;
            text-align: center;
        }

        .cart-item-img {
            margin-right: 0;
            margin-bottom: 15px;
        }

        .quantity-controls {
            justify-content: center;
        }
    }

    /* Cart Item Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .cart-item {
        animation: slideIn 0.5s ease;
    }
</style>

<div class="cart-container">
    <div class="container">
        <!-- Header -->
        <div class="cart-header">
            <h1><i class="fas fa-shopping-cart me-3"></i>Your Shopping Cart</h1>
            <p>Review your items and proceed to checkout</p>
        </div>

        <?php
        $query_cart = "select * from tbl_cart where user_id = '$user_id' and is_ordered = '0'";
        $result_cart = mysqli_query($con, $query_cart);

        $count = 0;
        $total = 0;
        $gst = 0;
        $sub_total = 0;
        // $shipping_charge = 0;
        $shipping_charge = 0;
        $p_total_weight  = 0;
        $btn_disable = "";
        while ($data_cart = mysqli_fetch_assoc($result_cart)) {
            $items_alert_msg = "";
            $p_id = $data_cart['p_id'];
            $sku = $data_cart['sku'];
            $p_quantity = $data_cart['p_quantity'];
            $p_color = trim($data_cart['p_color']);
            $query_no_of_items = "select in_stoke from tbl_product_price where p_sku = '$sku'";
            $result_no_of_items = mysqli_query($con, $query_no_of_items);
            $data_no_of_items = mysqli_fetch_assoc($result_no_of_items);
            $no_of_items_available = $data_no_of_items['in_stoke'];
            if ($data_cart['no_of_item'] > $no_of_items_available) {
                if ($no_of_items_available == 0 || $no_of_items_available == "")
                    $items_alert_msg = 'Out of stock' . $no_of_items_available;
                else
                    $items_alert_msg = 'Only ' . $no_of_items_available . ' items left';
                $btn_disable = "yes";
            }
        ?>
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="cart-table">
                        <div id="cart-items-container">
                            <!-- Cart Item 1 -->
                            <div class="cart-item">
                                <img src="assets/images/product1.jpg" alt="Crystal Healing Stone" class="cart-item-img">
                                <div class="cart-item-details">
                                    <div class="cart-item-title"><a href="<?= $base_url; ?>product/<?= $data_cart['p_id']; ?>"><?= $data_cart['p_name']; ?></a></div>
                                    <div class="cart-item-description">Natural crystal for energy healing and meditation</div>
                                    <div class="cart-item-price">₹<?= $data_cart['p_price']; ?></div>

                                    <div class="quantity-controls">
                                        <button class="quantity-btn" id="<?= $data_cart['id']; ?>" onclick="sub_qty(this.id)">-</button>
                                        <input type="number" class="quantity-input" value="1" min="1" onchange="updateQuantity(1, this.value)">
                                        <button class="quantity-btn" id="<?= $data_cart['id']; ?>" onclick="add_qty(this.id)">+</button>
                                    </div>
                                    <div style="color:red"><?= $items_alert_msg; ?></div>
                                    <button class="remove-btn" id="<?= $data_cart['id']; ?>" onclick="pro_remove(this.id);">
                                        <i class="fas fa-trash me-2"></i>Remove
                                    </button>
                                </div>
                            </div>

                        <?php
                        $total += $data_cart['p_price'] * $data_cart['no_of_item'];
                        $gst += $data_cart['p_gst'] * $data_cart['no_of_item'];
                        $sub_total += $data_cart['p_actual_price'] * $data_cart['no_of_item'];
                        $p_weight = $data_cart['weight'] * $data_cart['no_of_item'];
                        $p_unit = $data_cart['unit'];
                        // echo "<script>alert('$p_unit')</script>";
                        if (trim($p_unit) == "gm") {
                            $p_total_weight += $p_weight;
                        } else {
                            $p_total_weight += $p_weight;
                        }
                    }
                    $grand_total = $total;
                        ?>

                        <!-- Cart Item 2 -->
                        <!-- <div class="cart-item">
                            <img src="assets/images/product2.jfif" alt="Meditation Mala Beads" class="cart-item-img">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Meditation Mala Beads</div>
                                <div class="cart-item-description">108 beads for meditation and spiritual practice</div>
                                <div class="cart-item-price">₹899</div>

                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="updateQuantity(2, -1)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" onchange="updateQuantity(2, this.value)">
                                    <button class="quantity-btn" onclick="updateQuantity(2, 1)">+</button>
                                </div>

                                <button class="remove-btn" onclick="removeItem(2)">
                                    <i class="fas fa-trash me-2"></i>Remove
                                </button>
                            </div>
                        </div> -->

                        <!-- Cart Item 3 -->
                        <!-- <div class="cart-item">
                            <img src="assets/images/product3.jfif" alt="Aromatherapy Oil Set" class="cart-item-img">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Aromatherapy Oil Set</div>
                                <div class="cart-item-description">Essential oils for relaxation and wellness</div>
                                <div class="cart-item-price">₹599</div>

                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="updateQuantity(3, -1)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" onchange="updateQuantity(3, this.value)">
                                    <button class="quantity-btn" onclick="updateQuantity(3, 1)">+</button>
                                </div>

                                <button class="remove-btn" onclick="removeItem(3)">
                                    <i class="fas fa-trash me-2"></i>Remove
                                </button>
                            </div>
                        </div> -->
                        </div>

                        <!-- Empty Cart Message (Hidden by default) -->
                        <div id="empty-cart" class="empty-cart" style="display: none;">
                            <i class="fas fa-shopping-cart"></i>
                            <h3>Your cart is empty</h3>
                            <p>Looks like you haven't added any items to your cart yet.</p>
                            <a href="<?= $base_url; ?>"" class=" btn btn-cart">
                                <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3><i class="fas fa-calculator me-2"></i>Order Summary</h3>

                        <!-- Coupon Section -->
                        <div class="coupon-section">
                            <h6><i class="fas fa-tag me-2"></i>Have a coupon?</h6>
                            <div class="coupon-input">
                                <input type="text" placeholder="Enter coupon code" id="coupon-input">
                                <button onclick="applyCoupon()">Apply</button>
                            </div>
                        </div>

                        <!-- Summary Details -->
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span>₹<?= $sub_total; ?></span>
                        </div>
                        <!-- <div class="summary-row">
                        <span>Shipping:</span>
                        <span>₹150</span>
                    </div> -->
                        <div class="summary-row">
                            <span>GST:</span>
                            <span>₹<?= $gst; ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Discount:</span>
                            <span class="text-success">0</span>
                        </div>
                        <div class="summary-row final">
                            <span>Total:</span>
                            <span>₹<?= $grand_total; ?></span>
                        </div>

                        <?php
                        if ($btn_disable == "") {
                            if (isset($_SESSION['user_id'])) {
                        ?>
                                <a href="<?= $base_url; ?>checkout.php" class="btn btn-cart">
                                    Proceed to checkout
                                </a>
                            <?php
                            } else { ?>
                                <a href="<?= $base_url; ?>index.php" class="btn btn-cart secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                                </a>
                        <?php
                            }
                        } ?>

                        <!-- Action Buttons -->
                        <!-- <a href="<?= $base_url; ?>" >
                        <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                    </a>
                    <a href="<?= $base_url; ?>index.php" class="btn btn-cart secondary">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a> -->

                        <!-- Security Badge -->
                        <div class="security-badge mt-3">
                            <i class="fas fa-shield-alt"></i>
                            Secure Checkout - SSL Encrypted
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    function pro_remove(cart_id) {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajax/product-remove.php",
            data: "action=cart&cart_id=" + cart_id,
            success: function(result) {
                // alert(result);
                location.reload();
            }
        });
    }

    function add_qty(cart_id) {
        // alert(cart_id);
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajax/update-quantity.php",
            data: "cart_id=" + cart_id + "&action=add",
            success: function(result) {
                // alert(result);
                location.reload();
            }
        });
    }

    function sub_qty(cart_id) {
        var avail_p_qty = document.getElementById("txt_" + cart_id).value;
        if (avail_p_qty <= 1) {
            return false;
        }

        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajax/update-quantity.php",
            data: "cart_id=" + cart_id + "&action=sub",
            success: function(result) {
                // alert(result);
                location.reload();
            }
        });
    }

    function update_qty(cart_id) {
        var new_qty = document.getElementById(cart_id).value;
        // alert(new_qty);
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "ajax/update-quantity.php",
            data: "new_qty=" + new_qty + "&cart_id=" + cart_id + "&action=update_qty",
            success: function(result) {
                // alert(result);
                location.reload();
            }
        });
    }

    function applyCoupon() {
        const couponCode = document.getElementById('coupon-input').value;
        if (couponCode.toLowerCase() === 'welcome10') {
            alert('Coupon applied! 10% discount added.');
            // Add discount logic here
        } else {
            alert('Invalid coupon code. Please try again.');
        }
    }

    // Initialize cart display
    updateCartDisplay();
</script>

<?php
include('include/footer.php');
?>