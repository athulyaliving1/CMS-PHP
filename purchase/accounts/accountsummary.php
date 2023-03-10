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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Document</title>
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