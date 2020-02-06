<style>
	#messageView:hover, #messageView:active {
		box-shadow: 5px 5px 10px 1px #222222;
	}

	#messageView p  {
		cursor: default;

		text-align: left;
		font-size: 15px;

		padding: 0.25%;
	}
	#messageLink:hover {
		padding: 5%;
		box-shadow: 5px 5px 10px 1px #222222;
	}
</style>

<table border="0" cellspacing="10" id="messageView">
	<tr valign="top">
		<td width="7.5%" style="padding-top: 10px;">
			<img src="images/Icons/Edit%20Account.png" width="100%" />
		</td>
		<td>
			<p><B>Name: </B><?php echo $userName1; ?></p>
			<p><B>User Name: </B><?php echo $userUserName1; ?></p>
			<p><B>Class: </B><?php echo $userClass1; ?></p>
			<p><B>Program: </B><?php echo $userProgram1; ?></p>
			<p><B>School: </B><?php echo $userSchool1; ?></p>
		</td>
		<?php
		
			if(($userRegistererID1 == $userID) && ($userSchool1 == $userSchool)){
				echo'<td width="3.5%">
						<a href="deleteUser.php?userID='.$userID1.'"><img id="messageLink" src="images/Icons/Delete.png" width="100%" /></a>
					</td>';
			}
		?>
		
	</tr>
</table>
