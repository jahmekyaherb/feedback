<?php
   
   session_start();
   mysql_connect("localhost", "root") or die(mysql_error());
   mysql_select_db("feedbackapp") or die(mysql_error());
 
   $username = mysql_real_escape_string($_POST['username']);
   $password = md5(mysql_real_escape_string($_POST['password']));


   $query = "(SELECT * FROM users WHERE username = '$username' AND password ='$password') ";
   $data = mysql_query($query);
   if( mysql_num_rows($data) != 0) {
	
	$info = mysql_fetch_array($data);	
	   
	$_SESSION['firstname']  = $info['firstname'];
	$_SESSION['surname']  = $info['lastname'];
	$_SESSION['userid'] =$info['userid'];

	echo "Loggined";
	
} else {
	    echo"username or password is wrong";
}