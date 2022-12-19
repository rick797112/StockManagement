<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASH MANAGEMENT</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <?php  include("../Include/cdn.php");  ?>
</head>
<body>
    <?php
      include("../Include/navbar.php");
      include("../Include/Title.php");
    ?>
<h3 class="font col-sm-12 col-lg-12 col-md-12">CASH BOX ENTRY</h1> 

<div class="container">
    <form action="?" method="post">
        <input type="text" name="cashentry" required class ="form-control" placeholder="CASH ENTRY"><br>
        <input type="text" name="tally" required class ="form-control" placeholder="TALLY"><br>
        <button name="save" class="btn btn-success">SAVE </button><br> 
    </form>
</div>  

    <?php
         include("../Include/database.php");
         $date = date("y-m-d");
         $sname = "";
         $profit = 0;

         $sql1 = "select * from dailyanalysis where CreatedOn ='".$date."' ";    
             if ($result = mysqli_query($con, $sql1)) 
                while ($row = mysqli_fetch_assoc($result)) {
                    $profit = $profit + $row["Income"];
                }
         
             mysqli_close($con);

         if(isset($_POST["save"])){
             $tally = $_POST["tally"];
             $cashentry = $_POST["cashentry"];
             
 
             include("../Include/database.php");
 
             $sql = "insert into cashEntry values('".$profit."','".$cashentry."','".$date."','".$tally."')";
 
             if(mysqli_query($con,$sql))
                 $result = "**PRODUCT ADDED...";
             else 
                 $result = "**Something Went Wrong...";
 
                 echo "<p class='container' style='color:red;' class='font col-sm-12 col-lg-12 col-md-12'>".$result."</p>";
         }

        $sql1 = "select * from cashentry";
            echo"<br><h2 style='text-align:center;'class='font'>EXPENSE LIST</h2><br>";
            echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>TODAY's SALE</th><th>CASH ENTRY</th><th>DATE</th><th>TALLY</th></thead><tbody>";
            include("../Include/database.php");
            if ($result = mysqli_query($con, $sql1)) 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo"<tr>";
                    echo"<td>".$profit."</td>";
                    echo "<td>".$row["cashEntry"]."</td>";
                    echo "<td>".$row["date"]."</td>";
                    echo "<td>".$row["tally"]."</td>";
                    echo"</tr>";
                }
        
            mysqli_close($con);
            echo"</table></tbody></center></div>";
    ?>
    
    <script>
            $(document).ready(function() {
                $('#usetTable').DataTable();
            });
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
</body>
</html>