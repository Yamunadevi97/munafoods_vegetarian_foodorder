
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MUNA FOODS || Restaurants</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="css/nav.css">
<style>
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;  
}
 /*card*/
.container {
  display: flex;
 margin-left:30px;
  flex-wrap: wrap;
  color: whitesmoke;
  justify-content: space-between; /* Adjust as needed */
}
.allhotel {
  display: flex;
 margin-bottom: 100px;
  flex-wrap: wrap;
  color: whitesmoke;
  width:80%;
  margin-left: 50px;
  justify-content: space-between; /* Adjust as needed */
}
.card {
  width: calc(33.33% - 30px); /* Adjust card width as needed */
  margin-bottom: 10px; /* Adjust card margin as needed */
  background-color: #f0f0f0;
  padding: 10px;
  box-sizing: border-box;
  background-color: black;
}

.view{
  background-color: orangered;
  width:100px;
  color:whitesmoke;
  margin-left: 280px;
  margin-bottom: 10px;
  padding: 5px;
}
@media (max-width: 768px) {
  .card {
    width: calc(100% - 20px);/* Adjust card width for smaller screens */
    font-size: 0.5em;
    padding: 15px;
  }
  .cat-container {
    width: calc(100% - 20px); /* Adjust card width for smaller screens */
  }
  h3{
    font-size: 10px;
  }
  img{
  width: 200px;
  height:200px;
  display: block;
}
 a.view{
  margin: calc(70% - 20px);
    text-align: left;
  }
}
@media (max-width: 480px) {
  .card {
    width: calc(70% - 20px); /* Adjust card width for even smaller screens */
   }
  .allhotel{
    width: calc(100% - 20px); /* Adjust card width for even smaller screens */
   }
  .cat-container {
    width: calc(70% - 20px); /* Adjust card width for smaller screens */
       }
  h1{
    font-size:1.5em;
    width:70%;
    margin: 2px;
  }
  h5{
    font-size: 5px;
  }
  h4{
    font-size: 10px;
  }
  .restname{
    font-size: 7em;
    color: lawngreen;
    display: block;
    text-align: left;
      }
   .allhotel a{
        text-decoration: none;
        float:right;
      }
   .distance,.rating{
        font-size: 10px;
        margin-top: 50px;
        background-color: blue;
        width:80px;
        padding:20px;
      }
   .rating{
        background-color: green;
        margin-top: 30px;
      }
   .distance{
      margin-top: 60px;
     }
    .adrress1{
      margin-bottom: 25px;
      display: block;
     }
      body{
      width:90%;
     }
     .restname1{
      margin-bottom: 25px;
      color: lawngreen;
      font-size: 2em;
      text-decoration: left;
      display: block;
      width:100%;
     }}
h5,a,h4{
  color: whitesmoke;
  text-decoration: none;
}
.cat-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-left: 75px;
}
.cat {
    background-color: blue;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 200px;
    text-align: center;
}
.cat h2 {
    margin-top: 0;
    color: whitesmoke;
}
.cat p {
    font-size: 1.5em;
    margin: 10px 0 0;
    color: whitesmoke;
}
/*footer*/

.address{
  text-align: right;
}
.restname,.restname1{
  font-size: 3em;
}
.distance{
  background-color: blue;
  width:40%;
  display: inline;
  padding:10px;
  margin: 5px;
}
.rating{
  background-color: green;
  width:40%;
  padding:10px;
}
h1{
  color: purple;
  text-align: center;
}
.view1{
text-align: right;
background-color: orangered;
padding: 15px;
padding-bottom: 5px;
margin-left: 280px;

}
.view{
  margin-left:380px;
  padding: 10px;
  margin-bottom: 25px;
}
.allhotel img{
  height: auto;
  width: 100%;
}
.container img{
  height: 50%;
  width: 100%;
}
 </style></head>
<body>
<nav class="navbar">
<div class="logo"><i class="fa-solid fa-motorcycle"></i> MUNAFOODS</a></div>
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
        echo '<li><a href="login.php" ><i class="fa-solid fa-arrow-right-to-bracket" class="icon"></i> Login</a> </li>
              <li><a href="signup.php" ><i class="fa-solid fa-user-plus" class="icon"></i> Signup</a></li>';
         }
    else
         {
          echo  '<li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" class="icon"></i> Logout</a></li>';
          echo  '<li><a href="your_orders.php" ><i class="fa-solid fa-cart-shopping" class="icon"></i> Cart</a></li> ';
         }
?></ul></nav><br><br><br>
<h1>Top 3  Hotels in Tiruvannamalai</h1><br><br><br>
<div class="container">
	<?php $ress= mysqli_query($db,"select * from restaurant LIMIT 3");
   while($rows=mysqli_fetch_array($ress))
  {
	 echo' <div class="card">
		<div><a  href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
		</div><!-- end:Logo -->
		<div>
		<h5><a class="restname" href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5><br><br>
     <h4 class="address">'.$rows['address'].'</h4><br><br>
		</div>
		<!-- end:Entry description -->
     <div class="distance"><i class="fa-solid fa-motorcycle"></i> 25 mins</div><br><br><br>
		<div class="rating"> 4.2 <i class="fa-solid fa-star"></i> </div><br>
     <a class="view" href="dishes.php?res_id='.$rows['rs_id'].'" price-btn-block> Menu</a> </div>';
			  }
			?></div><br><br>
		 <h1>Hotel Categories</h1><br><br><br>
     <div class="cat-container">
       <?php 
				$res= mysqli_query($db,"select * from res_category");
		    while($row=mysqli_fetch_array($res))
				  {
					echo '<div class="cat">
                <h2><i class="fa-solid fa-utensils"></i></h2>
                 <p><a  data-filter=".'.$row['c_name'].'"> '.$row['c_name'].'</a></p> </div>';
										  }
									?></div><br><br> 
 <h1>Munafoods avaliable Hotels in Tiruvannamalai</h1>  <br><br><br>     
 <!--all res-->
 <div class="allhotel">
<?php $ress= mysqli_query($db,"select * from restaurant LIMIT 7");
   while($rows=mysqli_fetch_array($ress))
	  {
		 echo' <div class="card">
					<div class="allimg" >
	<a  href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a><br>
					</div><br>
		<!-- end:Logo -->
			<div>
	<h5><a class="restname1" href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5><br><br><br><br>
  <h4 class="address1">'.$rows['address'].'</h4><br>
	</div><br><br>
	<!-- end:Entry description -->
   <div class="distance"><i class="fa-solid fa-motorcycle"></i> 25 mins</div><br><br><br><br>
	<div class="rating"> 4.2 <i class="fa-solid fa-star"></i> </div><br>
 	<a class ="view1" href="dishes.php?res_id='.$rows['rs_id'].'" price-btn-block> Menu</a> <br></div>';
		 }
		?></div>  
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
      <li><a href="#contact">Contact</a></li></ul></div>
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
     </div> </div>
     <div class="footer-bottom">
   <p>&copy; 2024 MunaFoods. All rights reserved.</p></div></footer>
<script src="js/nav.js">   </script></body></html>