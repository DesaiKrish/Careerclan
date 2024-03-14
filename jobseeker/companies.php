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
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/dashboard.css">

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

.btn.applied {
    background-color: green;
    color: white;
}

  </style>
<body>
<div>
  <header>
  <h1 style="color:white;"><b>Some recommendations for you!</b></h1>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
    <nav>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="employee_profile.php">Edit your profile</a></li>
      <li><a href="jobs_applied.php">You Applied For</a></li>
      <li><a href="job_offers.php">Job Offers</a></li>
      <li><a class="active" href="companies.php">Companies for you</a></li>
      <li><a href="search.php">Search by choice</a></li>
      <li><a href="logout.php">Logout</a></li>
      </nav>
  </div>
</header>
</div>
  <br>
  <div class="tab-content">
    <?php
   $seeker= $_SESSION['username'];
    include "../include/connectdb.php";

   $sql = "SELECT v.*
   FROM vacancyform v
   INNER JOIN employee_profile e ON (
       (v.companyname LIKE CONCAT('%', e.dreamcompany, '%') OR SOUNDEX(v.companyname) = SOUNDEX(e.dreamcompany))
       OR (v.occupationtitle LIKE CONCAT('%', e.profession, '%') OR SOUNDEX(v.occupationtitle) = SOUNDEX(e.profession))
   OR (v.salary >= e.expectedsalary))
    WHERE e.username = '$seeker'";

    $result = mysqli_query($conn, $sql);

      include "../include/job_info.php";
      
     echo "<br><br>";
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
          include "../include/insert_applicants.php";
        }
    
?>