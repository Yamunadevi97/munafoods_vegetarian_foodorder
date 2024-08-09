<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))          
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
	    	if($extension == 'jpg'||$extension == 'jpeg'||$extension == 'gif'||$extension == 'jpeg' )
					{        
						if($fsize>=1000000)
							{
								$error = 	'<div class="alert alert-danger alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Max Image Size is 1024kb!</strong> Try different Image.</button>
										</div>';
	   						}
						else
							{
		        				$sql = "INSERT INTO dishes(rs_id,title,slogan,price,img) VALUE('".$_POST['res_name']."','".$_POST['d_name']."','".$_POST['about']."','".$_POST['price']."','".$fnew."')";  // store the submited data ino the database :images
				    						mysqli_query($db, $sql); 
											move_uploaded_file($temp, $store);
			  					$success = 	 '<div class="alert alert-success" id="alertDiv" role="alert" style={{ fontSize: 20 }}>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                  
                  <strong>Success!</strong> </button>
                         			</div>';
                			}
				    	}
				   	elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<strong >select image</strong></button>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
																<p><strong >invalid extension!</strong>jpeg, jpg, Gif are accepted.</p></button>
															</div>';
						}               
	   	   }
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <title> MUNA FOODS || Add Menu</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/form.css">
    <style>
     
      .close{
            margin-left:400px;
            display: inline;
            background-color: green;
            color: whitesmoke;
            display: block;
            width: 40px;
            margin-top:-200px;
        }
        .error{
            margin-left:200px;
            display: inline;
            background-color: red;
            color: whitesmoke;
            display: block;
            margin-top:-200px;
        }
       
/**/
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


.close{
            margin-left:250px;
            display: inline;
            background-color: green;
            color: whitesmoke;
            margin-top:20px;
            width: 100px;
            margin-bottom: 0px;
        }
        .error{
            margin-left:200px;
            display: inline;
            background-color: red;
            color: whitesmoke;
            margin-top:-200px;
          
        }
        form{
            margin-top: 100px;
            margin-left: -250px;
            width: 700px;
        }
        h1{
            margin-left: 200px;
            width:200px;
            margin-top: 50px;
        }
    </style>
</head>

<body class="fix-header">
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
       
  
                    
    <div class="container">
                <!-- Start Page Content -->
                 			
									<?php  echo $error;
									        echo $success; ?><br><br>
									   <h1 >Add Menu</h1><br>  
                           
                                <form action=''class="form" method='post'  enctype="multipart/form-data">
                                                    <label class="control-label">Dish Name</label>
                                                  <input type="text" name="d_name" class="form-control" ><br>
                                                   <label class="control-label">Description</label>
                                                    <input type="text" name="about" class="form-control form-control-danger" ><br>
                                                    <label class="control-label">Price</label>
                                                    <input type="text" name="price" class="form-control" placeholder="&#8377;"><br>
                                                     <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n"><br>
                                                    <label>Select Restaurant</label>
													<select name="res_name" data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Select Restaurant--</option>
                                                 <?php $ssql ="select * from restaurant";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$row['rs_id'].'">'.$row['title'].'</option>';;
													}  
                                                 			?> 
													 </select><br><br><br>
                                         <div>
                                           <input type="submit" name="submit"value="Save" class="submit">
                                        <button a href="add_menu.php" class="cancel"> Cancel</a></button>
                                    </div>
                                </form></body></html>