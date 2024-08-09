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
    <title>MUNA FOODS || All Hotels</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    h1{
        margin-left: 200px;
    }
    table{
        width:45em;
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
<h1>Hotels</h1><br><br>
     <table>
        <thead>
            <tr>
			 <th>Category</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Url</th>
             <th>Address</th>
			 <th>Image</th>
			 <th>Date</th>
			 <th>Action</th>  
            </tr>
        </thead>
            <tbody>
	       	<?php
	            $sql="SELECT * FROM restaurant order by rs_id desc";
				$query=mysqli_query($db,$sql);
					if(!mysqli_num_rows($query) > 0 )
						{
							echo '<td colspan="11"><center>No Restaurants</center></td>';
						}
					else
				    	{				
							while($rows=mysqli_fetch_array($query))
								{
									$mql="SELECT * FROM res_category where c_id='".$rows['c_id']."'";
									$res=mysqli_query($db,$mql);
									$row=mysqli_fetch_array($res);
									echo ' <tr><td>'.$row['c_name'].'</td>
					    						<td>'.$rows['title'].'</td>
												<td>'.$rows['email'].'</td>
						    					<td>'.$rows['phone'].'</td>
												<td>'.$rows['url'].'</td>
												<td>'.$rows['address'].'</td>
												<td><div class="col-md-3 col-lg-8 m-b-10">
													<center><img src="Res_img/'.$rows['image'].'" class="img-responsive radius"  style=width:50px;height:50px;"/></center>
													</div></td>
												<td>'.$rows['date'].'</td>
							    				 <td><a href="delete_hotel.php?res_del='.$rows['rs_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><span  style="color: red"><i class="fa-solid fa-trash"></i></span></a><br>
													 <a href="update_hotel.php?res_upd='.$rows['rs_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><span  style="color: lime"><i class="fa-solid fa-pen-to-square"></i></span></a>
												</td></tr>';
								}	
						}
			?>
            </tbody>
        </table>
    </body>
</html>