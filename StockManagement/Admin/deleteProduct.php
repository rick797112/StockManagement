
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE PRODUCT</title>
    <?php include("../Include/cdn.php");  ?>
</head>
<body>

<?php include("../Include/navbar.php"); ?>

<?php include("../Include/Title.php"); ?> 

<?php
        $result="";
        $date=date("y-m-d");
        $id=$_GET['Pname'];
        if(isset($_GET['Pname']) && isset($_GET['product'])){
            if($_GET['product']=="cancel")
                header('location: productSale.php');
            else if($_GET['product']=="delete"){
                    include('../Include/database.php');   
                       
                   $sql1="delete from addproduct where ProductName='".$_GET['Pname']."'"; 
                   if(mysqli_query($con,$sql1)){
                       header('location: productSale.php');
                   }else{
                       $result = "<br>Something Went Wrong..";
                   }

                   mysqli_close($con);
                 
                }
        }
?>

<div class="container">
        <b>NOTE:</b>   This will permanently delete the Product from the Database<br>
        <label class="font"><h3>Are you sure you want to delete the Product?</h3></label><br>
        <?php
             include('../Include/database.php');

             $sql="select * from addproduct where ProductName='".$_GET['Pname']."'";
             $res=mysqli_query($con,$sql);
             while ($row = mysqli_fetch_assoc($res)) {
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['ProductName']."'> </input><br>";
                       
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['Quantity']."'> </input><br>";
                     
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['CreatedOn']."'> </input><br>";
                        
                        echo"<input  readonly style='width:40%;' class='form-control' value='".$row['UpdatedOn']."'></input><br>";
                
                      
             }

             mysqli_close($con);
        ?>
        <a href="?product=delete&Pname=<?php echo $id; ?>"><button style="width:20%;" class="btn btn-danger">DELETE</button></a>
        <a href="?product=cancel&Pname=<?php echo $id; ?>"><button style="width:20%;" class="btn btn-success">CANCEL</button></a><br>
        <label class="font"><h3><?php  echo $result ?></h3></label><br>
</div>
</body>
</html>