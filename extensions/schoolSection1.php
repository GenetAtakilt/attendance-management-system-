<?php
	$schoolBtn = isset($_POST["schoolBtn"]) ? $_POST["schoolBtn"] : NULL;
	
	if($schoolBtn){
		session_start();
		$_SESSION["studentSchool"] = $schoolBtn;
		header("Location: #schoolSectionBig");
	}
?>

<style>
	#schoolSection {
		box-shadow: -5px 2.5px 10px 1px #222222;
		background-color: #DDDDDD;
		
		/*-webkit-transition-property: background;
		-webkit-transition-duration: 0.3s;
		-webkit-transition-timing-function: ease;*/
		
		padding: 0% 1%;
		width: 98%;
		height: 175px;
	}

	#titleDB {
		cursor: default;

		float: right;
		font-size: 25px;
		color: #333333;
		padding: 1%;
	}

	#school {
		align-content: center;
		text-align: center;
		color: #333333;
		margin: 0.5%;
		padding: 0.25%;
		width: 20%;
	}

	#school input[type=button], #school input[type=submit] {
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

	#school input[type=button]:hover, #school input[type=button]:active, #school input[type=submit]:hover, #school input[type=submit]:active {
		background-color: #DDDDDD;
		color: #333333;
		border: 2px solid #333333;
	}

	#schoolP {
		padding: 0%;
		text-align: center;
		font-size: 20px;
		height: 80px;
		cursor: default;
		color: #333333;
	}

	#school li {
		list-style: none;
		text-align: center;
	}

	#schoolQ a {
		text-decoration: none;
		padding-top: 10px;
		float: right;
		font-size: 15px;
		color: #333333;
	}

	#schoolQ a:hover, a:active {
		text-decoration: underline;
		color: #000000;
	}
</style>

<section style="box-shadow: 5px 2.5px 5px 1px #222222; background-color: #DDDDDD; height: 400px; margin-bottom: 10px;">
	<section id="schoolSection">
		<div id="titleDB">
			<big>S</big>ELECT <big>Y</big>OUR <big>S</big>CHOOL
			<hr id="titleDBHR" style="clear: both; color: #FFFFFF; float: right; width: 200%;" />
		</div>

		<form action="" method="post">

		<table border="0" style="clear: both; margin: 0.5%;" width="99%">
			<tr>
				<td id="school">
					<input id="schoolBtn" name="schoolBtn" type="submit" value="SoEEaC" />
					<p id="schoolP">School of Electrical Engineering and Computing.</p>

				</td>

				<td id="school">
					<input id="schoolBtn" name="schoolBtn" type="submit" value="SoCEaA" />
					<p id="schoolP">School of Civil Engineering and Architecture.</p>

				</td>

				<td id="school">
					<input id="schoolBtn" name="schoolBtn" type="submit" value="SoMMCE" />
					<p id="schoolP">School of Mechanical, Material and Chemical Engineering.</p>

				</td>

				<td id="school">
					<input id="schoolBtn" name="schoolBtn" type="submit" value="SoNS" />
					<p id="schoolP">School of Natutal Sciences.</p>

				</td>

				<td id="school">
					<input id="schoolBtn" name="schoolBtn" type="submit" value="SoLA" />
					<p id="schoolP">School of Liberal Arts.</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" id="schoolQ"><a href="help.php#school">Why Should I Select My School?</a></td>
			</tr>
		</table>

		</form>

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









