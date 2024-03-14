<?php

include "../include/connectdb.php";
session_start();
session_unset();
session_destroy();

header('location:company_login.php');

?>