<template>
    <div>
        <div v-for="episode in episodes" :key="episode.number">
            <episode :episode="episode" />
        </div>
    </div>
</template>

<script>
    import Episode from './../../Pages/Podcast/Episode'

    export default {
        props: ['episodes'],

        components: {
            Episode
        },
        
    }
</script>