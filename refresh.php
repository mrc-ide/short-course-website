<?php

  // What's my branch?

  $branch = shell_exec('git status 2>&1');
  $branch = preg_split("/\r\n|\n|\r/", $branch)[0];
  $branch = preg_replace("/On branch /", "", $branch);

  print_r($_POST);
  
  

  //if ( $_POST['payload'] ) {

 //   shell_exec('git pull origin preview');
  //}
?>