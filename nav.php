<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family:verdana;
}

body{
    background-image: url("money-2724241_1280.jpg");
    height: 100vh;
    background-size: cover;
    background-attachment: fixed;
    font-family:verdana
   
}


.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 175px;
  height: 100%;
  background: #008000;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #FFFF00;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 25px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-top: 1px solid #000000;
}    

.wrapper .sidebar ul li a{
  color: #FFFF00;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #006400;
}
    
.wrapper .sidebar ul li:hover a{
  color: #FFFF00;
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #006400;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #FFFF00;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}



.wrapper .main_content .info{
  margin: 20px;
  color: #008000;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
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
            <li><a href="i.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
</div>

</body>
</html>