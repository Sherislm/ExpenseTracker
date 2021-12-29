<?php 

$server = "sql104.epizy.com";
$username = "epiz_30692083";
$password = "IQYzVqpTmVLVB";
$database = "epiz_30692083_expense_tracker";

$db = mysqli_connect($server, $username, $password, $database);

if (!$db) {
    die("<script>alert('Connection Failed.')</script>");
}

?>