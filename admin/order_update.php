 
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(strlen($_SESSION['user_id'])==0)
  { 
header('location:../login.php');
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

echo "<script>alert('Form Details Updated Successfully');</script>";
  }

 ?>
  <script language="javascript" type="text/javascript">
function f2() {
    window.close();
}
ser
function f3() {
    window.print();
}
                </script>
                <head>
                   <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
                    <title>MUNA FOODS || Order Update</title>
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <style >
                        body{
                            color:whitesmoke;
                            background-color: black;
                            font: 1.5em;
                        }
                    .indent-small {
                        margin-left: 5px;
                    }
                    .form-group.internal {
                        margin-bottom: 0;
                    }
                    .dialog-panel {
                        margin: 10px;
                    }
                    .datepicker-dropdown {
                        z-index: 200 !important;
                    }
                    .panel-body {
                       
                        background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
                        background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                        background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                        background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                        background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
                        font: 600 15px "Open Sans", Arial, sans-serif;
                    }
                    label.control-label {
                        font-weight: 600;
                        color:violet;
                    }
                   table {
                        width: 650px;
                        border-collapse: collapse;
                        margin: auto;
                        margin-top: 50px;
                    }
                    tr:nth-of-type(odd) {
                        background: blue;
                    }
                    th {
                        background: #004684;
                        color: white;
                        font-weight: bold;
                    }
                    td,
                    th {
                        padding: 10px;
                        border: 1px solid #ccc;
                        text-align: left;
                        font-size: 14px;
                    }
                    div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: right;
  padding: 14px;
  text-decoration: none;
  float:right;
}
input,textarea,select {
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
                    </style>
                </head>

                <body>
                    <div style="margin-left:50px;">
                        <form name="updateticket" id="updatecomplaint" method="post">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><b>Form Number</b></td>
                                    <td><?php echo htmlentities($_GET['form_id']); ?></td>
                                </tr>
                                   &nbsp;
                                &nbsp;
                           <tr>
                                    <td><b>Status</b></td>
                                    <td><select name="status" required="required">
                                            <option value="">Select Status</option>
                                            <option value="in process">On the way</option>
                                            <option value="closed">Delivered</option>
                                            <option value="rejected">Cancelled</option>
                                       </select></td>
                                </tr>
                               <tr>
                                    <td><b>Message</b></td>
                                    <td><textarea name="remark" cols="10" rows="5" required="required"></textarea></td>
                                </tr>
                               <tr>
                                    <td><b>Action</b></td>
                                    <td><input type="submit" name="update" class="submit" value="Submit">

                                        <input name="Submit2" type="submit" class="cancel" value="Close" onClick="return f2();" style="cursor: pointer;" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                   
                </body>
                </html>
                <?php } ?>