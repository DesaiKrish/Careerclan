<?php
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
              $id = $row['id'];

              $query = "SELECT * FROM `applicants` WHERE username='$user_name' AND vacancy_company='$company' AND jobtitle='$jobtitle'";
              $done = mysqli_query($conn, $query);

              if (mysqli_num_rows($done) > 0) {
                // User has already applied, show applied button
                ?>
                <button id="myButton-<?php echo $row['id']; ?>" class="btn applied">Applied</button>
                <?php
              } else {
                // User has not applied, show apply button
                ?>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <input type="hidden" name="company" value="<?php echo $company; ?>">
                  <input type="hidden" name="jobtitle" value="<?php echo $jobtitle; ?>">
                  <button type="submit" name="apply" class="btn">Apply Now</button>
                </form>
                <?php
              }
            }
            ?>
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