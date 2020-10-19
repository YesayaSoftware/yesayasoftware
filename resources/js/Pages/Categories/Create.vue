<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        New Category
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <inertia-link 
                            :href="`/categories`"
                            class="mt-2 flex items-center text-sm leading-5 text-blue-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Go back
                        </inertia-link>

                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 16v5a1 1 0 01-1 1H9l-3-6a2 2 0 01-2-2 2 2 0 01-2-2v-2c0-1.1.9-2 2-2 0-1.1.9-2 2-2h7.59l4-4H20a2 2 0 012 2v14a2 2 0 01-2 2h-2.41l-4-4H13zm0-2h1.41l4 4H20V4h-1.59l-4 4H13v6zm-2 0V8H6v2H4v2h2v2h5zm0 2H8.24l2 4H11v-4z"/>
                            </svg>
                            
                            {{ category.posts.length }}
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3 shadow-sm rounded-md">
                        <inertia-link 
                            :href="`/categories`" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            
                            List
                        </inertia-link>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h2 class="text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl">
                            Malengo Yangu
                        </h2>
                        
                        <p class="text-xl leading-7 text-gray-500">
                            Nimejifunza kuwa njia nzuri ya kuelewa zaidi ni kufundisha wengine ulichojifunza. Napenda nachofanya na nataka kuelewa zaidi. Hapa chini, ni maeneo muhimu ninayofanya nayo kazi na ninapenda kukushirikisha wewe.
                        </p>
                    </div>

                    <div class="flex flex-col">
                        <form @submit.prevent="store">
                            <div class="grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                        Name
                                    </label>
                                    
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <input v-model="form.name"
                                            id="name" 
                                            name="name" 
                                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium leading-5 text-gray-700">
                                        Description
                                    </label>

                                    <div class="mt-1 rounded-md shadow-sm">
                                        <VueTrix 
                                            v-model="form.description"
                                            id="descrtiption" 
                                            name="descrtiption" 
                                            placeholder="Enter content"/>
                                    </div>

                                    <p class="mt-2 text-sm text-gray-500">
                                        Write a few sentences to describe this Category.
                                    </p>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="thumbnail" class="block text-sm font-medium leading-5 text-gray-700">
                                        Thumbnail
                                    </label>
                                    
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <input @change="setThumbnail"
                                            id="thumbnail" 
                                            name="thumbnail" 
                                            type="file"
                                            accept="image/*"
                                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 mb-8 border-t border-gray-200 pt-5">
                                <div class="flex justify-end">
                                    <span class="inline-flex rounded-md shadow-sm">
                                        <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                            Cancel
                                        </button>
                                    </span>
                                
                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out"
                                            :disabled="loading">
                                            <half-circle-spinner
                                                v-if="loading"
                                                :animation-duration="1000"
                                                :size="20"
                                                color="#fff"
                                                class="mr-4"
                                                />
                                            Save
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import VueTrix from "vue-trix";
    import { HalfCircleSpinner } from 'epic-spinners'

    export default {
        props: ['sessions'],

        components: {
            AppLayout,
            VueTrix,
            HalfCircleSpinner
        },

        data() {
            return {
                loading: false,
                form: {
                    name: '',
                    description: '',
                    thumbnail: ''
                }, 
            }
        },

        methods: {
            store() {
                let category = new FormData()

                category.append('name', this.form.name)
                category.append('description', this.form.description)
                category.append('thumbnail', this.form.thumbnail)

                this.loading = true

                this.$inertia.post('/categories', category)
                .then(() => {
                    this.loading = false;
                })
            },

            setThumbnail(e) {
                this.form.thumbnail = e.target.files[0]
            }
        }
    }
</script>