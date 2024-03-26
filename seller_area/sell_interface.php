<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller</title>
</head>
<body>
    <style>
        .container{
            background: maroon;
            opacity: 0.9;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center; /* Horizontally centers the content */
            align-items: center; /* Vertically centers the content */
        }

        .sell_body{
            background: white;
            width:50vw ;
            height: 90vh;
            opacity: 1;
            color: black;
            
        }
        .head{
            background: red;
            width:50vw ;
            height: 10vh;
            text-align: center;
            display: flex;
            justify-content: center; /* Horizontally centers the content */
            align-items: center; 
            color: white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .centered {
            text-align: center;
        }

    </style>
    <div class="container">
        <div class="sell_body"> 
            <div class="head">
                <h2>Create Account</h2>
            </div>
            <div class="body" style="padding-top:30px;">
            <form method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" placeholder="Format: 123-456-7890" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <input type="submit" name="submit" value="Submit"> <!-- Added name attribute -->
            </form>
            <div class="centered">
                <a href="sell_interface_login.php">Login</a>
            </div>


            </div>
        </div>

    </div>
    
</body>
</html>

<?php
session_start();

include("includes/db.php");
global $con;

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    
    // Check if passwords match
    if($password != $confirm_password) {
        echo "<script>alert('Passwords do not match!')</script>";
        exit(); // Stop further execution
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM sellers WHERE email='$email'";
    $run_check_email = mysqli_query($con, $check_email_query);
    $check_email = mysqli_num_rows($run_check_email);
    
    if($check_email > 0) {
        echo "<script>alert('Email already exists! Please use a different email.')</script>";
        exit(); // Stop further execution
    }
    
    // Insert seller data into the database
    $insert_seller = "INSERT INTO sellers (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
    $run_insert_seller = mysqli_query($con, $insert_seller);

    if($run_insert_seller) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('index.php?registered=You have successfully registered!', '_self')</script>";
    } else {
        echo "<script>alert('Registration failed! Please try again.')</script>";
    }
}
?>
