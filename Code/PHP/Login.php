<?php
	
	session_start();

	$emailErr = $passwordErr = "";
	$emailID = $password = "";

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		if (empty($_POST["email"])) {
			$emailErr = "Email id is required.";
		}if (empty(($_POST["password"]))) {
			$passwordErr = "Password is required.";
		}

		if(!empty($_POST["email"]) && !empty($_POST["password"])){
			require 'DB.php';
			$email = $conn->escape_string($_POST['email']);
			$result = $conn->query("SELECT * FROM Admin WHERE EmailID ='$email'");
			$resultUser = $conn->query("SELECT * FROM User WHERE EmailID ='$email'");


			if($result->num_rows == 0 && $resultUser->num_rows == 0){
				echo '<script language="javascript">';
				echo 'alert("User does not exist!")';
				echo '</script>';
			}
			else if((!$result->num_rows == 0 || $resultUser->num_rows == 0) || ($result->num_rows == 0 || !$resultUser->num_rows == 0)){

				if ((!$result->num_rows == 0 || $resultUser->num_rows == 0)) {

					$user = $result->fetch_assoc();

					if (password_verify($_POST['password'], $user['Password'])) {

						$_SESSION['EmailID'] = $user['EmailID'];
						$_SESSION['Password'] = $user['Password'];
						$_SESSION['logged_in'] = true;
						$_SESSION['Type'] = "Admin";

						header("location: AdminDash.php");
					}
				}else if (($result->num_rows == 0 || !$resultUser->num_rows == 0)) {

					$user = $resultUser->fetch_assoc();

					if(password_verify($_POST['password'], $user['Password'])){

						$_SESSION['EmailID'] = $user['EmailID'];
						$_SESSION['Password'] = $user['Password'];
						$_SESSION['logged_in'] = true;
						$_SESSION['Type'] = "User";

						header("location: UserDash.php");
					}
				}
			}
		}
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
<!--  <div class="nav">
 	<link href='styleNav.css' rel='stylesheet'>
	<ul>
		<li><a href="/Blood Donors Network/HomeMain.php"> <i class="fa fa-home"> </i> Home</a></li>
		<li><a href="/Blood Donors Network/Home.php"> <i class="fa fa-search-plus" style="font-size:15px"> </i> Donor List</a></li>
		<li><a href="/Blood Donors Network/Login.php"><i class="fa fa-address-book-o" style="font-size:20px"></i> Login</a></li>
		<li><a>Contact Us</a></li>
	</ul>
</div> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login | Blood Donors Network</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<!-- <head> -->
<style>
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</style>
</head>


<!-- <body> -->




<div class="navigation_page">

 <br>
    <div class="w3-container w3-center w3-animate-left">
    <h1>Welcome To Blood Donors Network</h1>
      <p class="par">নেই হারাবার কোনও ভয়, নতুন প্রানের সঞ্চয়...
নিজের রক্ত বইছে অন্যের শিরায়, মানবতার এইতো পরিচয় ...<span class="w3-tag"></span></p>
  </div>



  <div class="w3-bar w3-light-grey">
    <a href="/Blood Donors Network/HomeMain.php" class="w3-bar-item w3-button">Home</a>
    <a href="/Blood Donors Network/Home.php" class="w3-bar-item w3-button">Donor List</a>
    <a href="/Blood Donors Network/Login.php" class="w3-bar-item w3-button">Login</a>
    <a href="/Blood Donors Network/ContactUs.php" class="w3-bar-item w3-button">Contact Us</a>
  
    </div>
</div>


<link rel="stylesheet" type="text/css" href="style2.css">
	<meta charset="utf-8">
	<style type="text/css">
		.error{
			color: red;
		}
		.MainContent{
			text-align: center;
			font-family:"Times New Roman";
			color: black;
		}
	</style>
<!-- </head> -->
<body class="MainContent">
	<!-- <h1>Please log in with your valid information</h1> -->

        <div class="loginbox"> 
        	<img src="login.png" class="re"> 
        	<br><br><br><br><br><br> 
        <h3>Login Here</h3>
       <form method="POST">
        <p> Email ID : </p>
		<div class="inputbox">
			<!-- <label>Email ID : </label> -->
			<input type="email" name="email" placeholder="Ex: example@example.com">
			<span class="error"><?php echo $emailErr; ?></span>
			<br><br>
		</div>
		<p> Password:</p>
		<div class="inputbox">
		<!-- 	<label>Password : </label> -->
			<input type="password" name="password" title="No limit">
			<span class="error"><?php echo $passwordErr; ?></span>
			<br><br>
	    </div>
		<div class="inputbox">
	    <input type="submit" name="submit" value="Submit">
		</div>
	</form>
	<label>Don't have an account?</label>
	<a href="/Blood Donors Network/Registration.php" style="text-decoration: none; color: cyan;">Sign up</a>
	<label> here.</label>

	<br />
	<label>Go to <a style="text-decoration: none; color: cyan;" href="/Blood Donors Network/HomeMain.php">Home</a></label>
</body>
</html>