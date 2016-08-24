<?php
if(!ob_start("ob_gzhandler")) ob_start();
require_once('connection.php');
session_start();
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
if(isset($_SESSION['SESS_MEMBER_ID'])||isset($_SESSION['SESS_STUDENT_ID']))
{
	$location="location: ../index.php";
	if(isset($_SESSION['SESS_MEMBER_ID'])&&!isset($_SESSION['SESS_STUDENT_ID']))
	{
		$userid=$_SESSION['SESS_MEMBER_ID'];
		$time=date('Y-m-d H:i:s');
		$query="UPDATE faculty_login SET user_last_logout=NOW(),ext_flag='0',skid='0' WHERE user_id='$userid'";
		$result=mysql_query($query);
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_FIRST_NAME']);
		unset($_SESSION['NAME']);
		unset($_SESSION['user_level']);
		unset($_SESSION['dept']);
	}
	if(!isset($_SESSION['SESS_MEMBER_ID'])&&isset($_SESSION['SESS_STUDENT_ID']))
	{
		$userid=$_SESSION['SESS_STUDENT_ID'];
		$time=date('Y-m-d H:i:s');
		$query="UPDATE student_login SET user_last_logout=NOW(),ext_flag='0',skid='0' WHERE user_id='$userid'";
		$result=mysql_query($query);
		unset($_SESSION['SESS_STUDENT_ID']);
		unset($_SESSION['SESS_ROLL_NUMBER']);
		unset($_SESSION['NAME']);
		unset($_SESSION['PARENT_NAME']);
		unset($_SESSION['user_level']);
	}
	header($location);
}
else
{
	header("location:../index.php");
}
?>