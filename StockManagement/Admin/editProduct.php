<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PRODUCT</title>
   

    <?php include("../Include/cdn.php"); ?>
</head>
<body>
        <?php include("../Include/navbar.php"); ?>

        <?php include("../Include/Title.php"); ?> 

        <?php
        $result="";
            if(isset($_GET["cancel"])){
                header("Location: productSale.php");
            }else if(isset($_GET['save'])){                                       
                        $pname=$_GET["Pname"];
                        $quantity=$_GET["quantity"];
                        $buyprice=$_GET["buyprice"];
                        $sellprice=$_GET["sellprice"];
                        $date=date("y-m-d");
                      
        
                        include("../Include/database.php");

                       
                            $sql1 = "update addproduct set Quantity='".$quantity."', BuyPrice='".$buyprice."',SellPrice='".$sellprice."', UpdatedOn='".$date."' where ProductName = '".$pname."' ";

                            if(mysqli_query($con,$sql1)){
                                header("Location:productSale.php");
                            }else{
                                $result="Something Went Wrong";
                            }
                    
                    mysqli_close($con);
                }
            
        ?>

    <form action="?" method="GET">
        <div class="container">
                <?php
                    echo"<h3 class='font'>UPDATE PRODUCT DETAILS </h3>";
                    include("../Include/database.php");

                    $sql="select * from addproduct where ProductName='".$_GET['Pname']."'";
            
                    if ($res = mysqli_query($con, $sql)) 
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "Product Name<br>";
                        echo"<input  readonly name='Pname' style='width:40%;' class='form-control' value='".$row['ProductName']."'> </input><br>";
                        echo "Quantity<br>";
                        echo"<input text='number' required name='quantity' style='width:40%;' class='form-control' value='".$row['Quantity']."'> </input><br>";
                        echo "Buy Price (/ Piece)<br>";
                        echo"<input text='number' required name='buyprice' style='width:40%;' class='form-control' value='".$row['BuyPrice']."'> </input><br>";
                        echo "Sell Price (/ Piece)<br>";
                        echo"<input  text='number' required name='sellprice' style='width:40%;' class='form-control' value='".$row['SellPrice']."'></input><br>";
                
                        echo"<input readonly name='created' style='width:40%;' class='form-control' value='".$row['CreatedOn']."'></input><br>";                     
                    
                    }

                    mysqli_close($con);
                ?>
                <button name="save" style="width:20%;" class="btn btn-success">UPDATE</button>
                <button name="cancel" style="width:20%;" class="btn btn-danger">CANCEL</button><br><br>
              
        </div>
    </form>

</body>
</html>