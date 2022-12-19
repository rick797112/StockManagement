<?php
    $qnty = 0;
    $date=date("y-m-d");
    include("../Include/database.php");
    $pname = $_GET['Pname'];
  
    $sql = "select Quantity from addproduct where ProductName = '".$pname."'";
   
    mysqli_query($con,$sql);
    if ($res = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $qnty = $row['Quantity'];
        }
        $inc = $qnty - 1;
       
        $sql1 = "update addproduct set Quantity='".$inc."',UpdatedOn='".$date."' where ProductName = '".$pname."'";
        if(mysqli_query($con,$sql1))
            header("Location:productSale.php");
    }
    
  ?>
</body>
</html>