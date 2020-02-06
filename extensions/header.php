<?php
	/* VARIABLES */
	$schools = array("School One", "School Two", "School Three", "School Four", "School Five");
	$schoolOnePrograms = array("Program 1_One", "Program 1_Two", "Program 1_Three", "Program 1_Four", "Program 1_Five");
	$schoolTwoPrograms = array("Program 2_One", "Program 2_Two", "Program 2_Three", "Program 2_Four", "Program 2_Five");
	$schoolThreePrograms = array("Program 3_One", "Program 3_Two", "Program 3_Three", "Program 3_Four", "Program 3_Five");
	$schoolFourPrograms = array("Program 4_One", "Program 4_Two", "Program 4_Three", "Program 4_Four", "Program 4_Five");
	$schoolFivePrograms = array("Program 5_One", "Program 5_Two", "Program 5_Three", "Program 5_Four", "Program 5_Five");

	/* INDEX SCHOOL */
	$schoolVisibility = isset($_GET["schoolVisibility"]) ? $_GET["schoolVisibility"] : 'true';
	$studentSchool = isset($_SESSION["studentSchool"]) ? $_SESSION["studentSchool"] : NULL;

	$schoolArray = array('SoEEaC' => 'School of Electrical Engineering and Computing.', 
						 'SoCEaA' => 'School of Civil Engineering and Architecture.', 
						 'SoMMCE' => 'School of Mechanical, Material and Chemical Engineering.', 
						 'SoE' => 'School of Engineering.', 
						 'SoE' => 'School of Engineering');

	$unify = date("H_i_A_jS_n_Y");

	/* SEARCH RESULTS */
	$searchKeyI = isset($_GET["searchKey"]) ? $_GET["searchKey"] : "Search Here";
	$searchKey = wordwrap($searchKeyI, 45, '<br />', true);

	$searchFilter = isset($_GET["searchFilter"]) ? $_GET["searchFilter"] : 'Title';

	//Open Database Connection
	$connectDB = mysqli_connect("localhost", "root", "", "ASTUInfoDesk");
	if(mysqli_connect_errno())
		die ("Sorry! Database Connection Failed : " . mysqli_connect_error() . "(" . mysqli_connect_errno() . "). Try Again Later!");

	//Catch user
	session_start();
	$userID = isset($_SESSION["userID"]) ? $_SESSION["userID"] : NULL;
	$userType = isset($_SESSION["userType"]) ? $_SESSION["userType"] : NULL;

	$userDetailsArray = array("userID" => $userID, "userType" => $userType, "userName", "userClass", "userUserName", "userSchool", "userProgram", "teacherRegisterID", "teacherRegisterDate", "password", "securityQuestion");
	function getPassword($gpUserName){
		//Open Database Connection
		$connectDB = mysqli_connect("localhost", "root", "", "ASTUInfoDesk");

		$gpCommandString = "SELECT * FROM logintable WHERE userName = '$gpUserName' LIMIT 1";

		$gpSelectFromDB = mysqli_query($connectDB, $gpCommandString);

		if($gpRow = mysqli_fetch_assoc($gpSelectFromDB)){
			//Close Database Connection
			mysqli_close($connectDB);
			return array("password" => $gpRow["password"], "securityQuestion" => $gpRow["securityQuestion"]);
		}
	}
	
	//ADMIN
	if($userType == "PROGRAM ADMIN" || $userType == "SCHOOL ADMIN"){
		$cuCommandString1 = "SELECT * FROM Admin WHERE adminID = '$userID' LIMIT 1";

		$cuSelectFromDB1 = mysqli_query($connectDB, $cuCommandString1);

		$cuRow1 = mysqli_fetch_assoc($cuSelectFromDB1);
		
		$userDetailsArray["userName"] = $cuRow1["adminName"];
		$userDetailsArray["userClass"] = $cuRow1["adminClass"];
		$userDetailsArray["userUserName"] = $cuRow1["adminUserName"];
		$userPSQ = getPassword($userDetailsArray["userUserName"]);
		$userDetailsArray["password"] = $userPSQ["password"];
		$userDetailsArray["securityQuestion"] = $userPSQ["securityQuestion"];
		
		//PROGRAM ADMIN
		if($userType == "PROGRAM ADMIN") {
			$cuCommandString2 = "SELECT * FROM programadmin WHERE adminID = '$userID' LIMIT 1";

			$cuSelectFromDB2 = mysqli_query($connectDB, $cuCommandString2);

			$cuRow2 = mysqli_fetch_assoc($cuSelectFromDB2);

			$userDetailsArray["userSchool"] = $cuRow2["adminSchool"];
			$userDetailsArray["userProgram"] = $cuRow2["adminProgram"];
		}
		
		//SCHOOL ADMIN
		else if ($userType == "SCHOOL ADMIN") {
			$cuCommandString2 = "SELECT * FROM SchoolAdmin WHERE adminID = '$userID' LIMIT 1";

			$cuSelectFromDB2 = mysqli_query($connectDB, $cuCommandString2);

			$cuRow2 = mysqli_fetch_assoc($cuSelectFromDB2);

			$userDetailsArray["userSchool"] = $cuRow2["adminSchool"];
		}
	}
	
	//TEACHER
	else if($userType == "TEACHER") {
		$cuCommandString = "SELECT * FROM teacher WHERE teacherID = '$userID' LIMIT 1";

		$cuSelectFromDB = mysqli_query($connectDB, $cuCommandString);

		$cuRow = mysqli_fetch_assoc($cuSelectFromDB);

		$userDetailsArray["userName"] = $cuRow["teacherName"];
		$userDetailsArray["userUserName"] = $cuRow["teacherUserName"];
		$userDetailsArray["userSchool"] = $cuRow["teacherSchool"];
		$userDetailsArray["userProgram"] = $cuRow["teacherProgram"];
		$userDetailsArray["teacherRegistererID"] = $cuRow["teacherRegistererID"];
		$userDetailsArray["teacherRegDate"] = $cuRow["teacherRegDate"];
		$userDetailsArray["userClass"] = $cuRow["teacherClass"];
		
		$userPSQ = getPassword($userDetailsArray["userUserName"]);
		$userDetailsArray["password"] = $userPSQ["password"];
		$userDetailsArray["securityQuestion"] = $userPSQ["securityQuestion"];
	}

	//Close Database Connection
	mysqli_close($connectDB);
	
	//Set User School and Program
	if($userID){
		switch($userDetailsArray["userSchool"]){
			case $schools[0]:
				$schoolPrograms = $schoolOnePrograms;
				break;
			case $schools[1]:
				$schoolPrograms = $schoolTwoPrograms;
				break;
			case $schools[2]:
				$schoolPrograms = $schoolThreePrograms;
				break;
			case $schools[3]:
				$schoolPrograms = $schoolFourPrograms;
				break;
			case $schools[4]:
				$schoolPrograms = $schoolFivePrograms;
				break;
			default:
				$schoolPrograms = NULL;
				break;
		}
	}
	
	$submitSignOut = isset($_POST["submitSignOut"]) ? $_POST["submitSignOut"] : NULL;
	if($submitSignOut && $userDetailsArray["password"]){
		session_start();
		$_SESSION["userID"] = NULL;
		$_SESSION["userType"] = NULL;
		header("Location: signIn.php");
	}

	$submitSignIn = isset($_POST["submitSignIn"]) ? $_POST["submitSignIn"] : NULL;
	if($submitSignIn){
		header("Location: signIn.php");
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link href="extensions/stylesheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/Logo.png" />
</head>

<body>
	<section style="background-color: #333333; width: 100%">
		<header id="mainHeader">
			<div id="logos">
				<img src="images/title.png" width="33%" style="float: left; margin: 0% 2.5%;" />
			</div>

			<div id="headerLinksSr">
				<form action="searchResults.php" method="get">
					<input type="text" id="searchKey" name="searchKey" value="<?php echo $searchKey; ?>" />
				</form>
			</div>
			
			<div id="headerLinks">
				<form action="" method="post"><?php
					if($userID)
						echo '<input type="submit" name="submitSignOut" value="SIGN OUT" />';
					else
						echo '<input type="submit" name="submitSignIn" value="SIGN IN" />';
				?></form>
			</div>
			
			<div id="userDetails"><?php
			if($userID){
				if($userDetailsArray["userType"] == 'TEACHER')
					$profilePageLink = 'teacherPage.php';
				else if($userDetailsArray["userType"] == 'SCHOOL ADMIN' || $userDetailsArray["userType"] == 'PROGRAM ADMIN')
					$profilePageLink = 'adminPage.php';
				
				$userDetailsArray["userType"] = ucfirst(strtolower($userDetailsArray["userType"]));
				
				echo 'Signed in as : <a href="' . $profilePageLink . '">' . $userDetailsArray["userUserName"] . ' (' . $userDetailsArray["userType"] . ')</a>';
			}
			?></div>

		</header>
	</section>
	
	<nav id="mainNav">
		<table cellspacing="0%" cellpadding="1%" width="100%">
			<tr>
				<td width="20%"><a href="index.php"><big>H</big>OME</a></td>
				<td style="border-left: 2px solid #DDDDDD;"></td>
				<td width="20%"><a href="aboutUs.php"><big>A</big>BOUT <big>U</big>S</a></td>
				<td style="border-left: 2px solid #DDDDDD;"></td>
				<td width="20%"><a href="messages.php"><big>M</big>ESSAGES</a></td>
				<td style="border-left: 2px solid #DDDDDD;"></td>
				<td width="20%"><a href="handouts.php"><big>H</big>ANDOUTS</a></td>
				<td style="border-left: 2px solid #DDDDDD;"></td>
				<td width="20%"><a href="contactUs.php"><big>C</big>ONTACT <big>U</big>S</a></td>
			</tr>
		</table>
	</nav>

<script type="text/javascript">
	var searchKey = document.getElementById("searchKey");
	
	searchKey.onmousedown = function() {
		if(searchKey.value == "Search Here")
			searchKey.value = "";
	};
	
	searchKey.onkeypress = function() {
		if(searchKey.value != "Search Here")
			searchKey.style.color = '#333333';
	}

	searchKey.onblur = function() {
		if(searchKey.value == ""){
			searchKey.value = "Search Here";
			searchKey.style.color = '#999999';
		}
	}
</script>
	












