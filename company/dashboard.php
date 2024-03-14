<?php
require_once('check.php');
checklogin();


?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="../images/favicon.jpg">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../css/footer.css">
  <title>Career Clan</title>

</head>
<style>
  body{
  background-color: #c0ded9;
 } 
  
</style>

<body>

  <header>
    <h1>Welcome to the CareerClan,
      <?php echo $_SESSION['compname']; ?>
    </h1>

    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
    <div>
      <nav>
        <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add job vacancy</a>
        <a href="add_job_vacancy.php"> Job List</a>
        <a href="applicants.php">Applicants</a>
        <a href="search_employees.php">search Employees</a>
        <a href="employees_for_you.php">Recommended Employees</a>
        <a href="employees_hired.php">You Hired</a>
        <a class="active" href="dashboard.php">Dashboard</a>
        <a href="logout.php">logout</a>
        </nav>
    </div>
   
  </header>
  <main>
    <section1>
    <a style="text-decoration: none;color: inherit;" href="employees_hired.php"><h2>Employees recruited</h2></a>
      <p>You have hired <strong>
          <?php
         include "../include/connectdb.php";
          $company = $_SESSION['compname'];

          $sql = "SELECT e.*
   FROM employee_profile e
   INNER JOIN hired_you h ON (h.hired=e.username)
   WHERE h.companyname = '$company' ";

          $result = mysqli_query($conn, $sql);
          $count = 0;
          $displayedEmployees = array(); // Array to store displayed employees

          while ($row = mysqli_fetch_assoc($result)) {
              $employeeId = $row['id'];
          
              // Check if employee has already been displayed
              if (!in_array($employeeId, $displayedEmployees)) {
                  // Add employee ID to the displayedEmployees array
                  $displayedEmployees[] = $employeeId;
            $count++;
          }
        }
          echo $count;
          ?>
        </strong> employees.</p>
        
    </section1>
    <section2>
    <a href="employees_for_you.php" style="text-decoration: none;color: inherit;"><h2>New Employees</h2></a>
      <p>There are <strong>
          <?php
         include "../include/connectdb.php";
          $company = $_SESSION['compname'];

          $sql = "SELECT e.*
   FROM vacancyform v
   INNER JOIN employee_profile e ON (
       (v.companyname LIKE CONCAT('%', e.dreamcompany, '%') OR SOUNDEX(v.companyname) = SOUNDEX(e.dreamcompany))
       OR (v.occupationtitle LIKE CONCAT('%', e.profession, '%') OR SOUNDEX(v.occupationtitle) = SOUNDEX(e.profession)))
   WHERE v.companyname = '$company'";

          $result = mysqli_query($conn, $sql);
          $count = 0;
          $displayedEmployees = array(); // Array to store displayed employees

  while ($row = mysqli_fetch_assoc($result)) {
      $employeeId = $row['id'];
  
      // Check if employee has already been displayed
      if (!in_array($employeeId, $displayedEmployees)) {
          // Add employee ID to the displayedEmployees array
          $displayedEmployees[] = $employeeId;
            $count++;
          }
        }
          echo $count;
          ?>
        </strong> new employees that match your profile.</p>
    </section2>
    <section3>
    <a href="applicants.php" style="text-decoration: none;color: inherit;"><h2>applications</h2></a>
      <p>You have <strong>
          <?php
          $company = $_SESSION['compname'];
          include "../include/connectdb.php";

          $sql = "SELECT * FROM `applicants` WHERE `vacancy_company`= '$company'";
          $result = mysqli_query($conn, $sql);
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $count++;
          }
          echo $count;
          ?>
        </strong> applicants.</p>
    </section3>
  </main>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php
  include "../include/footer.html";
  ?>
  <script>
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('nav');

    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('open');
    });

  </script>
</body>

</html>