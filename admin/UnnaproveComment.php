<?php
if ( isset($_GET['Unapprove_ID'])) {
	if ( !empty($_GET['Unapprove_ID'])) {
		$sql = "UPDATE comment SET status ='unapprove'  WHERE id = '$_GET[Unapprove_ID]'";
		$exec = Query($sql);
		if ( $exec) {
			$_SESSION['SuccessMessage'] = 'Post Has Been Unapproved';
			mysqli_close($con);
			Redirect_To('Comments.php');
		}else {
			$_SESSION['errorMessage'] = 'Something Went Wrong Please Try Again';
			Redirect_To['Comments.php'];
			mysqli_close($con);
		}
	}else {
		Redirect_To('Comments.php');
	}
}
?>