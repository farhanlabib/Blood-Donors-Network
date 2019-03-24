<?php
	session_start();

	require 'GetUserInformation.php';
	$getAllUserInfo = GetUserInformationDB1P("User");

	$fErr = "";
	$bG = "";

	$bGr = GetBloodGroup();
	

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if (isset($_POST["searchBtn"]) || isset($_POST['furtherSearch'])) {

			if(isset($_POST['searchBtn'])){
				if (!empty($_POST["search"]) || !empty($_POST['area1'])) {
					$getAllUserInfo =  GetUserInformationBySearch($_POST["search"], $_POST['area1']);
				}else{
					echo "Please type Division/District/Area name on search box";
				}
			}

			// if(isset($_POST['furtherSearch'])){
			// 	if(empty($_POST['search'])){
			// 		$fErr = "Please type an blood group";
			// 	}else
			// 	{
			// 		$getAllUserInfo = GetUserInformationBySearch($_POST['search'], $_POST['area1']);
			// 	}
			// }
		}

			if (isset($_POST["rateUSerBtn"])) {
				if(isset($_SESSION['logged_in']) && ($_SESSION['Type']=="Admin" || $_SESSION['Type']=="User" ) && !empty($_POST['userRate'])){
					//require 'GetUserInformation.php';
					$rowl = GetUserInformation2P($_SESSION['Type'],$_SESSION['EmailID']);
					$_SESSION['donarId'] = $_GET['donarId'];
					if($_SESSION['donarId']==$rowl['Id']){
						echo "<script>alert('Nice try! You can not rate yourself');</script>";
					}else{
						UserRating($_SESSION['donarId'], $_POST['userRate'], $rowl['Id']);
					}
				}else{
					echo "<script>alert('Please log in to rate user');</script>";
				}
			}
	}
?>

<!DOCTYPE html>
<html>
<head>

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


  <style type="text/css">
    .error{
      color: red;
    }
    .MainContent{
      text-align: center;
      font-family:Georgia;
      color: black;
    }
    .par{
   color:red;
   font-style: italic;
   text-align: right;
}

  </style>


<div class="navigation_page">

 
    <div class="w3-container w3-center w3-animate-left">
    	<br><br>
    <h1>Welcome To Blood Donors Network</h1>
      <p class="par">নেই হারাবার কোনও ভয়, নতুন প্রানের সঞ্চয়...
নিজের রক্ত বইছে অন্যের শিরায়, মানবতার এইতো পরিচয় ...<span class="w3-tag"></span></p>
  </div>



  <div class="w3-bar w3-light-grey">
    <a href="/Blood Donors Network/HomeMain.php" class="w3-bar-item w3-button">Home</a>
    <a href="/Blood Donors Network/Home.php" class="w3-bar-item w3-button">Donor List</a>
    <a href="/Blood Donors Network/Login.php" class="w3-bar-item w3-button">Login</a>
    <a href="/Blood Donors Network/ContactUs.php#" class="w3-bar-item w3-button">Contact Us</a>
  
    </div>
</div>





  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


	<title>Donor List | Blood Donors Network</title>
	<meta charset="utf-8">
	<style>
	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	td{
	    border: 3px solid #dddddd;
	    text-align: center;
	    padding: 8px;
	}
	th{
		border: 3px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #bc1e1e;
	}
	.MainContent{
		font-family: Times New Roman;
		text-align: center;
		color: black;
	}

</style>
</head>
<body class="MainContent">
	<!-- <h1>Welcome to Blood Donors Network</h1> -->

<link rel="stylesheet" type="text/css" href="styleHo.css">
<br>
<div class="col-1">
	<a class="btn btn-dark" style="text-decoration: none; font-size: 17px; text-align: right; color: white; " href="<?php
	$name = '';
	if (isset($_SESSION['logged_in']) && $_SESSION['Type']=='User') {
		$name = 'Go Profile';
		echo 'UserDash.php';
	}else if (isset($_SESSION['logged_in']) && $_SESSION['Type']=='Admin') {
		$name = 'Go Profile ';
		echo 'AdminDash.php';
	}else{
		$name = '';
	}
		?>"><?php echo $name; ?></a>
</div>
	<label>
		<?php
			if (isset($_SESSION['logged_in']) && $_SESSION['Type']=="User") {
				$row = GetUserInformation2P($_SESSION['Type'],$_SESSION['EmailID']);
				echo "<font color=green  size='4pt'>Hi, </font>" . $row['FirstName'] . "<br />";
			}else if (isset($_SESSION['logged_in']) && $_SESSION['Type']=="Admin") {
				$row = GetUserInformation2P($_SESSION['Type'],$_SESSION['EmailID']);
				echo "<b><font color=green  size='4pt'>Hi, </font> </b>" . $row['FirstName'] . "<br />";
			}else{
				echo "Please <a style= '" . 'text-decoration: none; color: cyan' . "' href='" . 'Login.php' . "'>Login</a> to rate user" . "<br /><br />";
			}
		?>
	</label>
	<table class="table table-dark table-hover">
		<tr>
			<th colspan="7">
				<form method="POST">
					Search Donar :
					<select name="area1">
						<?php $ar = getArea1(); ?>
						<?php while($r = $ar->fetch_assoc()){ ?>
					  		<option value="<?php echo $r['Area1']; ?>"><?php echo $r['Area1']; ?></option>
					 	<?php } ?>
					</select>
					<select name="search">
						<?php while($b = $bGr->fetch_assoc()) { ?>
					  <option value="<?php echo $b['BloodGroupName']; ?>"><?php echo $b['BloodGroupName']; ?></option>
					  <?php } ?>
					  <!-- <span class="error"><?php echo $bloodGroupErr; ?></span> -->
					</select>
					<!-- <input style="width: 50%; color: green;" type="text" name="search" title="Search donar by Blood Group/Division/District/Area" placeholder="Search donar by Blood Group/Division/District/Area" autocomplete="on"> -->
					<input type="submit" name="searchBtn" value="Search">
					<span><?php echo $fErr ?></span>
				</form>
			</th>
		</tr>
		<tr>
			<th colspan="7" style="text-align: center;font-style: italic;">User Information</th>
		</tr>
		<tr>
			<th>Full Name</th>
			<th>Blood Group</th>
			<th>Phone Number</th>
			<th>Want to Donate Blood?</th>
			<th>Living Area</th>
	<!-- 		<th>Reguest for blood</th> -->
			<th>See Profile</th>
		</tr>
		<?php
			if($getAllUserInfo->num_rows > 0){
				while ($rowValue = $getAllUserInfo->fetch_assoc()) {
				?>
			<tr>
				<td><?php echo $rowValue['FirstName'] . " " . $rowValue['LastName']; ?></td>
				<td><?php echo $rowValue['BloodGroup']; ?></td>
				<td><?php echo $rowValue['PhoneNumber']; ?></td>
				<td><?php echo $rowValue['Status']; ?></td>
				<!-- <td>
					Division : <?php echo $rowValue['Division'] ?><br />District : <?php echo $rowValue['District']; ?><br />Area: <?php echo $rowValue['Area']; ?>
				</td> -->
				<td><?php echo $rowValue['Area']; ?></td>
				<!-- <td><input type="submit" name="sendBloodRequest" value="Request for Blood"></td> -->
			<div class="col-3">
				<td><a href="CheckUser.php?email=<?php echo $rowValue['EmailID'] ?>" class="btn btn-secondary">View Profile</a></td>
			</div>
			</tr>
			<tr>
				<th colspan="7">
					<form method="POST" action="/Blood Donors Network/Home.php?donarId=<?php echo $rowValue['Id']; ?>">
					<label>Ratings: </label>
					<?php
							$value = GetUserRate('Rating', $rowValue['EmailID']);
							echo $value . "%";
					?>
					<br />&#10004; Rate this user
					<input type="radio" name="userRate" value="1"><label>1</label>
					<input type="radio" name="userRate" value="2"><label>2</label>
					<input type="radio" name="userRate" value="3"><label>3</label>
					<input type="radio" name="userRate" value="4"><label>4</label>
					<input type="radio" name="userRate" value="5"><label>5</label>
					<label><br />Tap Ok To Rate This User : </label>
					<input type="submit" name="rateUSerBtn" value="Ok">
				</form>
				</th>
			</tr>
		<?php
				}
			}else{
				?>
				<tr>
					<form method="POST">
					<td colspan="7" style="color: white; text-align: center;font-style: italic;">There's No Data Found. <input style="background-color: cyan;" type="submit" name="furtherSearch" value="Search More"></td>
				</form>
				</tr>
		<?php
			}
		?>
	</table>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	function test(argument) {
		$.ajax{
			type: 'GET',
			url: 'localhost:80/',
			success(result,status,xhr){
				return result;
			}
		}
	}
</script>
</html>