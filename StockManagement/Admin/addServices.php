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
        include("../Include/database.php");

       ?>

<h3 class="font col-sm-12 col-lg-12 col-md-12">ADD SERVICES</h1> 

<div class="container">
    <form action="?" method="post">
        <input type="text" name="pname" required class ="form-control" placeholder="SERVICE NAME"><br>
        <button name="save" class="btn btn-success">SAVE </button><br> 
    </form>
</div>


<?php
    $pname = "";
        if(isset($_POST["save"])){
            $pname = $_POST["pname"];
            $date = date("y-m-d");

            include("../Include/database.php");

            $sql = "insert into ratecard values('".strtoupper($pname)."','".$date."','".$date."')";

            if(mysqli_query($con,$sql))
                $result = "**PRODUCT ADDED...";
            else 
                $result = "**Something Went Wrong...";

                echo "<p class='container' style='color:red;' class='font col-sm-12 col-lg-12 col-md-12'>".$result."</p>";
        }     
?>
</body>
</html>