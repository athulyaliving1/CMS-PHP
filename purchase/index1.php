<?php

session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);



    
    if ($num > 0) {
        $extra = "purchaseteam/purchasedashboard.php";
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra = "index1.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
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

    <div class="bg-no-repeat bg-cover bg-center relative"
        style="background-image: url(https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80);">
        <div class="absolute bg-sky-800 opacity-40 inset-0 z-0"></div>
        <div class=" ">
            <img class=" ml-2 rounded w-25  " src="../image/logo.png" alt="">
        </div>
        <div class="min-h-screen flex flex-row mx-0 justify-center  ">

            <div class="flex justify-center self-center  z-10 ">
                <div class="p-7   bg-white mx-auto rounded-2xl md:w-2xl shadow-lg shadow-gray-700/100  ">
                    <div class="mb-4  text-center ...">
                        <h3 class="font-semibold text-2xl text-gray-800 mb-2">Log In </h3>
                        <p class="text-gray-500">Please log in to your account.</p>
                    </div>
                    <button
                        class="relative mt-6 border rounded-md py-2 text-sm text-gray-800 bg-gray-100 hover:bg-gray-200">
                        <!-- <span class="absolute left-0 top-0 flex items-center justify-center h-full w-10 text-blue-500"><i
                        class="fab fa-facebook-f"></i></span>
                <span>Login with Facebook</span> -->
                        <span class="text-red-500 font-semibold "><?php echo htmlentities($_SESSION['errmsg']); ?>
                            <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                        </span>
                    </button>

                    <form method="post">
                        <div class="space-y-5">
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                                <input id="inputEmail" type="text" name="username"
                                    class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-blue-400"
                                    type="text" placeholder="mail@gmail.com">
                            </div>
                            <div class="space-y-2">
                                <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                    Password
                                </label>
                                <input id="inputPassword" type="password" name="password"
                                    class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-blue-400"
                                    type="" placeholder="Enter your password">
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember_me" type="checkbox"
                                        class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                                        Remember me
                                    </label>
                                </div>
                                <div class="text-sm">
                                    <a href="#" class="text-blue-400 hover:text-blue-500">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>
                            <div>
                                <button type="submit" name="submit"
                                    class="w-full flex justify-center bg-pink-400  hover:bg-pink-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                                    Log in
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                        <span>
                            Athulya Senior Care @ Copyright © 2023
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form class="form-vertical" method="post">
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>
                        <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="username"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right"
                                        name="submit">Login</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <!-- <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->


    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>


</body>

</html>