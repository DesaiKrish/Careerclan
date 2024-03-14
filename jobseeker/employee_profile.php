<?php
require_once('check.php');
checklogin();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/favicon.jpg">
    <title>Career Clan</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* 
        lightsteelblue
        #c0ded9 login
        #e0e2e4 sign in        
        */
        body {
            background-color: lightsteelblue;
            color: black;

        }
    </style>
</head>

<body>
    <div>
        <header>
            <h1>Create a sound profile</h1>
            <button class="menu-toggle"><i class="fas fa-bars"></i></button>
            <div>
                <nav>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a class="active" href="employee_profile.php">Edit your profile</a></li>
                    <li><a href="jobs_applied.php">You Applied For</a></li>
                    <li><a href="job_offers.php">Job Offers</a></li>
                    <li><a href="companies.php">Companies for you</a></li>
                    <li><a href="search.php">Search by choice</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </nav>
            </div>
        </header>
    </div>
    <br>
    <?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $profession = $_POST['profession'];
    $company = $_POST['dreamcompany'];
    $expected = $_POST['expectedsalary'];
    $phone_number = $_POST['phone_number'];

    include "../include/connectdb.php";

    // Check if the user's profile already exists
    $checkSql = "SELECT * FROM `employee_profile` WHERE `username`='$user_name' AND `email`='$email'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Profile already exists, update the data
        $sql = "UPDATE `employee_profile`
                SET `name`='$name', `city`='$city', `age`='$age', `profession`='$profession', `dreamcompany`='$company', `expectedsalary`='$expected', `phone_number`='$phone_number'
                WHERE `username`='$user_name' AND `email`='$email'";
    } else {
        // Profile does not exist, insert the data
        $sql = "INSERT INTO `employee_profile` (`name`, `username`, `email`, `city`, `age`, `profession`, `dreamcompany`, `expectedsalary`, `phone_number`)
                VALUES ('$name', '$user_name', '$email', '$city', '$age', '$profession', '$company', '$expected', '$phone_number')";
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating/inserting profile: " . mysqli_error($conn);
        // Handle the error case appropriately
    }
}
?>

    <?php
    $uname = $_SESSION['username'];
    include "../include/connectdb.php";
    $query = mysqli_query($conn, "SELECT * FROM `employee_profile` where username='$uname'");

    while ($row = mysqli_fetch_array($query)) {
        $name = $row['name'];
        $user_name = $row['username'];
        $email = $row['email'];
        $city = $row['city'];
        $age = $row['age'];
        $profession = $row['profession'];
        $company = $row['dreamcompany'];
        $expected = $row['expectedsalary'];
        $phone_number = $row['phone_number'];
    }
    ?>

    <form style="margin:0 auto;" action="employee_profile.php" method="post">
        <fieldset>
            <legend style="font-size:20px;">Enter your details</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="Name"
                required>
            <br><br>
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($user_name) ? $user_name : ''; ?>"
                placeholder="Username" required>
            <br><br>
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"
                class="form-control" placeholder="Email address" required autofocus>
            <br><br>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo isset($city) ? $city : ''; ?>"
                class="form-control" placeholder="Current residing city" required>
            <br><br>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo isset($age) ? $age : ''; ?>" class="form-control"
                placeholder="Age" required>
            <br><br>
            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession"
                value="<?php echo isset($profession) ? $profession : ''; ?>" class="form-control"
                placeholder="Current/Expected Designation" required>
            <br><br>
            <label>Your Dream Company:</label>
            <input type="text" id="dreamcompany" name="dreamcompany"
                value="<?php echo isset($company) ? $company : ''; ?>" class="form-control" placeholder="Company Name"
                required>
            <br><br>
            <label>Expected Salary:</label>
            <input type="text" id="expectedsalary" name="expectedsalary"
                value="<?php echo isset($expected) ? $expected : ''; ?>" class="form-control"
                placeholder="Expected Salary" required>
            <br><br>
            <label for="phone_number">Contact number:</label>
            <input type="number" id="phone_number" name="phone_number"
                value="<?php echo isset($phone_number) ? $phone_number : ''; ?>" class="form-control"
                placeholder="Mobile No." required>

            <br><br><br>
            <center><input class="btn btn-success btn-block" type="submit" name="submit" id="submit"
                    placeholder="submit">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset">
            </center>
        </fieldset>
    </form>
    </div>
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');

        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('open');
        });

    </script>
</body>

</html>
