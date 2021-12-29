<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
//code to connect to database
$db = mysqli_connect("localhost","root","","expense_tracker");

if(isset($_POST['add'])){
    $Description=$_POST['Description'];
    $Amount = $_POST['Amount'];
    $Type = $_POST['Type'];
    $Date=$_POST['Date'];
    $email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
   
        
    $sql= "INSERT INTO `details`(Description, Amount,Type,Date,user_id) VALUES ('$Description','$Amount','$Type','$Date')";
        mysqli_query($db,$sql);
    

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense tracker</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-image: url("money-2724241_1280.jpg");
            height: 100vh;
            background-size: cover;
            background-attachment: fixed;
            font-family:verdana;
            
            }
        
        .form-container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            padding: 50px 30px;
            border-radius: 10px;
            box-shadow:7px 7px 60px #000;
            
        }
        h1{
            color: green;
            font-size: 20px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 2rem;
        }
        .control input{
            padding: 10px;
            font-size: 16px;
            display: block;
            width: 100%;
            color:#000;
            background: #ddd;
            outline: none;
            border: none;
            margin: 1em 0;

        }         
        .control .btn{
            color: #fff;
            text-transform: uppercase;
            background: green;
            opacity: .7;
            transition:opacity .3s ease;
        }
        .control{
            color:green;
        }

        .btn:focus{
            opacity: 1;
        }
        p{
            text-align: center;
        }
        a{
            text-decoration: none;
            color: #fff;
            opacity: .7;
            background:yellowgreen ;
        }
        a:hover{
            opacity: 1;
        }

        h2{
            font-size: small;
            text-align: center;
            color: red;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"]
        {
        border: 1px solid black ;
        border-radius: 5px;
        display: block;
        font-size: 16px;
        padding: 15px;
        width: 100%;
        background-color: transparent;
        }


        .penicon{
            position: relative;
        }

        .penicon i{
            position: absolute;
            left: 0;
            top: 40px;
            padding: 10px 10px;
            color: green;

        }

        .penicon input[type="text"]
         {
         padding-left: 40px;
        }

        .moneyicon i{
            position: absolute;
            left: 0;
            top: 40px;
            padding: 10px 10px;
            color: green;
        }

        .moneyicon input[type="number"]
         {
         padding-left: 40px;
        }

        .moneyicon{
            position: relative;
        }




    </style>
</head>
<body>
<form method= "post" action=" createxpense.php">
    
        <div class="form-container">
    
            <h1>Income and Expense</h1>
            <h2>Add + positive for Income</h2>
            <h2>Add - negative for Expense</h2>
            <form action="index.html">

            <div class="control">
            <div class="penicon">
            <label for="name">Details</label>
            <input type="text" name="Description" id="details" placeholder="Please enter a details">
            <i class="fas fa-pen"></i>
            </div>

            <div class="control">
            <div class="moneyicon">
            <label for="num">Amount</label>
            <input type="number" name="Amount" id="amount" placeholder="Please enter the amount">
            <i class="fas fa-hand-holding-usd"></i>
            </div>
            <label for="name">Type</label>
            <input type="text" name="Type" id="type" placeholder="Please enter income/expense">

            <div class="control">
            <label for="date">Date</label>
            <input type="date" name="Date" class="textdate" id="date" min="2021-12-24" placeholder="Enter the date">
            </div>


            
            <div class="control">
            <input type="submit" class="btn" name="add" value="Add transaction">
            </div>
        </form>
        <p><a href="dashboard.php">Back</a></p>
        </div>
    
</body>
</html>