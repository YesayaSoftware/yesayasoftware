<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Category
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <inertia-link
                            :href="route('categories.index')"
                            class="mt-2 flex items-center text-sm leading-5 text-blue-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Go back
                        </inertia-link>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="hidden sm:block shadow-sm rounded-md">
                        <inertia-link
                            :href="route('categories.show', category.slug)"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>

                            View
                        </inertia-link>
                    </span>

                    <span v-if="$page.props.user" class="sm:ml-3 shadow-sm rounded-md">
                        <form id="subscribe-form" action="" method="POST">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>

                                Subscribe
                            </button>
                        </form>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <form class="space-y-8 divide-y divide-gray-200"
                              method="POST"
                              @submit.prevent="update">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Update Post
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            This information will be displayed publicly so be careful what you share.
                                        </p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="name" class="block text-sm font-medium " :class="errors.name ? 'text-red-900' : 'text-gray-700'">
                                                Name
                                            </label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input  v-model="form.name"
                                                        type="text"
                                                        name="name"
                                                        id="name"
                                                        autocomplete="name"
                                                        class="flex-1 focus:ring-blue-500 focus:border-blue-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        :class="errors.name ? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''">

                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="email-error">
                                                <span v-if="errors.name">{{ errors.name }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="description" class="block text-sm font-medium " :class="errors.description ? 'text-red-900' : 'text-gray-700'">
                                                Description
                                            </label>

                                            <div class="mt-1">
                                                <textarea v-model="form.description"
                                                          id="description"
                                                          name="description"
                                                          rows="3"
                                                          class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                          :class="errors.description ? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm" id="description-error">
                                                <span v-if="errors.description" class="text-red-600">{{ errors.description }}.</span>

                                                <span v-else class="text-gray-500">Write a few sentences to describe this Category.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="cover_photo" class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>

                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="w-full space-y-1 text-center">
                                                    <!-- Current Category Thumbnail -->
                                                    <div class="w-full" v-show="! thumbnailPreview">
                                                        <img :src="category.thumbnail_url" alt="Current Post Thumbnail" class="w-full object-cover">
                                                    </div>

                                                    <!-- New Category Thumbnail Preview -->
                                                    <div class="w-full" v-show="thumbnailPreview">
                                                        <span class="block w-full h-72"
                                                              :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + thumbnailPreview + '\');'">
                                                        </span>
                                                    </div>

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="thumbnail"
                                                               class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                            <span>Upload a file</span>

                                                            <input @change="updateThumbnailPreview"
                                                                   id="thumbnail"
                                                                   ref="thumbnail"
                                                                   name="thumbnail"
                                                                   type="file"
                                                                   accept="image/*"
                                                                   class="sr-only"/>
                                                        </label>

                                                        <button class="pl-1" @click.prevent="selectNewThumbnail">
                                                            | Preview |
                                                        </button>

                                                        <button class="pl-1 cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500"
                                                                @click.prevent="selectNewThumbnail">
                                                            Remove
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
                                            :href="route('categories.index')"
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
        props: ['category', 'errors'],

        components: {
            AppLayout
        },

        data() {
            return {
                loading: false,

                form: this.$inertia.form({
                    '_method': 'PUT',
                    name: this.category.name,
                    description: this.category.description,
                    thumbnail: this.category.thumbnail
                }, {
                    bag: 'store',
                    resetOnSuccess: false,
                }),

                thumbnailPreview: null,
            }
        },

        methods: {
            update() {
                this.loading = true

                if (this.$refs.thumbnail)
                    this.form.thumbnail = this.$refs.thumbnail.files[0]

                this.form.post(route('categories.update', this.category.slug), {
                    preserveScroll: true,

                    onFinish: () => this.loading = false
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

            deleteThumbnail() {
                this.$inertia.delete('/categories/thumbnail/' + this.category.slug, {
                    preserveScroll: true,

                    onFinish: () => this.thumbnailPreview = null
                })
            },
        }
    }
</script>
