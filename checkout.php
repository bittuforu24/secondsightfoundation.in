<?php
include ('include/header.php');
?>

<style>
/* Checkout Page Styles */
.checkout-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    min-height: 100vh;
    padding: 40px 0;
}

.checkout-header {
    text-align: center;
    margin-bottom: 40px;
}

.checkout-header h1 {
    color: #333;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.checkout-header p {
    color: #666;
    font-size: 1.1rem;
}

.checkout-form {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.form-section {
    margin-bottom: 30px;
}

.form-section h3 {
    color: #333;
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #fdc134;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    color: #555;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #fdc134;
    box-shadow: 0 0 0 0.2rem rgba(253, 193, 52, 0.25);
    outline: none;
}

.btn-checkout {
    background: linear-gradient(135deg, #fdc134, #fcb813);
    color: #000 !important;
    border: none;
    padding: 15px 40px;
    font-size: 18px;
    font-weight: bold;
    border-radius: 8px;
    transition: all 0.3s ease;
    width: 100%;
    margin-top: 20px;
}

.btn-checkout:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(253, 193, 52, 0.3);
    opacity: 0.9;
}

.order-summary {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 30px;
    position: sticky;
    top: 20px;
}

.order-summary h3 {
    color: #333;
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #fdc134;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
    margin-right: 15px;
}

.cart-item-details {
    flex: 1;
}

.cart-item-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.cart-item-price {
    color: #fdc134;
    font-weight: bold;
    font-size: 1.1rem;
}

.cart-item-quantity {
    color: #666;
    font-size: 0.9rem;
}

.total-section {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #f0f0f0;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 1rem;
}

.total-row.final {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    border-top: 1px solid #f0f0f0;
    padding-top: 15px;
    margin-top: 15px;
}

.payment-methods {
    margin-top: 20px;
}

.payment-method {
    display: flex;
    align-items: center;
    padding: 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-method:hover {
    border-color: #fdc134;
    background-color: #fffbf0;
}

.payment-method.selected {
    border-color: #fdc134;
    background-color: #fffbf0;
}

.payment-method input[type="radio"] {
    margin-right: 10px;
}

.payment-method-label {
    font-weight: 600;
    color: #333;
}

.payment-method-icon {
    margin-left: auto;
    font-size: 1.2rem;
    color: #fdc134;
}

/* Responsive Design */
@media (max-width: 768px) {
    .checkout-container {
        padding: 20px 0;
    }
    
    .checkout-header h1 {
        font-size: 2rem;
    }
    
    .checkout-form, .order-summary {
        padding: 20px;
    }
    
    .btn-checkout {
        padding: 12px 30px;
        font-size: 16px;
    }
}

/* Security Badge */
.security-badge {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    margin-top: 20px;
}

.security-badge i {
    margin-right: 8px;
    font-size: 1rem;
}

/* Progress Steps */
.checkout-progress {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.progress-step {
    display: flex;
    align-items: center;
    margin: 0 20px;
}

.progress-step.active {
    color: #fdc134;
    font-weight: bold;
}

.progress-step.completed {
    color: #28a745;
}

.progress-step-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    font-weight: bold;
    font-size: 0.9rem;
}

.progress-step.active .progress-step-number {
    background: #fdc134;
    color: #000;
}

.progress-step.completed .progress-step-number {
    background: #28a745;
    color: white;
}
</style>

<div class="checkout-container">
    <div class="container">
        <!-- Progress Steps -->
        <div class="checkout-progress">
            <div class="progress-step completed">
                <div class="progress-step-number">1</div>
                <span>Cart</span>
            </div>
            <div class="progress-step active">
                <div class="progress-step-number">2</div>
                <span>Checkout</span>
            </div>
            <div class="progress-step">
                <div class="progress-step-number">3</div>
                <span>Payment</span>
            </div>
        </div>

        <!-- Header -->
        <div class="checkout-header">
            <h1>Complete Your Order</h1>
            <p>Please fill in your details to complete your purchase</p>
        </div>

        <div class="row">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <form class="checkout-form">
                    <!-- Billing Information -->
                    <div class="form-section">
                        <h3><i class="fas fa-user me-2"></i>Billing Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address *</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">City *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">State *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">ZIP Code *</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="form-section">
                        <h3><i class="fas fa-shipping-fast me-2"></i>Shipping Information</h3>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="sameAsBilling" checked>
                            <label class="form-check-label" for="sameAsBilling">
                                Same as billing address
                            </label>
                        </div>
                        <div id="shipping-details" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">City *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">State *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">ZIP Code *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-section">
                        <h3><i class="fas fa-credit-card me-2"></i>Payment Method</h3>
                        <div class="payment-methods">
                            <div class="payment-method selected">
                                <input type="radio" name="payment" id="credit-card" checked>
                                <label for="credit-card" class="payment-method-label">Credit/Debit Card</label>
                                <i class="fas fa-credit-card payment-method-icon"></i>
                            </div>
                            <div class="payment-method">
                                <input type="radio" name="payment" id="paypal">
                                <label for="paypal" class="payment-method-label">PayPal</label>
                                <i class="fab fa-paypal payment-method-icon"></i>
                            </div>
                            <div class="payment-method">
                                <input type="radio" name="payment" id="cod">
                                <label for="cod" class="payment-method-label">Cash on Delivery</label>
                                <i class="fas fa-money-bill payment-method-icon"></i>
                            </div>
                        </div>

                        <!-- Credit Card Details -->
                        <div id="credit-card-details" class="mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Card Number *</label>
                                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date *</label>
                                        <input type="text" class="form-control" placeholder="MM/YY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">CVV *</label>
                                        <input type="text" class="form-control" placeholder="123">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Cardholder Name *</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-checkout">
                        <i class="fas fa-lock me-2"></i>Complete Order - ₹2,499
                    </button>

                    <div class="security-badge">
                        <i class="fas fa-shield-alt"></i>
                        Secure Payment - Your data is protected with SSL encryption
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary">
                    <h3><i class="fas fa-shopping-cart me-2"></i>Order Summary</h3>
                    
                    <!-- Cart Items -->
                    <div class="cart-item">
                        <img src="assets/images/product1.jpg" alt="Product" class="cart-item-img">
                        <div class="cart-item-details">
                            <div class="cart-item-title">Crystal Healing Stone</div>
                            <div class="cart-item-price">₹1,299</div>
                            <div class="cart-item-quantity">Qty: 1</div>
                        </div>
                    </div>
                    
                    <div class="cart-item">
                        <img src="assets/images/product2.jfif" alt="Product" class="cart-item-img">
                        <div class="cart-item-details">
                            <div class="cart-item-title">Meditation Mala Beads</div>
                            <div class="cart-item-price">₹899</div>
                            <div class="cart-item-quantity">Qty: 1</div>
                        </div>
                    </div>
                    
                    <div class="cart-item">
                        <img src="assets/images/product3.jfif" alt="Product" class="cart-item-img">
                        <div class="cart-item-details">
                            <div class="cart-item-title">Aromatherapy Oil Set</div>
                            <div class="cart-item-price">₹599</div>
                            <div class="cart-item-quantity">Qty: 1</div>
                        </div>
                    </div>

                    <!-- Totals -->
                    <div class="total-section">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span>₹2,797</span>
                        </div>
                        <div class="total-row">
                            <span>Shipping:</span>
                            <span>₹150</span>
                        </div>
                        <div class="total-row">
                            <span>Tax:</span>
                            <span>₹152</span>
                        </div>
                        <div class="total-row final">
                            <span>Total:</span>
                            <span>₹2,499</span>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div class="mt-4">
                        <h6><i class="fas fa-truck me-2"></i>Shipping Information</h6>
                        <p class="text-muted mb-2">Estimated delivery: 3-5 business days</p>
                        <p class="text-muted mb-0">Free shipping on orders above ₹1,000</p>
                    </div>

                    <!-- Return Policy -->
                    <div class="mt-4">
                        <h6><i class="fas fa-undo me-2"></i>Return Policy</h6>
                        <p class="text-muted mb-0">30-day money-back guarantee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Payment method selection
document.querySelectorAll('.payment-method').forEach(method => {
    method.addEventListener('click', function() {
        // Remove selected class from all methods
        document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
        // Add selected class to clicked method
        this.classList.add('selected');
        // Check the radio button
        this.querySelector('input[type="radio"]').checked = true;
    });
});

// Same as billing address checkbox
document.getElementById('sameAsBilling').addEventListener('change', function() {
    const shippingDetails = document.getElementById('shipping-details');
    if (this.checked) {
        shippingDetails.style.display = 'none';
    } else {
        shippingDetails.style.display = 'block';
    }
});

// Form submission
document.querySelector('.checkout-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your form submission logic here
    alert('Order placed successfully! You will receive a confirmation email shortly.');
});
</script>

<?php
include ('include/footer.php');
?> 