<?php
session_start();
error_reporting(1);
include('includes/config.php');
$conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connection successful";
// }


if (isset($_POST['acknowledge'])) {
    $appUpdateQuery = "UPDATE purchaseorder SET status='accounts_approved' WHERE id='" . $_POST['row_id'] . "'";
    $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
    $appInsertQuery = "INSERT INTO purchaseorder (id,status) VALUES ('" . $_POST['row_id'] . "','accounts_approved')";
    $appInsertResult = mysqli_query($conn, $appInsertQuery);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

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
    <?php

    include("../include/header.php");
    include("./sidebar1.php");
   

        ?>


    <div class="container mx-auto bg-white  p-16">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            <div>


                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="py-3 px-6">
                                id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                deparment
                            </th>
                            <th scope="col" class="py-3 px-6">
                                eqipment
                            </th>
                            <th scope="col" class="py-3 px-6">
                                qty
                            </th>
                            <th scope="col" class="py-3 px-6">
                                price
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Reference Number
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Payment terms
                            </th>

                            <th scope="col" class="col-2  py-3 px-6">
                                File name

                            </th>

                            <th scope="col" class="col-2  py-3 px-6">
                                P.O Status

                            </th>
                            <th scope="col" class="col-2  py-3 px-6">
                                Action

                            </th>
                            <th scope="col" class="col-2  py-3 px-6">
                                Paytment Action

                            </th>





                        </tr>
                    </thead>





                    <tbody>
                        <?php

                        $limit = 5;

                        // query to retrieve all rows from the table Countries

                        $getQuery = "SELECT * FROM purchaseorder ";


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

                        $getQuery = "SELECT * FROM purchaseorder LIMIT  " . $initial_page . ',' . $limit;

                        $result = mysqli_query($conn, $getQuery);

                        //display the retrieved result on the webpage  







                        while ($row = mysqli_fetch_array($result)) {

                            // echo $row['id'] . ' ' . $row['vendorname'] . '</br>';


                        ?>

                        <tr class="bg-white border-b hover:bg-gray-50 ">



                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                <?php echo htmlentities($row['id']); ?>
                            </th>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['name']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['department']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['equipment']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['qty']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['price']); ?>
                            </td>


                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['refno']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['paymentterms']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['compfile']); ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['status']); ?>
                            </td>




                            <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">

                                <form method="post" action="">
                                    <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                    <button
                                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                        type="submit" name="acknowledge">Acknowledge</button>
                                </form>
                            </td>

                            <td>
                                <div x-data="{ modelOpen: false }">


                                    <button href="accountapproval.php?refno=<?php echo $row['refno']; ?>   "
                                        @click="modelOpen =!modelOpen  "
                                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md  hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Add Payment Details

                                    </button>

                                    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                        <div
                                            class="flex items-end justify-center  px-4 text-center md:items-center sm:block sm:p-0">
                                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                x-transition:enter="transition ease-out duration-300 transform"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-200 transform"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                aria-hidden="true"></div>

                                            <div x-cloak x-show="modelOpen"
                                                x-transition:enter="transition ease-out duration-300 transform"
                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave="transition ease-in duration-200 transform"
                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                <div class="flex items-center justify-between space-x-4">
                                                    <h1 class="text-xl font-medium text-gray-800 ">Enter The Payment
                                                        Details</h1>

                                                    <button @click="modelOpen = false"
                                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <p class="mt-2 text-sm text-gray-500 ">
                                                    Add your teammate to your team and start work to get things done
                                                </p>
                                                <?php

                                                    include('includes/config.php');
                                                    $conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
                                                    // Check connection
                                                    if (!$conn) {
                                                        die("Connection failed: " . mysqli_connect_error());
                                                    } else {
                                                        echo "Connection successful";
                                                    }

                                                    if (strlen($_SESSION['login']) == "") {
                                                        header('location:index.php');
                                                    } else {

                                                        if (isset($_POST['paymentsubmit'])) {

                                                            $dummyid = $_GET['refno'];
                                                            $dd = $row['refno'];
                                                            $transcationid = $_POST['transcationid'];
                                                            $amount = $_POST['amount'];
                                                            $mode = $_POST['mode'];


                                         

                                                            $sql = "INSERT INTO paymentdetails (`refno`,`transcationid`,`amount`,`mode`) VALUES 

                                                             ( '$dd','$transcationid','$amount','$mode')";


                                                              
                                                        

                                                            if (mysqli_query($conn, $sql)) {

                                                           

                                                                echo '<script>alert("New record created successfully")</script>';
                                                            die(1);
                                                                // echo "New record created successfully";
                                                            } else {
                                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                            }
                                                        }
                                                    }

                                                    ?>




                                                <form class="mt-5" method="post" action="">




                                                    <div>
                                                        <label for="refno"
                                                            class="block text-sm text-gray-700 capitalize dark:text-gray-200 ">Reference
                                                            ID
                                                        </label>
                                                        <input id="refno" name="refno" type="text" disabled
                                                            value="<?php echo $row['refno']; ?>"
                                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40 ">
                                                    </div>


                                                    <div>
                                                        <label for="trno"
                                                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Transcation
                                                            ID</label>
                                                        <input id="trno" name="transcationid"
                                                            placeholder="Enter the Transcation ID/Reference ID"
                                                            type="text"
                                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                    </div>
                                                    <div>
                                                        <label for="amount"
                                                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Amount</label>
                                                        <input id="amount" name="amount" placeholder="Enter The Amount"
                                                            type="text"
                                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                    </div>

                                                    <div class="mt-4">
                                                        <label for="mode"
                                                            class="block text-sm text-gray-700 capitalize dark:text-gray-200">Mode
                                                            of Payment</label>
                                                        <input id="mode" name="mode" placeholder="Cash/Cheque/NEFT"
                                                            type="text"
                                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                    </div>



                                                    <div class="flex justify-end mt-6">
                                                        <button type="sumbit" name="paymentsubmit"
                                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-pink-500 rounded-md  focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                            Confirm
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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

                                echo '<a href = "accountapproval.php?page=' . $page_number . '">' . $page_number . ' </a>';
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



            <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            </script>


</body>

</html>