<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(strlen($_SESSION['user_id'])==0)
  { 
header('location:./login.php');
}
else
{
  if(isset($_POST['update']))
  {
$form_id=$_GET['form_id'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($db,"insert into remark(frm_id,status,remark) values('$form_id','$status','$remark')");
$sql=mysqli_query($db,"update users_orders set status='$status' where o_id='$form_id'");

echo "<script>alert('form details updated successfully');</script>";

  }}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<head>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>MUNA FOODS ||User-details</title>
<style>
table {
  border-collapse: collapse;
  width: 20em;
   margin-top: -10px;
  height:40%;
  text-align: center;
  border-style: solid;
  border-color:whitesmoke;
  border-radius:150px;
  border-width: 10px;
  margin-left: 10px;
  font: 1.5em sans-serif;
}
a{
    text-decoration: none;
    color:white;
}
span{
    font-size: x-large;
    margin: 10px;
    color: whitesmoke;
}
th {
  text-align: left;
  padding: 2px;
  color: whitesmoke;
  background-color: blue;
  text-align: center;
 margin-bottom: 0px;
 width:2px;
}
td {
  text-align: left;
  padding: 15px;
  color: whitesmoke;
  background-color: black;
  text-align: center;
  border:1px solid whitesmoke;
  width:2px;
}
.warning{
		background-color: rgb(225,8,60);
		margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;
	padding-left:-10px;
	}
  .success{
		background-color: rgb(2,130,72);
	margin-left:5px;
	width:130px;
	color:white;
	font:1.2em italic serif;

	}
</style>
</head>
<body>
<div >
  <table>
  <?php 

$ret1=mysqli_query($db,"select * FROM users_orders where o_id='".$_GET['newform_id']."'");
$ro=mysqli_fetch_array($ret1);
$ret2=mysqli_query($db,"select * FROM users where u_id='".$ro['u_id']."'");

while($row=mysqli_fetch_array($ret2))
{
?>
    
    <tr>
    <td colspan="7"><b><?php echo $row['username'];?>'s profile</b></td>
    </tr>
    <tr>
      <th><b>Reg Date</b></th>
      <th><b> Name</b></th>
      <th><b>User Phone</b></th>
      <th><b>User Address</b></th>
      <th><b>Status</b></th>
    </tr>
    <tr>
      &nbsp;
      &nbsp;
    </tr>
    <tr>
    <td><?php echo htmlentities($row['date']); ?></td>
    <td><?php echo htmlentities($row['username']); ?></td>
    <td><?php echo htmlentities($row['phone']); ?></td>
    <td><?php echo htmlentities($row['address']); ?></td>
    <td><?php if($row['status']==1)
      { echo "<div class='success'>Active</div>";
} else{
  echo "<div class='warning'>Block</div>";
}
        ?></td>
    </tr>
       <tr>
        <td colspan="7">   
      <input name="Submit2" type="submit" class="warning" value="Close " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
      <?php } 
    ?>
  </table>
</div>
</body>
</html>
