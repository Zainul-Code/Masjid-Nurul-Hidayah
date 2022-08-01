<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php
    $_SESSION['user_id'] = null;
    session_destroy();
    Redirect_To('../index.php');
?>