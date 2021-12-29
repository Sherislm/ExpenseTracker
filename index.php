<?php

include 'config.php';
session_start();
$db = mysqli_connect("localhost","root","","expense_tracker");
$email = $password = $pwd = '';



if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		$_SESSION['user_id'] = $row['user_id'];
		header("Location: dashboard.php");
}
else
{
    echo "<script>alert('Invalid Email or Password.')</script>";
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<style>
  *{
    margin: 0;
    padding: 0px;
    

}



body{
    background-image: url("money-2724241_1280.jpg");
    height: 100vh;
    background-size: cover;
    background-attachment: fixed;
    font-family:verdana;
    

}

h1{
    font-size:50px;
    color:green;
    margin-top:250px;   
}

p{
    font-size:35px;
    color:green;

}

h3{
    font-size:30px;
    color:green;
}

.glyphicon-pencil{
    font-size:35px;
    color:black;
    float:right;
    margin-top:20px;
}

.col-md-5{
    margin-top: 70px;
    box-shadow:0px 0px 10px 0px #000;
    background: rgba(0,0,0,#ccffcc);

}

.form-control{
    background: transparent;
    border:0px;
    border-bottom:1px solid black;
    border-radius:0px;
    font-size: 18px;
    margin-top: 15px;
    height: 40px;
    color:black;
    
}

.btn-success{
    margin-top: 20px;
    font-size:18px;
    width: 120px;
    margin-left:80px;
}

img{
    
    height: 100px;
    width: 300px;
    position: center;
}
</style>

<body>
<form method= "POST" action="index.php">

<form>

<div class="container">
<img src= "logo1.png"alt="logo">
<div class="row">

<div class="col-md-7">

<h1 class=text-left>Welcome to Expense tracker</h1>
<p class="text-left">"What gets measured,gets managed."</p>


</div>

<div class="col-md-5">


<div class="row">
<div class="col-md-6">
    <h3 class="text-left">Login form</h3>
    </div>
    </div>
<hr>

                    <div class="row">
                        <label class="label col-md-2 control-label">Email Address</label>
                        <div class="col-md-10">
                        <input type ="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                        </div>
                        </div>


                        <div class="row">
                        <label class="label col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                        <input type ="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                        <input type="checkbox"> <small> Remember me </small>
                        </div>
                        </div>
                       

                        
                        <input class="btn btn-success" type="submit" id="register" name="login" value="Log in">

                        
                       <div class="row">
                        <div class="col-md-10">
                        Don't have an account? <a href="Registration.php"> Sign up </a>
                        </div>
                        </div>  

</div>
</div>
</div>
                        </form>

</body>
</html>



