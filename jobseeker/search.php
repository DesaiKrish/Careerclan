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
  <link href="../css/search.css" rel="stylesheet">


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
  <h1 style="color:white;"><b>Search for your dream job</b></h1>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
    <nav>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="employee_profile.php">Edit your profile</a></li>
      <li><a href="jobs_applied.php">You Applied For</a></li>
      <li><a href="job_offers.php">Job Offers</a></li>
      <li><a href="companies.php">Companies for you</a></li>
      <li><a class="active" href="search.php">Search by choice</a></li>
      <li><a href="logout.php">Logout</a></li>
      </nav>
  </div>
</header>
</div>
  <br>
  <div class="tab-content">
    <br>
    <center>
      <form action="search.php" method="post">
        <div class="search-container">
          <div class="search-bar">
            <input type="text" name="searchc" placeholder="Search...">
            <label for="search">Choose</label><br>
            <select name="choice">
              <option value="company">Company</option>
              <option value="jobtitle">Job Title</option>

            </select>
            <button type="submit" id="search" name="search"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </center>


    <br><br>
    <?php
   include "../include/connectdb.php";
    $search = "";
    $choice = "";
    $sql = "SELECT * FROM `vacancyform`";
    $result = "";

    if (isset($_POST['search'])) {
      $search = $_POST['searchc'];
      $choice = $_POST['choice'];
      $search = mysqli_real_escape_string($conn, $search);
      if ($choice === 'company') {
        $sql = "SELECT *
      FROM `vacancyform`
      WHERE companyname LIKE '%$search%' OR
       SOUNDEX(companyname) = SOUNDEX('$search')";

      } elseif ($choice === 'jobtitle') {
        $sql = "SELECT *
      FROM `vacancyform`
      WHERE occupationtitle LIKE '%$search%' OR
            SOUNDEX(occupationtitle) = SOUNDEX('$search')";
      }
    }

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
if (isset($_POST['apply'])) {
  include "../include/connectdb.php";
  include "../include/insert_applicants.php";

        }
?>