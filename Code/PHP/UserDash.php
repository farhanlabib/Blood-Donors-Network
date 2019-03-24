<?php
	session_start();

	if(isset($_SESSION['logged_in']) && $_SESSION['Type']=="User"){
		require 'GetUserInformation.php';
		$getUserInfo = GetUserInformation2P("User",$_SESSION['EmailID']);
	}else{
		if ($_SESSION['Type']=="Admin") {
			header("location: AdminDash.php");
		}else{
			header("location: Login.php");
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if (isset($_POST['logOut'])) {
			session_unset();
			session_destroy();
			header("location: Login.php");
		}else if (isset($_POST['update'])) {
			//
		}
	}
?>

<!DOCTYPE html>
<html>
<head>


<!-- 
	<title>Welcome to Blood Donors Network</title> -->
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

 <br>
    <div class="w3-container w3-center w3-animate-left">
    <h1>Welcome To Blood Donors Network</h1>
  </div>

  <!--   <div class="w3-container w3-center w3-animate-left">
    <h1>Welcome To Blood Donors Network</h1 -->
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
			font-family:"Times New Roman";
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
<!-- 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="MainContent">
 <br/>
	<!-- <h1 style="color: black;">Welcome to Blood Donors Network</h1> -->
	<div style="font-size: 18px; color:green"> <b>Go to </b><label><a href="/Blood Donors Network/HomeMain.php"><i class="fa fa-home" style="font-size:48px;"></i></a></label></div>
		<p style="font-size: 18px">Hi, <?php echo $getUserInfo['FirstName']?> </p>

<!-- 	 <div class="nav2">
  <link href='stylenav3.css' rel='stylesheet'>
  <ul>
    <li><a href="/Blood Donors Network/HomeMain.php"> <i class="fa fa-home"> </i> Home</a></li>
    <li><a href="/Blood Donors Network/Home.php"> <i class="fa fa-search-plus" style="font-size:15px"> </i> Donor List</a></li>
    <li><a href="/Blood Donors Network/Login.php"><i class="fa fa-address-book-o" style="font-size:20px"></i> Login</a></li>
    <li><a> Contact Us</a></li>
  </ul>
</div>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->



<link rel="stylesheet" type="text/css" href="styleUser.css">

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="loginbox">
				<div class="inputbox">
					<br/>
					<lable>First Name : </label> 
					<input type="text" name="firstname" value='<?php echo $getUserInfo['FirstName']; ?>' required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<label>Last Name : </label>
					<input type="text" name="lastname" value="<?php echo $getUserInfo['LastName']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Email ID : </lable>
					<input type="email" name="email" value="<?php echo $getUserInfo['EmailID']; ?>" disabled>
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Password : </lable>
					<input type="password" name="password" value="<?php echo $getUserInfo['Password']; ?>" required="">
					<br /><br />
			    </div>

				<div class="inputbox">
					<lable>Phone Number :</lable>
					<input type="text" name="phone" value="<?php echo $getUserInfo['PhoneNumber']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<label>Birth Date : </label>
					<input type="Date" name="birthDate" value="<?php echo $getUserInfo['BirthDate']; ?>">
					<br><br>
			    </div>

			    <label>Gender : <?php echo $getUserInfo['Gender']; ?></label>
			    <br /><br />

			    <label>Blood Group : <?php echo $getUserInfo['BloodGroup']; ?></label>
			    <br /><br />

			    <div class="inputbox">
					<lable>Division :</lable>
					<input type="text" name="phone" value="<?php echo $getUserInfo['Division']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>District :</lable>
					<input type="text" name="phone" value="<?php echo $getUserInfo['District']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Area :</lable>
					<input type="text" name="phone" value="<?php echo $getUserInfo['Area']; ?>" required="">
					<br /><br />
				</div>

				<label>Want to donate your blood?<br /><b style="color: green;"><?php echo $getUserInfo['Status']; ?></b></label>
			    <br /><br />
				<div class="inputbox">
				<input type="submit" name="update" value="Update">
				<input type="submit" name="logOut" value="Log out">
				</div>

			</div>
			</form>
</body>
</html>