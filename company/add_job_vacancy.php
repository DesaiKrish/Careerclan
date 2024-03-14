<?php
require_once('check.php');
checklogin();

$_SESSION["source"] = "add_job_vacancy";

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

</head>


<body>
  <div>
    <header>
      <h1 style="color:white">Job Vacancies</h1>
      <button class="menu-toggle"><i class="fas fa-bars"></i></button>
      <div>
        <nav>
          <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add a job vacancy</a>
          <a class="active" href="add_job_vacancy.php"> Job List</a>
          <a href="applicants.php">Applicants</a>
          <a href="search_employees.php">Search Employees</a>
          <a href="employees_for_you.php">Recommended Employees</a>
          <a href="employees_hired.php">You Hired</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="logout.php">Logout</a>
        </nav>
      </div>
    </header>
  </div>
  <br>
  <div class="tab-content">

    <?php
    include "../include/connectdb.php";
    $company = $_SESSION['compname'];
    $sql = "SELECT * FROM `vacancyform` where companyname='$company'";
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
          <!-- <?php echo "Requires " . "<b>" . $row['req_no_employees'] . "</b>" . " Employees"; ?>
          <br> -->
          <?php echo "Eligibility:" . "<b>" . $row['qualification_experience'] . "</b>"; ?>
          <br>
          <?php echo "<b>" . $row['jobdescribtion'] . "</b>"; ?>
          <br>
          <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
            <?php echo "<b>" . $row['salary'] . "</b>"; ?>
          </span>
        </div>
        <div style="margin-left:auto; text-align: right;"> <!-- Modified here -->
          <div class="d-flex justify-content-end">

            <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-success"><i class='fa fa-edit'></i></a>
            &nbsp;&nbsp;&nbsp;
            <a href="delete.php?page=jobvacancy&del=<?php echo $row['id']; ?>" class="btn btn-danger"><img
                style=" height:20px;width:20px;" src="../images/trash.png"> </a>

          </div>
          <br>
          <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>
            <?php echo "Date: " . $row['date']; ?>
          </small>
        </div>
      </div>
    </div>
    </div>
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