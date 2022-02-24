<?php
  $db = mysqli_connect("localhost","root","password","user_crud");

  if($db == false){
    echo "Database Connection Fail!";
  }
