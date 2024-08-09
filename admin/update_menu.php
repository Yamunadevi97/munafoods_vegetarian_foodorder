<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))           //if upload btn is pressed
{
	
			if(empty($_POST['d_name'])||empty($_POST['about'])||$_POST['price']==''||$_POST['res_name']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong>All fields Must be Fillup!</strong></button>
															</div>';
			
		}
	else
		{
		
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "Res_img/dishes/".basename($fnew);                     
	
					if($extension == 'jpg'||$extension == 'jpeg'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
     									$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.</button>
															</div>';
	   
										}
		
									else
										{
											$sql = "update dishes set rs_id='$_POST[res_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',img='$fnew' where d_id='$_GET[menu_upd]'";
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong >Record Updated!</strong></button>
															</div>';
                
	
										}
					}
			   }
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>MUNA FOODS ||Update- Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link href="css/style.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
<style>  
h1{
    padding-left: 520px;
    color:black;
}
      .close{
            margin-left:400px;
            display: inline;
            background-color: green;
            color: whitesmoke;
            margin-top: -700px;
            width: 200px;
        }
        .error{
            margin-left:300px;
            display: inline;
            background-color: red;
            color: whitesmoke;
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
        <div class="main-content"></div>             
                
          	<?php  echo $error;
									        echo $success; ?>
								                <h1>Update Menus</h1><br>   <br><br>
                               <form action='' method='post'  enctype="multipart/form-data">
                         <?php $qml ="select * from dishes where d_id='$_GET[menu_upd]'";
													$rest=mysqli_query($db, $qml); 
													$roww=mysqli_fetch_array($rest);
														?>
                            <label class="control-label">Dish Name</label>
                             <input type="text" name="d_name" value="<?php echo $roww['title'];?>" class="form-control" placeholder="Morzirella"><br>
                             <label class="control-label">About</label>
                             <input type="text" name="about" value="<?php echo $roww['slogan'];?>" class="form-control form-control-danger" placeholder="slogan"><br>
                              <label class="control-label">Price </label>
                               <input type="text" name="price" value="<?php echo $roww['price'];?>"  class="form-control" placeholder="&#8377;"><br>
                                <label class="control-label">Image</label>
                                 <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n"><br>
							                   <label class="control-label">Select Category</label>
													<select name="res_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                   <option>--Select Restaurant--</option>
                          <?php $ssql ="select * from restaurant";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                              echo' <option value="'.$row['rs_id'].'">'.$row['title'].'</option>';;
													}  
              						?> 
													 </select><br>
                           <div>
                           <input type="submit" name="submit" class="submit" value="Save"> 
                            <a class="cancel" href="all_menu.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            
   
</body>
</html>