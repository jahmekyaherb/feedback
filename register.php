<?php
   
   session_start();
   mysql_connect("localhost", "root") or die(mysql_error());
   mysql_select_db("feedbackapp") or die(mysql_error());
 
  

   $username = mysql_real_escape_string($_POST['username']);
   $password = md5(mysql_real_escape_string($_POST['password'])); 
   $firstname = mysql_real_escape_string($_POST['firstname']);
   $lastname = mysql_real_escape_string($_POST['lastname']);  
   $email = mysql_real_escape_string($_POST['email']);
   $gender = $_POST['gender'];
   $dob = $_POST['dob'];



	$sql = "INSERT INTO users SET
			username ='$username',
			password='$password',
			firstname ='$firstname',
			lastname ='$lastname',
			emailaddress ='$email',
			gender ='$gender',
			dateofbirth ='$dob'";

     if (@mysql_query($sql)) {
       echo 'Registration completed';
     } else {
       echo 'Error with registration '.mysql_error();;
     }