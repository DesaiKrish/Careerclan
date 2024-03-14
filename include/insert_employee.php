<?php
 $done = mysqli_query($conn, $query1);

 if (mysqli_num_rows($done) > 0) {
   
 } else {

   $query2 = "INSERT INTO `hired_you`(`companyname`,`hired`,`occupationtitle`, `req_no_employees`, `salary`, `qualification_experience`, `jobdescribtion`)
SELECT t1.`companyname`,t2.`username`,t1.`occupationtitle`,t1. `req_no_employees`,t1. `salary`,t1. `qualification_experience`,t1. `jobdescribtion`
FROM vacancyform AS t1, employee_profile AS t2
WHERE t1.companyname='$companyname' AND t2.username='$name'";
   
   $run = mysqli_query($conn, $query2);

 }
?>