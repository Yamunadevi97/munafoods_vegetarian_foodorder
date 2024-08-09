<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MUNA FOODS || My Orders</title>
<link href="css/nav.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
}
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 1rem;
}
.navbar-brand a {
    color: white;
    text-decoration: none;
    font-size: 1.5rem;
}
.navbar-links {
    list-style: none;
    display: flex;
    gap: 1rem;
}
.navbar-links li a {
    color: white;
    text-decoration: none;
    padding: 0.5rem;
}
.navbar-links li a:hover {
    background-color: #575757;
    border-radius: 5px;
}
.navbar-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}
.bar {
    height: 3px;
    width: 25px;
    background-color: white;
    margin: 4px 0;
}
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
.navbar-links.active {
        display: flex;
    }
.navbar-toggle {
        display: flex;
    }}
.indent-small {
  margin-left: 5px;
  }
.form-group.internal {
 margin-bottom: 0;
    }
 .dialog-panel {
        margin: 10px;
    }
.datepicker-dropdown {
   z-index: 200 !important;
    }
  .panel-body {
      background: #e5e5e5;
        /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
        /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* IE10+ */
        background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
        font: 600 15px "Open Sans", Arial, sans-serif;
    }
 label.control-label {
        font-weight: 600;
        color: #777;
    }
 /*table*/
body{
    width:100%;
    height:100%;
  }
table {
  border-collapse: collapse;
  width: 97%; 
  height:50%;
  text-align: center;
  border-style: solid;
  border-color:lawngreen;
  margin-bottom: 25px;
  margin-left: 10px;
}
a{
    text-decoration: none;
}
span{
    font-size: x-large;
    margin: 10px;
}
th, td {
  text-align: left;
  padding: 8px;
  color: whitesmoke;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  padding:10px;
}
th{
    background-color: blue;
}
tr:nth-child(even) {background-color: #f2f2f2;}
/*phone view*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr { 
		display: block; 
	}
	table{
        margin-top: 270px;
    }
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	tr { border: 1px solid #ccc; }
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
/*	Label the data	*/
	td:nth-of-type(1):before { content: "Item"; }
	td:nth-of-type(2):before { content: "Quantity"; }
	td:nth-of-type(3):before { content: "Price"; }
	td:nth-of-type(4):before { content: "Status"; }
	td:nth-of-type(5):before { content: "Date"; }
	td:nth-of-type(6):before { content: "Action"; }
    td:nth-of-type(7):before { content: "Payment"; }
	td:nth-of-type(8):before { content: "Rate Us"; }
   
}
.success{
	background-color: rgb(2,130,72);
	margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
    padding:15px;
	}
    .process{
        
	background-color:goldenrod;
	margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
    padding:15px;
	}
	.warning{
	background-color: rgb(225,8,60);
	margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	padding-left:-10px;
    padding:15px;
	}
	.primary{
	background-color: rgb(84,58,242);
	margin-left:5px;
	width:130px;
	color:whitesmoke;
	font:1.2em italic serif;
    padding:15px;
	}
    .pay{
	background-color: purple;
	margin-left:5px;
	width:130px;
	color:whitesmoke
	font:1.2em italic serif;
    padding:15px;
	}
    .rate{
	background-color:deeppink;
	margin-left:5px;
	width:130px;
	color:whitesmoke;
	font:1.2em italic serif;
    padding:15px;
	}
    tr:nth-child(even){background-color:blue;}
    table{
        background-color: black;
        color: whitesmoke;
    }
a{
    color: whitesmoke;
}
  /*footer*/
.footer {
    background-color: #333;
    color: white;
    padding: 1rem 0;
    text-align: center;
}
.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 1rem;
    max-width: 1200px;
    margin: auto;
}
.footer-section {
    flex: 1;
    padding: 1rem;
}
.footer-section h3 {
    margin-bottom: 1rem;
}
.footer-section ul {
    list-style: none;
    padding: 0;
}
.footer-section ul li {
    margin-bottom: 0.5rem;
}
.footer-section ul li a {
    color: white;
    text-decoration: none;
}
.footer-section ul li a:hover {
    text-decoration: underline;
}
.footer-bottom {
    background-color: #222;
    padding: 0.5rem 0;
    font-size: 0.9rem;
}
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }
 .footer-section {
        max-width: 300px;
        text-align: center;
    }}
.footer h3{
  color: whitesmoke;
}
  </style></head>
<nav class="navbar">
 <div class="logo"><a href="#"><i class="fa-solid fa-motorcycle"></i> MUNAFOODS</a></div>
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
?></ul></nav>
<section class="restaurants-page">
 <div class="container">
 <div class="row">
 <div class="col-xs-12">
 </div>
 <div class="col-xs-12">
   <div class="bg-gray">
     <div class="row">
       <table >
         <thead style="background: #404040; color:white;">
            <tr>
               <th>Item</th>
               <th>Quantity</th>
                <th>Price</th>
                 <th>Status</th>
                 <th>Date</th>
                <th>Action</th>
                 <th>Payments</th>
                 <th>Ratings</th>
                  </tr> </thead>
    <tbody>
       <?php 
			$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
				if(!mysqli_num_rows($query_res) > 0 )
        		{
				echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
				}
				else
				{			      
				  while($row=mysqli_fetch_array($query_res))
				  {
		?>
         <tr>
           <td> <?php echo $row['title']; ?></td>
           <td> <?php echo $row['quantity']; ?></td>
           <td >₹<?php echo $row['price']; ?></td>
          <td >
            <?php 
			$status=$row['status'];
			if($status=="" or $status=="NULL")
			{
			?>
            <button type="button" class="primary"><i class="fa-solid fa-dolly"></i><br>Dispatch</button>
            <?php 
		     }
			 if($status=="in process")
			{ ?>
             <button type="button" class="process"><i class="fa-solid fa-motorcycle"></i><br> On the Way!</button>
              <?php
				}
				if($status=="closed")
					{
					?>
               <button type="button" class="success" ><i class="fa-solid fa-square-check"></i><br> Delivered</button> 
                    <?php 
                        } 
						?>
                 <?php
				if($status=="rejected")
						{
						?>
             <button type="button" class="warning"> <i class="fa-solid fa-rectangle-xmark"></i><br>  Cancelled</button> 
                      <?php 
			    		} 
						?></td>
               <td data-column="Date"> <?php echo $row['date']; ?></td>
              <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" ><span  style="color: red"><i class="fa-solid fa-trash"></i></span></a>
               </td>
  <td><button class="pay"><a href="onlinepay.php"><span><i class="fa-regular fa-credit-card"></i></span><br>Online pay</a></button></td>
  <td><button class="rate"><a href="ratings.php"><span><i class="fa-solid fa-star"></i></span><br>Rate Order</td>
   </tr>
    <?php }} ?></tbody></table></div></div></div></div> </div></div></section>
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
                        <i class="fa-brands fa-facebook"></i></div></div>
        <div class="footer-bottom">
            <p>&copy; 2024 MunaFoods. All rights reserved.</p>
        </div></footer>
  <script src="js/nav.js"></script></body></html>
<?php } ?>