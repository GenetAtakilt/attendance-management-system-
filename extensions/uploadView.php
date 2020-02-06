<style>
#uploadView {
	border: 1px solid #EEEEEE;
}

#uploadView:hover, #uploadView:active {
	box-shadow: 5px 5px 10px 1px #222222;
}

#uploadView h1 {
	background-color: #00A0B0;
	color: #333333;
	text-align: center;
	font-size: 35px;
	
	padding: 5%;
}

#uploadView h1 a {
	text-decoration: none;
	color: #333333;
	
	padding: 2.5%;
	width: 100%;
}

#uploadView h1 a:hover, #uploadView h1 a:active {
	text-decoration: none;
	color: #111111;
}

#uploadView h3  {
	cursor: default;
	
	background-color: #AAAAAA;
	text-align: left;
	font-size: 17.5px;
	
	padding: 2.5% 2.5% 2.5% 5%;
	width: 92.5%;
}

#uploadView h4  {
	cursor: default;
	
	background-color: #CCCCCC;
	text-align: center;
	font-size: 20px;
	
	padding: 5%;
	width: 90%;
}
</style>

<div id="uploadView">
	<h1 id="uploadCourseCode"><a href="handout.php?handoutID=<?php echo $houtID; ?>"><?php echo $uploadCourseCode; ?></a></h1>

	<h3><?php echo $uploadCourseName; ?></h3>

	<h4 id="uploadCourseProgram"><?php echo $uploadCourseProgram; ?></h4>
</div>

<script type="text/javascript">
	
</script>