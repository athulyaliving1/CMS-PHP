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
    <title>Document</title>
</head>

<body>
    <?php

include("./header.php");
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
                            <th scope="col" class="col-2  py-3 px-6">
                                Payment
                            </th>
                            <th scope="col" class="col-2 py-3 px-6">
                                Action
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
                            <td class="py-4 px-6">
                                <?php echo htmlentities($row['status']); ?>
                            </td>

                            <td class="flex items-center py-4 px-6 space-x-3 place-content-center ">
                                <form method="post" action="">
                                    <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                    <button
                                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 "
                                        type="submit" name="received">Item Received</button>
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



</body>

</html>