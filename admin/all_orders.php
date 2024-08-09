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
	<title>MUNA FOODS ||All Orders</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
<style>	
	.success{
		background-color: green;
	margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	}
	.warning{
		background-color: rgb(225,8,60);
		margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	padding-left:-10px;
	}
	.process{
	background-color: yellow;
		margin-left:5px;
	width:130px;
	color:orangered;
	font:1.2em italic serif;
	padding-left:-10px;
	}
	.primary{
		background-color: rgb(84,58,242);
		margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	}
		body {
    margin: 0;
    font-family: Arial, sans-serif;
   }
table {
  border-collapse: collapse;
  width: 80%;
 margin-left: 200px;
  height:100%;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  border-radius:150px;
  border-width: 10px;
}
span{
    font-size: x-large;
    margin: 10px;
    color: whitesmoke;
}
a{
    color:white;
	text-decoration: none;
}
th{
	background-color: blue;
	color:whitesmoke;
	text-align: left;
  padding: 8px;
   text-align: center;
 }

 td {
  text-align: left;
  padding: 8px;
  color: whitesmoke;
  background-color: black;
  text-align: center;
  border:1px solid whitesmoke;
  padding:10px;
}
h1{
    margin-left: 300px;
}
.add{
    margin-left: 10px;
}
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    .container{
        width:75px;
    }
    .side-nav{
        width:180px;
    }}

/*phone view*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
        width:140px;
        font-size:10px;
        margin-left: 50px;
        margin-top: 10px;
        border:none;
	}
    th{
        width:10px;
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
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Username"; }
	td:nth-of-type(2):before { content: "FirstName"; }
	td:nth-of-type(3):before { content: "LastName"; }
	td:nth-of-type(4):before { content: "Email"; }
	td:nth-of-type(5):before { content: "Phone"; }
	td:nth-of-type(6):before { content: "Address"; }
	td:nth-of-type(7):before { content: "Date"; }
	td:nth-of-type(8):before { content: "Action"; }
}
</style>
</head>
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
<h1>ORDERS</h1>
            <table>
                  <thead >
                      <tr>
                           <th>User</th>		
                            <th>Title</th>
                          <th>Quantity</th>
                         <th>Price</th>
							<th>Address</th>
							<th>Status</th>												
						 <th>Reg-Date</th>
						  <th>Action</th>
				               </tr>
                            </thead>
                          <tbody>
                	<?php
					$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
					$query=mysqli_query($db,$sql);
						if(!mysqli_num_rows($query) > 0 )
								{
							echo '<td colspan="8"><center>No Orders</center></td>';
					}
					else
								{				
								while($rows=mysqli_fetch_array($query))
									{
										?>
									<?php
										echo ' <tr>  <td>'.$rows['username'].'</td>
													<td>'.$rows['title'].'</td>
													<td>'.$rows['quantity'].'</td>
													<td>₹'.$rows['price'].'</td>
													<td>'.$rows['address'].'</td>';
														?>
													<?php 
													$status=$rows['status'];
													if($status=="" or $status=="NULL")
														{
														?>
		<td> <button type="button" class="primary"><i class="fa-solid fa-dolly"></i>Dispatch</button></td>
											   <?php 
												  }
												   if($status=="in process")
														 { ?>
		<td> <button type="button" class="process"><i class="fa-solid fa-motorcycle"></i> Process</button></td> 
														<?php
														}
														if($status=="closed")
						{
						?>
				<td> <button type="button" class="success" ><i class="fa-solid fa-square-check"></i> Delivered</button></td> 
														<?php 
														} 
														?>
														<?php
											if($status=="rejected")
														{
														?>
				<td> <button type="button" class="warning"> <i class="fa fa-close"></i> Cancelled</button></td> 
														<?php 
														} 
														?>
											<?php																									
												echo '	<td>'.$rows['date'].'</td>';
														?>
											 <td>
				 <a href="delete_orders.php?order_del=<?php echo $rows['o_id'];?>" onclick="return confirm('Are you sure?');" ><span  style="color: red"><i class="fa-solid fa-trash"></i></span></a><br> 
												<?php
				echo '<a href="view_order.php?user_upd='.$rows['o_id'].'" " class="btn "><span  style="color: lime"><i class="fa-solid fa-pen-to-square"></i></span> </a>
											</td>	</tr>';
													}	}
													?>                                 
                                        </tbody>  </table>	</body></html>