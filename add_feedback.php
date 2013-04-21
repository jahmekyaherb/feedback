<?php
   session_start();
   date_default_timezone_set('Africa/Johannesburg');

  // script to add a feed back
  if(isset($_SESSION['userid']) && $_SESSION['userid'] > 0 )  {
  
  	$userid = $_SESSION['userid'];
	$location = $_POST['location'];
	$emotics = $_POST['emoticon'];
	//$feedbackid = $_POST['feedbackid'];
	$description = $_POST['description']; 
	$datetime = time();
   
   
	$con = mysql_connect("localhost","root");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("feedbackapp", $con);
	$sql = "INSERT INTO feeds SET
	userid ='$userid',
	location='$location',
	description ='$description',
	emotion ='$emotics',
	timecreated ='$datetime'";

	if (@mysql_query($sql))
	{
		echo 'Feeedback Saved';
	}
	else
	{
		echo 'Error Adding Feedback' ,mysql_error();
	}

  } else {

     echo "You need to login to use this feature";
  }
