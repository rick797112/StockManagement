<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD PRODUCT</title>
    <?php include("../Include/cdn.php");  ?>
</head>
<body>

<?php include("../Include/navbar.php"); ?>

<?php include("../Include/Title.php"); ?> 
<h3 class="font col-sm-12 col-lg-12 col-md-12">ADD PRODUCT</h1> 

<div class="container">
    <form action="?" method="post">
        <input type="text" name="pname" required class ="form-control" placeholder="PRODUCT NAME"><br>
        <input type="number" name="quantity" required class ="form-control" placeholder="QUANTITY"><br>
        <input type="number" name="bprice" required class ="form-control" placeholder="BUY PRICE (Per Piece)"><br>
        <input type="number" name="sprice" required class ="form-control" placeholder="SELL PRICE (Per Piece)"><br>
        <button name="save" class="btn btn-success">SAVE </button><br> 
    </form>
</div>


<?php
    $pname = "";
    $bprice = "";
    $sprice = "";
    $quantity = "";
    $result = "";

        if(isset($_POST["save"])){
            $pname = $_POST["pname"];
            $bprice = $_POST["bprice"];
            $sprice = $_POST["sprice"];
            $quantity = $_POST["quantity"];
            $date = date("y-m-d");

            include("../Include/database.php");

            $sql = "insert into addproduct values('".strtoupper($pname)."','".$quantity."','".$bprice."','".$sprice."','".$date."','".$date."')";

            if(mysqli_query($con,$sql))
                $result = "**PRODUCT ADDED...";
            else 
                $result = "**Something Went Wrong...";

                echo "<p class='container' style='color:red;' class='font col-sm-12 col-lg-12 col-md-12'>".$result."</p>";
        }     
?>

