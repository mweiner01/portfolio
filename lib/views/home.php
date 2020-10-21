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
        <nav class="w-full fixed bg-gray-800">
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


    <!-- First section START -->
    <section class="bg-gray-800 p-16">
        <div class="text-center xl:p-24 md:p-24">
            <h1 class="text-2xl tracking-tight leading-10 font-extrabold text-white sm:text-5xl sm:leading-none md:text-5xl xl:text-6xl uppercase">
                Hey, ich bin Max!</h1>
            <h1 class="text-base tracking-tight leading-10 font-extrabold text-green-600 sm:text-3xl leading-none md:text-3xl xl:text-4xl uppercase" id="title"><span
                        class="txt-rotate"
                        data-period="2000"
                        data-rotate='[ "Hobby Entwickler.", "mit Ausbildung?"]'></span></h1>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-center">
                <div class="rounded-md shadow">
                    <button class="w-full font-bold flex items-center justify-center xl:px-8 xl:py-3 px-4 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition duration-150 ease-in-out" id="changeColorBtn">
                        Kontaktiere mich
                    </button>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-3">
                    <a class="w-full flex items-center font-bold justify-center xl:px-8 xl:py-3 px-4 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-green-700 border-2 border-green-600 hover:border-green-100 hover:text-green-600 hover:bg-white focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 transition duration-150 ease-in-out"
                       href="#">
                        Mein Lebenslauf
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- First section END -->

    <!-- Introduction section START -->
    <section class="p-8 xl:p-16">
        <div class="grid grid-flow-row xl:grid-cols-2 grid-cols-1 gap-4">
            <div class="p-4 mx-auto xl:block hidden">
                <img alt="banner-img" class="img-fluid" src="../../img/flat_design%231.jpg">
            </div>
            <div class="py-18">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center md:pt-24">
                        <p class="text-xl leading-6 text-indigo-800 font-semibold tracking-wide uppercase">
                            Vorstellung</p>
                        <h3 class="text-2xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-3xl sm:leading-none md:text-4xl xl:text-5xl uppercase">
                            Ich stelle mich vor
                        </h3>
                        <div class="mt-4 max-w-2xl md:text-xl text-medium leading-7 text-gray-500 lg:mx-auto">
                            <p>
                                Ich bin der Max, 18 Jahre alt und ich programmiere nun schon seit circa 4 Jahren hobbymäßig. Da mir das Programmieren so viel spaß macht, habe ich beschlossen,
                                eine Ausbildung als Fachinformatiker für Anwendungsentwicklung zu beginnen.
                            </p>
                            <br>
                            <p>Auf der folgenden Seite werden Sie meine Erfahrungen und Kenntnisse etwas besser kennenlernen und ebenfalls einen Einblick in meine derzeitigen Projekte bekommen.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-start lg:justify-center xl:justify-center">
                                <div class="mt-3 sm:mt-0">
                                    <a class="w-full flex font-bold justify-center px-3 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-green-700 border-2 border-green-600 hover:border-green-100 hover:text-white hover:bg-green-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                                       download
                                       href="/downloads/Lebenslauf_Max_Weiner.pdf">
                                        Download Lebenslauf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Introduction section END -->


    <!-- Experience section start -->
    <section class="p-8 md:p-16" id="experienceSection">
        <div class="pt-12 border-t-2 border-gray-300">
            <div class="text-center">
                <p class="text-xl leading-6 text-purple-800 font-semibold tracking-wide uppercase">
                    Fähigkeiten, Erfahrungen und mehr</p>
                <h3 class="text-3xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-4xl xl:text-5xl uppercase">
                    Meine Erfahrungen
                </h3>
            </div>
            <div class="grid grid-flow-row xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 p-12 mt-6 text-left">
                <div class="max-w-sm">
                    <div class="text-left">
                        <span class="text-3xl text-purple-800"><i class="fas fa-code"></i></span>
                        <h1 class="font-semibold text-xl text-gray-900">HTML & CSS</h1>
                        <p class="text-sm text-gray-500">seit circa. 4 Jahren</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-base text-gray-500">HTML und CSS lernte ich mit PHP, ich baute einige Webseiten und entdeckte ebenfalls das CSS Framework
                            <a href="https://tailwindcss.com/" class="text-purple-800 hover:underline">Tailwind</a> welches mir schöne Designs ermöglichte.</p>
                    </div>
                </div>
                <div class="max-w-sm">
                    <div class="text-left">
                        <span class="text-3xl text-purple-800"><i class="fab fa-js"></i></span>
                        <h1 class="font-semibold text-xl text-gray-900">Javascript</h1>
                        <p class="text-sm text-gray-500">seit weniger als 1 Monat</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-base text-gray-500">Mit Javascript kam ich das erste mal in meinem Praktikum in Kontakt. Dort programmierte ich ein Schachspiel mit GUI.</p>
                    </div>
                </div>
                <div class="max-w-sm">
                    <div class="text-left">
                        <span class="text-3xl text-purple-800"><i class="fab fa-php"></i></span>
                        <h1 class="font-semibold text-xl text-gray-900">PHP</h1>
                        <p class="text-sm text-gray-500">seit circa. 4 Jahren</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-base text-gray-500">PHP lernte ich als erstes und meine ersten Projekte waren einfache Webseiten mit Systemen wie Login & Register oder SQL Abfragen für Blogartikel.</p>
                    </div>
                </div>
                <div class="max-w-sm">
                    <div class="text-left">
                        <span class="text-3xl text-purple-800"><i class="fab fa-java"></i></span>
                        <h1 class="font-semibold text-xl text-gray-900">Java</h1>
                        <p class="text-sm text-gray-500">seit circa. 4 Jahren</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-base text-gray-500">Meine ersten Projekte mit Java waren Minecraft Plugins mit der
                            <a href="https://hub.spigotmc.org/javadocs/bukkit/" class="text-purple-800 hover:underline">Spigot</a> API. Ich lernte verschiedenste SQL Abfragen, Datentypen und weiteres.</p>
                    </div>
                </div>
                <div class="max-w-sm">
                    <div class="text-left">
                        <span class="text-3xl text-purple-800"><i class="fab fa-python"></i></span>
                        <h1 class="font-semibold text-xl text-gray-900">Python</h1>
                        <p class="text-sm text-gray-500">seit weniger als 6 Monaten</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-base text-gray-500">Erste Erfahrungen machte ich mit Python, indem ich die
                            <a href="https://discordpy.readthedocs.io/en/latest/" class="text-purple-800 hover:underline">discord.py</a> API benutzte oder einfache Skripts schrieb, die mir nervige Aufgaben erleichterten.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Experience section end -->


    <!-- Projects section START -->
    <section class="p-8 md:p-16" id="projects">
        <div class="p-12 border-t-2 border-gray-300">
            <div class="text-left">
                <p class="text-xl leading-6 text-red-800 font-semibold tracking-wide uppercase">
                    Projekte</p>
                <h3 class="text-3xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-4xl xl:text-5xl uppercase">
                    Meine Projekte
                </h3>
            </div>
            <div class="grid grid-flow-row xl:grid-cols-4 md:grid-cols-2 lg:grid-cols-2 grid-cols-1 gap-6 pt-12">
                <div class="hover:shadow-5xl">
                    <img alt="" class="h-auto rounded-lg" src="https://i.redd.it/7bdir2zk8nq41.jpg">
                    <div class="text-left pt-2">
                        <p class="text-medium text-gray-900 font-semibold tracking-wide uppercase">Mein Portfolio (Diese
                            Seite)</p>
                        <p class="text-sm text-gray-500 tracking-wide">Veröffentlicht: Noch nicht</p>
                        <div>
                            <a class="text-sm text-red-800 hover:underline hover:text-red-900 mr-2" href="#">Live
                                Ansicht</a>
                            <a class="text-sm text-red-800 hover:underline hover:text-red-900 hover:underline"
                               href="https://github.com/mweiner01/mweiner01.github.io">Github Repository</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects section END -->


    <!-- footer section START -->
    <footer id="contactSection">
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
<!-- Linking ../../js/script.js -->
<script src="../../js/script.js"></script>
<script src="../../js/textwriting_skript.js"></script>
</body>
</html>