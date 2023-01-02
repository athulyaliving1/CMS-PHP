<?php
session_start();
include('include/config.php');

$sql = "SELECT * FROM vendorlist";

$result = mysqli_query($con, $sql);

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM vendorlist WHERE id=$id");
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
    <title>Document</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
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
            }
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

    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function () {
            $("a.delete").click(function (e) {
                if (!confirm('Are you sure?')) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>



</head>

<body>

    <?php

    include("include/header.php");
    include("include/sidebar1.php");
    ?>

    <div class="container mx-auto">
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
                                vendorname
                            </th>
                            <th scope="col" class="py-3 px-6">
                                contactperson
                            </th>
                            <th scope="col" class="py-3 px-6">
                                gstnumber
                            </th>
                            <th scope="col" class="py-3 px-10">
                                pannumber
                            </th>
                            <th scope="col" class="py-3 px-10">
                                email
                            </th>
                            <th scope="col" class="py-3 px-10">
                                mobilenumber
                            </th>
                            <th scope="col" class="py-3 px-6">
                                accountnumber
                            </th>
                            <th scope="col" class="py-3 px-6">
                                ifsccode
                            </th>
                            <th scope="col" class="py-3 px-6">
                                address
                            </th>
                            <th scope="col" class="py-3 px-6">
                                department
                            </th>
                            <th scope="col" class="py-3 px-6">
                                state
                            </th>
                            <th scope="col" class="py-3 px-6">
                                location
                            </th>
                            <th scope="col" class="py-3 px-6">
                                place
                            </th>
                            <th scope="col-2" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>





                    <tbody>
                        <?php

                        $limit = 5;

                        // query to retrieve all rows from the table Countries
                        
                        $getQuery = "select * from vendorlist";


                        // get the result
                        
                        $result = mysqli_query($con, $getQuery);

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

                        $result = mysqli_query($con, $getQuery);

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
                                            class="font-medium text-blue-600  hover:underline">Edit</a>
                                    </div>
                                    <div>
                                        <button><a href="vendorlist.php?del=<?php echo $row['id']; ?>"
                                                class="font-medium text-red-600  hover:underline">Delete</a> </button>

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
                $(".remove").click(function () {
                    var id = $(this).parents("tr").attr("id");


                    if (confirm('Are you sure to remove this record ?')) {
                        $.ajax({
                            url: '/vendorlist.php',
                            type: 'GET',
                            data: { id: id },
                            error: function () {
                                alert('Something is wrong');
                            },
                            success: function (data) {
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