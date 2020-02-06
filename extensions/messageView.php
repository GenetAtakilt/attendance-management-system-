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
			<p><B><?php echo $msgOwnerName; ?></B></p>
			<p><B><?php echo $msgDate; ?></B></p>
			<p><B>Batch: </B><?php echo $msgBatch; ?></p>
			<p><B>From: </B> <?php echo $msgProgram.', '.$msgSchool; ?> | 
				<B>Scope: </B> <?php echo $msgScope; ?></p>
			<p><B>Message: </B> <?php echo $msgContent; ?></p>
			<p>Message expires in <?php echo '<B>'.$msgExpDate.'</B> days after <B>'.$msgDate.'</B>'; ?></p>
		</td>
		<?php
			if($msgOwner == $userID && $userDetailsArray["userType"] != "Teacher"){
				echo'<td width="3.5%">
						<a href="editMessage.php?messageID='.$msgID.'"><img id="messageLink" src="images/Icons/Edit.png" width="100%" /></a>
					</td>
					<td width="3.5%">
						<a href="deleteMessage.php?messageID='.$msgID.'"><img id="messageLink" src="images/Icons/Delete.png" width="100%" /></a>
					</td>';
			}
		?>
		
	</tr>
</table>
