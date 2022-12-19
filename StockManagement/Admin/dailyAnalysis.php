<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STOCK MANAGEMENT</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <?php  include("../Include/cdn.php");  ?>
</head>
<body>
    <?php
        $pname = "";
        include("../Include/navbar.php");
        include("../Include/Title.php");
        include("../Include/database.php");

        $date = date("y-m-d");
        $profit = 0;

        $sql1 = "select * from dailyanalysis where CreatedOn ='".$date."' ";
        echo"<br><h2 style='text-align:center;'class='font'>TODAY'S SALE</h2><br>";
        echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>SERVICES</th><th>AMOUNT COLLECTED</th><th>DATE</th></thead><tbody>";
    
            if ($result = mysqli_query($con, $sql1)) 
            // Fetch one and one row
            while ($row = mysqli_fetch_assoc($result)) {
                echo"<tr>";
                echo "<td>".$row["Services"]."</td>";
                echo "<td>".$row["Income"]."</td>";
                $profit = $profit + $row["Income"];
                echo "<td>".$row["CreatedOn"]."</td>";
                echo"</tr>";
            }
        
            mysqli_close($con);
            echo"</table></tbody></center></div>";
            
            echo"<br><br><br>";
            echo "<h1 class='container'>";
            echo "Todays Income : ";
            echo $profit;
            echo "</h1>";
    ?>


        <script>
            $(document).ready(function() {
                $('#usetTable').DataTable();
            });
        </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        
        <script>
            $(document).ready(function(){
              var data  = '<?php echo $pname;  ?>';
              $("button").click(function(){
                    $("#divv").load("ajaxManage.php", {
                        pname : data
                    });
                });
             
            });
        </script>
</body>
</html>