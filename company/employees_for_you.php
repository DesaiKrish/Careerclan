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
<style>
.btn {
border-radius: 20px;
background-color: black;
color: white;
padding: 10px 20px;
border: none;
cursor: pointer;
}

.btn:hover {
background-color: gray;
color: white;
}

.btn.hired {
background-color: green;
color: white;
}
  
</style>

<body>
  <div>
  <header>
		<h2 style="color:white;">Employees Recommended For Your Company</h2>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
	<nav>
        <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add a job vacancy</a>
        <a href="add_job_vacancy.php"> Job List</a>
        <a href="applicants.php">Applicants</a>
        <a href="search_employees.php">Search Employees</a>
        <a class="active" href="employees_for_you.php">Recommended Employees</a>
        <a href="employees_hired.php">You Hired</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
        </nav>
  </div>
	
  </header>
</div>
  <br>
  
    <h1 style="font-size:30px; text-align:center;"><b>We have some good matches for your company</b></h1><br>
  <div class="tab-content">
  
    <?php
include "../include/connectdb.php";
 $company=$_SESSION['compname'];

$sql = "SELECT e.*
   FROM vacancyform v
   INNER JOIN employee_profile e ON (
       (v.companyname LIKE CONCAT('%', e.dreamcompany, '%') OR SOUNDEX(v.companyname) = SOUNDEX(e.dreamcompany))
       OR (v.occupationtitle LIKE CONCAT('%', e.profession, '%') OR SOUNDEX(v.occupationtitle) = SOUNDEX(e.profession)))
   WHERE v.companyname = '$company'";

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
            <?php
                                if (isset($_SESSION['compname'])) {
                                    $companyname = $_SESSION['compname'];
                                    $name = $row['username'];

                                    $query = "SELECT * 
                                    FROM `hired_you` 
                                    WHERE companyname = '$companyname' 
                                    AND hired = '$name'
                                    AND occupationtitle IN (SELECT occupationtitle FROM `vacancyform`
                                                            WHERE companyname = '$companyname' )";
                          
                                            
                                    $done = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($done) > 0) {
                                        // User has already applied, show applied button
                                        ?>
                                        <button id="myButton-<?php echo $row['id']; ?>" class="btn hired">hired</button>
                                        <?php
                                    } else {
                                        // User has not applied, show apply button
                                        ?>
                                        <form method="POST" action="employees_for_you.php">
                                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                                            
                                            <button type="submit" name="hire" class="btn">Hire</button>
                                        </form>
                                        <?php
                                    }
                                }
                                ?>
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
<?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include "../include/connectdb.php";
            $companyname = $_SESSION['compname'];
            $name = $_POST['name'];
         
            $query1 = "SELECT * 
            FROM `hired_you` 
            WHERE companyname = '$companyname' AND hired = '$name'
            AND occupationtitle IN (SELECT occupationtitle FROM `vacancyform`
                                                            WHERE companyname = '$companyname' )";
        
        include "../include/insert_employee.php";

        }
        ?>
        