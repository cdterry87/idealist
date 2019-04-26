<template>
    <div v-show="isActive">
        <slot />
    </div>
</template>

<script>
    export default {
        name: 'Tab',
        props: {
            name: {
                required: true,
            },
            selected: {
                default: false
            },
            icon: {
                default: null
            }
        },
        data() {
            return {
                isActive: false
            }
        },
        mounted() {
            this.isActive = this.selected
        }
    }
</script>
