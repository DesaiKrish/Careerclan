<?php 
require_once('check.php');
checklogin();

include "../include/connectdb.php";
$del = $_GET['del'];
$page = $_GET['page'];
$username=$_GET['usern'];
$jobtitle=$_GET['jobtitle'];
$companyname=$_GET['compn'];

if ($page == 'jobvacancy') {
    $query = mysqli_query($conn, "DELETE FROM `vacancyform` WHERE `id`='$del'");
    header('Location: add_job_vacancy.php');
} elseif ($page == 'applicants') {
    $query = mysqli_query($conn, "DELETE FROM `applicants` WHERE `id`='$del'");
    header('Location: applicants.php');
} elseif ($page == 'hired_you') {
    $query = mysqli_query($conn, "DELETE FROM `hired_you` WHERE `hired`='$del'");
    header('Location: employees_hired.php');
} elseif($page == 'jobs_applied'){
    $query = mysqli_query($conn, "DELETE FROM `applicants` WHERE `username`='$username' AND vacancy_company='$companyname' AND jobtitle='$jobtitle'");
    header('Location: ../jobseeker/jobs_applied.php');
}elseif($page=='job_offers'){
    $query = mysqli_query($conn, "DELETE FROM `hired_you` WHERE `id`='$del'");
    header('Location: ../jobseeker/job_offers.php');
}
 else {
    // Handle other scenarios or show an error message
    echo "Invalid page specified";
}
?>
