<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="../images/favicon.jpg">
  <title>Career Clan</title>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/form.css">
  <style>
    body {
      background-color: #c0ded9;
      color: black;
    }
  </style>
</head>
<body>

<center>
 <div style="margin:50px;">
  <a style="font-size:40px;color:black;text-decoration:none;" href="../index.php"><b>Carrier</b>Clan</a>
  <br>
  <a href="../index.php"><img src="../images/favicon.jpg" alt="favicon" style="width: 100px; height: 100px;"></a>
      </div>
      </center>
      
    <form method="post" action="company_login.php">
    <fieldset>
        <legend style="font-size:20px;text-align:center;">company Login</legend>
    <?php
      if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo '<p style="color:red;">'. $error .'</p>';   
      }
      ?>
   
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-7">
         Don't have an account ? <a href="sign in.php">Register now</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block btn-flat">login</button>
        </div>
        <!-- /.col -->
      </div>
      </fieldset>
    </form>
    <br><br>
    <p style="text-align:center" class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </body>
    </html>
    <?php
session_start(); // Start the session

if (isset($_POST['submit'])) {
  
  include "../include/connectdb.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the email exists
    $sql = "SELECT * FROM `compsignin` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $storedPassword = $row['password'];

        // Use password_verify to compare the entered password with the stored hashed password
        if ($password=== $storedPassword) {
            // Passwords match, user is authenticated
            // Store relevant user information in the session
          
            $_SESSION['compname'] = $row['companyname'];
            $_SESSION['clogin']=true;
            // Redirect to the dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid password
            header("Location: company_login.php?error=invalid_password");
            exit();
        }
    } else {
        // User's account doesn't exist, redirect to the sign-in page
        header("Location: company_login.php?error=Wrong Email address or company's account doesn't exist please sign in to register your account");
        exit();
    }
}
?>