<?php

$servername="localhost";
$username="root";
$password="";
$database="careerclan";

$conn=mysqli_connect("$servername", "$username" ,"", "$database");

if(!$conn){
  die("sorry we failed to connect:".mysqli_connect_error());
}

?> 