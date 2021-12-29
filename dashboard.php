<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];



$sql = "SELECT SUM(Amount) FROM details WHERE user_id=$user_id AND  Type='Expense';";
$result = mysqli_query($db, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $expense = $row['SUM(Amount)'];
}

$sql = "SELECT SUM(Amount) FROM details WHERE user_id=$user_id AND Type='Income';";
$result = mysqli_query($db, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $income = $row['SUM(Amount)'];
}

$balance = $income - $expense;

$sql = "SELECT * FROM details WHERE user_id=$user_id ORDER BY id;";
$table_result = mysqli_query($db, $sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<?php include("nav.php")?>
    <style>

.card {
    margin: 3%;
    padding: 1%;
}

th,tr,td{
    font-style: verdana;
    color: green;
    text-align: center;
    }


</style>


<div class="wrapper">
    <div class="sidebar">
        <h2>Expense tracker</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user-circle"></i>Profile</a></li>
            
            <li><a href="createxpense.php"><i class="fas fa-plus"></i>Create Expense</a></li>
            <li><a href="ExpenseSummary.php"><i class="fas fa-search-dollar"></i>Income & Expense Summary</a></li>
            <li><a href="chart.php"><i class="fas fa-chart-pie"></i>Chart</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="main_content">
        <div class="header"><?php echo "welcome " . $_SESSION["email"];?> Nice to see you!!</div>  
        <main class="col-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Expense</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $expense; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Income</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $income; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Balance</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $balance; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Recent Transactions</div>
                                <div class="card-body">
                                    <div class="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($table_result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['Date'] . "</td>";
                                                    echo "<td>" . $row['Description'] . "</td>";
                                                    echo "<td>" . $row['Type'] . "</td>";
                                                    echo "<td>" . $row['Amount'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
      </div>
    </div>
</div>

</body>
</html>