<?php 
	if (isset($_GET['Approve_ID'])) {
		if (!empty($_GET['Approve_ID'])) {
			$sql = "UPDATE comment SET status ='approved', approve_by = '$_SESSION[username]' WHERE id = '$_GET[Approve_ID]'";
			$exec = Query($sql);
			if ($exec) {
				$_SESSION['SuccessMessage'] = 'Post Has Been Approved';
				mysqli_close($con);
				Redirect_To('Comments.php');
			} else {
				$_SESSION['errorMessage'] = 'Something Went Wrong Please Try Again';
				Redirect_To('Comments.php');
				mysqli_close($con);
			}
		} else {
			Redirect_To('Comments.php');
		}
	}
?>