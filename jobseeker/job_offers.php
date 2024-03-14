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
  
.button {
    border-radius: 20px;
    background-color: black;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.button:hover {
    background-color: gray;
    color: white;
}

.button.applied {
    background-color: green;
    color: white;
}
</style>
<body>
<div>
  <header>   
  <h1 style="color:white;"><b><i>CONGRATULATIONS! </i>You've got job offer from</b></h1>
		<button class="menu-toggle"><i class="fas fa-bars"></i></button>
	<div>
    <nav>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="employee_profile.php">Edit your profile</a></li>
      <li><a href="jobs_applied.php">You Applied For</a></li>
      <li><a class="active" href="job_offers.php">Job Offers</a></li>
      <li><a href="companies.php">Companies for you</a></li>
      <li><a href="search.php">Search by choice</a></li>
      <li><a href="logout.php">Logout</a></li>
      </nav>
  </div>
</header>
</div>
<br>
  <div class="tab-content">
    <?php
    $seeker = $_SESSION['username'];
    include "../include/connectdb.php";

    $sql = "SELECT * FROM `hired_you` WHERE `hired`= '$seeker'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      ?>
  <div id="tab-1" class="tab-pane fade show p-0 active">
    <div class="job-item p-4 mb-4">
        <div style="float: left;">
            <img src="../images/favicon.jpg" alt="" style="width: 50px; height: 50px;">
        </div>
        &nbsp;
           <h5 class="mb-2">
            &nbsp;&nbsp;
              <?php echo $row['companyname']; ?>
            </h5>
            <div class=" d-flex align-items-center">
            <div class="text-start ps-1">
          <?php echo "Job opening for:<br>" . "<b>" . $row['occupationtitle'] . "</b>"; ?>
          <br>
            <!-- <?php echo "Requires " . $row['req_no_employees'] . " Employees"; ?>
            <br> -->
            <?php echo "Eligibility:" . "<b>" . $row['qualification_experience'] . "</b>"; ?>
          <br>
          <?php echo "<b>" . $row['jobdescribtion'] . "</b>"; ?>
          <br>
          <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
            <?php echo "<b>" . $row['salary'] . "</b>"; ?>
          </span>
        </div>
        <div style="margin-left:auto; text-align: right;">
          <div class="d-flex justify-content-end">

                <?php
                if (isset($_SESSION['username'])) {
                  $user_name = $_SESSION['username'];
                  $company = $row['companyname'];
                  $jobtitle = $row['occupationtitle'];

                  $query = "SELECT * FROM `applicants` WHERE username='$user_name' AND vacancy_company='$company' AND jobtitle='$jobtitle'";
                  $done = mysqli_query($conn, $query);

                  if (mysqli_num_rows($done) > 0) {
                    // User has already applied, show applied button
                    ?>
                    <button id="myButton-<?php echo $row['id']; ?>" class="button applied">Applied</button>
                    <?php
                  } else {
                    // User has not applied, show apply button
                    ?>
                    <form method="POST" action="job_offers.php">
                      <input type="hidden" name="company" value="<?php echo $company; ?>">
                      <input type="hidden" name="jobtitle" value="<?php echo $jobtitle; ?>">
                      <button type="submit" name="apply" class="button">Apply</button>
                    </form>
                    <?php
                  }
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                <a href="../company/delete.php?page=job_offers&del=<?php echo $row['id']; ?>" class="btn btn-danger"><img
                    style=" height:20px;width:20px;" src="../images/trash.png"> </a>
                    </div>
              <br>
              <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>
                <?php echo "Date: " . $row['date']; ?>
              </small>
            </div>
          </div>
        </div>
<div>
        <br>
      <?php } ?>
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
  include "../include/insert_applicants.php";
  
}

?>