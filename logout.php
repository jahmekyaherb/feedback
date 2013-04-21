<?php

   session_start();
   
   
   if($_POST['logout']) {
     session_destroy($_SESSION);
     echo "You have been logged out successfully";	

   } 
   