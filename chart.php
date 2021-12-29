<?php  
 $db = mysqli_connect("localhost", "root", "", "expense_tracker");  
 $query = "SELECT Type, count(*) as Amount FROM details GROUP BY Type";  
 $result = mysqli_query($db, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Income and Expense</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Type', 'Amount'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Type"]."', ".$row["Amount"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Income and Expense',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 text-align="center">Income and expense chart</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
                <p><a href="dashboard.php">Back</a></p>
           </div>  
      </body>  
 </html>