<?php

  

  $mysqli = mysqli_connect("localhost", "root", "", "kklp", 3306); 
  
  if(!$mysqli){
  	die('error: '. mysqli_connect_error());
  }

?>