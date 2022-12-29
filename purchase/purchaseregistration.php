<?php
session_start();
error_reporting(1);
include('includes/config.php');
if (strlen($_SESSION['login']) == "") {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $vendorname = $_SESSION['vendorname'];
        $contactperson = $_POST['contactperson'];
        $gstnumber = $_POST['gstnumber'];
        $pannumber = $_POST['pannumber'];
        $email = $_POST['email'];
        $mobilenumber = $_POST['mobilenumber'];
        $accountnumber = $_POST['accountnumber'];
        $ifsccode = $_POST['ifsccode'];
        $vendor = $_POST['vendor'];


        $reqfile = $_FILES["reqfile"]["name"];

        move_uploaded_file($_FILES["reqfile"]["tmp_name"], "reqdocs/" . $_FILES["reqfile"]["name"]);


        $query = mysqli_query($con, "INSERT INTO `purchaseregistration  ` (`reqNumber`,`userId`,`category`,`subcategory`,`pannumber`,   `email`,`accountnumber`, ``  `place`,`vendor`) VALUES (5556,555,4,'Browser','Non-Emergency','MARKETING','test requirements',1);");


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
                success: function (data) {
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
    <div class="bg-gray-300 w-full h-full p-10">
        <div class="max-w-2xl mx-auto bg-white  p-16">

            <form>
                <div class="grid gap-6 mb-6 lg:grid-cols-2 rounded-2xl">
                    <div>
                        <label for="fname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vendor name</label>
                        <input type="text" id="fname" name="vendorname "
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="John" required>
                    </div>
                    <div>
                        <label for="cname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact
                            Person</label>
                        <input type="text" id="cname" name="contactperson"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="Doe" required>
                    </div>
                    <div>
                        <label for="gstnumber"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">GST-NO
                        </label>
                        <input type="number" id="gstnumber" name="gstnumber"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="123-45-678" required>
                    </div>
                    <div>
                        <label for="pannumber"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">PAN
                            Number
                        </label>
                        <input type="tel" id="pannumber" name="pannumber"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="123-45-678" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                            Address</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="john.doe@company.com" required>
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobile
                            Number
                        </label>

                        <input type="tel" id="phone" name="mobilenumber"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                            placeholder="123-45-678" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bank
                        Account
                        Number
                    </label>
                    <input type="number" id="accnumber" name="accountnumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                        placeholder="Account Number" required>
                </div>
                <div class="mb-6">
                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">IFSC Code

                    </label>
                    <input type="text" id="ifsccode" name="ifsccode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                        placeholder="Enter IFSC Code" required>
                </div>
                <div class="mb-6">
                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address

                    </label>
                    <input type="text" id="address" name="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                        placeholder="Enter Address " required>
                </div>


                <div class='mb-6'>

                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Department

                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                        <option selected>Choose a Location</option>

                    </select>




                </div>
                <div class='mb-6'>

                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">State

                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                        required>
                        <option selected>Choose a State</option>
                        <option value="Tamil Nadu">
                            Tamil Nadu</option>

                        <option value="Karnataka">
                            Karnataka
                        </option>
                        <option value="Kerala">
                            Kerala
                        </option>



                    </select>


                </div>



                <div class='mb-6'>

                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location

                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                        <option selected>Choose a Location</option>
                        <option value="Chennai">
                            Chennai</option>
                        <option value="Bangalore">
                            Bangalore</option>
                        <option value="Hyderabad">
                            Hyderabad</option>

                        <option value="Cochin">
                            Cochin</option>



                    </select>


                </div>
                <div class='mb-6'>

                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Place

                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                        <option selected>Choose a Place</option>
                        <option value="Arumbakkam">
                            Arumbakkam</option>
                        <option value="Perungudi">
                            Perungudi</option>
                        <option value="Neelankarai">
                            Neelankarai</option>

                        <option value="Pallavaram">
                            Pallavaram</option>



                    </select>


                </div>

                <div class="grid gap-4 place-content-center">
                    <button type="submit"
                        class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Submit</button>
                </div>

            </form>


        </div>
    </div>




</body>

</html>
<?php } ?>