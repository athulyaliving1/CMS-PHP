<?php
session_start();
error_reporting(0);
include('include/config.php');


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}


if (strlen($_SESSION['login']) == 0) {
} else {

    if (isset($_POST['submit'])) {
        $uid = $_SESSION['id'];
        // $tmp_name = $_POST['tmp_name'];
        $refno = $_POST['refno'];
        $paymentterms = $_POST['paymentterms'];
        $compfile = $_FILES["compfile"]["name"];

        move_uploaded_file($_FILES["compfile"]["tmp_name"], "complaintdocs/" . $_FILES["compfile"]["name"]);

        $query = mysqli_query($con, "insert into purchaseorder(refno,paymentterms,compfile) values('$refno','$paymentterms','$compfile')");


        echo  "insert into purchaseorder(refno,paymentterms,compfile) values('$refno','$paymentterms','$compfile')";
        //echo "insert into tblcomplaints(userId,category,subcategory,complaintType,state,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$complaintdetials','$compfile')";
        if (mysqli_query($con, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | User Register Requirement</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
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

    <script>
        function getCat(val) {
            //alert('val');

            $.ajax({
                type: "POST",
                url: "getsubcat.php",
                data: 'catid=' + val,
                success: function(data) {
                    $("#subcategory").html(data);

                }
            });
        }
    </script>

</head>

<body>
    <?php
    include("include/header.php");


    ?>
    <!-- component -->
    <!-- This is an example component -->
    <div class="bg-gray-300 w-full h-full ">
        <?php

        include("include/sidebar1.php");
        ?>
        <div class="container mx-auto  p-16">

            <form action="" method="post">
                <div class="grid gap-6 mb-6 lg:grid-cols-3 rounded-2xl">


                    <div>
                        <label for="refnumber" class="block mb-2 text-sm font-medium text-gray-900 ">Reference
                            Number</label>
                        <input type="text" id="refnumber" name="refno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 " placeholder="John" required>
                    </div>
                    <div>
                        <label for="pay" class="block mb-2 text-sm font-medium text-gray-900 ">payment term
                        </label>
                        <input type="text" id="pay" name="paymentterms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 " placeholder="Doe" required>
                    </div>
                    <div>

                        <label for="myFile" class="block mb-2 text-sm font-medium text-gray-900 ">
                            File Upload
                        </label>
                        <input type="file" for="filename" id="myFile" name="compfile" accept=".pdf" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 " placeholder="123-45-678" required>


                    </div>



                    <div class="grid gap-4 place-content-center">
                        <button type="submit" class="text-white bg-pink-500 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center " name="submit">Save</button>

                    </div>

                </div>


            </form>


        </div>
    </div>




</body>

</html>