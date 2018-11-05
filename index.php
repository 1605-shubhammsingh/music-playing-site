<!doctype html>
<html>
<head>
<title>Login</title>
<link type="text/css" rel="stylesheet" href="stylesheetlogin.css">
</head>
<body>
<div class="topnav">
	<a href="">Home</a>
	<a href="">About</a>
	<a href="">Contact</a>
	
	<form name="form1" method="POST" action="search.php">
			<input type="text" name="search" placeholder="Search..">
			</form>
</div> 
<div class="sidenav">
	<img src="logo.jpg"><br>
	<a href="#">Developed By:-</a>
	<a href="#">Shubham Singh</a>
</div>
<div id="form">
	<center><h3>Welcome User</h3><h4>Kindly login by providing the following details.</h4></center>
    <center>
			<?php
			session_start();
			//unset($_SESSION['user']);
			$conn = mysqli_connect("localhost", "root", "", "users");
			if($conn->connect_error){
			die("Connection failed" . $conn->connect_error);
			}
			if(isset($_POST['email']))
			{$un = $_POST['email'];
			$pw = $_POST['password'];
			//$sql="select*from logindetails;";
			$stmt=$conn->prepare("select email,password from user where email=? and password=? LIMIT 1;");
			$stmt->bind_param("ss", $un, $pw); //each s stands for one bind variable it can be any other character other than s also
			$stmt->execute();
			$stmt->bind_result($un, $pw);
			$stmt->store_result();
			if($stmt->num_rows==1){
				//session_start();
			$_SESSION['email']=$un;
			header("Location: ./home.html");
			//$_SESSION['user']=$un;
			//exit();
			}
			else{
			$message = "Invalid username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
			}
			}
			//if($result->num_rows>0){
			//while($row=$result->fetch_assoc()){
			//echo "<br>".$row["sr_no"]." ".$row["user"]." ".$row["name"];
			//else{
			//echo "0 results";
			//}
			?>	
    <form name="myForm" method="post" autocomplete="off">
	<center><img src="login.jpg"></center>
        <table>
            <tr><td>Email Id:</td><td><input type="email" name="email" required></td></td></tr>
			<tr><td>Password:</td><td><input type="password" name="password" required></td></tr>
			
		</table>
		<input type="submit" value="Submit">
		<center><h3>Don't Have One?<br><a href="signup.html">Register With Us</a></h3></center>

	</form></center>
	
</div>
</body>
</html>