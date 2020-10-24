<?php


// if session not started yet then start it. otherwise do nothing
session_start();
$min_pass_length = 5;
$max_pass_length = 32;
$min_username_length = 3;
$max_username_length = 24;

// set session varibales
$_SESSION['usernameTaken'] = false;
$_SESSION['passwordToShort'] = false;
$_SESSION['passwordToLong'] = false;
$_SESSION['usernameToShort'] = false;
$_SESSION['usernameToLong'] = false;

// check if submit button is press
if (isset($_POST['register'])) {
    // check if username field and password field are filled
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // set username and pass variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        // create user with username and pass
        $user = new Account($username, $password);

        // check if username is taken or passwort too short
        if($user->checkIfUsernameExist() == true) {
            $_SESSION['usernameTaken'] = true;
        } else if(strlen($password) < $min_pass_length) {
            $_SESSION['passwordToShort'] = true;
        } else if(strlen($password) > $max_pass_length) {
            $_SESSION['passwordToLong'] = true;
        } else if(strlen($username) < $min_username_length) {
            $_SESSION['usernameToShort'] = true;
        } else if(strlen($username) > $max_username_length) {
            $_SESSION['usernameToLong'] = true;
        }

        if($user->checkIfUsernameExist() == false && strlen($password) >= $min_pass_length && strlen($password) <= $max_pass_length && strlen($username) >= $min_username_length && strlen($username) <= $max_username_length) {

            // create account
            $user->createAccount();

            // set session variables
            $_SESSION['loggedin'] = false;
            $_SESSION['username'] = $username;

            // head to login site
            header("Location: ?page=login");
        } else {
            echo $password . ": " . strlen($password);
            echo $username . ": " . strlen($username);
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

    <title>Register - Portfolio</title>

    <!-- Linking CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css" rel="stylesheet">
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
</head>
<body>

<main>


    <!-- Login when screen is xl -->
    <section class="xl:block hidden h-screen" style="background: linear-gradient(to right, white 50%, #0E9F6E 50%);">
        <div class="w-1/2 flex h-screen">
            <div class="text-center p-4 absolute inset-y-0 right-0 flex">
                <a href="https://www.google.com" class="text-gray-100 hover:text-gray-300 text-3xl mr-4"><i class="fas fa-home"></i></a>
            </div>
            <div class="text-center m-auto">
                <div class="p-6">
                    <h1 class="font-extrabold text-gray-900 tracking-tight text-5xl">Registriere dich ganz einfach <i class="fas fa-sign-in-alt"></i></h1>
                    <h3 class="tracking-tight text-xl text-gray-900 font-medium">Gebe dein Benutzername und Passwort ein, um dich zu registrieren.</h3>
                </div>
                <div class="mt-4">
                    <form method="post">
                        <div>
                            <div class="p-4 align-left">
                                <input style="text-align: left" type="text" class="border-b-2 border-green-200 text-green-400 focus:border-green-400 placeholder-gray-300 focus:border-green-400 py-2 px-16" name="username" placeholder="Benutzername" align="left">
                            </div>
                            <div class="p-4">
                                <input type="password" class="border-b-2 border-green-200 text-green-400 focus:border-green-400 placeholder-gray-300 focus:border-green-400 py-2 px-16" name="password" placeholder="Passwort">
                            </div>
                                <div class="mt-2">
                                <!-- Show messages if wrong password or correct password -->
                                <?php

                                if (!empty($username)) {
                                    switch ($username) {
                                        case $_SESSION['usernameTaken'] == true:
                                            echo "<p class='text-semibold bg-red-400 text-white text-sm rounded m-auto max-w-sm px-2 py-1 mt-2 mb-2'><i class='fas fa-user mr-2''></i> Der Benutzername ist leider schon vergeben</p>";
                                            break;
                                        case $_SESSION['usernameToShort'] == true:
                                            echo "<p class='text-semibold bg-red-400 text-white text-sm rounded m-auto max-w-sm px-2 py-1 mt-2 mb-2'><i class='fas fa-user mr-2''></i> Der Benutzername ist leider zu kurz. Er muss mindestens <strong>".$min_username_length."</strong> Zeichen enthalten.</p>";
                                            break;
                                        case $_SESSION['usernameToLong'] == true:
                                            echo "<p class='text-semibold bg-red-400 text-white text-sm rounded m-auto max-w-sm px-2 py-1 mt-2 mb-2'><i class='fas fa-user mr-2''></i> Der Benutzername ist leider zu lang. Er darf mindestens <strong>".$max_username_length."</strong> Zeichen enthalten.</p>";
                                            break;
                                    }
                                }

                                if(!empty($password)) {
                                    switch ($password) {
                                        case $_SESSION['passwordToShort']:
                                            echo "<p class='text-semibold bg-yellow-400 text-white text-sm rounded m-auto max-w-sm px-2 py-1 mt-2 mb-2'><i class='fas fa-key mr-2''></i> Das Passwort ist leider zu kurz. Es muss mindestens <strong>".$min_pass_length."</strong> Zeichen enthalten.</p>";
                                            break;
                                        case $_SESSION['passwordToLong'] == true:
                                            echo "<p class='text-semibold bg-yellow-400 text-white text-sm rounded m-auto max-w-sm px-2 py-1 mt-2 mb-2'><i class='fas fa-key mr-2''></i> Das Passwort ist leider zu lang. Es darf mindestens <strong>".$max_pass_length."</strong> Zeichen enthalten.</p>";
                                            break;
                                    }
                                }



                                ?>

                                </div>
                        </div>
                        <div class="mt-2">
                            <input type="submit" class="bg-green-400 hover:bg-green-500 text-white font-semibold py-2 px-16 cursor-pointer" name="register" value="Registrieren">
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
