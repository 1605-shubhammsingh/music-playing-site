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
    if (mysqli_query($conn, $result->num_rows > 0 )) {
    
        //$_SESSION['message'] = 'User with this email already exists!';
        // print("<script>window.alert('This is a javascript alert from PHP');</script>");
    }
    else{
        $sql = "INSERT INTO user (name, age, gender, email, password) VALUES ('$name', '$age', '$gender', '$email', '$password')";
        if(!mysqli_query($conn, $sql))
        {
            print("<script>window.alert('User Already Registered');</script>");
         }
        else 
        {
            print("<script>window.alert('Record Inserted');</script>");
        }
        header("refresh:0; url=login.html");
    }
	$conn->close();
?>	