<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .cart-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .cart-item img {
        max-width: 100px;
        margin-right: 20px;
    }

    .cart-item-info {
        flex: 1;
    }

    .cart-item-name {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .cart-item-price {
        color: #888;
        margin-bottom: 5px;
    }

    .cart-item-quantity {
        font-size: 16px;
        color: #555;
    }

    .total {
        text-align: right;
        margin-top: 20px;
        font-size: 20px;
    }

    .checkout-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .checkout-btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>



<div class="container">
    <h1>Shopping Cart</h1>
    <div class="cart-item">
        <img src="https://via.placeholder.com/150" alt="Product Image">
        <div class="cart-item-info">
            <div class="cart-item-name">Product Name</div>
            <div class="cart-item-price">$10.00</div>
            <div class="cart-item-quantity">Quantity: 1</div>
        </div>
    </div>
    <div class="cart-item">
        <img src="https://via.placeholder.com/150" alt="Product Image">
        <div class="cart-item-info">
            <div class="cart-item-name">Another Product</div>
            <div class="cart-item-price">$20.00</div>
            <div class="cart-item-quantity">Quantity: 2</div>
        </div>
    </div>
    <div class="total">
        Total: $50.00
    </div>
    <a href="#" class="checkout-btn">Proceed to Checkout</a>
</div>

</body>
</html>
