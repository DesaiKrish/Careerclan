<?php

include "../include/connectdb.php";
session_start();
session_unset();
session_destroy();

header('location:jobseeker_login.php');

?>