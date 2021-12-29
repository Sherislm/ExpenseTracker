<?php

include'config.php';
session_start();
//code to connect to database
$db = mysqli_connect("localhost","root","","expense_tracker");

if(isset($_POST['create'])){
    $firstname =$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $password2 =$_POST['password2'];
    
    if(!empty($email)) {
        $checkemail = "SELECT email FROM users WHERE email= '$email' ";
        $checkemail_run = mysqli_query($db,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            //Taken Email already exists
            echo "<script>alert('Email address already exist.')</script>";

        }
        else
        {
            //Available email-Record not found
            $sql = "INSERT INTO users(firstname,lastname,email,password) VALUES ('$firstname','$lastname','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['email']=$email;
        header("location: dashboard.php");
        }

    }else{
        echo "password not matched";
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

body{
    background-image: url("money-2724241_1280.jpg");
    height: 100vh;
    background-size: cover;
    background-attachment: fixed;
    font-family:verdana;
    }

*{
    margin: 0;
    padding: 0;
    

}



.form-control{
    background: transparent;
    border:15px;
    border-bottom:1px solid black;
    border-radius:0px;
    font-size: 18px;
    margin-top: 15px;
    height: 40px;
    color:black;
}

</style>
<body>

    
<form method= "post" action="Registration.php">
<div class="bg">
    <div class="container">
    <div class="row justify-content-center">
<div class="col-sm-8 col-md-6 col-lg-4">
    <div class="form-container">
        
    
         <h1 class="text-center">Registration form</h1>
    

                        
                        <label for ="firstname"><b>First Name</b></label>
                        <input class="form-control" type="text" type="text" id="firstname" name="firstname" required placeholder="Enter your first name">
                        

                        
                        <label for ="lastname"><b>Last Name</b></label>
                        <input class="form-control"  type="text" type="text" id="lastname" name="lastname" required placeholder="Enter your last name">
                        

                        
                        <label for ="email"><b>Email Address</b></label>
                        <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email address">
                        

                        
                        <label for ="password"><b>Password</b></label>
                        <input class="form-control"  type="password" id="password" name="password" required placeholder="Enter your password">

                        <label for ="password2"><b>Password again</b></label>
                        <input class="form-control"  type="password" id="password2" name="password2" required placeholder="Enter your password">
                      
                      
                        <hr class="mb-3">
                        <input class="btn btn-success" type="submit" id="register" name="create" value="Sign up">

                        <div class="d-flex justify-content-center links">
                        Already have an account? <a href="index.php" class="ml-2"> Log in here</a>
                        </form>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
    var password= document.getElementById("password")
    , confirm_password= document.getElementById("password2")

    function validatePassword() {
        if(password.value!=confirm_password.value){
            confirm_password.setCustomValidity("Password dont match");
        }else {
            confirm_password.setCustomValidity('');
        }

        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
</script>
        
    
</body>
</html>

