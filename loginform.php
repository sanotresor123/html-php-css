<?php
session_start();
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
			<h3><u>Login Form</u></h3>
        </div>
		<div id="content">
		
		<?php
		if (isset($_POST["loginbtn"])) {
			$username=$_POST["un"];
			$password=$_POST["pw"];
			include "connect.php";
			$query=mysqli_query($con,"select * from users where username='$username' and password='$password'");
			if(mysqli_num_rows($query)>0)
			{
             while ($row=mysqli_fetch_array($query))
              {
             	$_SESSION['password']=$row['password'];
             	header("location:home.php");
             }
			}
             else{
             	echo "username/password is incorrect";
             	header("refresh:3;");
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