<?php


session_start();
error_reporting(0);
include("include/config.php");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}

if(isset($_SESSION["admin_login"])){
    header("location: admin/adminapproval.php");
}
if(isset($_SESSION["account_login"])){
    header("location: accounts/accountsummary.php");
}
if(isset($_SESSION["purchase_login"])){
    header("location: admin/accountsummary.php");
}

if(isset($_REQUEST['submit'])) 
{
  $email=$_REQUEST[ "txt_email"]; 
  $password =$_REQUEST ["txt_password"]; 
  $role=$_REQUEST ["txt_role"];

    echo "$email";
    echo "$password";
    echo "$role";

 if(empty($email)){
  $errorMsg[]="please enter email"; 
 }
 else if(empty($password)){
    $errorMsg[]="please enter password";
 }

else if (empty($role)){
$errorMsg[]="please enter role";
}
else if($email AND $password AND $role)

{
    try 
    {
       
        $select_stmt=$conn->prepare("SELECT email,password,role FROM masterlogin
        WHERE email='".$email."' AND password='".$password."' AND role='".$role."' ");
        // $select_stmt->bindParam(":uemail",$email);
        // $select_stmt->bindParam(":upassword",$password);
        // $select_stmt->execute(":urole",$role);
        // $select_stmt->execute();
        

        while($row)
        {
            $dbemail=$row["email"];
            $dbpassword=$row["password"];
            $dbrole = $row["role"];
        }
      if($email!=null AND $password!=null AND $role!=null)
      {
        if($select_stmt->rowCount()>0)
        {
            if($email==$dbemail AND $password==$dbpassword AND $role==$dbrole)
            {
                switch($dbrole)
                {
                case "admin":
                    $SESSION["admin_login"]=$email;
                    $loginMsg="Admin... Successfully Login..";
                    header("refresh:3;admin/adminapproval.php");
                    break;

                case "employee":
                    $SESSION["employee_login"]=$email;
                    $loginMsg="Employee... Successfully Login..";
                    header("refresh:3;admin/admin_home.php");
                    break;

                case "user":
                    $SESSION["user_login"]=$email;
                    $loginMsg="Admin... Successfully Login..";
                    header("refresh:3;user/user_home.php");
                    break;

                    default:
                   $errorMsg[]="wrong email or password or role" ;
                }
            }
            else
            {
                $errorMsg[]="wrong email or password or role" ;
            }
        }
            else
            {
                $errorMsg[]="wrong email or password or role" ;
            }
        }
            else
            {
                $errorMsg[]="wrong email or password or role" ;
            }
        }
           
    
    catch(PDOException $e)

    {
        $e->getMessage();
    }
}
else
{
$errorMsg[]="wrong email or password or role";
}
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS | Admin login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

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

</head>

<body>
    <?php
    include("include/header.php");
    ?>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">

        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Login To Your Account</div>
            <button class="relative mt-6 border rounded-md py-2 text-sm text-gray-800 bg-gray-100 hover:bg-gray-200">
                <!-- <span class="absolute left-0 top-0 flex items-center justify-center h-full w-10 text-blue-500"><i
                        class="fab fa-facebook-f"></i></span>
                <span>Login with Facebook</span> -->
                <span class="text-red-500 font-semibold "><?php $errorMsg[]="wrong email or password or role" ; ?>

                </span>
            </button>
            <div class="relative mt-10 h-px bg-gray-300">
                <div class="absolute left-0 top-0 flex justify-center w-full -mt-2">
                    <span class="bg-white px-4 text-xs text-gray-500 uppercase">Login With Email</span>
                </div>
            </div>
            <div class="mt-10">
                <form method="post">
                    <div class="flex flex-col mb-6">
                        <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Username:
                        </label>
                        <div class="relative">
                            <div
                                class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>

                            <input id="inputEmail" type="text" name="txt_email"
                                class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                                placeholder="E-Mail Address" />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                        <div class="relative">
                            <div
                                class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>

                            <input id="inputPassword" type="password" name="txt_password"
                                class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                                placeholder="Password" />
                        </div>
                    </div>


                    <div class='mb-6'>

                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Role

                        </label>
                        <select name="txt_role"
                            class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 ">
                            <option value="" selected>Choose a Role</option>
                            <option value="admin">
                                Admin </option>

                            <option value="purchase">
                                Purchase
                            </option>
                            <option value="accounts">
                                Accounts
                            </option>


                        </select>




                    </div>



                    <div class="flex items-center mb-6 -mt-4">
                        <div class="flex ml-auto">
                            <a href="#" class="inline-flex text-xs sm:text-sm text-blue-500 hover:text-blue-700">Forgot
                                Your Password?</a>
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit" name="submit"
                            class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-sky-800 hover:bg-sky-800 rounded py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Login</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="#" target="_blank"
                    class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                    <span>
                        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </span>
                    <span class="ml-2">You don't have an account?</span>
                </a>
            </div>
        </div>
        <footer class="px-4 py-8 ">
            <div
                class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0">

                <ul class="flex flex-wrap pl-3 space-x-4 sm:space-x-8">
                    <li class="text-pink-500 font-semibold ">
                        Athulya Senior Care All rights reserved.
                    </li>

                </ul>

        </footer>





    </div>




    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>



</body>