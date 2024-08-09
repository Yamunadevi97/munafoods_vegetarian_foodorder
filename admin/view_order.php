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
    <title>MUNA FOODS ||View - ordrs</title>
    <link rel="stylesheet"  href="css/table.css">
<link rel="stylesheet"  href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
   }
body{
    width:100%;
    height:100%;
  }
table {
  border-collapse: collapse;
  width: 60%;
 margin-left:200px;
  height:100%;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  border-radius:150px;
  border-width: 10px;
  margin-top: -10px;
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
  padding: 10px;
   text-align: center;
}
 td {
  text-align: left;
  padding: 10px;
  color: whitesmoke;
  background-color: black;
  text-align: center;
  border:1px solid whitesmoke;
 
}
h1{
    margin-left: 300px;
    display: block;
    width: 100%;
    margin-bottom: 50px;
}
.add{
    margin-left: 10px;
}
.success{
		background-color: rgb(2,130,72);
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
	.primary{
		background-color: rgb(84,58,242);
		margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	}
</style>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+1000+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script></head>
<div class="top-nav">
    <div class="logo">MUNA FOODS</div>
     <div class="user-info">
      <span>Welcome, Admin</span>
       <button id="logout"><a href="logout.php"><span style="font-size: 20px"; ><i class="fa-solid fa-power-off" id="icon"></i> </span>   Logout</a></button>
       </div>    </div>
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
        <h1>View  Orders</h1><br>                    
    <div class="container">            
        <table>
                                    <thead >
                                            <tr>
											 <th>Username</th>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Status</th>
												<th>Update status</th>
                                                <th>View User</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                       <?php
                        $sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
                        $query=mysqli_query($db,$sql);
                        $rows=mysqli_fetch_array($query);
                    ?>
                        <tr>                            
                            <td><center><?php echo $rows['username']; ?></center></td>
                            <td><center><?php echo $rows['title']; ?></center></td>   
                            <td><center><?php echo $rows['quantity']; ?></center></td>
                            <td><center><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $rows['price']; ?></center></td>
                            <td><center><?php echo $rows['address']; ?></center></td>
                            <td><center><?php echo $rows['date']; ?></center></td>
                            <?php 
                                    $status=$rows['status'];
                                        if($status=="" or $status=="NULL")
                                            {
                                ?>
                             <td> <center><button type="button" class="primary"><i class="fa-solid fa-dolly"></i><br>Dispatch</button></center></td>
                                <?php 
                                    }
                                    if($status=="in process")
                                        { ?>
                             <td>   <center><button type="button" class="warning"><i class="fa-solid fa-motorcycle"></i><br> On the Way!</button></center></td> 
                                <?php
                                    }
                                   if($status=="closed")
                                        {
                                ?>
                            <td>  <center><button type="button" class="success" ><i class="fa-solid fa-square-check"></i><br> Delivered</button></center></td> 
                                <?php 
                                    } 
                                ?>
                                <?php
                                    if($status=="rejected")
                                       {
                                ?>
                           <td>  <center><button type="button" class="warning"> <i class="fa-solid fa-rectangle-xmark"></i><br>  Cancelled</button> </center></td> 
                                <?php 
                                    } 
                                 ?>
                            <td> <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
                                    <button type="button" class="primary"><i class="fa-solid fa-pen-to-square"></i><br> Order Status</button></a>
                                    </td>
                                    <td> <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
                            <button type="button" class="primary"><i class="fa-solid fa-eye"></i><br> User Detials</button></a>
                            </td>  </tr></tbody></table></html>