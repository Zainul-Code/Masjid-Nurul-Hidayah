<?php
$server = '206.189.81.94';
$username = 'ponpes';
$password = 'ponpes340';
$db_name = 'ponpes';
$con;

try{
	$con = mysqli_connect($server, $username, $password, $db_name) or die(mysqli_connect_errno());
	
}catch(Exception $e){
	echo $e->getMessage();
}

?>