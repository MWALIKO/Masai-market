<?php
include "includes/db.php";

// SQL query to select all items from the shoppingCart table
$sql = "SELECT * FROM shoppingCart";

// Execute the query
$result = $con->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $total_count = 0;
    // Output data of each row
    echo "<h1>Shopping Cart</h1>";
    echo '<div class="container" style="max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';

    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="cart-item" style=" border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;">';

        echo '<img src="https://via.placeholder.com/150" alt="Product Image" style="max-width: 200px;
            margin-right: 20px;">';
        echo '<div class="cart-item-info" style="text-align:center">';
        echo '<div class="cart-item-name">Product: ' . $row["product_name"] . '</div>';
        echo '<div class="cart-item-quantity">Quantity: ' . $row["quantity"] . '</div>';
       
        $item_total = $row["amount"] * $row["quantity"];
        $total_count = $total_count + $item_total;

        echo '<div class="cart-item-price">Price: ' . $item_total . '</div>';

        echo '</div>'; // Closing cart-item-info

        echo '</div>'; // Closing cart-item

    }
     echo '<div class="total" style="text-align: right;">Grand Total: ' . $total_count . '</div>';
        echo '<br>';

    echo '</div>'; // Closing container
    echo '<a href="checkout.php" class="checkout-btn" style="display: block; text-align: center; margin-top: 20px;">Make Payment</a>';
} else {
    echo "0 results";
}

// Close the connection
$con->close();
?>
