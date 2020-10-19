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

                                <a href="#" class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                    Podcasts
                                </a>

                                <a href="#" class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
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
                                    <a :href="$route('posts.index')" 
                                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                        Posts
                                    </a>

                                    <a href="#" 
                                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                        Podcasts
                                    </a>

                                    <a href="#" 
                                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">
                                        Tutorials
                                    </a>
                                </div>

                                <div>
                                    <inertia-link 
                                        :href="$route('login')" 
                                        class="block w-full px-5 py-3 text-center font-medium text-blue-600 bg-gray-50 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:bg-gray-100 focus:text-blue-700 transition duration-150 ease-in-out" role="menuitem">
                                        Log in
                                    </inertia-link>
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
                                    <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-blue-700 bg-blue-100 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                        Ona Tutorials
                                    </a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/img/banner.png" alt="Yesaya at Yesaya Software studio">
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
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
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
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
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
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
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
                            
                                        <p v-html="post.body"
                                            class="mt-3 text-base leading-6 text-gray-500" />
                                    </a>
                                </div>
                
                                <div class="mt-6 flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#">
                                            <img class="h-10 w-10 rounded-full" src="/img/profile.jpg" alt="Author: Yesaya R. Athuman">
                                        </a>
                                    </div>
                
                                    <div class="ml-3">
                                        <p class="text-sm leading-5 font-medium text-gray-900">
                                            <a href="#" class="hover:underline">
                                                Yesaya R. Athuman
                                            </a>
                                        </p>
                    
                                        <div class="flex text-sm leading-5 text-gray-500">
                                            <time>
                                                {{ post.created_at | moment("from", "now") }}
                                            </time>
                                        
                                            <span class="mx-1">&middot;</span>
                                            <span>6 min read</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
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
        </div>

        <x-footer />
    </div>
</template>

<script>
    import XFooter from './../Components/Footer'

    export default {
        props: ['posts'],

        components: {
            XFooter
        }
    }
</script>