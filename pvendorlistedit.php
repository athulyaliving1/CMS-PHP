<?php
session_start();
error_reporting(1);
include('./include/config.php');
// $conn = mysqli_connect('localhost', 'root', '', 'athul9z1_cms');
// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connection successful";
// }

// echo $_GET['edit'];


if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE vendorlist set  vendorname='" . $_POST['vendorname'] . "', contactperson='" . $_POST['contactperson'] . "', gstnumber='" . $_POST['gstnumber'] . "' ,pannumber='" . $_POST['pannumber'] . "' ,email='" . $_POST['email'] . "',mobilenumber='" . $_POST['mobilenumber'] . "' ,accountnumber='" . $_POST['accountnumber'] . "',ifsccode='" . $_POST['ifsccode'] . "', address='" . $_POST['address'] . "', department='" . $_POST['department'] . "', state='" . $_POST['state'] . "',location='" . $_POST['location '] . "',place='" . $_POST['place'] . "'  WHERE id='" . $_GET['edit'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM vendorlist WHERE id='" . $_GET['edit'] . "'");
$row = mysqli_fetch_array($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Vendorlist-edit</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
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


                <div class="">

                    <div class=" p-16">

                        <form action="" method="post">
                            <div> <?php if (isset($message)) {
                                        echo $message;
                                    } ?> </div>
                            <div class="grid gap-6 mb-6 lg:grid-cols-3 rounded-2xl">
                                <div>
                                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">Vendor
                                        name</label>
                                    <input type="text" id="fname" name="vendorname"
                                        value="<?php echo $row['vendorname']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="cname" class="block mb-2 text-sm font-medium text-gray-900 ">Contact
                                        Person</label>
                                    <input type="text" id="cname" name="contactperson"
                                        value="<?php echo $row['contactperson']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Doe" required>
                                </div>
                                <div>
                                    <label for="gstnumber" class="block mb-2 text-sm font-medium text-gray-900 ">GST-NO
                                    </label>
                                    <input type="number" id="gstnumber" name="gstnumber"
                                        value="<?php echo $row['gstnumber']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="123-45-678" required>
                                </div>
                                <div>
                                    <label for="pannumber" class="block mb-2 text-sm font-medium text-gray-900 ">PAN
                                        Number
                                    </label>
                                    <input type="tel" id="pannumber" name="pannumber"
                                        value="<?php echo $row['pannumber']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="123-45-678" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email
                                        Address</label>
                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="john.doe@company.com" required>
                                </div>
                                <div>
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Mobile
                                        Number
                                    </label>

                                    <input type="tel" id="phone" name="mobilenumber"
                                        value="<?php echo $row['mobilenumber']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="123-45-678" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 ">Bank
                                    Account
                                    Number
                                </label>
                                <input type="number" id="accnumber" name="accountnumber"
                                    value="<?php echo $row['accountnumber']; ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    placeholder="Account Number" required>
                            </div>
                            <div class="mb-6">
                                <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 ">IFSC Code

                                </label>
                                <input type="text" id="ifsccode" name="ifsccode" value="<?php echo $row['ifsccode']; ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    placeholder="Enter IFSC Code" required>
                            </div>
                            <div class="mb-6">
                                <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 ">Address

                                </label>
                                <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    placeholder="Enter Address " required>
                            </div>


                            <div class='mb-6'>

                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Department

                                </label>
                                <select name="department" id="department"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    required>
                                    <select name="department"
                                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                        <option selected>Choose a Department</option>
                                        <option value="IT">IT</option>

                                        <option value="MARKETING">
                                            MARKETING
                                        </option>
                                        <option value="DIGITAL MARKETING">
                                            DIGITAL MARKETING
                                        </option>
                                        <option value="CONSULTING">
                                            CONSULTING
                                        </option>
                                        <option value="ACCOUNTS">
                                            ACCOUNTS
                                        </option>
                                        <option value="ADMIN">
                                            ADMIN
                                        </option>
                                        <option value="DIGITAL MARKETING">
                                            DIGITAL MARKETING
                                        </option>
                                        <option value="MANAGEMENT">
                                            MANAGEMENT
                                        </option>
                                        <option value="SALES">
                                            SALES
                                        </option>
                                        <option value="ATHULYA CLINICAL">
                                            ATHULYA CLINICAL
                                        </option>
                                        <option value="ATHULYA OPERATIONS">
                                            ATHULYA OPERATIONS
                                        </option>
                                        <option value="HR">
                                            HR
                                        </option>
                                        <option value=" HOME CARE">
                                            HOME CARE
                                        </option>
                                        <option value="PHARMA">
                                            PHARMA
                                        </option>
                                    </select>

                                </select>




                            </div>
                            <div class='mb-6'>

                                <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State

                                </label>
                                <select name="state"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                    required>
                                    <option selected>Choose a State</option>

                                    <option value="Tamil Nadu"
                                        <?php if ($row['state'] == 'Tamil Nadu') echo ' selected="selected"'; ?>>Tamil
                                        Nadu</option>
                                    <option value="Karnataka"
                                        <?php if ($row['state'] == 'karnataka') echo ' selected="selected"'; ?>>
                                        Karnataka</option>
                                    <option value="Kerala"
                                        <?php if ($row['state'] == 'Kerala') echo ' selected="selected"'; ?>>Kerala
                                    </option>


                            </div>



                            <div class='mb-6'>

                                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location

                                </label>
                                <select name="location"
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

                                <label for="place" class="block mb-2 text-sm font-medium text-gray-900 ">Place

                                </label>
                                <select name="place"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option name="place" selected>Choose a Place</option>
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
                                <button type="submit" name="submit" value="Submit"
                                    class="text-white bg-pink-500 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>

                            </div>




                        </form>


                    </div>
                </div>

                <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>


</body>

</html>
<?php ?>