<?php
session_start();
error_reporting(1);
include('./include/config.php');
// $conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
// $conn = mysqli_connect('localhost', 'athul9z1_cmsuser', 'Health@123', 'athul9z1_cms');
// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connection successful";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Summary </title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
    </script>
    </script>

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
            include('./include/susidebar.php');

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
                                        <th class="px-4 py-3">Ref No</th>
                                        <th class="px-4 py-3">Transaction ID</th>
                                        <th class="px-4 py-3">Amount</th>
                                        <th class="px-4 py-3">Mode</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $limit = 5;

                                    // query to retrieve all rows from the table Countries

                                    $getQuery = "SELECT * FROM paymentdetails ";


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

                                    $getQuery = "SELECT * FROM paymentdetails  LIMIT " . $initial_page . ',' . $limit;

                                    $result = mysqli_query($conn, $getQuery);

                                    //display the retrieved result on the webpage  




                                    while ($row = mysqli_fetch_array($result)) {

                                        // echo $row['id'] . ' ' . $row['vendorname'] . '</br>';


                                    ?>

                                    <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700">



                                        <td class="py-4 px-6"> <?php echo htmlentities($row['id']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['refno']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['transcationid']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['amount']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['mode']); ?>
                                        </td>

                                    </tr>
                                    <?php



                                    } ?>

                                </tbody>


                            </table>

                            <div>

                                <div class="flex justify-center">
                                    <div class="flex items-center space-x-5">
                                        <?php
                                        // show page number with link   

                                        for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                                            echo '<a href = "Purchasestatus.php?page=' . $page_number . '">' . $page_number . ' </a>';
                                        }
                                        ?>
                                    </div>
                                </div>





                                <!-- <div class="flex justify-center">
                <nav aria-label="Page navigation example">
                    
                    <ul class="flex list-style-none">
                        <li class="page-item disabled"><a
                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-500 pointer-events-none focus:shadow-none"
                                href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                        <li class="page-item"><a
                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                href="#">1</a></li>
                        <li class="page-item active"><a
                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-blue-600 outline-none transition-all duration-300 rounded text-white hover:text-white hover:bg-blue-600 shadow-md focus:shadow-md"
                                href="#">2 <span class="visually-hidden">(current)</span></a></li>
                        <li class="page-item"><a
                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                href="#">3</a></li>
                        <li class="page-item"><a
                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                href="#"> </a></li>
                    </ul>
                </nav>
            </div> -->




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
                        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js">
                        </script>




</body>

</html>