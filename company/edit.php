<?php 
require_once('check.php');
checklogin();

include "../include/connectdb.php";

$id=$_GET['edit'];

$query=mysqli_query($conn,"SELECT * FROM `vacancyform` where id='$id'");

while($row=mysqli_fetch_array($query)){
    $companyname = $row['companyname'];
    $occupationTitle = $row['occupationtitle'];
    $requiredEmployees = $row['req_no_employees'];
    $salary = $row['salary'];
    $qualificationExperience = $row['qualification_experience'];
    $jobDescription = $row['jobdescribtion'];
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="../images/favicon.jpg">

    <title>Career Clan</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
        body {
            background-color: lightsteelblue;
            color: black;
        }
       </style>
    </head>
<body>
    
  <header>
  <h1 style="font-size:25px; text-align:center;">Update job vacancy particulars</h1>
    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
    <div>
      <nav>
        <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add job vacancy</a>
        <a href="add_job_vacancy.php"> Job List</a>
        <a href="applicants.php">Applicants</a>
        <a href="search_employees.php">search Employees</a>
        <a href="employees_for_you.php">Recommended Employees</a>
        <a href="employees_hired.php">You Hired</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">logout</a>
        </nav>
    </div>
   
  </header>
  <?php 
if (isset($_POST['submit'])) {

  include "../include/connectdb.php";
  
    // Get the form data
    $companyname = $_POST['companyname'];
    $occupationTitle = $_POST['occupationtitle'];
    $requiredEmployees = $_POST['req_no_emplyoees'];
    $salary = $_POST['salary'];
    $qualificationExperience = $_POST['qualification_experience'];
    $jobDescription = $_POST['jobdescribtion'];
  
    $query = "UPDATE `vacancyform`
    SET `req_no_employees`='$requiredEmployees', `salary`='$salary', `qualification_experience`='$qualificationExperience', `jobdescribtion`='$jobDescription'
    WHERE `companyname`='$companyname' AND `occupationtitle`='$occupationTitle'";

$result = mysqli_query($conn, $query);
header("location:add_job_vacancy.php");
  }
?> 
<form action="edit.php" method="POST">
        <fieldset>
            <legend> job details</legend>
            <label for="companyname">company name:</label>
            <input type="text" id="companyname" name="companyname" value="<?php echo $companyname;?>" placeholder="company name"><br><br>

            <label for="occupationtitle">occupation title:</label>
            <input type="text" id="occupationtitle" name="occupationtitle" value="<?php echo $occupationTitle;?>" placeholder="designation" required><br><br>

            <label for="req_no_emplyoees">req_no_emplyoees:</label>
            <input type="number" id="req_no_emplyoees" name="req_no_emplyoees" value="<?php echo $requiredEmployees;?>" placeholder="123"><br><br>

            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" value="<?php echo $salary;?>" placeholder="salary"><br><br>
      
            <label for="qualification_experience">Qualification/workexperience:</label>
            <input type="text" name="qualification_experience" id="qualification_experience" value="<?php echo $qualificationExperience;?>"  required><br><br>

            <label for="jobdescribtion">Job_describtion:</label>
            <input type="text" name="jobdescribtion" id="jobdescribtion" value="<?php echo $jobDescription;?>" required><br><br>

            <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit'];?>">

            <input type="submit" id="submit" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" id="reset"><br>
        </fieldset>
        
        
    </form>
    <script>
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('nav');

    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('open');
    });

  </script>
      </body>
      </html>
 
      
