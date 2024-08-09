<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
function function_alert() { 
    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{
	foreach ($_SESSION["cart_item"] as $item)
		{
    		$item_total += ($item["price"]*$item["quantity"]);
			if($_POST['submit'])
			{
$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
				mysqli_query($db,$SQL);
               unset($_SESSION["cart_item"]);
               unset($item["title"]);
               unset($item["quantity"]);
              unset($item["price"]);
		$success = "Thank you. Your order has been placed!";
        function_alert();
		}}
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="icon" href="#">
<title>Munafoods||Checkout </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="css/nav.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
 <style>
tr:nth-child(even){background-color:blue;}
/* Responsive Styles */
@media (max-width: 768px) {
    .navbar-links {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
        background-color: #333;
        position: absolute;
        top: 60px;
        left: 0;
    }
table{
    margin-top:50px;
    background-color: black;
}
.navbar-links.active {
        display: flex;
    }
.navbar-toggle {
        display: flex;
        margin-right:0px;
    }
}
body{
    color:whitesmoke;
}
.container {
  max-width: 800px; /* Adjust as needed */
  margin: 0 auto; /* Center the container horizontally */
  padding: 20px; /* Add padding inside the container */
  border: 1px solid #ccc; /* Add a border for visibility */
  border-radius: 5px; /* Add rounded corners */
  background-color: #f9f9f9; /* Set a background color */
  margin-top:70px;
}
/* Media query for smaller screens */
@media screen and (max-width: 600px) {
  .container {
    max-width: 100%; /* Make the container full width */
    padding: 10px; /* Reduce padding for smaller screens */
  }}
#offer{
    color:yellow;
    font-size: 1.5em;
}
table{
    background-color: black;
}
  </style></head>
<nav class="navbar">
 <div class="logo"><i class="fa-solid fa-motorcycle"></i> MUNAFOODS</div>
 <div class="hamburger">
   <span class="bar"></span>
   <span class="bar"></span>
   <span class="bar"></span>
  </div>
 <ul class="nav-links">
        <li><a  href="index.php"><i class="fa-solid fa-house"></i> Home </a></li>
         <li><a href="hotels.php"><i class="fa-solid fa-square-h"></i> Hotels</a> </li>
    <?php
    if(empty($_SESSION["user_id"]))
       {
        echo '<li><a href="login.php" ><i class="fa-solid fa-arrow-right-to-bracket" class="icon"></i>Login</a> </li>
             <li><a href="signup.php" ><i class="fa-solid fa-user-plus" class="icon"></i>Signup</a></li>';
          }
     else
          {
         echo  '<li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" class="icon"></i>Logout</a></li>';
       echo  '<li><a href="your_orders.php" ><i class="fa-solid fa-cart-shopping" class="icon"></i>Cart</a></li> ';
         }
?></ul></nav></header>
<div class="container">
 <span style="color:green;">
   <?php echo $success; ?>
    </span>
    <form action="" method="post">
     <div class="widget clearfix">
     <div class="widget-body">
     <div class="row">
     <div class="col-sm-12">
     <div class="cart-totals margin-b-20">
     <div class="cart-totals-title">
      <h4>Cart Summary</h4></div>
     <div class="cart-totals-fields">
      <table class="table">
        <tbody>
         <tr><td>Cart Subtotal</td>
        <td> <?php echo "₹".$item_total; ?></td> </tr>
        <tr><td>Offer</td>
        <td id="offer">- ₹ 50</td></tr>
         <tr><td>Delivery Charges</td>
          <td>₹ 50</td></tr>
         <tr><td>GST Charges</td>
          <td>5%</td></tr>
          <tr><td class="text-color"><strong>Total</strong></td>
          <td class="text-color"><strong> <?php echo "₹".round($item_total-50+50+5/100); ?></strong></td></tr>
        </tbody></table></div></div></div>
  <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
    </div></form> </div></div></form></div>
   <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut eros eget metus iaculis gravida.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: +123 456 7890</p>
                <p>Address: 123 Street Name, City, Country</p><br>
                <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-square-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-facebook"></i> </div></div>
        <div class="footer-bottom">
            <p>&copy; 2024 MunaFoods. All rights reserved.</p></div></footer>  
     <script src="js/nav.js"></script></body></html>
<?php } ?>
