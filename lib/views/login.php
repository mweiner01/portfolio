<?php


// if session not started yet then start it. otherwise do nothing
session_start();

$_SESSION['wrongPassword'] = false;
$_SESSION['loggedin'] = false;


// check if submit button is press
if (isset($_POST['login'])) {
    // check if username field and password field are filled
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // create user with username and password
        $user = new Account($_POST['username'], $_POST['password']);

        // check login credentials and if true then login
        if ($user->checkLoginCredentials() == true) {

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['wrongPassword'] = false;
        } else {
            $_SESSION['wrongPassword'] = true;
        }
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="ie-edge" http-equiv="X-UA-Comptatible">

    <!-- Linking Fontawesome -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/4d53e5f024.js"></script>

    <title>Home - Portfolio</title>

    <!-- Linking CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css" rel="stylesheet">
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
</head>
<body>

<main>


    <!-- Login when screen is xl -->
    <section class="xl:block hidden h-screen" style="background: linear-gradient(to right, white 50%, #252F3F 50%);">
        <div class="w-1/2 flex h-screen">
            <div class="text-center p-4 absolute inset-y-0 right-0 flex">
                <a href="?page=home" class="text-gray-400 hover:text-gray-500  text-3xl mr-4"><i class="fas fa-home"></i></a>
            </div>
            <div class="text-center max-w-xl m-auto">
                <h1 class="font-semibold tracking-tight text-3xl">Logge dich ganz einfach ein <i class="fas fa-sign-in-alt"></i></h1>
                <h3 class="mt-1 tracking-tight text-base font-medium">Gebe dein Benutzername und Passwort ein, um dich einzuloggen.</h3>
                <div class="mt-4">
                    <form method="post">
                        <div>
                            <input type="text" class="border-2 border-gray-800 text-gray-800 placeholder-gray-800 focus:border-green-600 p-2 rounded-lg" name="username" placeholder="Benutzername">
                            <input type="passwort" class="border-2 border-gray-800 text-gray-800 placeholder-gray-800 focus:border-green-600 p-2 rounded-lg" name="password" placeholder="Passwort">

                            <!-- Show messages if wrong password or correct password -->
                            <?php
                            if($_SESSION['wrongPassword'] == true) {
                                echo "<p class='text-red-800 font-medium text-medium mt-1'>Der Benutzername oder das Passwort ist leider falsch.</p>";
                            } else if($_SESSION['loggedin'] == true) {
                                echo "<p class='text-green-800 font-medium text-medium mt-1'>Du wurdest erfolgreich eingeloggt.</p>";
                            }
                            ?>


                        </div>
                        <div class="mt-2">
                            <input type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold p-2 cursor-pointer w-1/3 rounded-lg" name="login" value="Einloggen">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Login when screen is smaller then xl -->



</main>


<!-- Linking jquery -->
<script crossorigin="anonymous"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



<script crossorigin="anonymous"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
</body>
</html>
