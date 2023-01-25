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


if (isset($_POST['received'])) {
    $appUpdateQuery = "UPDATE paymentdetails SET status='Item_Received' WHERE id='" . $_POST['row_id'] . "'";
    $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
    $appInsertQuery = "INSERT INTO paymentdetails (id,status) VALUES ('" . $_POST['row_id'] . "','Item_Received')";
    $appInsertResult = mysqli_query($conn, $appInsertQuery);
}

else{

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Purchase-Status</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>


    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            },
            screens: {
                ss: "320px",
                // => @media (min-width: 640px) { ... }

                sm: "375px",
                sl: "425px",

                md: "768px",
                // => @media (min-width: 768px) { ... }

                lg: "1024px",
                // => @media (min-width: 1024px) { ... }

                xl: "1280px",
                // => @media (min-width: 1280px) { ... }

                desktop: "1440px",
                // => @media (min-width: 1536px) { ... }
            },
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
    }
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
       include('./include/purchasesidebar.php');
           
           ?>

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">


                <!-- Client Table -->
                <div class="mt-4 mx-4">
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-800 uppercase border-b  bg-gray-50 ">
                                        <th class="py-4 px-6 ">Id </th>
                                        <th class="py-4 px-6 ">Ref No<i class="baseline-near_me"></i></th>
                                        <th class="py-4 px-6 ">Transaction ID</th>
                                        <th class="py-4 px-6 ">Amount</th>
                                        <th class="py-4 px-6 ">Mode</th>
                                        <th class="py-4 px-6 ">Payment</th>
                                        <th class="py-4 px-6 ">Action</th>
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

                                    <tr class="bg-white border-b hover:bg-gray-50 ">

                                        <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                            <?php echo htmlentities($row['id']); ?>
                                        </td>
                                        <td class="py-2 px-6">
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
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['status']); ?>
                                        </td>

                                        <td class="py-4 px-6">
                                            <form method="post" action="">
                                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />

                                                <?php if ($row['status'] !='Item_Received')
                                    {
                                        ?>
                                                <button
                                                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                                    type="submit" name="received">Received</button>
                                                <?php
                                      }else{

                                      ?>

                                                <button
                                                    class="focus:outline-none text-white bg-green-600  focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                                    type="submit" name="received">Item
                                                    Received</button>

                                                <?php
                                           
                                      } 
                                     ?>


                                            </form>
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

                            </div>
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