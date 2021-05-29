<template>
    <div class="bg-white dark:bg-gray-800">
        <div class="max-w-screen-xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8">
            <div class="px-6 py-6 bg-blue-700 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
                <div class="xl:w-0 xl:flex-1">
                    <h2 class="text-2xl leading-8 font-extrabold tracking-tight text-white sm:text-3xl sm:leading-9">
                        Unataka kupata matukio na habari kuhusu Yesaya Software?
                    </h2>

                    <p class="mt-3 max-w-3xl text-lg leading-6 text-blue-200" id="newsletter-headline">
                        Jisajili hapa ili kila nikifanya jambo uwe wa kwanza kufahamu.
                    </p>
                </div>

                <div v-if="$page.props.flash.success" class="rounded-md bg-green-50 mt-4 sm:mt-2 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <CheckCircleIcon class="h-5 w-5 text-green-400" aria-hidden="true"/>
                        </div>

                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">
                                Umejisajili
                            </h3>

                            <div class="mt-2 text-sm text-green-700">
                                <p>
                                    {{ $page.props.flash.success }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="!$page.props.flash.success" @submit.prevent="store" class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                    <form class="sm:flex" aria-labelledby="newsletter-headline">
                        <input aria-label="Email address" type="email" v-model="form.email" required
                               class="appearance-none w-full dark:bg-gray-800 dark:text-gray-100 px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out"
                               placeholder="Weka email yako hapa.">

                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-400 focus:outline-none focus:bg-blue-400 transition duration-150 ease-in-out">
                                Nishtue
                            </button>
                        </div>
                    </form>

                    <p class="mt-3 text-sm leading-5 text-blue-200">
                        Ninajali kuhusu ulinzi wa taarifa zako. Soma hapa
                        <a href="/privacy" class="text-white font-medium underline">
                            Sera ya Faragha.
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {CheckCircleIcon} from "@heroicons/vue/solid/esm";

export default {
    name: 'Subscribe',

    data() {
        return {
            form: this.$inertia.form({
                email: '',
            })
        }
    },

    components: {
        CheckCircleIcon,
    },

    props: ['sessions'],

    methods: {
        store() {
            this.form.post(this.route('subscribe.store'), {
                preserveScroll: true,
                onFinish: () => this.form.reset(),
            })
        }
    }
}
</script>
