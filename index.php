<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/nav.css">
    <title>MUNA FOODS || Main</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/js/animsition.min.js" integrity="sha512-A6ariLe+TnwXgF0FtGuOAZB4MuNxxS1W+NvJZxN3fcXYtcrxHu7Z8yJ2MBk7MwnZuG70ksTGdAUyUEbbXW6Imw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;

    background-size: cover;
    background-repeat: no-repeat;
}
/* Navbar Styles */

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}
.menu {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.item {
    flex: 1 1 300px; /* Flex-grow, Flex-shrink, Flex-basis */
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}
.item img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}
.item h3 {
    margin-bottom: 5px;
}
.item p {
    margin-bottom: 10px;
    color: #666;
}
.item span {
    font-weight: bold;
    color: #333;
}
#start{
        background-image: url("images/ho.jpg");
        background-repeat: no-repeat;
        background-size: cover;
         height:500px;
         color:whitesmoke;
        margin-left:-10px;
    }
    #starttext1{
        margin:auto;
        padding:150px;
        text-align: center;
      padding-bottom: 10px;
      font-family:Georgia, 'Times New Roman', Times, serif;
      font-style:normal;
      line-height: 3px;
      letter-spacing: 5px;
      font-weight:bolder;
      font-size: xx-large;
   color: whitesmoke;
    }
    #starttext2{
        margin:auto;
        padding:150px;
        text-align: center; 
        padding-top: 100px;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
      font-style:italic;
      line-height: 3px;
      letter-spacing: 5px;
      font-weight:bolder;
      font-size: large;
       }
       @media (max-width:600px) {
  #starttext1 {
  font-size: 40px;
  line-height: 2em;
  width:100%;
  }
}
  @media (max-width:600px) {
  .app-wrap {
display: flex;
width: 80%;
font-size: 10px;
margin-top: 25px;
  }
}
  @media (max-width:600px) {
  #starttext2 {
  font-size: 15px;
  width:150%;
  text-align: left;
  margin-left:-100px;
  line-height: 2em;
  margin-top: -80px;
  }
footer{
    padding-left:15px;
}
a{
    text-decoration: none;
}
.how-it-works,.app-section{
    width:95%;
    font-size: 20px;
    }
.app-section{
    width:90%;
    padding:20px;
    margin-left:20px;
}
.easy{
    font-size: 12px;
    width:70px;
}
h2{
    font-size:30px;
}
h3{
    text-align: left;
}
  
}
  .accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
 }
.active, .accordion:hover {
  background-color: #ccc;
}
.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}
.active:after {
  content: "\2212";
}
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: 0.2s ease-out;
}
.food-item-wrap {
    border: 1px solid #eaebeb;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 30px;
    background: #fafaf8;
}
.explore{
    width:70%;
    margin: auto;
}
.rating {
    background-color: green;
    color: whitesmoke;
    padding:5px;
    font:1em italic serif;
   }
div.nav{
      margin-top:200px;
    }
   * {
  box-sizing: border-box;
}
/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
#vegan{
background-color:white;
border:2px solid green;
padding:2px;
font-size:15px;
    background: whitesmoke;
    border-radius: 3px;
    color: #fff;
     display: inline-block;
    position: absolute;
    top: 10px;
    right: 20px;
}
.icon {
            font-size: 24px;
            color: #007bff;
        }
#arrow{
    margin-left:15px;
}
.app-section{
    background-color: orangered;
    width: 70%;
    margin: auto;
    display: flex;
    color: whitesmoke;
}
.app-section h3{
    color:whitesmoke;
    margin-top: 20px;
}
.price-btn-block{
    margin-left: 200px;
}
.price{
    margin-left: -170px;
    margin-right: 90px;
    color: purple;
    font-weight: bolder;
}
h5{
    font-size: 1.5em;
}
h2{
    font-size: 2em;
    text-align: center;
    font-family: sans-serif;
}
.lead{
    font: 1.5em sans-serif;
    text-align: center;
    margin: 15px;
}
</style></head>
<body class="home">
 <!--header starts-->
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
        <!-- banner part starts -->
 <section id="start">
  <h2 id="starttext1">MUNA FOODS</h2>
  <p id="starttext2">Discover the best food & drinks in Tiruvannamalai</p>
   </section>      </div>    </div>      </section>
        <!-- banner part ends -->
      <!-- Popular block starts -->
        <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Dishes of the Month</h2>
                <p class="lead">Easiest Way to order your foods</p>
            </div>
            <div class="row">
      <?php 					
		$query_res= mysqli_query($db,"select * from dishes LIMIT 15"); 
          while($r=mysqli_fetch_array($query_res))
               {
      echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
              <div class="food-item-wrap">
          <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'"></div><br>
          <div class="content">
        <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5><br>
        <div class="product-name">'.$r['slogan'].'</div><br>
       <div class="price-btn-block"> <span class="price">₹'.$r['price'].'</span> <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Order Now</a> </div><br>
                 </div>
      <div class="distance"><i class="fa-solid fa-motorcycle"></i> 25 mins</div><br>
	<div class="rating pull-left"> 4.2 <i class="fa-solid fa-star"></i> </div></div> </div>';                                      
                                }	
						?>   </div>   </div>   </section>
              <!-- Featured restaurants ends -->
        <div class="explore">
       <h1>Explore options near me</h1> 
        <button class="accordion">Popular Cuisines near me</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button class="accordion">Popular Restaurant types near me</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button class="accordion">Cities we deliver to</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div></div>
        <!-- start: FOOTER -->
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
                        <i class="fa-brands fa-facebook"></i>
            </div>   </div>
        <div class="footer-bottom">
            <p>&copy; 2024 MunaFoods. All rights reserved.</p>
        </div>
    </footer>
       <!-- end:Footer -->
        <script>
    var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }   });}
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
  

     <script src="js/foodpicky.min.js"></script>
    <script src="js/nav.js"></script>
</body></html>