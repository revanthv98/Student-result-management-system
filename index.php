<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}

if(isset($_POST['username']))
{
    
    $uname=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{

$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>



<html>
<head>
<title>Student Results</title>

<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body style='background-color:rgba(223, 52, 52)!important;'>

<br>
    
    <h1 style="font-size: 50px "> SMS Student Management System </h1>
<div class="loginbox">
    <img src="images/loginimg.png" class="avatar">
    <h1>Admin Login</h1>
    <form method='POST'>
        <p>Admin ID:</p>
        <input type="text" name="username" placeholder="Enter admin id">
        <p>Password:</p>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="login" value="Login">
        
    </form>
</div>

<div class="loginbox1">
        <img src="images/loginimg.png" class="avatar1">
        <h1>Student Login</h1>
        <form method='POST'>
        <p>Student ID:</p>
        <input type="text" name="username" placeholder="Enter student id">
        <p>Password:</p>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="login" value="Login">
        
    </form>
        <a href="find-result.php">Click here for your Results</a>
        
    </div>
    











</body>
</html>
