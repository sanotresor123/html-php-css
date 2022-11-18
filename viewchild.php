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
			<h1><u>View Child</u></h1>
			<?php
			include "connect.php";
			$query=mysqli_query($con,"SELECT * FROM child INNER JOIN client WHERE client.client_id=child.client_id");
			echo "<table border=1>";
			echo "<tr>"."<th>"."NO"."</th>"."<th>"."fname"."</th>"."<th>"."lname"."</th>"."<th>"."age"."</th>"."<th>"."client_id"."</th>"."<th>"."Lesson"."</th>"."<th>"."Action"."</th>"."</tr>";
			$a=1;
			while($row=mysqli_fetch_array($query))
			{
            echo "<tr>"."<td>".$a."</td>"."<td>".$row["fname"]."</td>"."<td>".$row["lname"]."</td>"."<td>".$row["age"]."</td>"."<td>".$row["client_id"]."</td>"."<td>".$row["lesson"]."</td>"."<td>"."<a href=updatevehicle.php?vehicle_id=$row[child_id]>UPDATE"."/<a href=deletevehicle.php?vehicle_id=$row[child_id]>DELETE"."</td>"."</tr>";
            $a++;
			}
			echo "</table>";
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