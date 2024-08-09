<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
    <style>
      .card-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-left: 250px;
}
.card {
  background-color: black;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 180px;
  text-align: center;
}
.card:hover{
  background-color: purple;
  cursor:pointer;
}
.card h2 {
  margin-top: 0;
  color:whitesmoke;
  font-size: 2em;
}
.card p {
  font-size: 1.2em;
  margin: 10px 0 0;
  color:whitesmoke;
}
</style>

    
</head>
<d>
<div class="top-nav">
    <div class="logo">MUNA FOODS</div>
     <div class="user-info">
      <span>Welcome, Admin</span>
       <button id="logout"><a href="logout.php"><span style="font-size: 20px"; ><i class="fa-solid fa-power-off" id="icon"></i> </span>   Logout</a></button>
       </div>
    </div>
    <div class="container">
        <div class="side-nav">
          <ul>
            <li><a href="dashboard.php"><span style="font-size: 30px"; ><i class="fa fa-tachometer"></i></span> Dashboard</a></li>
            <li> <a href="all_users.php"> <span style="font-size: 30px"; ><i class="fa-solid fa-user"></i></span> Users</a></li>
             <li> <a href="all_hotel.php"><span style="font-size: 30px"; ><i class="fa-solid fa-hotel"></i></span> Hotels</a> </li>
               <ul class="add">  
                 <li><a href="add_category.php"  style="font-size: 20px";><span style="font-size: 20px"; class="add" ><i class="fa-solid fa-plus"></i></span> Category</a></li>
                  <li><a href="add_hotel.php"  style="font-size: 20px";><span style="font-size: 20px"; class="add" ><i class="fa-solid fa-plus"> </i></span> Hotels</a></li>
                </ul>
                <li><a href="all_menu.php"><span style="font-size: 30px"; > <i class="fa-solid fa-bowl-food"></i></span> Menus</a></li>
                     <ul class="add" >
                 <li><a href="add_menu.php" style="font-size: 20px";><span style="font-size: 20px"; class="add"><i class="fa-solid fa-plus"></i></span> Add Menu  </a></li>
                </ul>
                <li> <a href="all_payment.php"><span style="font-size: 30px"; ><i class="fa-solid fa-wallet"></i></span> Payment </a></li>
                <li><a href="all_orders.php"><span style="font-size: 30px"; ><i class="fa-solid fa-cart-shopping"></i></span>  Orders</a></li>
            </ul>
        </div></div> 
        < class="main-content">
  <h1>Dashboard</h1>
  <div class="card-container">
  <div class="card">
  <h2><span style="font-size: 50px"; ><i class="fa-solid fa-square-h"></i></span></h2>
     <h2><?php $sql="select * from restaurant";
		$result=mysqli_query($db,$sql); 
		$rws=mysqli_num_rows($result);
		echo $rws;?></h2>
         <p >Restaurants</p>
         </div>
   <div class="card">                    
    <h2><span style="font-size: 50px"; ><i class="fa-solid fa-bowl-food"></i></span></h2>             
        <h2><?php $sql="select * from dishes";
    		$result=mysqli_query($db,$sql); 
			$rws=mysqli_num_rows($result);
			echo $rws;?></h2>
              <p >Dishes</p>
     </div>
     <div class="card">                              
     <h2><span style="font-size: 50px"; ><i class="fa-solid fa-user"></i></span></h2>                         
     <h2><?php $sql="select * from users";
		$result=mysqli_query($db,$sql); 
		$rws=mysqli_num_rows($result);
		echo $rws;?></h2>
    <p>Users</p>
     </div>
     <div class="card">  
     <h2><span style="font-size: 50px"; ><i class="fa-solid fa-cart-shopping"></i></span></h2>                                
     <h2><?php $sql="select * from users_orders";
			$result=mysqli_query($db,$sql); 
			$rws=mysqli_num_rows($result);
			echo $rws;?></h2>
    <p>cart</p>
     </div>
     <div class="card">  
     <h2><span style='font-size:30px;'><i class="fa-solid fa-utensils"></i></span></h2>                           
      <h2><?php $sql="select * from res_category";
				$result=mysqli_query($db,$sql); 
				$rws=mysqli_num_rows($result);
			echo $rws;?></h2>
    <p>Categories</p>
     </div>
     <div class="card">                                
     <h2><span style='font-size:50px;'><i class="fa-solid fa-motorcycle"></i></span></h2>                                  
     <h2><?php $sql="select * from users_orders WHERE status = 'in process' ";
				$result=mysqli_query($db,$sql); 
				$rws=mysqli_num_rows($result);
	            	echo $rws;?></h2>
                <p>Processing</p>
             </div>
      <div class="card">                             
      <h2><span style='font-size:50px;'><i class="fa-solid fa-square-check"></i></span></h2>
      <h2><?php $sql="select * from users_orders WHERE status = 'closed' ";
				$result=mysqli_query($db,$sql); 
	    		$rws=mysqli_num_rows($result);
			echo $rws;?></h2>
        <p>Delivered Orders</p>
        </div>
        <div class="card">    
        <h2><span style='font-size:50px;'><i class="fa-regular fa-rectangle-xmark"></i></span></h2>                            
        <h2><?php $sql="select * from users_orders WHERE status = 'rejected' ";
                  $result=mysqli_query($db,$sql); 
                  $rws=mysqli_num_rows($result);
             echo $rws;?></h2>
        <p>Cancelled Orders</p>
        </div>
        <div class="card">                        
        <h2><span style='font-size:50px;'><i class="fa-solid fa-indian-rupee-sign"></i></span></h2>                                     
         <h2><?php 
              $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"'); 
              $row = mysqli_fetch_assoc($result); 
              $sum = $row['value_sum'];
          echo $sum;
             ?></h2>
         <p>Total Earnings</p>
         </div></div>
</body>
</html>
<?php
}
?>