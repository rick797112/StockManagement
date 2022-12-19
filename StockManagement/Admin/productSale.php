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

        $sql1 = "select * from addproduct";
        echo"<br><h2 style='text-align:center;'class='font'>STOCK MANAGEMENT</h2><br>";
        echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>OPERATION</th><th>PRODUCT NAME</th><th>QUANTITY</th><th>BUY PRICE</th><th>SELL PRICE</th><th>SELL</th></thead><tbody>";
    
            if ($result = mysqli_query($con, $sql1)) 
            // Fetch one and one row
            while ($row = mysqli_fetch_assoc($result)) {
                $pname = $row["ProductName"];
                echo"<tr>";
                echo"<td><a href='editProduct.php?Pname=".$row['ProductName']."'>Edit</a>/<a href= 'deleteProduct.php?Pname=".$row['ProductName']."'>Delete</a>";
                $pname = $row["ProductName"];
                echo "<td>".$row["ProductName"]."</td>";
                echo "<td>".$row["Quantity"]."</td>";
                echo "<td>".$row["BuyPrice"]."</td>";
                echo "<td>".$row["SellPrice"]."</td>";
                echo"<td><a href='ajaxManage.php?Pname=".$row['ProductName']."'>SOLD</a></td>";
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