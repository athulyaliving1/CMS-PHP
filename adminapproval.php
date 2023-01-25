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

    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
    </style>
    <div>
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">

            <?php
       include('./include/adminsidebar.php');
           
           ?>

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">


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




                        </div>
                    </div>
                </div>



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