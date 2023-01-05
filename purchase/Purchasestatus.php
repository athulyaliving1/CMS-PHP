<?php
session_start();
error_reporting(1);
include('includes/config.php');
$conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Document</title>
</head>

<body>
    <?php

    include("include/header.php");
    include("include/sidebar1.php");
    ?>

    <div class="container mx-auto bg-white  p-16">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <svg class="mr-2 w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Last 30 days
                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="py-3 px-6">
                                id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ref No
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Transaction ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Amount
                            </th>

                            <th scope="col" class="col-2  py-3 px-6">
                                Mode
                            </th>

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



                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                <?php echo htmlentities($row['id']); ?>
                            </th>
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




                            <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">
                                <div>
                                    <div x-data="{ modelOpen: false }">
                                        <button @click="modelOpen =!modelOpen"
                                            class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md  hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span>Status</span>
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
                                                        <h1 class="text-xl font-medium text-gray-800 ">Invite team
                                                            memebr</h1>

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

                                                    <section class="">
                                                        <div
                                                            class="container px-4 py-16 mx-auto space-y-8 lg:max-w-3xl">
                                                            <h2 class="text-2xl font-bold md:text-4xl">Timeline</h2>
                                                            <div class="space-y-8">
                                                                <div>
                                                                    <h3 class="mb-3 text-lg font-bold md:text-xl">2021
                                                                    </h3>
                                                                    <ul class="space-y-4">
                                                                        <li class="space-y-1">
                                                                            <div class="flex items-center space-x-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 512 512"
                                                                                    class="w-4 h-4 fill-current ">
                                                                                    <path
                                                                                        d="M426.072,86.928A238.75,238.75,0,0,0,88.428,424.572,238.75,238.75,0,0,0,426.072,86.928ZM257.25,462.5c-114,0-206.75-92.748-206.75-206.75S143.248,49,257.25,49,464,141.748,464,255.75,371.252,462.5,257.25,462.5Z">
                                                                                    </path>
                                                                                    <polygon
                                                                                        points="221.27 305.808 147.857 232.396 125.23 255.023 221.27 351.063 388.77 183.564 366.142 160.937 221.27 305.808">
                                                                                    </polygon>
                                                                                </svg>
                                                                                <h4 class="font-medium">Quis velit quae
                                                                                    similique maxime optio temporibus
                                                                                </h4>
                                                                            </div>
                                                                            <p class="ml-7 dark:text-gray-400">Illum hic
                                                                                placeat unde porro, cupiditate nesciunt?
                                                                                Numquam debitis eligendi aspernatur mum.
                                                                            </p>
                                                                        </li>
                                                                        <li class="space-y-1">
                                                                            <div class="flex items-center space-x-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 512 512"
                                                                                    class="w-4 h-4 fill-current ">
                                                                                    <path
                                                                                        d="M426.072,86.928A238.75,238.75,0,0,0,88.428,424.572,238.75,238.75,0,0,0,426.072,86.928ZM257.25,462.5c-114,0-206.75-92.748-206.75-206.75S143.248,49,257.25,49,464,141.748,464,255.75,371.252,462.5,257.25,462.5Z">
                                                                                    </path>
                                                                                    <polygon
                                                                                        points="221.27 305.808 147.857 232.396 125.23 255.023 221.27 351.063 388.77 183.564 366.142 160.937 221.27 305.808">
                                                                                    </polygon>
                                                                                </svg>
                                                                                <h4 class="font-medium">Quis velit quae
                                                                                    similique maxime optio temporibus
                                                                                </h4>
                                                                            </div>
                                                                            <p class="ml-7 dark:text-gray-400">Illum hic
                                                                                placeat unde porro, cupiditate nesciunt?
                                                                                Numquam debitis eligendi aspernatur mum.
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
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



</body>

</html>