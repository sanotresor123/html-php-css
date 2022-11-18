<div class="dropdown">
				<button class="dropbtn">Client</button>
				<div class="dropdown-content">
					<a href="newclient.php">New Client</a>
					<a href="viewclient.php">View Client</a>
					
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Child</button>
				<div class="dropdown-content">
					<a href="newchild.php">New Child</a>
					<a href="viewchild.php">View Child</a>
		
				</div>
			</div>
				<div class="dropdown">
				<button class="dropbtn">Teacher</button>
				<div class="dropdown-content">
					<a href="newteacher.php">New Teacher</a>
					<a href="viewteacher.php">View Teacher</a>
					
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Account</button>
				<div class="dropdown-content">
					<a href="resetaccount.php">Reset Account</a>
				</div>
			</div>
			<div class="dropdown">
				<form action="home.php" method="POST">
				<button class="dropbtn" name="logoutbtn">Logout</button>
				</form>
							<?php
			if(isset($_POST['logoutbtn']))
			{
			session_destroy();
			header("location:loginform.php");
		}
			?>
			
		    </div>