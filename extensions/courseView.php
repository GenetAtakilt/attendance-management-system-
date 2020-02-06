<style>
	#courseView:hover, #courseView:active {
		box-shadow: 5px 5px 10px 1px #222222;
	}

	#courseView p  {
		cursor: default;

		text-align: left;
		font-size: 15px;

		padding: 1%;
	}
	#courseView img:hover {
		padding: 5%;
		box-shadow: 5px 5px 10px 1px #222222;
		
	}
</style>

<table cellspacing="10" id="courseView">
	<tr valign="top">
		<td>
			<p><B>Course Code:</B> <?php echo $courseCode; ?></p>
			<p><B>Course Name:</B> <?php echo $courseName; ?></p>
			<p><B>Course Credit:</B> <?php echo $courseCredit; ?></p>
			<p><B>Course Year, Semester:</B> <?php echo $courseYear.', '.$courseSemester; ?></p>
			<p><B>Course Program, School:</B> <?php echo $courseProgram.', '.$courseSchool; ?></p>
		</td>
		<?php
		$userSchool = isset($userDetailsArray["userSchool"]) ? $userDetailsArray["userSchool"] : NULL;
		$userType = isset($userDetailsArray["userType"]) ? $userDetailsArray["userType"] : NULL;
		
		if($userSchool == $courseSchool && $userType == "School admin"){
			echo '<td width="3.5%">
				<a href="editCourse.php?courseID='.$courseID.'"><img src="images/Icons/Edit.png" width="100%" /></a>
			</td>
			<td width="3.5%">
				<a href="deleteCourse.php?courseID='.$courseID.'"><img src="images/Icons/Delete.png" width="100%" /></a>
			</td>';
		}
		?>
	</tr>
</table>

<script type="text/javascript">
	
</script>