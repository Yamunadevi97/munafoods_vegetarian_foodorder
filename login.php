 <!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
  if(empty($_POST['firstname']) || 
    empty($_POST['lastname'])|| 
	empty($_POST['email']) ||  
	empty($_POST['phone'])||
	empty($_POST['password'])||
	empty($_POST['cpassword']) ||
	empty($_POST['cpassword']))
	{
	$message = "All fields must be Required!";
	}
	else
	{
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
	if($_POST['password'] != $_POST['cpassword']){  
      echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6) 	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10){
      echo "<script>alert('Invalid phone number!');</script>"; 
	}
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))   {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0)  {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0)  {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{	 
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	 header("refresh:0.1;url=login.php");
    }}}
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<title>Responsive Signup Form</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    background-image: url("images/r7.png");
    background-size: cover;
    background-repeat: no-repeat;
}
/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 1rem;
}
.navbar-brand a {
    color: white;
    text-decoration: none;
    font-size: 1.5rem;
}
.navbar-links {
    list-style: none;
    display: flex;
    gap: 1rem;
}
.navbar-links li a {
    color: white;
    text-decoration: none;
    padding: 0.5rem;
}
.navbar-links li a:hover {
    background-color: #575757;
    border-radius: 5px;
}
.navbar-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}
.bar {
    height: 3px;
    width: 25px;
    background-color: white;
    margin: 4px 0;
}
/* Signup Form Styles */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    min-height: calc(100vh - 60px); /* Adjust for the navbar height */
}
.signup-form {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px orangered;
    border-radius: 8px;
    background-color: black;
    }
.signup-form h2 {
    margin-bottom: 20px;
    text-align: center;
}
.signup-form label {
    display: block;
    margin-bottom: 5px;
    color: whitesmoke;
}
.signup-form input {
  margin-bottom:5px;
  padding: 5px;
  border: 4px solid #ddd;
  border-radius: 5px;
  background: transparent;
  color:violet;
  font-size: 1.2em;
  width:90%;
  background-color: black;
  }
.signup-form button {
    width: 100%;
    padding: 10px;
    background-color: orangered;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: whitesmoke;
}
.signup-form button:hover {
    background-color: #555;
}
h1{
    color:whitesmoke;
}
/* Responsive Styles */
@media (max-width: 768px) {
    .navbar-links {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
        background-color: #333;
        position: absolute;
        top: 60px;
        left: 0;
    }
 .navbar-links.active {
        display: flex;
    }
 .navbar-toggle {
        display: flex;
    }
 .container {
        padding: 15px;
    }
 .signup-form input {
   padding: 8px;
    }
.signup-form button {
        padding: 8px;
        color: whitesmoke;
    }}
/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        margin-bottom: 60px; /* Adjust for footer height */
    color: white;
    }}
</style></head>
<body>
<nav class="navbar">
<div class="navbar-brand">
<a href="#"><i class="fa-solid fa-motorcycle"></i>MUNAFOODS</a>
 </div>
<div class="navbar-toggle" id="mobile-menu">
<span class="bar"></span>
<span class="bar"></span>
<span class="bar"></span>
</div>
 <ul class="navbar-links">
  <li><a  href="index.php"><i class="fa-solid fa-house"></i> Home </a></li>
  <li><a href="hotels.php"><i class="fa-solid fa-square-h"></i> Hotels</a> </li>
    <?php
   if(empty($_SESSION["user_id"]))
       {
           echo '<li><a href="login.php" ><i class="fa-solid fa-arrow-right-to-bracket" class="icon"></i> Login</a> </li>
                 <li><a href="signup.php" ><i class="fa-solid fa-user-plus" class="icon"></i> Signup</a></li>';
                       }
                   else
                       {
                               echo  '<li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" class="icon"></i> Logout</a></li>';
                               echo  '<li><a href="your_orders.php" ><i class="fa-solid fa-cart-shopping" class="icon"></i> Cart</a></li> ';
                       }
?></ul></nav>
<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
     if(is_array($row)) {
           	$_SESSION["user_id"] = $row['u_id']; 
			 header("refresh:1;url=index.php"); 
        } 
		else  {
            $message = "Invalid Username or Password!"; 
             } }}
?>
<div class="container">
 <form action="" method="post" class="signup-form">
  <h1>Login</h1><br><br>
  <span style="color:red;"><?php echo $message; ?></span>
  <span style="color:green;"><?php echo $success; ?></span>
  <label for="exampleInputEmail1">User-Name</label><br>
  <input type="text" placeholder="Username" name="username" /><br><br>
  <label for="exampleInputPassword1">Password</label><br>
   <input type="password" placeholder="Password" name="password" /><br><br>
    <button type="text"  value="Login" name="submit" >Log In </button>
   </form></div>
     <script>
       document.getElementById('mobile-menu').addEventListener('click', function() {
        document.querySelector('.navbar-links').classList.toggle('active');
    });
</script></body></html>
