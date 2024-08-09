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
    <title>MUNA FOODS ||All Menu</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
   }

table {
  border-collapse: collapse;
  width: 70em;
 margin: auto;
  margin-top: 20px;
  height:100%;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  border-radius:150px;
  border-width: 10px;
  margin-left: 200px;
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
 width:5px;
}
td {
  text-align: left;
  padding: 5px;
  color: whitesmoke;
  background-color: black;
  text-align: center;
  border:1px solid whitesmoke;
  padding:10px;
  width:5px;
}
h1{
    margin-left: 300px;
    width: 100px;
    font-size: 30px;
}
table{
        width:60em;
        margin-left: 200px;
        margin-top:-50px;
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
<h1> MENUS</h1><br><br>
                                
								
                                <div class="table-responsive m-t-40">
                                    <table >
                                        <thead >
                                            <tr>
											 <th>Restaurant</th>
                                                <th>Dish</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>	  
                                            </tr>
                                        </thead>
                                        <tbody>
										
                                           
                                               	<?php
												$sql="SELECT * FROM dishes order by d_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>No Menu</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																				$mql="select * from restaurant where rs_id='".$rows['rs_id']."'";
																				$newquery=mysqli_query($db,$mql);
																				$fetch=mysqli_fetch_array($newquery);
																				
																				
																					echo '<tr><td>'.$fetch['title'].'</td>
																					
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['slogan'].'</td>
																								<td>₹'.$rows['price'].'</td>
																								
																								
																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="Res_img/dishes/'.$rows['img'].'" class="img-responsive  radius" style="max-height:100px;max-width:150px;" /></center>
																								</div></td>
																								
																							
																									 <td><a href="delete_menu.php?menu_del='.$rows['d_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><span  style="color: red"><i class="fa-solid fa-trash"></i></span></a><br>
																									 <a href="update_menu.php?menu_upd='.$rows['d_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><span  style="color: lime"><i class="fa-solid fa-pen-to-square"></i></span></a>
																									</td></tr>';
																					 
																						
																						
																		}	
														}
												
											
											?>
                                            
                                           
                                 
                                                        
                                                            
                                                           
                                        </tbody>            </table>      </div></body></html>