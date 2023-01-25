<?php
session_start();
error_reporting(1);
include('./include/config.php');
// $conn = mysqli_connect('localhost', 'athul9z1_cmsuser', 'Health@123', 'athul9z1_cms');
// $conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connection successful";
// }



if (isset($_POST['approved'])) {
    $appUpdateQuery = "UPDATE purchaserequest SET status='Approved' WHERE id='" . $_POST['row_id'] . "'";
    $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
    $appInsertQuery = "INSERT INTO purchaserequest(id,status) VALUES ('" . $_POST['row_id'] . "','Approved')";
    $appInsertResult = mysqli_query($conn, $appInsertQuery);
}

if (isset($_POST['rejected'])) {
    $rejUpdateQuery = "UPDATE purchaserequest SET status='Rejected' WHERE id='" . $_POST['row_id'] . "'";
    $rejUpdateResult = mysqli_query($conn, $rejUpdateQuery);
    $rejInsertQuery = "INSERT INTO purchaserequest(id,status) VALUES ('" . $_POST['row_id'] . "','Rejected')";
    $rejInsertResult = mysqli_query($conn, $rejInsertQuery);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body>
    <!-- component -->
    <style>
    /* Compiled dark classes from Tailwind */


    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }

    .sidebar:hover {
        width: 16rem;
    }

    @media only screen and (min-width: 1024px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
    </style>


    <div>
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">

            <!-- Header -->
            <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                <div
                    class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-sky-900  border-none">
                    <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                        src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block">ADMIN</span>
                </div>
                <div class="flex justify-between items-center h-14 bg-sky-900  header-right">
                    <div
                        class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                        <button class="outline-none focus:outline-none">
                            <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        <input type="search" name="" id="" placeholder="Search"
                            class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                    </div>
                    <ul class="flex items-center">

                        <li>
                            <div class="block w-px h-6 mx-3 bg-gray-400 "></div>
                        </li>
                        <li>
                            <a href="logout.php" class="flex items-center mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./Header -->

            <!-- Sidebar -->
            <div
                class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-sky-900  h-full text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                            </div>
                        </li>
                        <li>
                            <a href="adminapproval.php"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="avendorlist.php"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500 d pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Vendorlist</span>
                                <span
                                    class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="aaccountsummary.php"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500  pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Account Summary</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500  pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                                <span
                                    class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                            </a>
                        </li>
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center mt-5 h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                            </div>
                        </li>
                        <li>
                            <a href="#"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500  pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-sky-900  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-pink-500  pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                            </a>
                        </li> -->
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023</p>
                </div>
            </div>


            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    
                <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">



                    <!-- Recent Activities -->

                    <!-- ./Recent Activities -->
                </div>
                <!-- Client Table -->
                <div class="mt-4 mx-4">
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50 ">
                                        <th class="px-4 py-3">Id </th>
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">State</th>
                                        <th class="px-4 py-3">Location</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">Place</th>
                                        <th class="px-4 py-3">Product</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3">Qty</th>
                                        <th class="px-4 py-3">Vendor</th>
                                        <th class="px-4 py-3">Action</th>
                                        <th class="px-4 py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                        $limit = 5;

                        // query to retrieve all rows from the table Countries

                        $getQuery = "SELECT * FROM purchaserequest WHERE status='request_pending'";


                        // get the result

                        $result = mysqli_query($conn, $getQuery);

                        $total_rows = mysqli_num_rows($result);

                        // get the required number of pages

                        $total_pages = ceil($total_rows / $limit);

                        // update the active page number

                        if (!isset($_GET['page'])) {

                            $page_number = 1;
                        } else {

                            $page_number = $_GET['page'];
                        }

                        // get the initial page number

                        $initial_page = ($page_number - 1) * $limit;

                        // get data of selected rows per page    

                        $getQuery = "SELECT * FROM purchaserequest WHERE status='request_pending' LIMIT " . $initial_page . ',' . $limit;

                        $result = mysqli_query($conn, $getQuery);

                        //display the retrieved result on the webpage  







                        while ($row = mysqli_fetch_array($result)) {


                            // echo $row['id'] . ' ' . $row['vendorname'] . '</br>';
                        }

                        ?>


                                    <?php
                        $selectQuery = "SELECT * FROM purchaserequest WHERE status='request_pending'";
                        $sql = mysqli_query($conn, $selectQuery);
                        $count = mysqli_num_rows($sql);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                                    <tr>





                                    <tr class="bg-white border-b hover:bg-gray-50 ">



                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                            <?php echo htmlentities($row['id']); ?>
                                        </th>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['name']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['state']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['location']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['department']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['place']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['equipment']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['price']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['qty']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['vendor']); ?>
                                        </td>



                                        <td class="py-4">
                                            <form method="post" action="">
                                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                                <button type="submit" name="approved"
                                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-600 border border-green-500 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Approve
                                                </button>


                                            </form>
                                            <form method="post" action="">


                                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                                <button
                                                    class="inline-flex items-center justify-center px-6 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-500 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                                                    type="submit" name="rejected">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                            }
                        } else {
                            echo "No Record";
                        }
                        ?>

                                </tbody>
                                </tbody>


                            </table>

                            <div>
            </div>

                            <div class="flex justify-center">
                                <div class="flex items-center space-x-5">
                                    <?php
// show page number with link   





for ($page_number = 1; $page_number <= $total_pages; $page_number++) {

    echo '<a href = "adminapproval.php?page=' . $page_number . '">' . $page_number . ' </a>';
}



?>

                                </div>
                            </div>
                            <!-- ./Sidebar -->
                        </div>



                    </div>
                </div>
                <script type="text/javascript">
                $(".remove").click(function() {
                    var id = $(this).parents("tr").attr("id");


                    if (confirm('Are you sure to remove this record ?')) {
                        $.ajax({
                            url: '/vendorlist.php',
                            type: 'GET',
                            data: {
                                id: id
                            },
                            error: function() {
                                alert('Something is wrong');
                            },
                            success: function(data) {
                                $("#" + id).remove();
                                alert("Record removed successfully");
                            }
                        });
                    }
                });
                </script>

                <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

                <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>

                <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js">
                </script>



</body>

</html>