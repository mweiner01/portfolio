<?php

require('../models/blog.php');

// if session not started yet then start it. otherwise do nothing
session_start();


// check if submit button is press
if (isset($_POST['create'])) {
    // check if username field and password field are filled
    if (isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['content']) && isset($_POST['img_url']) && isset($_POST['featured'])) {

        // create user with username and password

        if($_POST['featured'] == "Ja") {
            $blogpost = new blog($_POST['title'], $_POST['subtitle'], $_POST['content'], $_POST['author'], $_POST['img_url'], 1);
        } else {
            $blogpost = new blog($_POST['title'], $_POST['subtitle'], $_POST['content'], $_POST['author'], $_POST['img_url'], 0);
        }
        $blogpost->createBlogPost();
        header("Location: blogposts.php");
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
        <div class="w-1/3 flex h-screen">
            <div class="text-center p-4 absolute inset-y-0 right-0 flex">
                <a href="https://www.google.com" class="text-gray-400 hover:text-gray-500  text-3xl mr-4"><i class="fas fa-home"></i></a>
            </div>
            <div class="text-center max-w-xl m-auto">
                <h1 class="font-semibold tracking-tight text-3xl">Erstelle ganz einfach einen Beitrag <i class="fas fa-sign-in-alt"></i></h1>
                <h3 class="mt-1 tracking-tight text-base font-medium">Gebe alle Informationen für dein Beitrag ein.</h3>
                <div class="mt-4">
                        <div>
                            <form method="post" class="w-full max-w-lg">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Titel
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500 focus:bg-white" name="title" type="text" placeholder="Der beste Eisladen in Hamburg">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Subtitel
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="subtitle" type="text" placeholder="Ein Must-See">
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                            Content
                                        </label>
                                        <textarea name="content" id="editor"></textarea>
                                        <p class="text-gray-600 text-xs italic">Hier kommt dein Text für dein Beitrag hin.</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                            Autor
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="author" type="text" placeholder="Max Mustermann">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                            Featured
                                        </label>
                                        <div class="relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="featured">
                                                <option>Ja</option>
                                                <option>Nein</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                            Img URL
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="img_url" type="text" placeholder="https://www.google.com/fox.png">
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <input type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold p-2 cursor-pointer w-2/3 rounded-lg" name="create" value="Beitrag erstellen">
                                </div>
                            </form>
                        </div>
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

<script type="text/javascript" src="../../tinymce/tinymce.min.js"></script>


<script>
    tinymce.init({
        selector: 'textarea#editor',  //Change this value according to your HTML
        auto_focus: 'element1',
        width: "700",
        height: "200"
    });

</script>

<script crossorigin="anonymous"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
</body>
</html>
