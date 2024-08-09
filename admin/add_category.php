<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit'] ))
{
    if(empty($_POST['c_name']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong id="error">field Required!</strong>
															</div>';
		}
	else
	{
	$check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['c_name']."' ");
	if(mysqli_num_rows($check_cat) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong id="error">Category already exist!</strong>
															</div>';
     }
	else{
     $mql = "INSERT INTO res_category(c_name) VALUES('".$_POST['c_name']."')";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>New Category Added Successfully.</button>
																</br></div>';
	    }
	}
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUNA FOODS ||Add Category</title>
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
/* Additional styles for the form */
form {
  background-color: black;
  padding: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  width:50%;
  display: flex;
  flex-direction: column;
  margin: auto;
  border:5px solid lime;
 }
h3{
  margin: auto;
  margin-top: 10px;
  color: rgb(121,122,127);
}
.close{
    margin-left:250px;
    display: inline;
    background-color: green;
    color: whitesmoke;
    width:150px;
    }
.error{
     margin-left:250px;
     display: inline;
     background-color: red;
     color: whitesmoke;
     width:400px;
     padding-left: 0px;
     text-align: left;
     }
table {
  border-collapse: collapse;
  width: 50em;
  padding: 10px;
  margin-top: 10px;
  margin-left: 100px;
  height:200px;
}
h1{
    margin-left: 0px;
    width: 700px;
    font-size: 30px;
}
.close,.error {
    -webkit-animation: cssAnimation 2s forwards; 
    animation: cssAnimation 2s forwards;
  }
  @keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
  }
  @-webkit-keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
  }
 </style>
</head>
<body>
  <!--Top nav bar-->
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
                         <?php  
									        echo $error;
									        echo $success; ?><br>
			
             <div class="main-content">
            <h1>Add Hotel Category</h1><br>
           
           
                                <form action='' method='post'id="user-registration-form" >
                                    <label class="control-label">Category</label>
                                     <input type="text" name="c_name" class="form-control" ><br>
                                     <div>
                                     <input type="submit" name="submit" class="submit" value="Save"> 
                                    <a type="submit"href="add_category.php" class="cancel">Cancel</a>
                                    </div>
                                </form><br>
                                <h1 >Listed Categories</h1>
                                <table id="myTable" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>                                           
												<?php
												$sql="SELECT * FROM res_category order by c_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="7"><center>No Categories-Data!</center></td>';
														}
													else
														{				
															while($rows=mysqli_fetch_array($query))
																{
																	echo ' <tr><td>'.$rows['c_id'].'</td>
															    				<td>'.$rows['c_name'].'</td>
																				<td>'.$rows['date'].'</td>
																    			 <td><a href="delete_category.php?cat_del='.$rows['c_id'].'"class="btn"><span  style="color: red"><i class="fa-solid fa-trash"></i></span></a> <br>
																	        		 <a href="update_category.php?cat_upd='.$rows['c_id'].'" " class="btn"><span  style="color: lime"><i class="fa-solid fa-pen-to-square"></i></span></a>
																				</td></tr>';
																}	
														}			
												?>
                             </tbody>
                          </table>
                      </div>
                 </div>
                 </body></html>
      