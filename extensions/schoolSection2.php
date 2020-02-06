<?php
	$studentSchool = isset($_SESSION["studentSchool"]) ? $_SESSION["studentSchool"] : NULL;

	$leaveSchoolBtn = isset($_POST["leaveSchoolBtn"]) ? $_POST["leaveSchoolBtn"] : NULL;

	$schoolArray = array('SoEEaC' => 'School of Electrical Engineering and Computing.', 
						 'SoCEaA' => 'School of Civil Engineering and Architecture.', 
						 'SoMMCE' => 'School of Mechanical, Material and Chemical Engineering.', 
						 'SoNS' => 'School of Natural Sciences.', 
						 'SoLA' => 'School of Liberal Arts');

	if($leaveSchoolBtn){
		$_SESSION["studentSchool"] = NULL;
		header("Location: #schoolSectionBig");
	}
?>

<style>
	#schoolSection {
		box-shadow: -5px 2.5px 10px 1px #222222;
		background-color: #DDDDDD;
		
		padding: 0% 1%;
		width: 98%;
		height: 175px;
	}

	#titleDB {
		cursor: default;

		float: right;
		font-size: 25px;
		padding: 1%;
	}
	
	#school {
		clear: both;
		float: left;
		
		align-content: center;
		text-align: center;
		color: #333333;
		
		margin: 0.5%;
		padding: 0.25%;
		width: 20%;
	}

	#schoolBtn {
		cursor: pointer;
		border-radius: 2000px;
		border: 2px solid #DDDDDD;

		background-color: #333333;
		color: #DDDDDD;
		font-size: 35px;

		text-align: center;
		margin: 5% 0%;
		height: 175px;
		width: 175px;
	}

	#schoolBtn:hover, #schoolBtn:active {
		background-color: #DDDDDD;
		color: #333333;
		border: 2px solid #333333;
	}

	#schoolP {
		//border: 1px solid #DDD;
		text-align: center;
		font-size: 20px;
		height: 50px;
		cursor: default;
		color: #333333;
	}
	
	#schoolQ a {
		clear: both;
		float: right;
		
		text-decoration: none;
		margin: 0.3% 2%;
		font-size: 15px;
		color: #333333;
	}

	#schoolQ a:hover, a:active {
		text-decoration: underline;
		color: #000000;
	}
</style>

<section style="box-shadow: 5px 2.5px 5px 1px #222222; background-color: #DDDDDD; height: 400px;">
	<section id="schoolSection">
		<div id="titleDB">
			<big>Y</big>OUR <big>S</big>CHOOL
			<hr style="clear: both; color: #FFFFFF; float: right; width: 200%;" />
		</div>

		<div id="school">
			<form action="" method="post">
				<input id="schoolBtn" name="leaveSchoolBtn" type="submit" value="<?php echo $studentSchool; ?>" />
				<p id="schoolP"><?php echo $schoolArray[$studentSchool]; ?></p>
			</form>
		</div>
		
		<div id="schoolQ">
			<a href="help.php#school">Why Did I Select My School?</a>
			<a href="index.php?schoolVisibility=false">I Don't Want to See This!</a>
		</div>
	</section>
</section>

<script type="text/javascript">
	var schoolSectionBig = document.getElementById("schoolSectionBig");
	var schoolSection = document.getElementById("schoolSection");
	var schoolSectiontitle = document.getElementById("titleDB");
	var titleDBHR = document.getElementById("titleDBHR");
	
	schoolSectionBig.onmouseover = function() {
		schoolSection.style.backgroundColor = '#333333';
		schoolSectiontitle.style.color = '#DDDDDD';
		titleDBHR.style.color = '#DDDDDD';
	};
	
	schoolSectionBig.onmouseout = function() {
		schoolSection.style.backgroundColor = '#DDDDDD';
		schoolSectiontitle.style.color = '#333333';
		titleDBHR.style.color = '#333333';
	};
</script>









