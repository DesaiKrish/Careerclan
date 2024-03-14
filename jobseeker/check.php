<?php
session_start();
    function checklogin()
    {
        if(!isset($_SESSION['login']))
        {
            return header('location: jobseeker_login.php');
   }

 }
?>