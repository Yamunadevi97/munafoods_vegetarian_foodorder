
<!DOCTYPE html>
<html lang="en">
 <?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))        
{
if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['url']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
		{	
			$error = 	'<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
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
			$store = "Res_img/".basename($fnew);                   
			if($extension == 'jpg'||$extension == 'gif' ||$extension == 'jpeg')
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
							$res_name=$_POST['res_name'];
							$sql = "update restaurant set c_id='$_POST[c_name]', title='$res_name',email='$_POST[email]',phone='$_POST[phone]',url='$_POST[url]',o_hr='$_POST[o_hr]',c_hr='$_POST[c_hr]',o_days='$_POST[o_days]',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' ";  // store the submited data ino the database :images												mysqli_query($db, $sql); 
							mysqli_query($db, $sql); 
							move_uploaded_file($temp, $store);
			  				$success = 	'<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
										<strong>Record Updated!</strong>.</buuton>
															</div>';
                		}
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
									<strong>select image</strong></button>
									</div>';
					}
					else{
					
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="error" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
									<strong>invalid extension!</strong> jpg, Gif,jpeg are accepted.</button>
									</div>';
						}               
	    }
}
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<meta name="description" content="">
<meta name="author" content="">
<title>Muna FOOd|| Update Restaurant</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<style>
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

        h1{
            margin-left:200px;
           
        }
        input{
            color:violet;
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
        <?php  echo $error;
    	        echo $success; ?><br><br>
        <h1>Update Hotel</h1><br><br>
        <form action='' method='post' enctype="multipart/form-data">
            <?php $ssql ="select * from restaurant where rs_id='$_GET[res_upd]'";
						$res=mysqli_query($db, $ssql); 
						$row=mysqli_fetch_array($res);?>
                         <label class="control-label">Restaurant Name</label>
                         <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" placeholder="John doe">
                         <label class="control-label">Business E-mail</label>
                         <input type="text" name="email" value="<?php echo $row['email'];  ?>" class="form-control form-control-danger" placeholder="example@gmail.com">
                          <label class="control-label">Phone </label>
                          <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="1-(555)-555-5555">
                           <label class="control-label">website URL</label>
                            <input type="text" name="url" class="form-control form-control-danger" value="<?php echo $row['url'];  ?>" placeholder="http://example.com">
                             <label class="control-label">Open Hours</label>
                             <select name="o_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                              <option>--Select your Hours--</option>
                                <option value="8am">8am</option>
                                <option value="9am">9am</option>
                                <option value="10am">10am</option>
                                <option value="11am">11am</option>
                               </select><br>
                            <label class="control-label">Close Hours</label>
                            <select name="c_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                               <option>--Select your Hours--</option>
                                    <option value="9pm">9pm</option>
                                    <option value="10pm">10pm</option>
                                    <option value="11pm">11pm</option>
                                </select><br>
                            <label class="control-label">Open Days</label>
                            <select name="o_days" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                <option>--Select your Days--</option>
                                 <option value="mon-fri">mon-fri</option>
                                 <option value="mon-sat">mon-sat</option>
                                 <option value="mon-sun">mon-sun</option>
                            </select><br>
                           <label class="control-label">Image</label>
                            <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                            <label class="control-label">Select Category</label>
                            <select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                <option>--Select Category--</option>
                                   <?php $ssql ="select * from res_category";
										$res=mysqli_query($db, $ssql); 
										while($rows=mysqli_fetch_array($res))  
											{
                                                 echo' <option value="'.$rows['c_id'].'">'.$rows['c_name'].'</option>';;
											}  
              	            		?>
                             </select><br>
                              <label>Restaurant Address</label>
                               <textarea name="address" type="text"  class="form-control"> <?php echo $row['address']; ?> </textarea><br>
                               <div>  
                               <input type="submit" name="submit" class="submit" value="Save">
                                            <a href="all_restaurant.php" class="cancel">Cancel</a>
                                        </div>
                                        </form>
                                    </body>
                                  </html>