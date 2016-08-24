<?php
require_once ('../funcs/checkvalidity.php');
require_once('../funcs/electivefuncs.php');
$year=$_GET['year'];
$section=$_GET['section'];
$sp=$_GET['period'];
$np=$_GET['noperiod'];
$date=$_GET['date'];
if(!isset($_GET['subject'])||empty($_GET['subject']))
{
	$yearsecsub=$year.",".$section;
	echo "you need to enter subject code.we are redirecting you";
	header("refresh:5;url=enter_att.php?flg=1&yearsecsub=$yearsecsub&&np=$np&sp=$sp&date=$date");
}
elseif(!isValidSubjectCode($_GET['subject']))
{
	$yearsecsub=$year.",".$section;
	echo "you need to enter a valid subject code.we are redirecting you";
	header("refresh:5;url=enter_att1.php?flg=1&yearsecsub=$yearsecsub&&np=$np&sp=$sp&date=$date");
}
if(isElective($_GET['subject']))
{
	$subject=$_GET['subject'];
	$yearsecsub=$year.",".$section.",".$subject;
	header("location:enter_attele1.php?flg=0&yearsecsub=$yearsecsub&np=$np&sp=$sp&date=$date");
}
elseif(!isElective($_GET['subject']))
{
	$subject=$_GET['subject'];
	$yearsecsub=$year.",".$section.",".$subject;
	header("location:enter_att1.php?flg=0&yearsecsub=$yearsecsub&np=$np&sp=$sp&date=$date");
}
?>