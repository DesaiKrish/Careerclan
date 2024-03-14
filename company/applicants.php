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
      <h1 style="color:white;"> Your Applicants</h1>
      <button class="menu-toggle"><i class="fas fa-bars"></i></button>

      <div>
        <nav>
          <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add a job vacancy</a>
          <a href="add_job_vacancy.php"> Job List</a>
          <a class="active" href="applicants.php">Applicants</a>
          <a href="search_employees.php">Search Employees</a>
          <a href="employees_for_you.php">Recommended Employees</a>
          <a href="employees_hired.php">You Hired</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="logout.php">Logout</a>
        </nav>
      </div>
    </header>
  </div>
  <h1 style="font-size:30px; text-align:center;"><b>Congratulations you got employees!</b></h1><br>
  <div class="tab-content">

    <?php
    $company = $_SESSION['compname'];
    include "../include/connectdb.php";

    $sql = "SELECT * FROM `applicants` WHERE `vacancy_company`= '$company'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      ?>
 <div id="tab-1" class="tab-pane fade show p-0 active">
  <div class="job-item p-4 mb-4">
    <div style="float: left;">
      <img src="../images/favicon.jpg" alt="" style="width: 50px; height: 50px;">
    </div>
    &nbsp;
    <h6 class="mb-2">
      &nbsp;&nbsp;
      <?php echo $row['username'] ?>,
      <?php echo " Applied for<br>&nbsp;&nbsp; " . $row['jobtitle'] ?>
    </h6>
    <div class=" d-flex align-items-center">
      <div class="text-start ps-1">
        <?php echo "Expertise in<br>" . "<b>" . $row['profession'] . "</b>"; ?>
        <br>
        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
          <?php echo "<b>".$row['city']."</b>"; ?>
        </span>
        <br>
        <?php echo "<b>".$row['age']."</b>" . " Years old"; ?>
        <br>
        <a style="color: blue" href="tel:<?php $row['phone_number']; ?>"><i class="fas fa-phone"></i>
          <?php echo $row['phone_number']; ?>
          <br>
        </a>
        <!-- <a style="color: blue" href="mailto:<?php $row['email']; ?>">
          <?php echo $row['email']; ?>
        </a> -->
      </div>
      <div style="margin-left:auto; text-align: right;">
        <div class="d-flex justify-content-end">
          <?php
          if (isset($_SESSION['compname'])) {
            $companyname = $_SESSION['compname'];
            $name = $row['username'];
            $jobtitle = $row['jobtitle'];
            $id = $row['id'];

            $query = "SELECT * FROM `hired_you` WHERE companyname='$companyname' AND hired='$name' AND occupationtitle='$jobtitle'";
            $done = mysqli_query($conn, $query);

            if (mysqli_num_rows($done) > 0) {
              // User has already applied, show applied button
              ?>
              <button id="myButton-<?php echo $row['id']; ?>" class="button applied">hired</button>
              <?php
            } else {
              // User has not applied, show apply button
              ?>
              <form method="POST" action="applicants.php">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="jobtitle" value="<?php echo $jobtitle; ?>">
                <button type="submit" name="apply" class="button">Hire</button>
              </form>
              <?php
            }
          }
          ?>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="delete.php?page=applicants&del=<?php echo $row['id']; ?>" class="btn btn-danger">
            <img style="height: 20px; width: 20px;" src="../images/trash.png">
          </a>
        </div>
        <br>
        <small class="text-truncate">
          <i class="far fa-calendar-alt text-primary me-2"></i>
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the form is submitted
  include "../include/connectdb.php";
  // Get the form data
  $companyname = $_SESSION['compname'];
  $name = $_POST['name'];
  $jobtitle = $_POST['jobtitle'];

  $query1 = "SELECT * FROM `hired_you` WHERE companyname='$companyname' AND hired='$name' AND occupationtitle='$jobtitle'";
  include "../include/insert_employee.php";

}
?>