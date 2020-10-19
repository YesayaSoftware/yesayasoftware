<template>
    <div class="mt-4 bg-white">
        <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
            <div class="space-y-12">
                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                    <h2 class="text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl">
                        Machapisho
                    </h2>
                    
                    <p class="text-xl leading-7 text-gray-500">
                        Mara kwa mara ninaweka machapisho mbalimbali kama ni Posts, Podcast au Tutorials. Pitia na shirikisha wengine.
                    </p>
                </div>

                <ul class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
                    <li v-for="post in posts" :key="post.id">
                        <inertia-link 
                            :href="`/posts/${post.category.slug}/${post.slug}`">
                            <div class="space-y-4">
                                <div class="relative pb-2/3">
                                    <img 
                                        class="absolute object-cover h-full w-full shadow-lg rounded-lg" 
                                        :src="`/${post.thumbnail}`" :alt="post.title">
                                </div>

                                <div class="space-y-2">
                                    <div class="text-lg leading-6 font-medium space-y-1">
                                        <div class="flex items-center text-sm">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            
                                            {{ post.visits }} visits
                                        </div>
                                            
                                        <p class="text-blue-600"
                                            v-html="post.title" />
                                    </div>
            
                                    <ul class="flex space-x-5">
                                        <li class="flex text-gray-400">
                                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                                                <path d="M8 7V3M16 7V3M7 11H17M5 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V19C3 20.1046 3.89543 21 5 21Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                            <span class="text-sm">{{ post.created_at | moment("from", "now") }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </inertia-link >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['posts'],
    }
</script>