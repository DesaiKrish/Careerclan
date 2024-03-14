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
  <title>CareerClan</title>
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/dashboard.css">
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
  <h1 style="color:white;">Welcome to CareerClan, <?php echo $_SESSION['username']; ?></h1>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
    <nav>
      <li><a class="active" href="dashboard.php">Dashboard</a></li>
      <li><a href="employee_profile.php">Edit your profile</a></li>
      <li><a href="jobs_applied.php">You Applied For</a></li>
      <li><a href="job_offers.php">Job Offers</a></li>
      <li><a href="companies.php">Companies for you</a></li>
      <li><a href="search.php">Search by choice</a></li>
      <li><a href="logout.php">Logout</a></li>
</nav>
  </div>
</header>
</div>

  <main>
		<section1>
    <a href="jobs_applied.php"><h2>Job Applications</h2></a>
			<p>You have applied to <strong>
      <?php
    include "../include/connectdb.php";
    $username=$_SESSION['username'];
    $sql = "SELECT v.*
    FROM vacancyform v
    INNER JOIN applicants a ON ((v.companyname=a.vacancy_company) AND (v.occupationtitle=a.jobtitle))
    WHERE a.username = '$username' ";

    $result = mysqli_query($conn, $sql);
    $count=0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count=$count+1;
     
    }
      echo $count;
      ?></strong> companies.</p>
		</section1>
		<section2>
    <a href="companies.php"><h2>New Jobs</h2></a>
			<p>There are <strong>
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
    $count=0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count=$count+1;
    }
    echo $count;
      ?>
      </strong> new job openings that match your profile.</p>
		</section2>
		<section3>
    <a href="job_offers.php"><h2>Job Offers</h2></a>
			<p>You have <strong>
      <?php
   $seeker= $_SESSION['username'];
   include "../include/connectdb.php";

   $sql = "SELECT * FROM `hired_you` WHERE `hired`= '$seeker'";
    $result = mysqli_query($conn, $sql);
    $count=0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count=$count+1;
    }
    echo $count;
      ?>
      </strong> job offer.</p>
		</section3>
</main>

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



<!-- <script>
  function toggleButton(buttonId) {
    var button = document.getElementById("myButton-" + buttonId);

    if (button.classList.contains("applied")) {
      // Button is already applied, revert back to original state
      button.classList.remove("applied");
      button.innerHTML = "Apply Now";
    } else {
      // Apply action
      button.classList.add("applied");
      button.innerHTML = "Applied";
    }
  }
</script> -->