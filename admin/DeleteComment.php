<?php 
    if (isset($_GET['Delete_ID'])) {
        if (!empty($_GET['Delete_ID'])) {
            $getID = $_GET['Delete_ID'];
            $sql = "DELETE FROM comment WHERE id = '$getID' ";
            $exec = Query($sql);
            if ($exec) {
                $_SESSION['SuccessMessage'] = 'Post Has Been Deleted';
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