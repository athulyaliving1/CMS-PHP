<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	date_default_timezone_set('Asia/Kolkata'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && username='" . $_SESSION['alogin'] . "'");
		$num = mysqli_fetch_array($sql);
		if ($num > 0) {
			$con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
			$_SESSION['msg'] = "Password Changed Successfully !!";
		} else {
			$_SESSION['msg'] = "Old Password not match !!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Change Password</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
		rel='stylesheet'>

	<!-- Tailwind css -->
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />


	<script type="text/javascript">
		f		unction valid()
		if (document.chngpwd.password.va lu e = "				") {
			alert("Current Password Filed is Emp				ty !!");
			document.chngpwd.passw				ord.focus();
			return false;
		}
			else if (document.c hn gpw.n				ewpassword.value == "") {
			alert("New 				Password Filed is Empty !!");
				docu				ment.chngpwd.n			ew			passwor d.focus();
			return false;
		}
			el se  if (d				ocument.chngpwd.confirmpassword.value == "") {
			alert("Confirm Password Filed is Emp				ty !!");
				d			oc			ument.c hngpwd.confirmpassword.focus();
			return false;
		}
			else if (document.c ng				pwd.newpassword.value != document.chngpwd.confirmpassword.value				) {
			alert("Password and Confirm Passwo				rd Field do no			t 			match  !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
		}	</script>
	<style>
		.b {
			border: 2px solid;
		}

		.grids {
			display: grid;
			grid-template-columns: 1fr 1fr 1fr 1fr;
			grid-template-rows: 1fr;
			grid-template-areas: "item1 item2 item3 item4";
			grid-gap: 5px;
		}

		.item1 {
			display: grid;
			grid-area: item1;
			border: 2px solid;
		}

		.item2 {
			display: grid;
			grid-area: item2;
			border: 2px solid;
		}

		.item3 {
			display: grid;
			grid-area: item3;
			border: 2px solid;
		}

		.item4 {
			display: grid;
			grid-area: item4;
			border: 2px solid;
		}

		@media only screen and(max-width:500px) {

			.grids {
				display: grid;
				grid-template-columns: 1fr;
				grid-template-rows: 1fr 1fr 1fr 1fr;
				grid-template-areas: "item1"
					"item2"
					"item3"
					"item4";
				grid-gap: 5px;
			}

		}
	</style>
</head>

<body>
	<?php include('include/header.php'); ?>

	<!-- component -->
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

	<!-- This is an example component -->
	<div class="max-w-2xl mx-auto">

		<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
			option</label>
		<select id="countries"
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			<option selected>Choose a country</option>
			<option value="US">United States</option>
			<option value="CA">Canada</option>
			<option value="FR">France</option>
			<option value="DE">Germany</option>
		</select>

		<p class="mt-5">This select component is part of a larger, open-source library of Tailwind CSS components.
			Learn
			more
			by going to the official <a class="text-blue-600 hover:underline"
				href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite
				Documentation</a>.
		</p>
		<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
	</div>

	<?php include('include/footer.php'); ?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</body>
<?php } ?>