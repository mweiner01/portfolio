<?php

require('../models/Account.php');

// if session not started yet then start it. otherwise do nothing
if(!session_status() == 2) {
    session_start();
}


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

    <!-- Navbar section START d-->
    <section>
        <nav class="w-full bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <button aria-expanded="false"
                                aria-label="Main menu"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                            <svg class="block h-6 w-6" fill="none" id="hamburgerbtn" stroke="currentColor"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <h1 class="block md:hidden text-xl tracking-tight font-extrabold text-white sm:text-2xl sm:leading-none md:text-2xl uppercase">
                            Max W.</h1>
                        <h1 class="hidden md:block text-xl tracking-tight font-extrabold text-white sm:text-2xl sm:leading-none md:text-2xl uppercase">
                            Max Weiner</h1>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class="ml-3 relative">
                            <div class="hidden sm:block sm:ml-6">
                                <div class="flex font-semibold">
                                    <a class="px-3 py-2 rounded-md text-base leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                                       href="#">Home</a>
                                    <a class="ml-12 px-3 py-2 rounded-md text-base leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                                       href="#">Blog</a>
                                    <button class="ml-12 px-3 py-2 font-semibold rounded-md text-base leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                                            id="projectBtn">Projekte
                                    </button>
                                    <button class="ml-12 px-3 py-2 rounded-md text-base leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                                            id="contactBtn">Kontaktiere
                                        mich
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden sm:hidden" id="mobileMenu">
                <div class="px-2 pt-2 pb-3 font-semibold">
                    <a class="block px-3 py-2 rounded-md text-base text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                       href="#">Home</a>
                    <a class="mt-1 block px-3 py-2 rounded-md text-base text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                       href="#">Blog</a>
                    <a class="mt-1 block px-3 py-2 rounded-md text-base text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                       href="#projects">Projekte</a>
                    <a class="mt-1 block px-3 py-2 rounded-md text-base text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                       href="#">Kontaktiere
                        mich</a>
                </div>
            </div>
        </nav>
    </section>
    <!-- Navbar section END -->

    <section class="p-12">
        <div class="max-w-3xl mx-auto bg-gray-200 rounded">
            <div class="bg-gray-800 rounded-t p-4">
                <p class="text-white font-semibold text-base text-center">Logge dich mit deinem Account ein</p>
            </div>
            <div class="text-center p-6">
                <h1 class="text-xl font-semibold text-center my-4">User Login</h1>
                <form method="post">
                    <div class="grid grid-flow-row grid-cols-1 gap-2">
                        <div class="">
                            <input type="text"
                                   class="bg-gray-200 border-2 border-gray-300 w-full max-w-sm p-2 rounded-lg border-transparent focus:border-green-400"
                                   name="username" placeholder="Benutzername">
                        </div>
                        <div class="">
                            <input type="password"
                                   class="bg-gray-200 border-2 border-gray-300 w-full max-w-sm p-2 rounded-lg border-transparent focus:border-green-400"
                                   name="password" placeholder="Passwort">
                        </div>
                        <div>
                            <input type="submit"
                                   class="bg-green-500 hover:bg-green-700 rounded text-white w-full cursor-pointer max-w-sm p-2"
                                   name="login" value="Einloggen">
                        </div>
                        <div>
                            <a href="" class="text-green-600 hover:text-green-700 hover:underline">Passwort /
                                Benutzername vergessen?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- footer section START -->
    <footer id="contactSection" class="w-full lg:fixed bottom-0">
        <div class="bg-gray-800 p-4">
            <div class="grid grid-flow-row grid-cols-1 gap-4 py-12">
                <div class="mx-auto">
                    <h1 class="text-2xl tracking-tight leading-10 font-semibold text-white sm:text-3xl sm:leading-none md:text-3xl uppercase">
                        Meine Sozialenmedien</h1>
                </div>
                <div class="mx-auto">
                    <a href="https://www.github.com/mweiner01"><i
                                class="fab fa-github text-white hover:text-gray-400 text-4xl lg:text-5xl mr-4"></i></a>
                    <a href="https://www.linkedin.com/in/max-weiner-8969b41b3/"><i
                                class="fab fa-linkedin text-white hover:text-blue-700 rounded text-4xl lg:text-5xl"></i></a>
                </div>
                <div class="mx-auto text-white">
                    <a href="https://www.freepik.com/vectors/design">Design vector created by freepik -
                        www.freepik.com</a>
                </div>
            </div>
            <hr>
            <div class="grid grid-flow-row grid-cols-1 gap-4 pt-4">
                <div class="text-white mx-auto">
                    <h2>© 2020 Max Weiner • Alle Rechte vorbehalten </h2>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer section END -->

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
