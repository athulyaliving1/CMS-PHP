<?php
session_start();
error_reporting(0);
include('include/config.php');

// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connection successful";
// }


// The target directory of uploading is uploads
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uOk = 1;

if(isset($_POST["submit"])) {
   
    $unique_id = $_POST['unique_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $equipment = $_POST['equipment'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $refno = $_POST['refno'];
    $paymentterms = $_POST['paymentterms'];
    $compfile = $_FILES["file"]["name"];
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "file already exists.<br>";
		$uOk = 0;
	}
	
	// Check if $uOk is set to 0
	if ($uOk == 0) {
		echo "Your file was not uploaded.<br>";
	}
	
	// if uOk=1 then try to upload file
	else {
       
        $sql =  "insert into purchaseorder(unique_id,name,department,equipment,qty,price,refno,paymentterms,compfile) values('$unique_id','$name','$department','$equipment','$qty','$price','$refno','$paymentterms','$compfile')";
        // echo $sql;
        // echo $tempid;

        if (mysqli_query($conn, $sql)) {

            // echo '<script>alert("New record created successfully")</script>';
            "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		// $_FILES["file"]["tmp_name"] implies storage path
		// in tmp directory which is moved to uploads
		// directory using move_uploaded_file() method
		if (move_uploaded_file($_FILES["file"]["tmp_name"],
											$target_file)) {
			 "The file ". basename( $_FILES["file"]["name"])
						. " has been uploaded.<br>";
			
			// Moving file to New directory
			if(rename($target_file, "New/".
						basename( $_FILES["file"]["name"]))) {
            echo '<script>alert("New record created successfully and File moving operation success")</script>';
				// echo "File moving operation success<br>";
                // echo $uid;

			}
			else {
				echo "File moving operation failed..<br>";
			}
		}
		else {
			echo "Sorry, there was an error uploading your file.<br>";
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

    <title>Create-PurchaseOrder</title>
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
                        <?php

        $result = mysqli_query($conn,"SELECT * FROM  purchaserequest WHERE id='" . $_GET['id'] . "'");
           $rw= mysqli_fetch_array($result);

?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="grid gap-6 mb-6 lg:grid-cols-4 rounded-2xl">

                                <div>

                                    <label for="uqid" class="block mb-2 text-sm font-medium text-gray-900 ">Deparment
                                        Name
                                    </label>
                                    <input type="text" id="uqid" name="unique_id"
                                        value="<?php echo $rw['unique_id']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Enter the Deparment Name" readonly="readonly">
                                </div>
                                <div>

                                    <label for="department"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Deparment Name
                                    </label>
                                    <input type="text" id="department" name="department"
                                        value="<?php echo $rw['department']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Enter the Deparment Name" required readonly="readonly">
                                </div>
                            </div>



                            <div class="grid gap-6 mb-6 lg:grid-cols-2 rounded-2xl">
                                <div>
                                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">Applicant
                                        Name</label>
                                    <input type="text" id="fname" name="name" value="<?php echo $rw['name']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="John" required readonly="readonly">
                                </div>
                                <div>
                                    <label for="equipment"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Product_Description
                                    </label>
                                    <input type="text" id="equipment" name="equipment"
                                        value="<?php echo $rw['equipment']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Enter the Product Name" required readonly="readonly">


                                </div>
                                <div>
                                    <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 ">Qty
                                    </label>

                                    <?php $qts=$rw['qty'];?>
                                    <input type="number" id="qty" name="qty" value="<?php echo $qts; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="123-45-678" required readonly="readonly">
                                </div>
                                <div>

                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price
                                    </label>
                                    <input type="number" id="price" name="price" value="<?php echo $rw['price']; ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Enter the Price Of product/s" required readonly="readonly">


                                </div>





                            </div>



                            <div class="grid gap-6 mb-6 lg:grid-cols-2 rounded-2xl">

                                <div>
                                    <label for="refnumber"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Reference
                                        Number</label>
                                    <input type="text" id="refnumber" name="refno"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="pay" class="block mb-2 text-sm font-medium text-gray-900 ">payment term
                                    </label>
                                    <input type="text" id="pay" name="paymentterms"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="Doe" required>
                                </div>
                                <div>

                                    <label for="myFile" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        File Upload
                                    </label>
                                    <input type="file" for="file" id="file" name="file" accept=".pdf" value=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        placeholder="123-45-678" required>

                                </div>
                            </div>

                            <div class="grid gap-4 place-content-center">
                                <button type="submit" value="Sumbit"
                                    class="text-white bg-pink-500 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center "
                                    name="submit">Save</button>

                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>


</body>

</html>