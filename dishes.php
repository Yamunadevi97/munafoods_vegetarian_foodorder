
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();
include_once 'product-action.php'; 
?>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/js/animsition.min.js" integrity="sha512-A6ariLe+TnwXgF0FtGuOAZB4MuNxxS1W+NvJZxN3fcXYtcrxHu7Z8yJ2MBk7MwnZuG70ksTGdAUyUEbbXW6Imw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <title>MUNA FOODS || Dishes</title>
 <link href="css/style.css" rel="stylesheet">
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
#vegan{
background-color:white;
border:2px solid green;
padding-bottom:3px ;
padding-top: 3px;
padding-left: 3px;
width:25px;
height: 25px;
border-radius: 3px;
color:green;
display: inline-block;
position: absolute;
top: 1px;
left:  10px;
margin-bottom: 10px;
font: 0.7em sans-serif;
}
.rating ,.distance{
    background-color: green;
    color: whitesmoke;
    padding:0 15px;
    width: 150px;
    height: 30px;
    text-align: center;
}
.rating{
    width:100px;
}
.munalogo{
font-size:20px;
background-color:black;
color:white;
padding:10px;
}
@media (max-width:600px) {
  #starttext2 {
  font-size: 15px;
  width:150%;
  text-align: left;
  margin-left:-100px;
  line-height: 2em;
  }
.flex-container {
  display: flex;
  flex-direction: row;
  font-size: 30px;
  text-align: center;
}
.flex-item-left {
  background-color: #f1f1f1;
  padding: 10px;
  flex: 50%;
  color: navy;
}
/* Responsive layout - makes a one column-layout instead of two-column layout */
@media (max-width: 600px) {
  .flex-container {
    flex-direction: column;
  }}
.profile {
    width:40%;
}
#vegan{
    margin-top:150px;
    border:2px solid green;
}
}
.order{
    width:10%;
}
.value{
    color: purple;
    font: 2em sans-serif;
}
footer{
    clear: both;
}
 </style></head>
<center>
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
?></ul></nav><br>
 <?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
     $rows=mysqli_fetch_array($ress);
  ?>
  <section class="inner-page-hero bg-image" data-image-src="images/dishw.jpg">
   <div class="profile">
   <div class="container">
   <div class="row">
    <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
    <div class="image-wrap">
    <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo">'; ?></figure>
        </div>   </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
  <div class="pull-left right-text white-txt">
    <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
    <p><?php echo $rows['address']; ?></p>
     <div class="distance"><i class="fa-solid fa-motorcycle"></i>25 mins</div><br>
<div class="rating pull-left"> 4.2 <i class="fa-solid fa-star"></i> </div>
   </div></div></div> </div> </div></section>
    <div class="container m-t-10">
     <div class="row">
      <div class="flex-container">
      <div class="flex-item-left">
        <h3 class="widget-title text-dark">  Your Cart </h3>
        <div class="clearfix"></div> </div>
          <div class="order-row bg-white">
          <div class="widget-body">
          <?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)  
{
?>
  <div class="title-row">
  <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
  <i class="fa fa-trash pull-right"></i></a> </div>
  <div class="form-group row no-gutter">
   <div class="col-xs-8">
  <input type="text" class="form-control b-r-0" value=<?php echo "₹".$item["price"]; ?> readonly id="exampleSelect1">
    </div>
  <div class="col-xs-4">
  <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
   </div>     </div>
<?php
$item_total += ($item["price"]*$item["quantity"]); 
}
?></div></div>
<div class="widget-body">
<center><div class="price-wrap text-xs-center">
   <p>TOTAL</p>
<h3 class="value"><strong><?php echo "₹".$item_total; ?></strong></h3>
<p>plus ₹50 delivery charge </p>
     <?php
 if($item_total==0){
      ?>
 <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn btn-danger btn-lg disabled">Checkout</a>
       <?php
          }
         else{   
           ?>
  <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
           <?php   
             }
             ?>
 </div></div></div></div></center>
 <div class="col-md-8">
   <div class="menu-widget" id="2">
      <div class="widget-heading">
       <h3 class="widget-title text-dark">
      MENU <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
             <i class="fa fa-angle-right pull-right"></i>
          <i class="fa fa-angle-down pull-right"></i></a></h3>
           <div class="clearfix"></div>
                  </div>
         <div class="collapse in" id="popular2">
                <?php  
	$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
		$stmt->execute();
		$products = $stmt->get_result();
		if (!empty($products)) 
			{
		foreach($products as $product)
				{
		 ?>
 <div class="food-item">
 <div class="row">
 <div class="col-xs-12 col-sm-12 col-lg-8">
<form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
<div class="rest-logo pull-left">
 <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
 </div>
<div class="rating pull-left"> 4.2 <i class="fa-solid fa-star"></i> </div>
 <div class="distance"><span id="vegan">🟢</span> </div><br><br><br>
   <div class="rest-descr">
    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
    <p> <?php echo $product['slogan']; ?></p>
     </div>   </div>
     <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
    <span class="price pull-left">₹<?php echo $product['price']; ?></span>
   <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1" size="12" />
 <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Cart" />
  </div>  </form>  </div>  </div>
     <?php }} ?> </div>  </div>  </div> </div>  </div>
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
             <!-- end:Footer --></div></div>
     <script src="js/nav.js"></script>
   
     <script src="js/foodpicky.min.js"></script></body></html>