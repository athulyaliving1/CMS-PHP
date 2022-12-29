 <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="dashboard.php" class="logo"><b>Complaint Management System</b></a>
                
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
 <?php
 $query=mysqli_query($con,"select fullName from users where userEmail='".$_SESSION['login']."'");

				   
	
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
              	  <li style="color: #ffffff; font-size: 15px; padding: 20px 15px;">Hi &nbsp;Welcome, <?php echo htmlentities($row['fullName']);?> ! </li>
                  <?php } ?>


                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>