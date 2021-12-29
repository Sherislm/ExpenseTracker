<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    body{
    background-image: url("money-2724241_1280.jpg");
    height: 100vh;
    background-size: cover;
    background-attachment: fixed;
    font-family:verdana;
    }

    .card-header{
        text-align: center;
        font-style: verdana;
        color: black;
        background-color: green;
        padding: 10px;
        }
    
    .container{
        width: 70%;
    }

    .card-body{
        font-family: verdana;
        color: green;
        background:yellow;
    }

    input[type=date]{
    border: none;
    border-bottom: 4px solid #9ACD32;
    color: black;
    font-size: 18px;
    margin: 8px;
    height: 30px;
    padding: 4px 4px 0px 10px;
    }


    th,tr,td{
    font-style: verdana;
    color: green;
    text-align: center;
    }

    a{
    color:black;
    }
    

    </style>
    </head>

    <body>

    
                <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-12">
                <div class="card mt-5">
                <div class="card-header">
                    <h4>Income and Expense Summary</h4>
                    </div>
                    <div class="card-body">
                    
                            <form action="ExpenseSummary.php" method="GET">
                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control" required>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" required>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            </div>

                            <div class="card mt-5">
                            <div class="card-body">
                            <table class="table table-borderd">
                            <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            
                            <?php 
                            include 'config.php';
                            session_start();

                            $user_id = $_SESSION['user_id'];

                                $con = mysqli_connect("localhost","root","","expense_tracker");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM details WHERE user_id=$user_id ORDER BY id DESC,Date BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($db, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['Description']; ?></td>
                                                <td><?= $row['Amount']; ?></td>
                                                <td><?= $row['Type']; ?></td>
                                                <td><?= $row['Date']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            
                            </tbody>
                            
                    </table>
                    <button type="back" class="btn btn-success"><a href="dashboard.php"> Back </a></button>
                        
    </div>
    </div>

    </div>
</div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
