<div id="tab-1" class="tab-pane fade show p-0 active">
    <div class="job-item p-4 mb-4">
        <div style="float: left;">
            <img src="../images/favicon.jpg" alt="" style="width: 50px; height: 50px;">
        </div>
        &nbsp;
        <h5 class="mb-2">
            &nbsp;&nbsp;
            <?php echo $row['name']; ?>
        </h5>
        <div class=" d-flex align-items-center">
            <div class="text-start ps-1">
                <?php echo "Expertise in<br>" . "<b>" . $row['profession'] . "</b>"; ?>
                <br>
                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <?php echo "<b>" . $row['city'] . "</b>"; ?>
                </span>
                <br>
                <?php echo "<b>" . $row['age'] . "</b>" . " Years old"; ?>
                <br>
                <a style="color: blue" href="tel:<?php $row['phone_number']; ?>"><i class="fas fa-phone"></i>
                    <?php echo $row['phone_number']; ?>
                    <br>
                </a>
                <a style="color: blue" href="mailto:<?php $row['email']; ?>">
                    <?php echo $row['email']; ?>
                </a>
            </div>
            <div style="margin-left:auto; text-align: right;"> <!-- Modified here -->
                <div class="d-flex justify-content-end">