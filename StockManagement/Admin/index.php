<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <?php include("../Include/cdn.php");   ?>
	<script>
         //function that display value
         function dis(val)
         {
             document.getElementById("result").value+=val
         }
           
         //function that evaluates the digit and return result
         function solve()
         {
             let x = document.getElementById("result").value
             let y = eval(x)
             document.getElementById("result").value = y
         }
           
         //function that clear the display
         function clr()
         {
             document.getElementById("result").value = ""
         }
      </script>
	  <style>
		input[type="button"]
         {
         background-color:green;
         color: black;
         border: solid black 2px;
         width:100%
         }
  
         input[type="text"]
         {
         background-color:white;
         border: solid black 2px;
         width:100%
         }

	  </style>
</head>
<body>
    <?php include("../include/navbar.php");  ?>

    <?php include("../Include/Title.php") ?>


<div class="container" >
	<div style="height: 300px;
				width: 45%;
				background-color: powderblue;
				float : left;
				padding-top : 60px;
				padding-left : 30px;
				margin-right :10px;
				border-radius : 5px;"				
		 class="container">
		 <form action="?" method="post">
		<input required name= "amt" class="form-control" placeholder="ENTER AMOUNT" text="number"><br>

		<select class= "form-control" name="services">
		<option value="OTHERS">--SELECT-- </option> 
		<?php include("../Include/database.php"); 
		$sql1 = "select * from ratecard";   
            if ($result = mysqli_query($con, $sql1))          
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row["Services"]."'>".$row["Services"]."</option>";           
            }
        
			mysqli_close($con);
			
		?>
		 </select><br>
		<button name="save" class="btn btn-success">SELL</button>

		<?php
		$services = "";
		$price = "";
		

        if(isset($_POST["save"])){
            $name = $_POST["services"];
            $price = $_POST["amt"];
            $date = date("y-m-d");

            include("../Include/database.php");

			$sql = "insert into dailyanalysis values('".strtoupper($name)."','".$price."','".$date."')";
			

            if(mysqli_query($con,$sql))
                echo"<script> alert('Price Added'); </script>";
            else 
				echo"<script> alert('Something Went Wrong'); </script>";
        }     
?>



	</div>
</div>
	<div class = "container" style="border-radius : 5px; background-color: powderblue; width: 45%; height: 80px;"><b>SHOP CALCULATOR</b></div>
		 <table width="500" height="250">
         <tr>
            <td colspan="3"><input type="text" id="result"/></td>
            <!-- clr() function will call clr to clear all value -->
            <td><input type="button" value="c" onclick="clr()"/> </td>
         </tr>
         <tr>
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><input type="button" value="1" onclick="dis('1')"/> </td>
            <td><input type="button" value="2" onclick="dis('2')"/> </td>
            <td><input type="button" value="3" onclick="dis('3')"/> </td>
            <td><input type="button" value="/" onclick="dis('/')"/> </td>
         </tr>
         <tr>
            <td><input type="button" value="4" onclick="dis('4')"/> </td>
            <td><input type="button" value="5" onclick="dis('5')"/> </td>
            <td><input type="button" value="6" onclick="dis('6')"/> </td>
            <td><input type="button" value="-" onclick="dis('-')"/> </td>
         </tr>
         <tr>
            <td><input type="button" value="7" onclick="dis('7')"/> </td>
            <td><input type="button" value="8" onclick="dis('8')"/> </td>
            <td><input type="button" value="9" onclick="dis('9')"/> </td>
            <td><input type="button" value="+" onclick="dis('+')"/> </td>
         </tr>
         <tr>
            <td><input type="button" value="." onclick="dis('.')"/> </td>
            <td><input type="button" value="0" onclick="dis('0')"/> </td>
            <!-- solve function call function solve to evaluate value -->
            <td><input type="button" value="=" onclick="solve()"/> </td>
            <td><input type="button" value="*" onclick="dis('*')"/> </td>
         </tr>
      </table>
	</div>
<br><br><br>
        <footer class="container footer-distributed">
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <span>Dean Dayal Path
                            Lalmati
					 </span>
						Guwahati Assam 781029
				</div>
 
				<div>
					<i class="fa fa-phone"></i>
					<span>+91 9862799274</span>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<span><a href="mailto:giftsandjunks@gmail.com">giftsandjunks@gmail.com</a></span>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span><b>About the Shop:</b></span>
					Maa Durga Sationary Provides all solutions for stationary related items</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer><br><br><br/>
</body>
</html>