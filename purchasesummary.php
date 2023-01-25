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
    <title>Purchase-Summary</title>
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
                                        <th class="px-4 py-3">Id </th>
                                        <th class="px-4 py-3">Name<i class="baseline-near_me"></i></th>
                                        <th class="px-4 py-3">State</th>
                                        <th class="px-4 py-3">Location</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">Place</th>
                                        <th class="px-4 py-3">Product</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3">Qty</th>
                                        <th class="px-4 py-3">Vendor</th>
                                        <th class="px-4 py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                        ?>


                                    <?php
                        $selectQuery = "SELECT * FROM purchaserequest ";
                        $sql = mysqli_query($conn, $selectQuery);
                        $count = mysqli_num_rows($sql);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                                    <tr>
                                    <tr class="bg-white border-b hover:bg-gray-50 ">



                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                            <?php echo htmlentities($row['id']);
                                        $kk = $row['id']; ?>
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



                                        <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">
                                            <div>
                                                <div x-data="{ modelOpen: false }">
                                                    <button @click="modelOpen =!modelOpen"
                                                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-pink-500 rounded-md  hover:bg-pink-600 focus:outline-none focus:bg-pink-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
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
                                                                <div
                                                                    class="flex items-center justify-between space-x-4">
                                                                    <h1 class="text-xl font-medium text-gray-800 ">
                                                                        Purchase Order
                                                                        Summary</h1>

                                                                    <button @click="modelOpen = false"
                                                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-6 h-6" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <p class="mt-2 text-sm text-gray-500 ">
                                                                    Vestibulum ac diam sit amet quam
                                                                    vehicula elementum sed sit amet
                                                                    dui.
                                                                </p>
                                                                <section class="text-gray-600 body-font">
                                                                    <div
                                                                        class="container px-5 py-24 mx-auto flex flex-wrap">
                                                                        <div
                                                                            class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                1</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        Purchase
                                                                                        Request</h2>




                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo $row['created_at'];  ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                2</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">


                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        Admin Action
                                                                                    </h2>



                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo $row['status'];  ?>


                                                                                    </p>
                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo $row['updated_at'];  ?>
                                                                                    </p>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                3</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        P.O Created
                                                                                    </h2>
                                                                                    <?php

                                                                                $rrid = $_GET["id"];





                                                                                $datasql = mysqli_query($conn, "SELECT  po.id,po.created_at_po as po_created,po.updated_at_po as payment_date,po.status as status FROM purchaserequest pr join purchaseorder po on pr.id=po.id  where po.id=" . $kk . ";");

                                                                                $rw = mysqli_fetch_assoc($datasql);


                                                                                ?>

                                                                                    <p class="leading-relaxed">


                                                                                        <?php echo $rw['po_created']; ?>
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                4</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        Account
                                                                                        Acknowledge
                                                                                    </h2>
                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo $rw['status']; ?>

                                                                                    </p>
                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo $rw['payment_date']; ?>

                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <?php

                                                                    $rrid = $_GET["id"];

                                                                    $datamysql = mysqli_query($conn, "SELECT paymentdetails.id, purchaseorder.id, paymentdetails.created_at,paymentdetails.updated_at,paymentdetails.status FROM paymentdetails INNER JOIN purchaseorder ON paymentdetails.id=purchaseorder.id  where paymentdetails.id=" . $kk . "; ");

                                                                    $rw1 = mysqli_fetch_array($datamysql);


                                                                    ?>

                                                                        <div
                                                                            class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                5</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        Payment
                                                                                        Transfered
                                                                                    </h2>

                                                                                    <p class="leading-relaxed">
                                                                                        <?php echo   $rw1['created_at']; ?>

                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
                                                                            <div
                                                                                class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                                                <div
                                                                                    class="h-full w-1 bg-gray-200 pointer-events-none">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-pink-500 text-white relative z-10 title-font font-medium text-sm">
                                                                                6</div>
                                                                            <div
                                                                                class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                                                <div
                                                                                    class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                                                    <h2
                                                                                        class="font-medium title-font text-gray-900 mb-1 text-xl">
                                                                                        Items
                                                                                        Recevied
                                                                                    </h2>
                                                                                    <p class="leading-relaxed">

                                                                                        <?php echo   $rw1['status']; ?>

                                                                                    </p>

                                                                                    <p class="leading-relaxed">


                                                                                        <?php echo   $rw1['updated_at']; ?>
                                                                                    </p>

                                                                                </div>
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
                            }
                        } else {
                            echo "No Record";
                        }
                        ?>

                                </tbody>


                            </table>

                            <div>

                                <div class="flex justify-center">
                                    <div class="flex items-center space-x-5">

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





<!-- $conn = mysqli_connect('localhost', 'athul9z1_cmsuser', 'Health@123', 'athul9z1_cms'); -->