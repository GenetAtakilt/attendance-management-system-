<?php 
 $con = mysqli_connect("localhost","root","","transport");
 if (mysqli_connect_errno()) {
	
	echo "The connection was not established: "	. mysqli_connect_error();
}

function getOne() {
	
	global $con;
	
	$get_pro = "select * from one";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		
			$pro_id = $row_pro['name_id'];
			$pro_fname = $row_pro['fname'];
			$pro_mname = $row_pro['mname'];
			$pro_lname = $row_pro['lname'];
			$pro_grade = $row_pro['grade'];
			$pro_plate = $row_pro['plate_no'];
		
			echo "
                        <tr class='odd gradeX'>
	                        <td>$pro_fname</td>
	                        <td>$pro_mname</td>
	                        <td>$pro_lname</td>
	                        <td class='center'>$pro_grade</td>
	                        <td class='center'>$pro_plate</td>
	                        <td class='center'><a href='edit.php?edit_id=$pro_id'>Edit</a></td>
	                    </tr>
                ";
		
	}
	
	
	}
	
	function getThree() {
	
	global $con;
	
	$get_pro = "select * from three";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		
			$pro_id = $row_pro['name_id'];
			$pro_fname = $row_pro['fname'];
			$pro_mname = $row_pro['mname'];
			$pro_lname = $row_pro['lname'];
			$pro_grade = $row_pro['grade'];
			$pro_plate = $row_pro['plate_no'];
		
			echo "
                        <tr class='odd gradeX'>
	                        <td>$pro_fname</td>
	                        <td>$pro_mname</td>
	                        <td>$pro_lname</td>
	                        <td class='center'>$pro_grade</td>
	                        <td class='center'>$pro_plate</td>
	                    </tr>
                ";
		
	}
	
	
	}
	function getSix() {
	
	global $con;
	
	$get_pro = "select * from six";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		
			$pro_id = $row_pro['name_id'];
			$pro_fname = $row_pro['fname'];
			$pro_mname = $row_pro['mname'];
			$pro_lname = $row_pro['lname'];
			$pro_grade = $row_pro['grade'];
			$pro_plate = $row_pro['plate_no'];
		
			echo "
                        <tr class='odd gradeX'>
	                        <td>$pro_fname</td>
	                        <td>$pro_mname</td>
	                        <td>$pro_lname</td>
	                        <td class='center'>$pro_grade</td>
	                        <td class='center'>$pro_plate</td>
	                    </tr>
                ";
		
	}
	
	
	}
	function getYear() {
	
	global $con;
	
	$get_pro = "select * from year";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		
			$pro_id = $row_pro['name_id'];
			$pro_fname = $row_pro['fname'];
			$pro_mname = $row_pro['mname'];
			$pro_lname = $row_pro['lname'];
			$pro_grade = $row_pro['grade'];
			$pro_plate = $row_pro['plate_no'];
		
			echo "
                        <tr class='odd gradeX'>
	                        <td>$pro_fname</td>
	                        <td>$pro_mname</td>
	                        <td>$pro_lname</td>
	                        <td class='center'>$pro_grade</td>
	                        <td class='center'>$pro_plate</td>
	                    </tr>
                ";
		
	}
	
	
	}
	
	

?>

