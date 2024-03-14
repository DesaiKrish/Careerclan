<?php
session_start();
    function checklogin()
    {
        if(!isset($_SESSION['clogin']))
        {
            return header('location: company_login.php');
   }

 }
?>