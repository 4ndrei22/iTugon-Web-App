<?php
	include 'connect.php';
	session_start();
    if(isset($_SESSION["usernameL"]) && $_SESSION["passwordL"]){
	 	header('Location: Dashboard(staff).php');
    }
    $user = $_POST["usernameL"];
	$pass = $_POST["passwordL"];

    $username = "";
    $password = "";
	$accessLVL = "";

    $select = "SELECT * FROM accountcreation WHERE username = '$user'";
    $result = mysqli_query($con,$select);

    
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
			if($row["adminKey"] == "Staff"){
				$_SESSION["UsernameL"] = $user;
				$_SESSION["passwordL"] = $pass;
				header("Location: ../Dashboard(staff).php");
				}else{
				$_SESSION["UsernameL"] = $user;
				$_SESSION["passwordL"] = $pass;
				header("Location: ../Dashboard(super).php");
				}
			
        }
    }
        
    if($user == $username && password_verify($pass,$hashpass)){
		//if($accessLVL == 'Staff'){
			$_SESSION["UsernameL"] = $username;
			$_SESSION["PasswordL"] = $password;
			echo '<script>alert("Login Successful");</script>';
        	header("Location: ../Dashboard(staff).php");
		// }else{
		// 	echo '<script>alert("Login Successful");</script>';
        // 	header("Location: ../Dashboard(super).php");
		// }
    }else{
        echo "Incorrect Email or Password";
        header('refresh: 1, url = ../login.php');

    }
	// session_start();
	// if(isset($_SESSION["usernameL"]) && isset($_SESSION["passwordL"]))
	// {
	// 	header('Location: Dashboard(super).php');
	// 	header('Location: Dashboard(staff).php');
	// }
	// $user = $_POST["usernameL"];
	// $pass = $_POST["passwordL"];

	// $sql = "SELECT adminKey FROM `accountcreation` WHERE Username = '$user' and Password = '$pass'";
	// $result = mysqli_query($con, $sql);

	// if(mysqli_num_rows($result) > 0)
    // {
	// 	while ($row = mysqli_fetch_array($result)){
	// 		if($row["adminKey"] == "Staff"){
	// 			$_SESSION["userL"] = $user;
	// 			$_SESSION["passwordL"] = $pass;
	// 			header("Location: ../Dashboard(staff).php");
	// 		}
	// 		else{
	// 			$_SESSION["userL"] = $user;
	// 			$_SESSION["passwordL"] = $pass;
	// 			header("Location: ../Dashboard(super).php");
	// 		}
	// 	}
		
		
	// }
	// else
	// {
	// 	echo ("Login Failed. You will be redirected in 3 sec.");
	// 	header("refresh: 1; url=../Login.php");
	// }
	 mysqli_close($con);
?>