<template>
    <div>
        <div class="relative bg-white overflow-hidden">
            <div class="max-w-screen-xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>

                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="#" aria-label="Home">
                                        <img class="h-8 w-auto sm:h-10" src="/img/logo-rounded.svg" alt="Yesaya Software">
                                    </a>

                                    <div class="-mr-2 flex items-center md:hidden">
                                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" id="main-menu" aria-label="Main menu" aria-haspopup="true">
                                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden md:block md:ml-10 md:pr-4">
                                <inertia-link
                                    :href="$route('posts.index')"
                                    class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                    Posts
                                </inertia-link>

                                <inertia-link
                                    :href="$route('podcast.index')"
                                    class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                    Podcasts
                                </inertia-link>

                                <a href="https://youtube.com/yesayasoftware"
                                   class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out"
                                    target="_blank">
                                    Tutorials
                                </a>

                                <a
                                    v-if="! $page.user"
                                    :href="$route('login')"
                                    class="ml-8 font-medium text-blue-600 hover:text-blue-900 transition duration-150 ease-in-out">
                                    Log in
                                </a>
                            </div>
                        </nav>
                    </div>

                    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-md">
                            <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                                <div class="px-5 pt-4 flex items-center justify-between">
                                    <div>
                                        <img class="h-8 w-auto" src="/img/logo-rounded.svg" alt="Yesaya Software">
                                    </div>

                                    <div class="-mr-2">
                                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Close menu">
                                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="px-2 pt-2 pb-3">
                                    <inertia-link
                                        :href="$route('posts.index')"
                                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                        Posts
                                    </inertia-link>

                                    <inertia-link
                                        :href="$route('podcasts.index')"
                                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                        Podcasts
                                    </inertia-link>

                                    <a href="https://youtube.com/yesayasoftware"
                                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem"
                                        target="_blank">
                                        Tutorials
                                    </a>
                                </div>

                                <div>
                                    <a href="$route('login')"
                                        class="block w-full px-5 py-3 text-center font-medium text-blue-600 bg-gray-50 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:bg-gray-100 focus:text-blue-700 transition duration-150 ease-in-out" role="menuitem">
                                        Log in
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                Napenda code
                                <br class="xl:hidden">
                                <span class="text-blue-600">tujadili pamoja</span>
                            </h2>

                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Hapa tutajadili pamoja kuhusu utengezaji wa mifumo ya TEHAMA, utaona kila wakati naweka jambo jipya la kukushirikisha. Nitafurahi kujifunza toka kwako kupitia maoni na changamoto unazopitia kwenye programming.
                            </p>

                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a :href="$route('register')"  class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                        Anza Sasa
                                    </a>
                                </div>

                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="https://youtube.com/yesayasoftware"
                                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-blue-700 bg-blue-100 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                                        target="_blank">
                                        Ona Tutorials
                                    </a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/img/banner.jpg" alt="Yesaya at Yesaya Software studio">
            </div>
        </div>

        <div class="py-12 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <p class="text-base leading-6 text-blue-600 font-semibold tracking-wide uppercase">
                        Malengo Yangu
                    </p>

                    <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                        Kujadili na kujifunza pamoja na wewe
                    </h3>

                    <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-500 lg:mx-auto">
                        Nimejifunza, njia nzuri ya kuelewa zaidi kufundisha wengine ulichojifunza. Napenda nachofanya na nataka elewa zaidi. Hapa chini, ni maeneo muhimu ninayofanya nayo kazi na ninapenda kukushirikisha wewe.
                    </p>
                </div>

                <div class="mt-10">
                    <ul class="md:grid md:grid-cols-2 md:col-gap-8 md:row-gap-10">
                        <li>
                            <div class="flex md:items-center md:justify-center ">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-16 w-16 rounded-md text-white">
                                        <svg class="h-24 w-24" fill="none" viewBox="0 0 64 64">
                                            <path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z" fill="#FF2D20" fill-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">
                                        Laravel
                                    </h4>

                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Laravel ni PHP Framework, ninaipenda na ninaitumia kwa kazi zangu nyingi. Ni expressive na rahisi kufanya nayo kazi, nina imani utaipenda.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex md:items-center md:justify-center ">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md text-white">
                                        <svg class="h-24 w-24" fill="none" viewBox="0 0 64 64">
                                            <use xlink:href="#D" x="3.764" y="3.764"/>
                                            <defs>
                                                <linearGradient id="A" x1="-16.82%" y1="91.95%" x2="76.23%" y2="-1.09%"><stop offset="10.8%" stop-color="#c757bc"/><stop offset="17.3%" stop-color="#cd5ca9"/><stop offset="49.2%" stop-color="#e8744f"/><stop offset="71.6%" stop-color="#f88316"/><stop offset="82.3%" stop-color="#ff8900"/></linearGradient><linearGradient id="B" x1="31.92%" y1="135.93%" x2="77.28%" y2="45.62%"><stop offset="29.6%" stop-color="#00afff"/><stop offset="69.4%" stop-color="#5282ff"/><stop offset="100%" stop-color="#945dff"/></linearGradient><linearGradient id="C" x1="-2.37%" y1="52.28%" x2="60.96%" y2="-8.00%"><stop offset="29.6%" stop-color="#00afff"/><stop offset="69.4%" stop-color="#5282ff"/><stop offset="100%" stop-color="#945dff"/></linearGradient></defs><symbol id="D" overflow="visible"><g stroke="none" fill-rule="nonzero"><path d="M32.146.015L0 33.795v30.21L32.086 31.86 64.006 0z" fill="url(#A)"/><path d="M0 64.013l32.086-32.146 31.92 32.146z" fill="url(#B)"/><path d="M0 .015h32.146L0 33.795z" fill="url(#C)"/></g></symbol>
                                        </svg>
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">
                                        Kotlin
                                    </h4>

                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Kotlin ni chagua namba moja kwenye Android Studio, iko vizuri sana, imepunguza kuandika code za kujiruia rudia (boiler plate code).
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex md:items-center md:justify-center ">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-16 w-16 rounded-md text-white">
                                        <svg class="h-24 w-24" fill="none" viewBox="0 0 256 256" preserveAspectRatio="xMinYMin meet">
                                                <path d="M204.8 0H256L128 220.8 0 0h97.92L128 51.2 157.44 0h47.36z" fill="#41B883"/><path d="M0 0l128 220.8L256 0h-51.2L128 132.48 50.56 0H0z" fill="#41B883"/><path d="M50.56 0L128 133.12 204.8 0h-47.36L128 51.2 97.92 0H50.56z" fill="#35495E"/></svg>

                                    </div>
                                </div>

                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">
                                        Vue JS
                                    </h4>

                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Ili mfumo yako inoge, ni lazima uweke chumvi kidogo (JavaScript) ili kuongeza interactivity. Mimi nimechagua Vue JS Framework.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex md:items-center md:justify-center ">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-16 w-16 rounded-md text-white">
                                        <svg class="h-24 w-24" fill="none" viewBox="0 0 64 64">
                                                <path fill="#14B4C6" d="M32 16c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C35.744 29.09 38.808 32.2 45.5 32.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.514-3.522-2.004-5.147-3.653C41.756 19.11 38.692 16 32 16zM18.5 32.2C11.3 32.2 6.8 35.8 5 43c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C22.244 45.29 25.308 48.4 32 48.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.514-3.522-2.004-5.147-3.653C28.256 35.31 25.192 32.2 18.5 32.2z"></path><path fill="#000" d="M85.996 29.652h-4.712v9.12c0 2.432 1.596 2.394 4.712 2.242V44.7c-6.308.76-8.816-.988-8.816-5.928v-9.12h-3.496V25.7h3.496v-5.104l4.104-1.216v6.32h4.712v3.952zm17.962-3.952h4.104v19h-4.104v-2.736c-1.444 2.014-3.686 3.23-6.65 3.23-5.168 0-9.462-4.37-9.462-9.994 0-5.662 4.294-9.994 9.462-9.994 2.964 0 5.206 1.216 6.65 3.192V25.7zm-6.004 15.58c3.42 0 6.004-2.546 6.004-6.08 0-3.534-2.584-6.08-6.004-6.08-3.42 0-6.004 2.546-6.004 6.08 0 3.534 2.584 6.08 6.004 6.08zm16.948-18.43c-1.444 0-2.622-1.216-2.622-2.622a2.627 2.627 0 012.622-2.622 2.627 2.627 0 012.622 2.622c0 1.406-1.178 2.622-2.622 2.622zM112.85 44.7v-19h4.104v19h-4.104zm8.854 0V16.96h4.104V44.7h-4.104zm30.742-19h4.332l-5.966 19h-4.028l-3.952-12.806-3.99 12.806h-4.028l-5.966-19h4.332l3.686 13.11 3.99-13.11h3.914l3.952 13.11 3.724-13.11zm9.424-2.85c-1.444 0-2.622-1.216-2.622-2.622a2.627 2.627 0 012.622-2.622 2.627 2.627 0 012.622 2.622c0 1.406-1.178 2.622-2.622 2.622zm-2.052 21.85v-19h4.104v19h-4.104zm18.848-19.494c4.256 0 7.296 2.888 7.296 7.828V44.7h-4.104V33.452c0-2.888-1.672-4.408-4.256-4.408-2.698 0-4.826 1.596-4.826 5.472V44.7h-4.104v-19h4.104v2.432c1.254-1.976 3.306-2.926 5.89-2.926zm26.752-7.106h4.104v26.6h-4.104v-2.736c-1.444 2.014-3.686 3.23-6.65 3.23-5.168 0-9.462-4.37-9.462-9.994 0-5.662 4.294-9.994 9.462-9.994 2.964 0 5.206 1.216 6.65 3.192V18.1zm-6.004 23.18c3.42 0 6.004-2.546 6.004-6.08 0-3.534-2.584-6.08-6.004-6.08-3.42 0-6.004 2.546-6.004 6.08 0 3.534 2.584 6.08 6.004 6.08zm23.864 3.914c-5.738 0-10.032-4.37-10.032-9.994 0-5.662 4.294-9.994 10.032-9.994 3.724 0 6.954 1.938 8.474 4.902l-3.534 2.052c-.836-1.786-2.698-2.926-4.978-2.926-3.344 0-5.89 2.546-5.89 5.966 0 3.42 2.546 5.966 5.89 5.966 2.28 0 4.142-1.178 5.054-2.926l3.534 2.014c-1.596 3.002-4.826 4.94-8.55 4.94zm15.314-14.25c0 3.458 10.222 1.368 10.222 8.398 0 3.8-3.306 5.852-7.41 5.852-3.8 0-6.536-1.71-7.752-4.446l3.534-2.052c.608 1.71 2.128 2.736 4.218 2.736 1.824 0 3.23-.608 3.23-2.128 0-3.382-10.222-1.482-10.222-8.284 0-3.572 3.078-5.814 6.954-5.814 3.116 0 5.7 1.444 7.03 3.952l-3.458 1.938c-.684-1.482-2.014-2.166-3.572-2.166-1.482 0-2.774.646-2.774 2.014zm17.518 0c0 3.458 10.222 1.368 10.222 8.398 0 3.8-3.306 5.852-7.41 5.852-3.8 0-6.536-1.71-7.752-4.446l3.534-2.052c.608 1.71 2.128 2.736 4.218 2.736 1.824 0 3.23-.608 3.23-2.128 0-3.382-10.222-1.482-10.222-8.284 0-3.572 3.078-5.814 6.954-5.814 3.116 0 5.7 1.444 7.03 3.952l-3.458 1.938c-.684-1.482-2.014-2.166-3.572-2.166-1.482 0-2.774.646-2.774 2.014z"></path>
                                            </svg>
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">
                                        Tailwind CSS
                                    </h4>

                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Muonekano ni kila kitu, hasa kwenye macho ya mtumiaji wa mfumo wako. Tailwind CSS inaeleweka na kukupa nguvu amua unachotaka.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto relative bg-gray-50 pt-8 pb-20 px-4 sm:px-6 lg:pt-16 lg:pb-28 lg:px-8">
            <div class="absolute inset-0">
                <div class="bg-white h-1/3 sm:h-2/3"></div>
            </div>

            <div class="relative max-w-7xl mx-auto">
                <div class="text-center">
                    <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                        Machapisho
                    </h2>

                    <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                        Mara kwa mara ninaweka machapisho mbalimbali kama ni Posts, Podcast au Tutorials. Pitia na shirikisha wengine.
                    </p>
                </div>

                <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                    <div  v-for="post in posts" :key="post.id"
                        class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <inertia-link
                            :href="`/posts/${post.category.slug}/${post.slug}`">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" :src="post.thumbnail" :alt="posts.title">
                            </div>

                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-sm leading-5 font-medium text-blue-600">
                                        <a href="#" class="hover:underline">
                                            Posts
                                        </a>
                                    </p>

                                    <a href="#" class="block">
                                        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                            {{ post.title }}
                                        </h3>

                                        <p class="mt-3 text-base leading-6 text-gray-500" v-html="$options.filters.summary(post.body)" />
                                    </a>
                                </div>

                                <div class="mt-6 flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#">
                                            <img class="h-10 w-10 rounded-full"
                                                 :src="post.user.profile_photo_url"
                                                 :alt="post.user.name">
                                        </a>
                                    </div>

                                    <div class="ml-3">
                                        <p class="text-sm leading-5 font-medium text-gray-900">
                                            <a href="#" class="hover:underline">
                                                {{ post.user.name }}
                                            </a>
                                        </p>

                                        <div class="flex text-sm leading-5 text-gray-500">
                                            <time>
                                                {{ post.created_at | moment("from", "now") }}
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="bg-white">
            <div class="max-w-screen-xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8">
                <div class="px-6 py-6 bg-blue-700 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
                    <div class="xl:w-0 xl:flex-1">
                        <h2 class="text-2xl leading-8 font-extrabold tracking-tight text-white sm:text-3xl sm:leading-9">
                            Utaka kupata updates?
                        </h2>

                        <p class="mt-3 max-w-3xl text-lg leading-6 text-blue-200" id="newsletter-headline">
                            Jisajili hapa ili kila nikifanya jambo uwe wa kwanza kufahamu.
                        </p>
                    </div>

                    <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                        <form class="sm:flex" aria-labelledby="newsletter-headline">
                            <input aria-label="Email address" type="email" required class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out" placeholder="Weka email yako hapa.">

                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                                <button class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-400 focus:outline-none focus:bg-blue-400 transition duration-150 ease-in-out">
                                    Nishtue
                                </button>
                            </div>
                        </form>

                        <p class="mt-3 text-sm leading-5 text-blue-200">
                            Ninajali kuhusu ulinzi wa taarifa zako. Soma hapa
                            <a href="#" class="text-white font-medium underline">
                                Privacy Policy.
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>-->

        <x-footer />
    </div>
</template>

<script>
    import XFooter from './../Components/Footer'

    export default {
        props: ['posts'],

        components: {
            XFooter
        },

        filters: {
            summary: function(string) {
                return string.substring(0,140) + '...';
            }
        }
    }
</script>
