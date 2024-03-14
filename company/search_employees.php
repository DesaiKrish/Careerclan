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

    .btn.hired {
        background-color: green;
        color: white;
    }
</style>

<body>
    <div>
        <header>
            <h1 style="color:white;"> search employees</h1>
            <button class="menu-toggle"><i class="fas fa-bars"></i></button>
            <div>
                <nav>
                    <a href="form_job_vacancy.php"><i class="fa fa-plus-circle fw-fa"></i> Add a job vacancy</a>
                    <a href="add_job_vacancy.php"> Job List</a>
                    <a href="applicants.php">Applicants</a>
                    <a class="active" href="search_employees.php">Search Employees</a>
                    <a href="employees_for_you.php">Recommended Employees</a>
                    <a href="employees_hired.php">You Hired</a>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="logout.php">Logout</a>
                </nav>
            </div>

        </header>
    </div>


    <h1 style="font-size:30px; text-align:center;"><b>Find a talent of your requirement...</b></h1><br>
    <div class="tab-content">

        <center>
            <form action="search_employees.php" method="post">
                <div class="search-container">
                    <div class="search-bar">
                        <input type="text" name="searche" placeholder="Search...">
                        <label for="search">choose</label><br>
                        <select name="choice">
                            <option value="name">Name</option>
                            <option value="profession">Profession</option>

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
        $sql = "SELECT * FROM `employee_profile`";
        $result = "";

        if (isset($_POST['search'])) {
            $search = $_POST['searche'];
            $choice = $_POST['choice'];
            $search = mysqli_real_escape_string($conn, $search);
            if ($choice === 'name') {
                $sql = "SELECT *
          FROM `employee_profile`
          WHERE `name` LIKE '%$search%' OR
           SOUNDEX(name) = SOUNDEX('$search')";

            } elseif ($choice === 'profession') {
                $sql = "SELECT *
          FROM `employee_profile`
          WHERE profession LIKE '%$search%' OR
                SOUNDEX(profession) = SOUNDEX('$search')";
            }
        }

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
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
                    <form method="POST" action="search_employees.php">
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

if (isset($_POST['hire'])) {
    // Check if the form is submitted
    include "../include/connectdb.php";
    // Get the form data
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