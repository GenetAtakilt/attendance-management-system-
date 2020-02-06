<style>
	#handoutView:hover, #handoutView:active {
		box-shadow: 5px 5px 10px 1px #222222;
	}

	#handoutView p  {
		cursor: default;

		text-align: left;
		font-size: 15px;

		padding: 0.25%;
	}
	
	#handoutView a {
		text-decoration: none;
		color: #3535FF;
		}

	#handoutView a:hover, #handoutView a:active {
		text-decoration: underline;
		color: #333333;
	}
	#handoutLink:hover {
		padding: 5%;
		box-shadow: 5px 5px 10px 1px #222222;
	}
</style>

<table border="0" cellspacing="10" id="handoutView">
	<tr valign="top">
		<td width="7.5%" style="padding-top: 10px;">
			<img src="images/Icons/Edit%20Account.png" width="100%" />
		</td>
		<td>
			<p><B><?php echo $handoutOwnerName; ?></B></p>
			<p><B><?php echo $houtUploadDate; ?></B></p>
			<p><B>Course: </B><?php echo  $handoutCourseName.'('.$handoutCourseCode.')'; ?></p>
			<p><B>Title: </B><?php echo $houtTitle; ?></p>
			<p><B>Program, School: </B><?php echo $houtProgram.', '.$houtSchool; ?></p>
			<p><B>Chapter: </B><?php echo $houtChapter; ?></p>
			<p><B>File: </B><a href="<?php echo 'uploads/'.$houtFile; ?>"><?php echo $houtFile; ?></a></p>
		</td>
		<?php
			if($houtTID == $userID && $userDetailsArray["userType"] == "Teacher")
				echo '<td width="3.5%">
					<a href="deleteHandout.php?handoutID='.$houtID.'"><img id="handoutLink" src="images/Icons/Delete.png" width="100%" /></a>
				</td>';
		?>
	</tr>
</table>










