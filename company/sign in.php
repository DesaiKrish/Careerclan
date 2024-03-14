
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../images/favicon.jpg">
    <title>Career Clan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css">
    <style>
       body {
            background-color:#e0e2e4;
            color:black;  
        } 
      </style>
  </head>

  <body>
  <center>
 <div style="margin:50px;">
  <a style="font-size:40px;color:black;text-decoration:none;" href="../index.php"><b>Carrier</b>Clan</a>
  <br>
  <a href="../index.php"><img src="../images/favicon.jpg" alt="favicon" style="width: 100px; height: 100px;"></a>      </div>
      </center>
  
    <form action="sign in.php" method="POST">
    <fieldset>
            <legend style="font-size:20px;text-align:center">Company sign in</legend>
      <?php
      if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo '<p style="color:red;">'. $error .'</p>';   
      }
      if (isset($_GET['error2'])) {
        $error = $_GET['error2'];
        echo '<p style="color:red;">'. $error .'</p>';   
        $del=$_GET['error2'];
        $sql="DELETE FROM `login` WHERE `login`.`email` = '$del'";
        $result = mysqli_query($conn, $sql);
        }  
         
      ?>
   <div class="form-group has-feedback">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
    <input type="text"  id="companyname" name="companyname" placeholder="companyname">
      </div>
     
      <div class="row">
          <div class="col-xs-7">
          already have an account? <a href="company_login.php">login</a>
          </div>
          <div class="col-xs-4">
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block btn-flat">sign in</button>
          </div>
        </div>
    </fieldset>   
    </form>
    <br><br>
    <p style="text-align:center" class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
  </body>
</html>

<?php
session_start();
// Check if the form is submitted
if (isset($_POST['submit'])) {
    
  include "../include/connectdb.php";

    $email = $_POST["email"];
    $password1 = $_POST["password"];
	$companyname = $_POST["companyname"];
	
  $sql = "SELECT * FROM `compsignin` WHERE companyname = '$companyname'";
  $query = "SELECT * FROM `compsignin` WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$run = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
   header("location:sign in.php?error=companyname is already taken,please choose another companyname");
}
elseif (mysqli_num_rows($run) > 0) {
  header("location:sign in.php?error=you have already signed in,please login");
}else{

  $_SESSION['compemail']=$email;
  $_SESSION['cname1']=$companyname;
    // Prepare the SQL statement to insert the data into the "signedup" table
    $query = "INSERT INTO `compsignin` (`email`, `password`, `companyname`) VALUES ('$email', '$password1','$companyname')";
    $result = mysqli_query($conn, $query);
    header("Location: signup_mail.php");
}
}
?>


