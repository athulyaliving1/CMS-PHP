<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="#"><img src="assets/img/front.png" style="width:80px;"></a></p>

            <?php
            $query = mysqli_query($con, "select fullName from users where userEmail='" . $_SESSION['login'] . "'");



            while ($row = mysqli_fetch_array($query)) {
            ?> ??
            <h5 class="centered"><?php echo htmlentities($row['fullName']); ?></h5>
            <?php } ?>

            <li class="mt">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Account Setting <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="register-complaint.php">
                    <i class="fa fa-book"></i>
                    <span>Add Complaint</span>
                </a>
            </li>
            </li>
            <li class="sub-menu">
                <a href="complaint-history.php">
                    <i class="fa fa-tasks"></i>
                    <span>Complaint History</span>
                </a>

            </li>

            <li class="sub-menu">
                <a href="requirements.php">
                    <i class="fa fa-book"></i>
                    <span>Add Requirement</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="vendor.php">
                    <i class="fa fa-book"></i>
                    <span>Vendor-Registration</span>
                </a>
            </li>

            </li>
            <li class="sub-menu">
                <a href="requirements-history.php">
                    <i class="fa fa-tasks"></i>
                    <span>Requirements History</span>
                </a>

            </li>



        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>