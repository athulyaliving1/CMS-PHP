<?php
session_start();
include('./include/config.php');



$sql = "SELECT * FROM vendorlist";

$result = mysqli_query($conn, $sql);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM vendorlist WHERE id=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: vendorlist.php');
}


?>



<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor-List</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />




    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
                                        <th class="px-4 py-3">VendorName</th>
                                        <th class="px-4 py-3">ContactPerson</th>
                                        <th class="px-4 py-3">GST Number</th>
                                        <th class="px-4 py-3">Pan Number</th>
                                        <th class="px-4 py-3">EMail</th>
                                        <th class="px-4 py-3">MobileNumber</th>
                                        <th class="px-4 py-3">Account Number</th>
                                        <th class="px-4 py-3">IFSC Code</th>
                                        <th class="px-4 py-3">Address</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">State</th>
                                        <th class="px-4 py-3">Location</th>
                                        <th class="px-4 py-3">Place</th>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                $limit = 10;

                                // query to retrieve all rows from the table Countries

                                $getQuery = "select * from vendorlist";


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

                                $getQuery = "SELECT *FROM vendorlist LIMIT " . $initial_page . ',' . $limit;

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
                                            <?php echo htmlentities($row['vendorname']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['contactperson']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['gstnumber']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['pannumber']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['email']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['mobilenumber']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['accountnumber']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['ifsccode']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['address']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['department']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['state']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['location']); ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['place']); ?>
                                        </td>


                                        <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">
                                            <div>


                                                <a href="vendorlistedit.php?edit=<?php echo $row['id']; ?>   "
                                                    onclick="return checkDelete()"
                                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>
                                            </div>
                                            <div>
                                                <button><a href="vendorlist.php?del=<?php echo $row['id']; ?>"
                                                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-800 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">Delete</a>
                                                </button>

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

                                        echo '<a href = "vendorlist.php?page=' . $page_number . '">' . $page_number . ' </a>';
                                    }



                                    ?>
                                    </div>

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
                        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js">
                        </script>

</body>

</html>