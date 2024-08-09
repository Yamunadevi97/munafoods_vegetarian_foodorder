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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MUNA FOODS ||Online Payments transactions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
<style>
   body {
    margin: 0;
    font-family: Arial, sans-serif;
   
}


table {
  border-collapse: collapse;
  width: 150px;
 margin-left: 200px;
  margin-top: 50px;
  height:100%;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  border-radius:150px;
  border-width: 10px;

}
a{
    text-decoration: none;
}
span{
    font-size: x-large;
    margin: 10px;
    color: whitesmoke;
}
a{
    color:white;
   
}

th {
  text-align: left;
  padding: 2px;
  color: whitesmoke;
  background-color: blue;
  text-align: center;
padding: 15px;
 margin-bottom: 0px;
}
td {
  text-align: left;
  padding: 15px;
  color: whitesmoke;
  background-color: black;
  text-align: center;
  border:1px solid whitesmoke;
  padding:10px;
}
h1{
    margin-left: 300px;
    width: 100px;
    font-size: 30px;
}

</style>
</head>
<body>
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
<h1> PAYMENTS</h1><br><br>

  <table> 
    <tr>  
         <th>UserId</th>
          <th>Customer Name</th>
          <th>Status</th>
          <th>Transaction Id</th>
		   </tr>
       <tbody>
       	<?php
					$sql="SELECT * FROM transactions order by user_id desc";
					$query=mysqli_query($db,$sql);
						if(!mysqli_num_rows($query) > 0 )
								{
									echo '<td colspan="7"><center>No Payments</center></td>';
								}
						else
								{				
									while($rows=mysqli_fetch_array($query))
										{
												echo ' <tr><td>'.$rows['user_id'].'</td>
																	<td>'.$rows['customer_name'].'</td>
																	<td>'.$rows['payment_status'].'</td>																								
																	<td>'.$rows['transaction_id'].'</td>
												</tr>';
											}	
				  				}
					?>
       </tbody>
        </table>  
</body>
</html>
