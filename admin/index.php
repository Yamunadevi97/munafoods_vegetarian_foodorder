<!DOCTYPE html>
<html lang="en" >
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
	$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["adm_id"] = $row['adm_id'];
										header("refresh:1;url=dashboard.php");
	                            } 
							else
							    {
										echo "<script>alert('Invalid Username or Password!');</script>"; 
                                }
	 }
	}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
/* styles.css */

/* styles.css */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
   background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); 
    margin: 0;
}
.login-container {
    background-color: black;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    width:50%;
    margin:auto;
    margin-top: 100px;
}
/*form*/
form {
    display: flex;
    flex-direction: column;
    background-color: black;
    color:whitesmoke;
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
input {
    margin-bottom: 15px;
    padding: 10px;
    border: 4px solid #ddd;
    border-radius: 5px;
    background: transparent;
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
button {
    padding: 10px;
    background-color:rgb(227,62,23);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3;
}
span{
    font-size:5em;
    margin: auto;
}
</style>
</head>
<body>
<div class="login-container">
<form action="index.php" method="post" id="loginForm">
<h2>Log In</h2><br><br>
<span><i class="fa-solid fa-user-tie"></i></span>
 <h3> Enter Your Details</h3>
<form action="index.php" method="post">
 <span style="color:red;"><?php echo $message; ?></span><br>
   <span style="color:green;"><?php echo $success; ?></span><br>
  <form action="index.php" method="post">
  <label for="username">Username:</label>
    <input type="text" placeholder="Username" name="username"/><br>
    <label>Password</label>
      <input type="password" class="button" placeholder="Password" name="password"/>
    <button type="submit"  name="submit" class="submit" value="Login" >SUBMIT</button>
  </form></div><br>
  </body>
</html>
