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
  <title>Career Clan</title>
  <link rel="stylesheet" href="../css/dashboard.css">
   
    <link rel="stylesheet" href="../css/footer.css">
  <!-- Favicon -->
  <link href="../images/favicon.jpg" rel="icon">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div>
  <header>
		<h2 style="color:white;">History of hired employees</h2>
    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
	<nav>
  <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add a job vacancy</a>
        <a href="add_job_vacancy.php"> Job List</a>
        <a href="applicants.php">Applicants</a>
        <a href="search_employees.php">Search Employees</a>
        <a href="employees_for_you.php">Recommended Employees</a>
        <a class="active" href="employees_hired.php">You Hired</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
        </nav>
  </div>
	
  </header>
</div>
  <br>
  
    <h1 style="font-size:30px; text-align:center;"><b>You hired...!</b></h1><br>
  <div class="tab-content">
  
    <?php
include "../include/connectdb.php"; 
 $company=$_SESSION['compname'];

$sql = "SELECT e.*
   FROM employee_profile e
   INNER JOIN hired_you h ON (h.hired=e.username)
   WHERE h.companyname = '$company' ";

  $result = mysqli_query($conn, $sql);

 
$displayedEmployees = array(); // Array to store displayed employees

while ($row = mysqli_fetch_assoc($result)) {
    $employeeId = $row['id'];

    // Check if employee has already been displayed
    if (!in_array($employeeId, $displayedEmployees)) {
        // Add employee ID to the displayedEmployees array
        $displayedEmployees[] = $employeeId;
    ?>
    <?php
        include "../include/employee_info.php";
     ?>       
                <a href="delete.php?page=hired_you&del=<?php echo $row['username']; ?>" class="btn btn-danger">               
                  <img style=" height:20px;width:20px;" src="../images/trash.png"></a>
    </div>          
            </div>
          </div>
        </div>
      </div>
      <br>
      <?php
    }
    } 
    ?>
  </div>
  <br><br>
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
