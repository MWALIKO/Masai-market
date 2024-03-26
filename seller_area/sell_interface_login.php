<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seller login</title>
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
        input[type="email"],
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
        }.centered {
            text-align: center;
        }

    </style>
<div class="container">
        <div class="sell_body"> 
            <div class="head">
                <h2>Login</h2>
            </div>
            <div class="body" style="padding-top:30px;">
            <form method="POST">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" name="submit" value="Submit"> 
            </form>
            <div class="centered">
                <a href="sell_interface.php">Create account</a>
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
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if the email and password match
    $check_user_query = "SELECT * FROM sellers WHERE email='$email' AND password='$password'";
    $run_check_user = mysqli_query($con, $check_user_query);
    $check_user = mysqli_num_rows($run_check_user);

    if($check_user > 0) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('index.php?logged_in=You have successfully logged in!', '_self')</script>";
    } else {
        echo "<script>alert('Invalid Email or Password!')</script>";
    }
}
?>
