<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Cast your votes!</h2>
        <hr>
        <Idea :vote="true" />
    </div>
</template>

<script>
import Idea from './Idea'

export default {
    name: 'RateIdeas',
    components: {
        Idea
    }
}
</script>
