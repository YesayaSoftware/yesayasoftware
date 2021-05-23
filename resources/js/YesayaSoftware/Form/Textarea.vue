<template>
    <textarea :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input"
           rows="3"
           class="shadow-sm dark:bg-gray-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </textarea>
</template>

<script>
export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>

