
<!DOCTYPE html>
  <html lang="en">
 <?php
session_start();
error_reporting(0);
include("connection/connect.php");
if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
    		empty($_POST['lname']) ||  
		    empty($_POST['email'])||
	    	empty($_POST['password'])||
		    empty($_POST['phone']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
								<strong>All fields Required!</strong></button>
								</div>';
		}
	else
	{
   if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
									<strong>invalid email!</strong></button>
									</div>';
   }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
							<strong>Password must be >=6 !</strong></button>
							</div>';
	}
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
							<strong>invalid phone!</strong></button>
							</div>';
	}
	else{
  $mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST['password'])."' where u_id='$_GET[user_upd]' ";
	mysqli_query($db, $mql);
	$success = 	'<div class="alert alert-success alert-dismissible fade show">
	  						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
								<strong >User Updated!</strong></button></div>';
	    }
	}
}
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<title>MUNA FOODS || Update Users</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="css/form.css">
<style>
   .close{
            margin-left:250px;
            display: inline;
            background-color: green;
            color: whitesmoke;
            width:150px;
        }
    .error{
            margin-left:50px;
            display: inline;
            background-color: red;
            color: whitesmoke;
            width:150px;
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
        <?php  
	        echo $error;
	        echo $success;
				?><br>
   <h1>Update Users</h1><br><br><br>
    <div>
      <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
						$res=mysqli_query($db, $ssql); 
						$newrow=mysqli_fetch_array($res);?>
            <form action='' method='post'>
             <label class="control-label">Username</label>
             <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="username">
             <label class="control-label">First-Name</label>
             <input type="text" name="fname" class="form-control form-control-danger" value="<?php  echo $newrow['f_name'];  ?>" placeholder="jon">
             <label class="control-label">Last-Name </label>
             <input type="text" name="lname" class="form-control" placeholder="doe" value="<?php  echo $newrow['l_name']; ?>">
             <label class="control-label">Email</label>
             <input type="text" name="email" class="form-control form-control-danger" value="<?php  echo $newrow['email'];  ?>" placeholder="example@gmail.com">
             <label class="control-label">Password</label>
             <input type="text" name="password" class="form-control form-control-danger" value="<?php  echo $newrow['password'];  ?>" placeholder="password">
             <label class="control-label">Phone</label>
            <input type="text" name="phone" class="form-control form-control-danger" value="<?php  echo $newrow['phone'];  ?>" placeholder="phone">
          <div class="form-actions">
            <input type="submit" name="submit" class="submit" value="Save">
            <a href="all_users.php" class="cancel">Cancel</a>
          </div>
          </form>
        </div>
  </body>
</html>
              