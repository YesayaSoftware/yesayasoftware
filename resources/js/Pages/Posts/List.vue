<template>
    <div class="mt-4 bg-white dark:bg-gray-800">
        <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
            <div class="space-y-12">
                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                    <h2 class="text-3xl dark:text-white leading-9 font-extrabold tracking-tight sm:text-4xl">
                        Machapisho
                    </h2>

                    <p class="text-xl leading-7 text-gray-500">
                        Mara kwa mara ninaweka machapisho mbalimbali kama ni Makala, Mahojiano, Warsha na Mafunzo.
                    </p>
                </div>

                <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                    <div v-for="post in posts" :key="post.id" class="flex flex-col rounded-lg shadow-lg overflow-hidden dark:bg-gray-900">
                        <inertia-link :href="route('posts.show', post.slug)" class="block mt-2">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" :src="post.thumbnail_url" :alt="post.title" />
                            </div>

                            <div class="flex-1 bg-white dark:bg-gray-900 p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-blue-600">
                                        <inertia-link :href="route('categories.show', post.category.slug)" class="hover:underline">
                                            {{ post.category.name }}
                                        </inertia-link>
                                    </p>

                                    <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ post.title.substring(0, 50).concat('...') }}
                                    </p>

                                    <p class="mt-3 text-base text-gray-500">
                                        {{ post.clear_body.substring(0, 180).concat('...') }}
                                    </p>
                                </div>

                                <div class="mt-6 flex items-center">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            <a href="#" class="hover:underline">
                                                {{ post.user.name }}
                                            </a>
                                        </p>

                                        <div class="flex space-x-1 text-sm text-gray-500">
                                            <time :datetime="post.created_at">
                                                {{ post.created_at_date }}
                                            </time>

                                            <span aria-hidden="true">&middot;</span>
                                            <span> {{ post.read_time }} read </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['posts']
    }
</script>
