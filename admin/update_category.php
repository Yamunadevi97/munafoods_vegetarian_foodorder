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
																<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong>field Required!</strong></button>
															</div>';
		}
	else
	{
			
	$mql = "update res_category set c_name ='$_POST[c_name]' where c_id='$_GET[cat_upd]'";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong >Updated!</strong> Successfully.</button></br></div>';
	   
	}
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/table.css">
    <title>MUNA FOODS ||Update-category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet"  href="css/style.css">
<link rel="stylesheet"  href="css/form.css">
<style>
    
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
label {
  margin-bottom: 5px;
  color: whitesmoke;
}
input{
  margin-bottom:5px;
  padding: 5px;
  border: 4px solid #ddd;
  border-radius: 5px;
  background: transparent;
   color:violet;
  font-size: 2em;
}
input:hover {
  margin-bottom: 15px;
  padding: 10px;
  border-bottom: 4px solid #ddd;
  border-radius: 5px;
  background: white;
  border-top: none;
  border-left: none;
  border-right: none;
}
.cancel,.submit {
  padding: 10px;
  background-color:rgb(227,62,23);
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width:100px;
font-size:20px;
text-align: center;
margin-left:25px;
}
.cancel:hover,.submit:hover {
  background-color: #0056b3;
}
.submit {
   background-color:green;
  }
  .close{
            margin-left:250px;
            display: inline;
            background-color: green;
            color: whitesmoke;
            width:200px;
            text-align: left;
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

        h1{
            margin-left:300px;
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
				 echo $success; 
            ?>
									
            <h1 >Update Hotel Category</h1>
              <form action='' method='post' >
              <?php $ssql ="select * from res_category where c_id='$_GET[cat_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>
                                        <hr>
                                            <label class="control-label">Category</label>
                                            <input type="text" name="c_name" value="<?php echo $row['c_name'];  ?>" class="form-control" placeholder="Category Name">
                                           </div>
                                    <div><br>
                                        <input type="submit" name="submit" class="submit" value="Save"> 
                                        <a class="cancel" href="add_category.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            
       
                                </body></html>