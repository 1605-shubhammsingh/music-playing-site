<?php
	
	$conn = mysqli_connect('localhost', 'root', '');
	if(!$conn)
	{
		echo "Server Not Connected";
	}
	if(!mysqli_select_db($conn, 'users'))
	{
		echo "Database not Selected";
	}
	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $result = "SELECT * FROM user WHERE email='$email'";
    $already1 = mysqli_query($conn, $result);
    if (mysqli_fetch_array ($already1) > 0) {
    
        //$_SESSION['message'] = 'User with this email already exists!';
        print("<script>window.alert('User With This Email Address Already Registered');</script>");
        header("refresh:0; url=login.html");
    }
    else{
        $sql = "INSERT INTO user (name, age, gender, email, password) VALUES ('$name', '$age', '$gender', '$email', '$password')";
        if(!mysqli_query($conn, $sql))
        {
            print("<script>window.alert('User Already Registered!');</script>");
         }
        else 
        {
            print("<script>window.alert('Congratulations!! You are Registered.');</script>");
        }
        header("refresh:0; url=login.html");
    }
	$conn->close();
?>	