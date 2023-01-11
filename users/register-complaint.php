<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$complaintype=$_POST['complaintype'];
$state=$_POST['state'];
$complaintdetials=$_POST['complaindetails'];
$compfile=$_FILES["compfile"]["name"];

move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);

$query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,state,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$complaintdetials','$compfile')");

//echo "insert into tblcomplaints(userId,category,subcategory,complaintType,state,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$complaintdetials','$compfile')";

if($query) {

$sender = $_SESSION['login'];

$query1=mysqli_query($con,"select fullName from users where userEmail='".$sender."'");
while($row=mysqli_fetch_array($query1)) 
 {

$sendername = $row['fullName'];
}
$toema = "itteam@healthopinion.net";

$subjct = "Complaint Form";
$strHeader = "";
		$strHeader .= "MIME-Version: 1.0\n";
		$strHeader .= "Content-type:text/html; charset=iso-8859-1\n";
		$strHeader .= "From: CMS\r\n";
$fullmessg = "Hi Team,<br/><br/>
		The following details are received from  <b>CMS</b><br/>
		<br/><b>Name: </b>".$sendername."<br/>
		<b>Email ID: </b>".$sender."<br/>	
		<b>Department : </b>".$state."<br/>	
		<b>Complaint Type : </b>".$complaintype."<br/>
                 <b>Complaint Details : </b>".$complaintdetials."<br/>
		<br/>Thanks and Regards,<br/>".ucwords($fname)."<br/>
		<br/><br/>";


mail($toema,$subjct,$fullmessg,$strHeader);

if($sender)
{

mail($sender,$subjct,$fullmessg,$strHeader);

}

   }
   else {   
echo '<script> alert("Oops! Something went wrong try again !")</script>';

   }

// code for show complaint number
$sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | User Register Complaint</title>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery cdn -->
 https://code.jquery.com/jquery-3.6.0.min.js

    <script>
    function getCat(val) {
        //alert('val');

        $.ajax({
            type: "POST",
            url: "getsubcat.php",
            data: 'catid=' + val,
            success: function(data) {
                $("#subcategory").html(data);

            }
        });
    }
    </script>

</head>

<body>

    <section id="container">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Register Complaint</h3>

                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">


                            <?php if($successmsg)
                      {?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                            </div>
                            <?php }?>

                            <?php if($errormsg)
                      {?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?>
                            </div>
                            <?php }?>

                            <form class="form-horizontal style-form" method="post" name="complaint"
                                enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                    <div class="col-sm-4">
                                        <select name="category" id="category" class="form-control"
                                            onChange="getCat(this.value);" required="">
                                            <option value="">Select Category</option>
                                            <?php $sql=mysqli_query($con,"select id,categoryName from category");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
                                            <option value="<?php echo htmlentities($rw['id']);?>">
                                                <?php echo htmlentities($rw['categoryName']);?></option>
                                            <?php
}
?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
                                    <div class="col-sm-4">
                                        <select name="subcategory" id="subcategory" class="form-control">
                                            <option value="">Select Subcategory</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Complaint Type</label>
                                    <div class="col-sm-4">
                                        <select name="complaintype" class="form-control" required="">
                                            <option value="Emergency">Emergency</option>
                                            <option value="Non-Emergency">Non-Emergency</option>
                                        </select>
                                    </div>

                                    <label class="col-sm-2 col-sm-2 control-label">Department</label>
                                    <div class="col-sm-4">
                                        <select name="state" required="required" class="form-control"
                                            onChange="getCat(this.value);">
                                            <option value="">Select Department</option>
                                            <?php $sql=mysqli_query($con,"select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
                                            <option value="<?php echo htmlentities($rw['stateName']);?>">
                                                <?php echo htmlentities($rw['stateName']);?></option>
                                            <?php
}
?>

                                        </select>



                                    </div>




                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Location</label>
                                    <div class="col-sm-4">
                                        <select name="complaintype" class="form-control" required="">
                                            <option value="">Select Your Location</option>
                                            <option value="Chennai">Chennai</option>
                                            <option value="Bangalore">Bangalore</option>
                                        </select>

                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <!-- <div class="col-sm-4">-->
                                    <!--<select name="subcategory" id="subcategory" class="form-control" >-->
                                    <!--<option value="">Select Subcategory</option>-->
                                    <!--</select>-->
                                    <!--</div>-->
                                </div>





                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Complaint Details (max 2000 words)
                                    </label>
                                    <div class="col-sm-6">
                                        <textarea name="complaindetails" required="required" cols="10" rows="10"
                                            class="form-control" maxlength="2000"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Complaint Related Doc(if any)
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="compfile" class="form-control" value="">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-10" style="padding-left:25% ">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



            </section>
        </section>
        <?php include("includes/footer.php");?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>

    <!--custom checkbox & radio-->

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


    <script src="assets/js/form-component.js"></script>


    <script>
    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });
    </script>

</body>

</html>
<?php } ?>