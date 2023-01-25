<?php
session_start();
error_reporting(1);
include('./include/config.php');
// $conn = mysqli_connect('localhost', 'athul9z1_cmsuser', 'Health@123', 'athul9z1_cms');
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
    <title>Accounts Dashboard</title>
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
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">Equipment</th>
                                        <th class="px-4 py-3">Qty</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3">Reference Number</th>
                                        <th class="px-4 py-3">Payment Terms</th>
                                        <th class="px-4 py-3"> File name<i class="ri-file-shield-2-line"></i></th>
                                        <th class="px-4 py-3">P.O Status</th>
                                        <th class="px-4 py-3"> Action</th>
                                        <th class="px-4 py-3"> Payment Action</th>
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


                                            <a
                                                href="https://www.athulyaliving.in/purchase-demo/superuser/New/<?php echo $row['compfile']; ?>">View
                                                Document</a>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['status']); ?>
                                        </td>




                                        <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">


                                            <form method="post" action="">

                                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />

                                                <?php
                                       if($row['status']!='accounts_approved')
                                       {
                                     ?>


                                                <button
                                                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                                    type="submit" name="acknowledge">Acknowledge
                                                </button>
                                                <?php
                                      }else{
                                
                                      ?>
                                                <button
                                                    class="focus:outline-none text-white bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                                    type="submit" name="acknowledge" disabled>Acknowledged </button>
                                                <?php
                                           
                                      } 
                                     ?>

                                            </form>

                                        </td>

                                        <td>
                                            <div x-data="{ modelOpen: false }">


                                                <button href="accountapproval.php?refno=<?php echo $row['refno']; ?>   "
                                                    @click="modelOpen =!modelOpen  "
                                                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-pink-500 rounded-md  hover:bg-pink-600 focus:outline-none focus:bg-blue-800 focus:ring focus:ring-sky-900 focus:ring-opacity-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
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
                                                                <h1 class="text-xl font-medium text-gray-800 ">
                                                                    Enter The
                                                                    Payment
                                                                    Details</h1>

                                                                <button @click="modelOpen = false"
                                                                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <p class="mt-2 text-sm text-gray-500 ">
                                                                Add your teammate to your team and
                                                                start work to get things
                                                                done
                                                            </p>
                                                            <?php

                                                    include('./include/config.php');
                                                                 
                                                        if (isset($_POST['paymentsubmit'])) {

              
                                                            $unid = $_GET['unique_id'];
                                                            $ddun = $row['unique_id'];                                                            
                                                            $dummyid = $_GET['refno'];
                                                            $dd = $row['refno'];
                                                            $transcationid = $_POST['transcationid'];
                                                            $amount = $_POST['amount'];
                                                            $mode = $_POST['mode'];

                                                            $sql = "INSERT INTO paymentdetails (`unique_id`,`refno`,`transcationid`,`amount`,`mode`) VALUES 
                                                             ( '$ddun','$dd','$transcationid','$amount','$mode')";
                                                            if (mysqli_query($conn, $sql)) {
                                                                echo '<script>alert("New record created successfully")</script>';
                                                                die(1);
                                                                // echo "New record created successfully";
                                                            } else {
                                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                            }
                                                        }
                                                    
                                                    ?>
                                                            <form class="mt-5" method="post" action="">

                                                                <div>
                                                                    <label for="unique_id"
                                                                        class="block text-sm text-gray-700 capitalize ">Unique_Id_Number

                                                                    </label>
                                                                    <input id="unique_id" name="unique_id" type="text"
                                                                        disabled
                                                                        value="<?php echo $row['unique_id']; ?>"
                                                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40 ">
                                                                </div>

                                                                <div>
                                                                    <label for="refno"
                                                                        class="block text-sm text-gray-700 capitalize  ">Reference
                                                                        ID
                                                                    </label>
                                                                    <input id="refno" name="refno" type="text" disabled
                                                                        value="<?php echo $row['refno']; ?>"
                                                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40 ">
                                                                </div>
                                                                <div>
                                                                    <label for="trno"
                                                                        class="block text-sm text-gray-700 capitalize ">Transcation
                                                                        ID</label>
                                                                    <input id="trno" name="transcationid"
                                                                        placeholder="Enter the Transcation ID/Reference ID"
                                                                        type="text"
                                                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                                </div>
                                                                <div>
                                                                    <label for="amount"
                                                                        class="block text-sm text-gray-700 capitalize ">Amount</label>
                                                                    <input id="amount" name="amount"
                                                                        placeholder="Enter The Amount" type="text"
                                                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="mode"
                                                                        class="block text-sm text-gray-700 capitalize ">Mode
                                                                        of Payment</label>
                                                                    <input id="mode" name="mode"
                                                                        placeholder="Cash/Cheque/NEFT" type="text"
                                                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                                </div>
                                                                <div class="flex justify-end mt-6">
                                                                    <button type="sumbit" name="paymentsubmit"
                                                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-pink-500 rounded-md  focus:outline-none focus:bg-pink-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
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
                    </div>
                </div>


                <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>

                <!-- your content here... -->
                <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js">
                </script>
</body>

</html>