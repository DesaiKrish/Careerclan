<?php 
require_once('check.php');
checklogin();
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
<div>
  <header>
  <h1 >Add a job </h1>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
    <nav>
        <a href="logout.php">logout</a>
        <a class="active" href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add job vacancy</a>
        <a href="add_job_vacancy.php"> Job List</a>
        <a href="applicants.php">Applicants</a>
        <a href="search_employees.php">search Employees</a>
        <a href="employees_for_you.php">Recommended Employees</a>
        <a href="employees_hired.php">You Hired</a>
        <a href="dashboard.php">Dashboard</a>
        </nav>
    </div>
  </header>
<br>
<?php 
if (isset($_POST['submit'])) {
  include "../include/connectdb.php";

    $companyname = $_POST['companyname'];
    $occupationTitle = $_POST['occupationtitle'];
    $requiredEmployees = $_POST['req_no_emplyoees'];
    $salary = $_POST['salary'];
    $qualificationExperience = $_POST['qualification_experience'];
    $jobDescription = $_POST['jobdescribtion'];

    $query = "INSERT INTO `vacancyform` ( `companyname`, `occupationtitle`, `req_no_employees`, `salary`, `qualification_experience`, `jobdescribtion`) VALUES ('$companyname','$occupationTitle','$requiredEmployees','$salary',' $qualificationExperience','$jobDescription' )";
  
    $result = mysqli_query($conn, $query);
    header("location:add_job_vacancy.php");
}
?>
<form style="margin:0 auto;" action="form_job_vacancy.php" method="POST">
        <fieldset>
            <legend> Enter job details</legend>
            <label for="companyname">Your company name</label>
            <input type="text" id="companyname" name="companyname" placeholder="company name"><br><br>

            <label for="occupationtitle">Title</label>
            <input type="text" id="occupationtitle" name="occupationtitle" placeholder="designation" required><br><br>

            <label for="req_no_emplyoees">No. of employees required</label>
            <input type="number" id="req_no_emplyoees" name="req_no_emplyoees" placeholder="no. of employees"><br><br>

            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" placeholder="salary"><br><br>
      
            <label for="qualification_experience">Qualification</label>
            <input type="text" name="qualification_experience" id="qualification_experience" placeholder="Minimum qualification" required><br><br>

            <label for="jobdescribtion">Job Describtion</label>
            <input type="text" name="jobdescribtion" id="jobdescribtion" placeholder="detailed description of the job" required><br><br>
            
            <center><input class="btn btn-success btn-block" type="submit" name="submit" id="submit"
                    placeholder="submit">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset">
            </center>
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