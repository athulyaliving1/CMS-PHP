<div class="span3">
	<div class="sidebar">


		<ul class="widget widget-menu unstyled">
			<li>
				<a class="collapsed" data-toggle="collapse" href="#togglePages">
					<i class="menu-icon icon-cog"></i>
					<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
					Manage Complaint
				</a>
				<ul id="togglePages" class="collapse unstyled">
					<li>
						<a href="notprocess-complaint.php">
							<i class="icon-tasks"></i>
							Not Process Yet Complaint
							<?php
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints WHERE status IS NULL");
                            $num1 = mysqli_num_rows($rt); { ?>
							{??

							<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="inprocess-complaint.php">
							<i class="icon-tasks"></i>
							Pending Complaint
							<?php
                            $status = "in Process";
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="closed-complaint.php">
							<i class="icon-inbox"></i>
							Closed Complaints
							<?php
                            $status = "closed";
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>

						</a>
					</li>
				</ul>
			</li>


			<li>
				<a class="collapsed" data-toggle="collapse" href="#togglePages1">
					<i class="menu-icon icon-cog"></i>
					<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
					Manage Purchases
				</a>
				<ul id="togglePages1" class="collapse unstyled">
					<li>
						<a href="notprocess-purchase.php">
							<i class="icon-tasks"></i>
							Not Process Yet Purchases
							<?php
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status is null");
                            $num1 = mysqli_num_rows($rt); { ?>
							{??

							<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="inprocess-purchase.php">
							<i class="icon-tasks"></i>
							Pending Purchases
							<?php
                            $status = "in Process";
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="closed-purchase.php">
							<i class="icon-inbox"></i>
							Closed Purchases
							<?php
                            $status = "closed";
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>

						</a>
					</li>
				</ul>
			</li>

			<li>
				<a class="collapsed" data-toggle="collapse" href="#togglePages2">
					<i class="menu-icon icon-cog"></i>
					<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
					Manage Requirements
				</a>
				<ul id="togglePages2" class="collapse unstyled">
					<li>
						<a href="notprocess-requirements.php">
							<i class="icon-tasks"></i>
							Not Process Yet Requirements
							<?php
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status is null");
                            $num1 = mysqli_num_rows($rt); { ?>
							{??

							<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="inprocess-requirements.php">
							<i class="icon-tasks"></i>
							Pending Requirements
							<?php
                            $status = "in Process";
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="closed-requirements.php">
							<i class="icon-inbox"></i>
							Closed Requirements
							<?php
                            $status = "closed";
                            $rt = mysqli_query($con, "SELECT * FROM requirements where status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>

						</a>
					</li>
				</ul>
			</li>






			<li>
				<a href="manage-users.php">
					<i class="menu-icon icon-group"></i>
					Manage users
				</a>
			</li>
		</ul>


		<ul class="widget widget-menu unstyled">
			<li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
			<li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Sub-Category </a></li>
			<li><a href="state.php"><i class="menu-icon icon-paste"></i>Add Department</a></li>
			<li><a href="vendor.php"><i class="menu-icon icon-paste"></i>Add Vendor</a></li>


		</ul><!--/.widget-nav-->

		<ul class="widget widget-menu unstyled">
			<li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>

			<li>
				<a href="logout.php">
					<i class="menu-icon icon-signout"></i>
					Logout
				</a>
			</li>
		</ul>

	</div><!--/.sidebar-->
</div><!--/.span3-->