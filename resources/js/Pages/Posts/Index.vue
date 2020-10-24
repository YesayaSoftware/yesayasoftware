<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Posts
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 16v5a1 1 0 01-1 1H9l-3-6a2 2 0 01-2-2 2 2 0 01-2-2v-2c0-1.1.9-2 2-2 0-1.1.9-2 2-2h7.59l4-4H20a2 2 0 012 2v14a2 2 0 01-2 2h-2.41l-4-4H13zm0-2h1.41l4 4H20V4h-1.59l-4 4H13v6zm-2 0V8H6v2H4v2h2v2h5zm0 2H8.24l2 4H11v-4z"/>
                            </svg>

                            {{ posts.length }} Posts
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="hidden sm:block shadow-sm rounded-md">
                        <inertia-link
                            :href="`/categories/`"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Categories
                        </inertia-link>
                    </span>

                    <span v-if="$page.user && $page.user.isAdmin" class="sm:ml-3 shadow-sm rounded-md">
                        <inertia-link
                            :href="`/posts/create`"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>

                                New
                        </inertia-link>
                    </span>

                    <span x-data="{ open: false }" class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button @click="open = !open" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out">
                            More

                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <inertia-link
                                    :href="`/categories/`"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Categories
                                </inertia-link>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </template>

        <post-list :posts="posts"/>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import PostList from './../../Pages/Posts/List'

    export default {
        props: ['sessions', 'posts', 'successMessage'],

        components: {
            AppLayout,
            PostList
        }
    }
</script>
