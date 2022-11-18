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
			?>
        </div>
		<div id="content">
				<h1><u>Record Teacher</u></h1>
		<form action=""method="POST">
			<table border="0">
				<tr><td><select name="c_id">
					<option>please select Child</option>
					<?php
					 include "connect.php";
					 $query=mysqli_query($con,"select*from child order by fname desc");
					 while ($row=mysqli_fetch_array($query))
					{
					?>
					<option><?php echo $row["fname"];?></option>
					<?php
				    }
					?>
						</select><td></td>
					<td><input type="submit" name="check" value="Check"></td>
				</tr>
			</table>
		</form>
		<?php
		if (isset($_POST["check"]))
		{
			$c_id=$_POST['c_id'];
			
			include "connect.php";
			$check=mysqli_query($con,"select * from child  inner join client on client.client_id=child.client_id and child.child_id=child_id where child_id='$c_id'");
			while ($rowchck=mysqli_fetch_array($check)) {
				?>
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="c_id" value="<?php echo $rowchck['child_id'];?>" readonly></td></tr>
 			<tr><td></td><td><input type="hidden" name="client_id" value="<?php echo $rowchck['client_id'];?>" readonly></td></tr>
 			<tr><td>fname</td><td><input type="text" name="mdl" value="<?php echo $rowchck['fname'];?>" readonly></td></tr>
				<tr><td>lname</td><td><input type="text" name="pln" value="<?php echo $rowchck['lname'];?>" readonly></td></tr>
				<tr><td>age</td><td><input type="text" name="typ" value="<?php echo $rowchck['age'];?>" readonly></td></tr>
				<tr><td>client name</td><td><input type="text" name="cln" value="<?php echo $rowchck['client_name'];?>" readonly></td></tr>
				<tr><td>client phone</td><td><input type="text" name="clp" value="<?php echo $rowchck['client_phone'];?>"readonly></td></tr>
			<tr><td>Tfname</td><td><input type="text" name="tfn"></td></tr>
			<tr><td>Tlname</td><td><input type="text" name="tln"></td></tr>
			<tr><td>Age</td><td><input type="text" name="ag"></td></tr>
			<tr><td>Telephone</td><td><input type="text" name="tl" value="+250"></td></tr>
			<tr><td>Degree</td><td><input type="file" name="dg"></td></tr>
			<tr><td></td><td><input type="file" name="file"></td></tr>
			<tr><td></td><td><input type="submit" value="save teacher" name="savebtn"></td></tr>	
			</table>
				
		</form>
		 <?php
}}
?>
<?php
if (isset($_POST['savebtn'])) {
			$tfname=$_POST['tfn'];
			$tlname=$_POST['tln'];
			$tage=$_POST['ag'];
			$telephone=$_POST['tl'];
            $dg=$_POST['dg'];
            $c_id=$_POST['c_id'];
			include "connect.php";
			$query=mysqli_query($con,"INSERT INTO `teacher`VALUES ('','$tfname','$tlname','$tage','$c_id','$telephone','$dg')");
			if ($query) {
				echo "TEACHER INSERTED";
				header("refresh:3;");
			}
			else
			{
				echo "failed";
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