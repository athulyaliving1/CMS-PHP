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
                                state
                            </th>
                            <th scope="col" class="py-3 px-6">
                                location
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Department
                            </th>
                            <th scope="col" class="py-3 px-10">
                                place
                            </th>
                            <th scope="col" class="py-3 px-10">
                                product
                            </th>
                            <th scope="col" class="py-3 px-10">
                                price
                            </th>
                            <th scope="col" class="py-3 px-10">
                                qty
                            </th>
                            <th scope="col" class="py-3 px-6">
                                vendor
                            </th>
                            <th scope="col" class="col-2  py-3 px-6">
                                status
                            </th>

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


                </table>

                <div>

                    <div class="flex justify-center">
                        <div class="flex items-center space-x-5">
                            <?php
                            // show page number with link   





                            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {

                                echo '<a href = "adminapproval.php?page=' . $page_number . '">' . $page_number . ' </a>';
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

            <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>

</html>