<?php
session_start();
if(isset($_GET['blogpost_id'])) {
    $id = $_GET['blogpost_id'];
} else {
    header("Location: blogposts.php");
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

    <title>Blog - Portfolio</title>

    <!-- Linking CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css" rel="stylesheet">
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <style>
        ::selection {
            color: white;
            background: #057A55;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        h2 {
            font-size: 2.25rem;
            font-weight: 700;
        }
        h3 {
            font-size: 1.875rem;
            font-weight: 700;
        }
        h4 {
            font-size: 1.5rem;
            font-weight: 700;
        }
        h5 {
            font-size: 1.25rem;
            font-weight: 700;
        }
        h6 {
            font-size: 1.125rem;
            font-weight: 700;
        }
        p {
            font-size: 1.25rem;
            color: #4a5568;
        }
    </style>
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
                            <svg class="block h-6 w-6" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="togglebtn">
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
                                    <a class="px-3 py-2 rounded-md text-base leading-5 text-white hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                                       href="#">Home</a>
                                    <a class="ml-12 px-3 py-2 rounded-md text-base leading-5 text-gray-300 bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
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
            <div class="hidden" id="mobileMenu">
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

    <!-- highlighted posts -->
    <section class="mt-8">
        <div class="grid grid-flow-row grid-cols-1 gap-4 xl:px-56 md:px-24 p-4">
            <?php

            require('../models/mysql.php');

            global $pdo;

            $sql = "SELECT * FROM blogposts WHERE blogpost_id=$id";

            try {
                $statement = $pdo->prepare($sql);
                $statement->execute();
                while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $img_url = $result['blogpost_img_url'];

                    echo "<div class='relative rounded-xl mx-auto max-w-4xl'>
                                <img src='$img_url' class='object-cover rounded-lg mx-auto h-auto w-full' alt''>
                                <p class='text-sm'>Foto: <a href='$img_url' class='text-green-600 hover:underline'>$img_url</a></p>
                        </div>";
                }
            } catch (PDOException $e) {
                print($e);
            }

            ?>
        </div>
    </section>

    <section class="mt-8">
        <div class="grid grid-flow-row grid-cols-1 gap-4">
            <?php

            require('../models/mysql.php');

            global $pdo;
            $sql = "SELECT * FROM blogposts WHERE blogpost_id=$id";

            try {
                $statement = $pdo->prepare($sql);
                $statement->execute();
                while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if ($result != null) {
                        $title = $result['blogpost_title'];
                        $subtitle = $result['blogpost_subtitle'];
                        $content = $result['blogpost_content'];
                        $author = $result['blogpost_author'];
                        $date = $result['blogpost_date'];
                        $readingtime = round(str_word_count($content) / 250, 1, PHP_ROUND_HALF_UP);

                        // echo all blogposts
                        echo "<div class='mx-auto my-4 xl:px-56 md:px-24 p-4 max-w-7xl'>
                                <div class='text-left md:max-w-5xl max-w-xl'>
                                    <h1 class='font-extrabold md:text-6xl text-4xl text-gray-900 tracking-tight leading-none'>$title</h1>
                                    <h2 class='font-bold md:text-4xl text-2xl text-gray-700'>$subtitle</h2>
                                    <h3 class='mt-4 md:text-lg text-base font-semibold text-gray-700'><span class='mr-3'><i class='fa fa-calendar'></i> $date</span>|<span class='mx-3'>von <a href='' class='text-green-800 hover:underline'>$author</a></span></h3>
                                    <h3 class='mt-2 text-base font-semibold text-gray-700'><span><i class='far fa-clock'></i> Geschätzte Lesedauer: $readingtime Minuten</span></h3>
                                </div>
                                <div class='mt-3 text-left md:max-w-4xl max-w-xl'>
                                    <p class='text-gray-600 text-xl'>$content</p>
                                </div>
                            </div>
                            <div class='xl:px-56 md:px-24 p-4'><hr class='mx-auto max-w-4xl'></div>
                            ";
                    }
                }
            } catch (PDOException $e) {
                print($e);
            }

            ?>
        </div>
    </section>

    <section class="mt-8">

    </section>


    <!-- Projects section END -->


</main>


<!-- Linking jquery -->
<script crossorigin="anonymous"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<script crossorigin="anonymous"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Linking ../../js/script.js -->
<script src="../../js/script.js"></script>
<script src="../../js/textwriting_skript.js"></script>
</body>
</html>