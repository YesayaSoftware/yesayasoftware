<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                        New Post
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <inertia-link
                            :href="route('posts.index')"
                            class="mt-2 flex items-center text-sm leading-5 text-blue-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#4A5568" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Go back
                        </inertia-link>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3 shadow-sm rounded-md">
                        <inertia-link
                            :href="route('posts.index')"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            List
                        </inertia-link>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="store">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                            Malengo Yangu
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500">
                                            Nimejifunza kuwa njia nzuri ya kuelewa zaidi ni kufundisha wengine
                                            ulichojifunza. Napenda nachofanya na nataka kuelewa zaidi. Hapa chini, ni
                                            maeneo muhimu ninayofanya nayo kazi na ninapenda kukushirikisha wewe.
                                        </p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="title" class="block text-sm font-medium dark:text-gray-300"
                                                   :class="errors.title ? 'text-red-900' : 'text-gray-700'">
                                                Title
                                            </label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input v-model="form.title"
                                                       type="text"
                                                       name="title"
                                                       id="title"
                                                       autocomplete="title"
                                                       class="flex-1 dark:bg-gray-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                       :class="errors.title? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="email-error">
                                                <span v-if="errors.title">{{ errors.title }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="category_id" class="block text-sm font-medium dark:text-gray-300"
                                                   :class="errors.category_id ? 'text-red-900' : 'text-gray-700'">
                                                Category
                                            </label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <select
                                                    id="category_id"
                                                    name="category_id"
                                                    v-model="form.category_id"
                                                    class="py-3 px-4 dark:bg-gray-800 dark:text-gray-100 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md"
                                                    :class="errors.category_id? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''">
                                                    <option v-for="category in categories"
                                                            :key="category.id"
                                                            :value="category.id">
                                                        {{ category.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="category-error">
                                                <span v-if="errors.category_id">{{ errors.category_id }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                Body
                                            </label>

                                            <div class="mt-1">
                                                <textarea v-model="form.body"
                                                          id="body"
                                                          name="body"
                                                          rows="3"
                                                          class="shadow-sm dark:bg-gray-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                          :class="errors.body? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm" id="description-error">
                                                <span v-if="errors.body" class="text-red-600">{{ errors.body }}.</span>

                                                <span v-else class="text-gray-500">Write a few sentences to describe this Post.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="cover_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                Cover photo
                                            </label>

                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="w-full space-y-1 text-center">
                                                    <svg v-show="! thumbnailPreview"
                                                         class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                         fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>

                                                    <!-- New Category Thumbnail Preview -->
                                                    <div class="w-full" v-show="thumbnailPreview">
                                                        <span class="block w-full h-72"
                                                              :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + thumbnailPreview + '\');'">
                                                        </span>
                                                    </div>

                                                    <div class="flex text-sm text-gray-600">

                                                        <label for="thumbnail"
                                                               class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                            <span>Upload a file</span>

                                                            <input @change="updateThumbnailPreview"
                                                                   id="thumbnail"
                                                                   name="thumbnail"
                                                                   ref="thumbnail"
                                                                   type="file"
                                                                   accept="image/*"
                                                                   class="sr-only"/>
                                                        </label>

                                                        <button class="pl-1" @click.prevent="selectNewThumbnail">
                                                            | Preview
                                                        </button>
                                                    </div>

                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <inertia-link
                                            :href="route('posts.index')"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Cancel
                                        </inertia-link>

                                        <button type="submit"
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                :disabled="loading">
                                            Save
                                        </button>
                                    </div>
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

export default {
    props: ['categories', 'errors'],

    components: {
        AppLayout
    },

    data() {
        return {
            loading: false,
            form: {
                title: '',
                body: '',
                category_id: '',
                thumbnail: ''
            },

            thumbnailPreview: null
        }
    },

    methods: {
        store() {
            if (this.$refs.thumbnail)
                this.form.thumbnail = this.$refs.thumbnail.files[0]

            let post = new FormData()

            post.append('title', this.form.title)
            post.append('body', this.form.body)
            post.append('category_id', this.form.category_id)
            post.append('thumbnail', this.form.thumbnail)

            this.loading = true

            this.$inertia.post(route('posts.store'), post, {
                preserveScroll: true,

                onFinish: () => this.loading = false,
            })
        },

        selectNewThumbnail() {
            this.$refs.thumbnail.click();
        },

        updateThumbnailPreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.thumbnailPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.thumbnail.files[0]);
        },
    }
}
</script>
