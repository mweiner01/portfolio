<?php
session_start();

include("js/action_js.php");

$id = $_GET['blogpost_id'];

if(isset($_GET['blogpost_id'])) {
    $id = $_GET['blogpost_id'];
} else {
    header("Location: ?page=blogposts");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
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
            line-height: 1;
        }
        h2 {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
        }
        h3 {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 1;
        }
        h4 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
        }
        h5 {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1;
        }
        h6 {
            font-size: 1.125rem;
            font-weight: 700;
            line-height: 1;
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
    <?php
    include("lib/models/navbar.html");
    ?>
    <!-- Navbar section END -->

    <!-- highlighted posts -->
    <section>
        <div class="">
            <?php


            global $pdo;

            $sql = "SELECT * FROM blogposts WHERE blogpost_id=$id";

            try {
                $statement = $pdo->prepare($sql);
                $statement->execute();
                while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $img_url = $result['blogpost_img_url'];

                    echo "<div class='relative'>
                            <img src='$img_url' class='object-cover mx-auto h-80 w-full' alt''>
                            <div class='absolute top-0 pl-4 pt-8'>
                                   <a href='?page=blogposts' class='bg-transparent hover:bg-white border-2 border-white text-white hover:text-gray-900 font-semibold md:text-lg text-sm md:px-12 md:py-2 px-2 py-2 rounded'><i class='fas fa-arrow-left'></i> Zurück</a>
                               </div>
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
                        $likes = $result['blogpost_likes'];
                        $likesminus = $likes-1;

                        $readingtime = round(str_word_count($content) / 150, 1, PHP_ROUND_HALF_EVEN);

                        if(isset($_SESSION['username'])) {
                            if (blog::checkUserHasLikedPost($_SESSION['username'], $id) == true) {
                                echo "<div class='mx-auto my-4 xl:px-56 md:px-24 p-4 max-w-7xl'>
                                <div class='text-left md:max-w-5xl max-w-xl'>
                                    <h1 class='font-extrabold md:text-6xl text-4xl text-gray-900 tracking-tight leading-none mb-2'>$title</h1>
                                    <h2 class='font-bold md:text-4xl text-2xl text-gray-700'>$subtitle</h2>
                                    <h3 class='mt-4 md:text-lg text-base font-semibold text-gray-700'><span class='mr-3'><i class='fa fa-calendar'></i> $date</span>|<span class='mx-3'>von <a href='' class='text-green-800 hover:underline'>$author</a></span></h3>
                                    <h3 class='mt-2 text-base font-semibold text-gray-700'><span><i class='far fa-clock'></i> Geschätzte Lesedauer: $readingtime Minuten</span></h3>
                                </div>
                                <div class='mt-6 text-left md:max-w-4xl max-w-xl'>
                                    <p class='text-gray-600 text-xl'>$content</p>
                                </div>
                            </div>
                                <div class='mt-4 mx-auto' id='likesection'>
                                   <span class='bg-green-400 px-2 py-1 rounded-lg text-white md:text-lg text-sm font-semibold mr-4'>Dir und <span class='font-bold'>$likesminus</span> weiteren Person(en) gefällt dieser Beitrag.</span>
                                </div>
                            <div class='xl:px-56 md:px-24 p-4'><hr class='mx-auto max-w-4xl'></div>
                            ";
                            } else {
                                // echo all blogposts
                                echo "<div class='mx-auto my-4 xl:px-56 md:px-24 p-4 max-w-7xl'>
                                <div class='text-left md:max-w-5xl max-w-xl'>
                                    <h1 class='font-extrabold md:text-6xl text-4xl text-gray-900 tracking-tight leading-none mb-2'>$title</h1>
                                    <h2 class='font-bold md:text-4xl text-2xl text-gray-700'>$subtitle</h2>
                                    <h3 class='mt-4 md:text-lg text-base font-semibold text-gray-700'><span class='mr-3'><i class='fa fa-calendar'></i> $date</span>|<span class='mx-3'>von <a href='' class='text-green-800 hover:underline'>$author</a></span></h3>
                                    <h3 class='mt-2 text-base font-semibold text-gray-700'><span><i class='far fa-clock'></i> Geschätzte Lesedauer: $readingtime Minuten</span></h3>
                                </div>
                                <div class='mt-8 text-left md:max-w-4xl max-w-xl'>
                                    <p class='text-gray-600 text-xl'>$content</p>
                                </div>
                            </div>
                                <div class='mt-4 mx-auto' id='likesection'>
                                   <span class='text-gray-900 md:text-lg text-sm font-medium mr-4'><span class='font-semibold' id='likecount'>$likes</span> Person(en) gefällt dieser Beitrag.</span>
                                  

                                    <button id='likebtn' onclick='add_like($id)' class='bg-green-400 hover:bg-green-600 transition duration-200 ease-in-out transform hover:scale-105 text-white font-semibold rounded py-2 px-6 like-button'><i class='fas fa-thumbs-up'></i> Like</button>
                                </div>
                            <div class='xl:px-56 md:px-24 p-4'><hr class='mx-auto max-w-4xl'></div>
                            ";
                            }
                        } else {
                            // echo all blogposts
                            echo "<div class='mx-auto my-4 xl:px-56 md:px-24 p-4 max-w-7xl'>
                                <div class='text-left md:max-w-5xl max-w-xl'>
                                    <h1 class='font-extrabold md:text-6xl text-4xl text-gray-900 tracking-tight leading-none mb-2'>$title</h1>
                                    <h2 class='font-bold md:text-4xl text-2xl text-gray-700'>$subtitle</h2>
                                    <h3 class='mt-4 md:text-lg text-base font-semibold text-gray-700'><span class='mr-3'><i class='fa fa-calendar'></i> $date</span>|<span class='mx-3'>von <a href='' class='text-green-800 hover:underline'>$author</a></span></h3>
                                    <h3 class='mt-2 text-base font-semibold text-gray-700'><span><i class='far fa-clock'></i> Geschätzte Lesedauer: $readingtime Minuten</span></h3>
                                </div>
                                <div class='mt-8 text-left md:max-w-4xl max-w-xl'>
                                    <p class='text-gray-600 text-xl'>$content</p>
                                </div>
                            </div>
                                <div class='mt-4 mx-auto' id='likesection'>
                                   <span class='text-gray-900 md:text-lg text-sm font-medium mr-4'><span class='font-semibold' id='likecount'>$likes</span> Person(en) gefällt dieser Beitrag.</span>
                                </div>
                            <div class='xl:px-56 md:px-24 p-4'><hr class='mx-auto max-w-4xl'></div>
                            ";
                        }
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
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Linking ../../js/script.js -->
</body>
</html>