<?php
	session_start();

	if(isset($_SESSION['logged_in']) && $_SESSION['Type']=="Admin"){
		require_once 'GetUserInformation.php';
		$getAdminInfo = GetUserInformation2P("Admin",$_SESSION['EmailID']);
		$st ="";
	}else{
		if ($_SESSION['Type']=="User") {
			header("location: UserDash.php");
		}else{
			header("location: Login.php");
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['logOut'])){
			session_unset();
			session_destroy();
			header("location: Login.php");
		}else if(isset($_POST['update'])){
			$firstName = test_input($_POST["firstname"]);
			$lastName = test_input($_POST["lastname"]);
			// $emailID = test_input($_POST["email"]);
			require 'DB.php';
			$password = $conn->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));
			$phoneNumber = test_input($_POST["phone"]);
			$birthDate = $_POST["birthDate"];
			$gender = $_POST["gender"];
			// $bloodGroup = test_input($_POST["bloodGroup"]);
			$division = test_input($_POST["division"]);
			$district = test_input($_POST["district"]);
			$area = test_input($_POST["area"]);

		if (!empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["birthDate"]) && !empty($_POST["gender"]) && !empty($_POST["division"]) && !empty($_POST["district"])) {
			
				require 'GetUserInformation.php';

				updateAdminInfo($_POST['firstname'], $_POST['lastname'], $_POST['email']);
				// {
				// 	echo "<script>alert('Information saved..')</script>";
				// }else{
				// 	echo "<script>alert('Information failed to save..')</script>";
				// }
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
	<title>Admin | Blood Donors Network</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<head>
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


<body>




<div class="navigation_page">

 
    <div class="w3-container w3-center w3-animate-left">
      <br>
    <h1 style="font-family:"Times New Roman">Welcome To Blood Donors Network</h1>
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

	

	<meta charset="utf-8">
	<style type="text/css">
		.MainContent{
			text-align: center;
			font-family: "Times New Roman";
			color: black;

		}
		body{

	background: url(back3.jpg) center center fixed;
	background-repeat:no-repeat;}
	.par{
	 color:red;
	 font-style: italic;
	 text-align: right;
}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="MainContent">
	<nav class="navbar navbar-dark bg-red">
	  <a class="navbar-brand"></a>
	  <form class="form-inline">
	  	<label class="btn btn-success"><a href="/Blood Donors Network/AdminDashUpdate.php" style="color: black" >Update Area</a></label>
	    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
	    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
	  </form>
	</nav>

	<!-- <h1 style="color:black">Welcome to Blood Donors Network</h1> -->
<!-- <div style="font-size: 18px; color:green; text-align: left"> <b>Go to </b><label><a href="/Blood Donors Network/HomeMain.php"><i class="fa fa-home" style="font-size:48px;"></i></a></label></div> -->
		<p style="font-size: 18px">Hi, <?php echo $getAdminInfo['FirstName']?> </p>

<!-- 
 <div class="nav2">
  <link href='stylenav2.css' rel='stylesheet'>
  <ul>
    <li><a href="/Blood Donors Network/HomeMain.php"> <i class="fa fa-home"> </i> Home</a></li>
    <li><a href="/Blood Donors Network/Home.php"> <i class="fa fa-search-plus" style="font-size:15px"> </i> Donor List</a></li>
    <li><a href="/Blood Donors Network/Login.php"><i class="fa fa-address-book-o" style="font-size:20px"></i> Login</a></li>
    <li><a style="color: white"> Contact Us</a></li>
  </ul>
</div>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->



<link rel="stylesheet" type="text/css" href="styleAdmin.css">

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				
			<div class="loginbox"> 
				<div class="inputbox">
					<br/>
					<lable style="color: black">First Name : </label> 
					<input type="text" name="firstname" value='<?php echo $getAdminInfo['FirstName']; ?>' required="">
					<br/><br/>
				</div>

				<div class="inputbox">
					<label style="color: black">Last Name : </label>
					<input type="text" name="lastname" value="<?php echo $getAdminInfo['LastName']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable style="color: black">Email ID : </lable>
					<input type="email" name="email" value="<?php echo $getAdminInfo['EmailID']; ?>" disabled>
					<br /><br />
				</div>

				<div class="inputbox">
					<lable style="color: black">Password : </lable>
					<input type="password" name="password" value="<?php echo $getAdminInfo['Password']; ?>" required="">
					<br /><br />
			    </div>

				<div class="inputbox">
					<lable style="color: black">Phone Number :</lable>
					<input type="text" name="phone" value="<?php echo $getAdminInfo['PhoneNumber']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<label style="color: black">Birth Date : </label>
					<input type="Date" name="birthDate" value="<?php echo $getAdminInfo['BirthDate']; ?>">
					<br><br>
			    </div>

			     <label style="color: black">Gender : <?php echo $getAdminInfo['Gender']; ?></label>
			    <br /><br />
<!--  -->
<!-- 			    <label style="color: black">Gender : 
			    	<input type="text" name="gender" value="<?php echo $getAdminInfo['Gender']; ?>">
			    </label>
			    <br /><br /> -->

			    <label style="color: black">Blood Group : </label>
			    <select id="soflow" name="bloodGroup">
				  <option value="A+" <?php if($getAdminInfo['BloodGroup']=="A+"){echo "selected";}?>>A+</option>
				  <option value="A-" <?php if($getAdminInfo['BloodGroup']=="A-"){echo "selected";} ?>>A-</option>
				  <option value="AB+" <?php if($getAdminInfo['BloodGroup']=="AB+"){echo "selected";} ?>>AB+</option>
				  <option value="AB-" <?php if($getAdminInfo['BloodGroup']=="AB-"){echo "selected";} ?>>AB-</option>
				  <option value="B+" <?php if($getAdminInfo['BloodGroup']=="B+"){echo "selected";} ?>>B+</option>
				  <option value="B-" <?php if($getAdminInfo['BloodGroup']=="B-"){echo "selected";} ?>>B-</option>
				  <option value="O+" <?php if($getAdminInfo['BloodGroup']=="O+"){echo "selected";} ?>>O+</option>
				  <option value="O-" <?php if($getAdminInfo['BloodGroup']=="O-"){echo "selected";} ?>>O-</option>
				  <span class="error"><?php echo $bloodGroupErr; ?></span>
				</select>
				<br />
				<br />

			    <!-- <label>Blood Group : <?php echo $getAdminInfo['BloodGroup']; ?></label>
			    <br /><br /> -->

			    <div class="inputbox">
					<lable style="color: black">Division :</lable>
					<input type="text" name="division" value="<?php echo $getAdminInfo['Division']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable style="color: black">District :</lable>
					<input type="text" name="district" value="<?php echo $getAdminInfo['District']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable style="color: black">Area :</lable>
					<input type="text" name="area" value="<?php echo $getAdminInfo['Area']; ?>" required="">
					<br /><br />
				</div>
				<div class="inputbox">
				<input type="submit" name="update" value="Update">
				<input type="submit" name="logOut" value="Log out">
			   </div>
			</div>
			</form>	
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>