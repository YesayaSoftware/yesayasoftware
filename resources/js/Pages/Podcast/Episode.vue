<template>
    <div class="border-t-2 mb-6 border-gray-100">
        <iframe frameborder='0'
            height='200px'
            scrolling='no'
            seamless
            :src="`https://player.simplecast.com/${episode.id}?dark=false`"
            width='100%'></iframe>
       
        <h3 class="mt-3 mb-8 text-xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-2xl sm:leading-10">
            Toleo #{{ episode.number }}. {{ episode.title }}
        </h3>

        <div class="text-normal" v-html="episode.description" />

        <div class="mt-2 flex items-center">
            <div class="flex text-sm leading-5 text-gray-500">
                <time class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-blue-100 text-blue-800">
                    {{ episode.published_at | moment("from", "now") }}
                </time>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['episode']
    }
</script>