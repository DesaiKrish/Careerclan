<?php
 $user_name = $_SESSION['username'];
 $company = $_POST['company'];
 $jobtitle = $_POST['jobtitle'];

  $query2 = "SELECT * FROM `applicants` WHERE username='$user_name' AND vacancy_company='$company' AND jobtitle='$jobtitle'";
  $done = mysqli_query($conn, $query2);

  if (mysqli_num_rows($done) > 0) {
    
  } else {

   $query1 = "INSERT INTO `applicants` (`username`, `name`, `email`, `city`, `age`, `profession`, `phone_number`, `vacancy_company`, `jobtitle`)
       SELECT t1.`username`, t1.`name`, t1.`email`, t1.`city`, t1.`age`, t1.`profession`, t1.`phone_number`, t2.`companyname`, t2.`occupationtitle`
       FROM employee_profile AS t1, vacancyform AS t2
       WHERE t1.username='$user_name' AND t2.companyname = '$company' AND t2.occupationtitle= '$jobtitle'";

   $run = mysqli_query($conn, $query1);

 }
?>