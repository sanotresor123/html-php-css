<?php
session_start();
if(isset($_SESSION['password']))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style123.css">
</head>
<body>
	<div id="layout">
		<div id="banner">
			<?php
			include "title.php";
			?>
		</div>
		<div id="menu">
			<?php
			include "menu.php";
			include "connect.php";
			?>
        </div>
		<div id="content">
			<h1><u>Update Child</u></h1>
			<?php
             $vid=$_GET["vehicle_id"];
             $select=mysqli_query($con,"select * from child inner join client  on client.client_id=child.client_id WHERE child_id='$vid'");
			while($rw=mysqli_fetch_array($select))
			{
				$clientn=$_POST['client_name'];
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$age=$_POST['age'];
				$lesson=$_POST['lesson'];
            }
			?>
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="clientId" value="<?php echo $rowchck["client_id"];?>" readonly></td></tr>
            <tr><td>Client Name</td><td><input type="text" name="clientna" value="<?php echo $rowchck["clientn"];?>" readonly></td></tr>
				<tr><td>Client Phone</td><td><input type="text" name="clientpo" value="<?php echo $rowchck["phone_number"];?>" readonly></td></tr>
				<tr><td>Price</td><td><input type="number" name="price" value="<?php echo $rowchck["price"];?>" readonly></td></tr>
				<tr><td>Child Firstname:</td><td><input type="text" name="fn" value="<?php echo $rowchck["fname"];?>"></td></tr>
				<tr><td>Child Lastname:</td><td><input type="text" name="ln" value="<?php echo $rowchck["lname"];?>"></td></tr>
				<tr><td>Age:</td><td><input type="text" name="ag" value="<?php echo $rowchck["age"];?>"></td></tr>
				<tr><td>Lesson:</td><td><input type="text" name="lss" value="<?php echo $rowchck["lesson"];?>"></td></tr>
				<tr><td></td><td><input type="submit" value="Update Vehicle" name="savebtn"></td>
				</tr>	
			</table>
		</form>
		 
 <?php
 if (isset($_POST['savebtn'])) {
   $client_id=$_POST['clientId'];
   $fname=$_POST['fn'];
   $lname=$_POST['ln'];
   $age=$_POST['ag'];
   $lesson=$_POST['lss'];
 	include "connect.php";
 	$query=mysqli_query($con,"UPDATE child SET fname='$fname',lname='$lname',age='$age',lesson='$lesson' WHERE child_id='$vid'");
 	if ($query) 
 	{
 		
 		echo "CHILD UPDATED SUCCESSFULLY";
 		header("location:viewchild.php");
 	}
 }
 ?> 
    </div>
		<div id="footer">
			<?php
			include "footer.php";
			?>
		</div>
	</div>

</body>
</html>
<?php
}
else
{
header("location:loginform.php");
}
?>