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
      include("../Include/navbar.php");
      include("../Include/Title.php");
    ?>
<h3 class="font col-sm-12 col-lg-12 col-md-12">ADD STOCK</h1> 

<div class="container">
    <form action="?" method="post">
        <input type="text" name="sname" required class ="form-control" placeholder="ITEM NAME"><br>
        <input type="text" name="price" required class ="form-control" placeholder="ITEM PRICE"><br>
        <button name="save" class="btn btn-success">SAVE </button><br> 
    </form>
</div>  

    <?php
        $profit = 0;
         $sname = "";
         if(isset($_POST["save"])){
             $sname = $_POST["sname"];
             $price = $_POST["price"];
             $date = date("y-m-d");
 
             include("../Include/database.php");
 
             $sql = "insert into addStock values('".strtoupper($sname)."','".$price."','".$date."')";
 
             if(mysqli_query($con,$sql))
                 $result = "**PRODUCT ADDED...";
             else 
                 $result = "**Something Went Wrong...";
 
                 echo "<p class='container' style='color:red;' class='font col-sm-12 col-lg-12 col-md-12'>".$result."</p>";
         }

        $sql1 = "select * from addStock";
            echo"<br><h2 style='text-align:center;'class='font'>EXPENSE LIST</h2><br>";
            echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>PRODUCT NAME</th><th>PRICE</th><th>DATE</th></thead><tbody>";
            include("../Include/database.php");
            if ($result = mysqli_query($con, $sql1)) 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo"<tr>";
                    $profit = $profit + $row["Price"];
                    echo "<td>".$row["ItemName"]."</td>";
                    echo "<td>".$row["Price"]."</td>";
                    echo "<td>".$row["CreatedOn"]."</td>";
                    echo"</tr>";
                }
        
            mysqli_close($con);
            echo"</table></tbody></center></div>";

            echo"<br><br><br>";
            echo "<h1 class='container'>";
            echo "Product Investment : ";
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
</body>
</html>